@php
    $headers = ['Nom', 'Rôle', 'Date de création', 'Statut', 'Actions'];
    $empty = 'Aucun utilisateur trouvé';
@endphp

<div>
    <x-table.table :headers="$headers">
        <x-table.body class="bg-white dark:bg-gray-900">
            @forelse($users as $user)
                <tr>
                    <x-table.cell>
                        <div class="flex flex-col gap-1">
                            <span class="font-medium">{{ $user->nom . ' ' . $user->prenom }}</span>
                            <span class="text-gray-700 dark:text-gray-400">{{ $user->email }}</span>
                        </div>
                    </x-table.cell>
                    <x-table.cell>
                        <div class="flex items-center">
                            @php
                                $roleColor = match ($user->role->value) {
                                    \App\Enums\UserRole::ADMIN->value => 'red',
                                    \App\Enums\UserRole::USER->value => 'blue',
                                    default => 'gray',
                                };
                                $roleLabel = $user->role->label();
                            @endphp
                            <x-badge.item :text="$roleLabel" :color="$roleColor" />
                        </div>
                    </x-table.cell>
                    <x-table.cell>
                        <div class="flex items-center">
                            <span>{{ \Carbon\Carbon::parse($user->created_at)->translatedFormat('d F Y') }}</span>
                        </div>
                    </x-table.cell>
                    <x-table.cell>
                        <x-badge.statut :statut="$user->statut" />
                    </x-table.cell>
                    <x-table.cell class="w-fit px-5 text-sm">
                        <div class="flex gap-2">
                            {{-- <a href="{{ route('admin.users.edit', $user->id) }}"
                                class="inline-flex items-center p-2 text-sm text-white rounded-lg bg-orange-600 hover:bg-orange-700 dark:bg-orange-700 dark:hover:bg-orange-800 active:bg-orange-800 dark:active:bg-orange-900">
                                <x-heroicon-o-pencil-square class="size-4" />
                            </a> --}}
                            @if (auth()->id() !== $user->id)
                                <button
                                    x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion-{{ $user->id }}')"
                                    class="inline-flex items-center p-2 text-sm text-white rounded-lg bg-red-600 hover:bg-red-700 dark:bg-red-700 dark:hover:bg-red-800 active:bg-red-800 dark:active:bg-red-900">
                                    <x-heroicon-o-trash class="size-4" />
                                </button>
                                <x-modal name="confirm-user-deletion-{{ $user->id }}" :show="$errors->isNotEmpty()">

                                    <div class="sm:p-6 p-4">

                                        <!-- Header -->
                                        <div class="flex items-center gap-4">
                                            <div
                                                class="flex size-12 shrink-0 items-center justify-center rounded-full bg-red-100 sm:size-10">
                                                <x-heroicon-o-exclamation-triangle class="size-6 text-red-600" />
                                            </div>
                                            <h3 id="modal-title"
                                                class="text-base font-semibold text-gray-900 dark:text-white">
                                                Supprimer
                                                {{ $user->nom . ' ' . $user->prenom }}
                                            </h3>
                                        </div>

                                        <!-- Body -->
                                        <div class="mt-3 text-sm text-gray-700 dark:text-gray-300">
                                            <p>Êtes-vous sûr de vouloir supprimer cet utilisateur ?
                                                Cette action est irréversible.</p>
                                        </div>

                                        <!-- Actions -->
                                        <div class="mt-5 sm:mt-4 flex flex-row-reverse gap-3">
                                            <x-button.primary type="button"
                                                wire:click="deleteUser({{ $user->id }})"
                                                x-on:click="$dispatch('close-modal', 'confirm-user-deletion-{{ $user->id }}')"
                                                color="red">
                                                {{ __('Supprimer compte') }}
                                            </x-button.primary>
                                            <x-button.primary type="button" color="gray"
                                                x-on:click="$dispatch('close-modal', 'confirm-user-deletion-{{ $user->id }}')">
                                                {{ __('Annuler') }}
                                            </x-button.primary>
                                        </div>
                                    </div>
                                </x-modal>
                            @endif
                        </div>
                    </x-table.cell>
                </tr>
            @empty
                <tr>
                    <td colspan="{{ count($headers) }}" class="text-center py-5 text-gray-500 dark:text-gray-400">
                        {{ $empty }}
                    </td>
                </tr>
            @endforelse
        </x-table.body>
    </x-table.table>

    <nav class="mt-3">
        {{ $users->onEachSide(1)->links('pagination::tailwind') }}
    </nav>
</div>
