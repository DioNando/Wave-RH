@php
    use App\Enums\UserRole;
@endphp
<x-app-layout>
    {{-- * Dashboard header --}}
    <div>
        <x-slot name="header">
            <div class="flex flex-col gap-2">
                <h3 class="flex items-center gap-2 text-2xl font-bold text-blue-600 dark:text-blue-400">
                    {{ __('Tableau de bord Utilisateur') }}
                </h3>
                <div class="flex items-center">
                    @php

                        $roleColor = match (true) {
                            auth()->user()->hasRole(UserRole::ADMIN->value) => 'red',
                            auth()->user()->hasRole(UserRole::USER->value) => 'blue',
                            // default => 'gray',
                        };
                        $roleLabel = match (true) {
                            auth()->user()->hasRole(UserRole::ADMIN->value) => UserRole::ADMIN->label(),
                            auth()->user()->hasRole(UserRole::USER->value) => UserRole::USER->label(),
                            // default => 'Invité oh',
                        };
                    @endphp
                    <x-badge.item :text="$roleLabel" :color="$roleColor" />
                </div>
            </div>
        </x-slot>
    </div>

    <x-card>
        <x-card.card-body>
            <h2 class="text-xl font-semibold mb-4">Bienvenue dans votre espace personnel</h2>
            <p class="mb-3">Vous êtes connecté en tant qu'utilisateur standard.</p>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-6">
                <div class="bg-blue-50 dark:bg-blue-900/20 p-4 rounded-lg border border-blue-100 dark:border-blue-800">
                    <h3 class="font-medium text-lg mb-2">Mes informations</h3>
                    <p>Consultez et modifiez vos informations personnelles</p>
                </div>
                <div
                    class="bg-purple-50 dark:bg-purple-900/20 p-4 rounded-lg border border-purple-100 dark:border-purple-800">
                    <h3 class="font-medium text-lg mb-2">Mes documents</h3>
                    <p>Accédez à vos documents importants</p>
                </div>
                <div
                    class="bg-green-50 dark:bg-green-900/20 p-4 rounded-lg border border-green-100 dark:border-green-800">
                    <h3 class="font-medium text-lg mb-2">Mes demandes</h3>
                    <p>Gérez vos demandes de congés et autres</p>
                </div>
            </div>
        </x-card.card-body>
    </x-card>

</x-app-layout>
