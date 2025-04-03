<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;
use App\Enums\UserRole;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use Livewire\Attributes\Validate;

new #[Layout('layouts.guest')] class extends Component {
    #[Validate]
    public string $nom = '';
    #[Validate]
    public string $prenom = '';
    #[Validate]
    public string $email = '';
    #[Validate]
    public string $password = '';
    #[Validate]
    public string $password_confirmation = '';
    #[Validate]
    public string $role = UserRole::AUTRE->value;
    #[Validate]
    public bool $statut = true;

    protected function rules(): array
    {
        return [
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
            'password_confirmation' => ['required', 'string'],
            'role' => [Rule::in(array_column(UserRole::cases(), 'value'))],
            'statut' => ['boolean'],
        ];
    }

    public function register(): void
    {
        $validated = $this->validate();
        $validated['password'] = Hash::make($validated['password']);

        event(new Registered(($user = User::create($validated))));
        Auth::login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
};

?>

<div>
    <x-form.form submit="register">
        <div class="grid grid-cols-1 gap-x-6 gap-y-8">
            <!-- Nom -->
            <div class="col-span-full">
                <x-form.group name="nom" :label="__('Nom')">
                    <x-form.input name="nom" required live />
                </x-form.group>
            </div>

            <!-- Prénom -->
            <div class="col-span-full">
                <x-form.group name="prenom" :label="__('Prénom')">
                    <x-form.input name="prenom" required live />
                </x-form.group>
            </div>

            <!-- Adresse Email -->
            <div class="col-span-full">
                <x-form.group name="email" :label="__('Email professionnel')">
                    <x-form.input name="email" type="email" required live />
                </x-form.group>
            </div>

            <!-- Mot de passe -->
            <div class="col-span-full">
                <x-form.group name="password" :label="__('Mot de passe')">
                    <x-form.input name="password" type="password" required live />
                </x-form.group>
            </div>

            <!-- Confirmation du mot de passe -->
            <div class="col-span-full">
                <x-form.group name="password_confirmation" :label="__('Confirmation du mot de passe')">
                    <x-form.input name="password_confirmation" type="password" required live />
                </x-form.group>
            </div>

            {{-- ! Rôle --}}
            {{-- <div class="col-span-full">
                <x-form.group name="role" :label="__('Rôle')">
                    <x-form.select name="role">
                        @foreach (\App\Enums\UserRole::cases() as $role)
                            <option value="{{ $role->value }}">{{ $role }}</option>
                        @endforeach
                    </x-form.select>
                </x-form.group>
            </div> --}}

            {{-- ! Statut --}}
            {{-- <div class="col-span-full">
                <x-form.group name="statut" :label="__('Actif')">
                    <x-form.checkbox name="statut" />
                </x-form.group>
            </div> --}}
        </div>

        <div class="mt-5 flex flex-col items-center gap-4 justify-end">
            <a class="self-end text-sm font-semibold text-blue-600 hover:text-blue-500" href="{{ route('login') }}"
                wire:navigate>
                {{ __('Déjà inscrit ?') }}
            </a>
            <x-button.primary type="submit" class="w-full justify-center">
                {{ __('Créer un compte') }}
            </x-button.primary>
        </div>
    </x-form.form>
</div>
