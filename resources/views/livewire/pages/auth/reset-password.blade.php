<?php

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    #[Locked]
    public string $token = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Mount the component.
     */
    public function mount(string $token): void
    {
        $this->token = $token;

        $this->email = request()->string('email');
    }

    /**
     * Reset the password for the given user.
     */
    public function resetPassword(): void
    {
        $this->validate([
            'token' => ['required'],
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        $status = Password::reset($this->only('email', 'password', 'password_confirmation', 'token'), function ($user) {
            $user
                ->forceFill([
                    'password' => Hash::make($this->password),
                    'remember_token' => Str::random(60),
                ])
                ->save();

            event(new PasswordReset($user));
        });

        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        if ($status != Password::PASSWORD_RESET) {
            $this->addError('email', __($status));

            return;
        }

        Session::flash('status', __($status));

        $this->redirectRoute('login', navigate: true);
    }
}; ?>

<div>
    <form wire:submit="resetPassword">
        <div class="grid grid-cols-1 gap-x-6 gap-y-8">
            {{-- * Adresse email --}}
            <div class="col-span-full">
                <x-form.group name="email" :label="__('Email')">
                    <x-form.input name="email" required />
                </x-form.group>
            </div>
            {{-- * Mot de passe --}}
            <div class="col-span-full">
                <x-form.group name="password" :label="__('Mot de passe')">
                    <x-form.input type="password" name="password" required />
                </x-form.group>
            </div>
            {{-- * Confirmation mot de passe --}}
            <div class="col-span-full">
                <x-form.group name="password_confirmation" :label="__('Confirmer le mot de passe')">
                    <x-form.input type="password" name="password_confirmation" required />
                </x-form.group>
            </div>
        </div>

        <div class="mt-5 flex flex-col items-center gap-4 justify-end">
            <x-button.primary type="submit">
                {{ __('Reset Password') }}
            </x-button.primary>
        </div>
    </form>
</div>
