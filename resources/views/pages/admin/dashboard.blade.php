<x-app-layout>
    {{-- <section class="lg:pr-80"> --}}
    <section class="space-y-6">
        {{-- * Dashboard header --}}
        <div>
            <x-slot name="header">
                <div class="flex flex-col gap-2">
                    <h3 class="flex items-center gap-2 text-2xl font-bold text-blue-600 dark:text-blue-400">
                        {{ __('Tableau de bord Administrateur') }}
                    </h3>
                    <div class="flex items-center">
                        @php
                            $roleColor = match (auth()->user()->role->value) {
                                \App\Enums\UserRole::ADMIN->value => 'red',
                                \App\Enums\UserRole::USER->value => 'blue',
                                default => 'gray',
                            };
                            $roleLabel = auth()->user()->role->label();
                        @endphp
                        <x-badge.item :text="$roleLabel" :color="$roleColor" />
                    </div>
                </div>
            </x-slot>
        </div>
        {{-- * Dashboard content --}}

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <x-card class="col-span-1 md:col-span-2">
                <x-card.card-body>
                    <h3 class="text-lg font-semibold mb-3 text-gray-900 dark:text-gray-100">Statistiques globales</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <x-dashboard.stat-card title="Total Collaborateurs" :value="$totalCollaborateurs" trend="3.2%" trendType="up"
                            color="blue" />
                        <x-dashboard.stat-card title="Départements" :value="$departementsCount" trend="1.5%" trendType="up"
                            color="green" />
                        <x-dashboard.stat-card title="Salaires versés ce mois" :value="number_format($salairesVerses, 0, ',', ' ') . ' Dh'" trend="2.1%"
                            trendType="up" color="default" />
                        <x-dashboard.stat-card title="Heures supplémentaires" :value="$heuresSupplementaires . 'h'" trend="5.7%"
                            trendType="up" color="default" />
                    </div>
                </x-card.card-body>
            </x-card>

            <x-card class="col-span-1">
                <x-card.card-body>

                    <h3 class="text-lg font-semibold mb-3 text-gray-900 dark:text-gray-100">Actions rapides</h3>
                    <div class="space-y-2">
                        <a href="#"
                            class="block w-full py-2 px-3 bg-blue-50 hover:bg-blue-100 dark:bg-blue-900/20 dark:hover:bg-blue-900/30 rounded-lg border border-blue-100 dark:border-blue-800 transition">
                            <div class="flex items-center">
                                <span class="flex-1 font-medium">Ajouter un utilisateur</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </a>
                        <a href="#"
                            class="block w-full py-2 px-3 bg-green-50 hover:bg-green-100 dark:bg-green-900/20 dark:hover:bg-green-900/30 rounded-lg border border-green-100 dark:border-green-800 transition">
                            <div class="flex items-center">
                                <span class="flex-1 font-medium">Créer un département</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </a>
                        <a href="#"
                            class="block w-full py-2 px-3 bg-purple-50 hover:bg-purple-100 dark:bg-purple-900/20 dark:hover:bg-purple-900/30 rounded-lg border border-purple-100 dark:border-purple-800 transition">
                            <div class="flex items-center">
                                <span class="flex-1 font-medium">Gérer les demandes</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-500"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                                    <path fill-rule="evenodd"
                                        d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm9.707 5.707a1 1 0 00-1.414-1.414L9 12.586l-1.293-1.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </a>
                    </div>
                </x-card.card-body>
            </x-card>
            <x-card class="col-span-1">
                <x-card.card-body>
                    <header
                        class="flex items-center justify-between border-b border-gray-200 dark:border-gray-600 pb-4">
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Flux d'activités</h2>
                        <a href="#" class="text-sm font-semibold text-blue-600 hover:text-blue-700">Voir tout</a>
                    </header>
                    <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-600">
                        @foreach ($activities as $activity)
                            <x-dashboard.activity-item :user="$activity['user']" :time="$activity['time']" :action="$activity['action']"
                                :highlight="$activity['highlight']" :type="$activity['type']" />
                        @endforeach
                    </ul>
                </x-card.card-body>
            </x-card>
        </div>



        {{-- * Utilisateurs connectés (NEW) --}}
        <x-card>
            <x-card.card-body>
                <h3 class="text-lg font-semibold mb-4 text-gray-900 dark:text-gray-100">
                    <div class="flex items-center gap-2">
                        <span>Utilisateurs connectés</span>
                        <span
                            class="inline-flex items-center justify-center px-2 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400">
                            {{ rand(1, 5) }} actifs
                        </span>
                    </div>
                </h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead>
                            <tr>
                                <th
                                    class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Utilisateur
                                </th>
                                <th
                                    class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Département
                                </th>
                                <th
                                    class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Dernière activité
                                </th>
                                <th
                                    class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Statut
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            <tr>
                                <td class="px-4 py-3 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div
                                            class="flex-shrink-0 h-8 w-8 rounded-full bg-blue-100 dark:bg-blue-900/20 flex items-center justify-center">
                                            <span class="text-blue-600 dark:text-blue-400 font-medium">JD</span>
                                        </div>
                                        <div class="ml-3">
                                            <div class="text-sm font-medium text-gray-900 dark:text-gray-100">John Doe
                                            </div>
                                            <div class="text-xs text-gray-500 dark:text-gray-400">john.doe@example.com
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap">
                                    <span class="text-sm text-gray-900 dark:text-gray-100">Ressources Humaines</span>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap">
                                    <span class="text-sm text-gray-500 dark:text-gray-400">Il y a 2 minutes</span>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div>
                                        <span class="text-sm font-medium text-gray-900 dark:text-gray-100">En
                                            ligne</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-4 py-3 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div
                                            class="flex-shrink-0 h-8 w-8 rounded-full bg-green-100 dark:bg-green-900/20 flex items-center justify-center">
                                            <span class="text-green-600 dark:text-green-400 font-medium">JS</span>
                                        </div>
                                        <div class="ml-3">
                                            <div class="text-sm font-medium text-gray-900 dark:text-gray-100">Jane Smith
                                            </div>
                                            <div class="text-xs text-gray-500 dark:text-gray-400">jane.smith@example.com
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap">
                                    <span class="text-sm text-gray-900 dark:text-gray-100">Marketing</span>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap">
                                    <span class="text-sm text-gray-500 dark:text-gray-400">Il y a 5 minutes</span>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div>
                                        <span class="text-sm font-medium text-gray-900 dark:text-gray-100">En
                                            ligne</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-4 py-3 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div
                                            class="flex-shrink-0 h-8 w-8 rounded-full bg-purple-100 dark:bg-purple-900/20 flex items-center justify-center">
                                            <span class="text-purple-600 dark:text-purple-400 font-medium">AD</span>
                                        </div>
                                        <div class="ml-3">
                                            <div class="text-sm font-medium text-gray-900 dark:text-gray-100">Admin
                                                User</div>
                                            <div class="text-xs text-gray-500 dark:text-gray-400">admin@waveagency.fr
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap">
                                    <span class="text-sm text-gray-900 dark:text-gray-100">Direction</span>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap">
                                    <span class="text-sm text-gray-500 dark:text-gray-400">Il y a 1 minute</span>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div>
                                        <span class="text-sm font-medium text-gray-900 dark:text-gray-100">En
                                            ligne</span>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
        </x-card>
        </x-card.card-body>

        <x-card>
            <x-card.card-body>
                <h3 class="text-lg font-semibold mb-4 text-gray-900 dark:text-gray-100">Derniers utilisateurs
                    enregistrés
                </h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead>
                            <tr>
                                <th
                                    class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Utilisateur</th>
                                <th
                                    class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Rôle</th>
                                <th
                                    class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Date d'inscription</th>
                                <th
                                    class="px-4 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            <tr>
                                <td class="px-4 py-3 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div
                                            class="flex-shrink-0 h-8 w-8 rounded-full bg-blue-100 dark:bg-blue-900/20 flex items-center justify-center">
                                            <span class="text-blue-600 dark:text-blue-400 font-medium">JD</span>
                                        </div>
                                        <div class="ml-3">
                                            <div class="text-sm font-medium text-gray-900 dark:text-gray-100">John Doe
                                            </div>
                                            <div class="text-xs text-gray-500 dark:text-gray-400">john.doe@example.com
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap">
                                    <span
                                        class="px-2 py-1 text-xs rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900/20 dark:text-blue-400">Utilisateur</span>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                    {{ now()->subDays(2)->format('d/m/Y') }}
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="#"
                                        class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300">Éditer</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-4 py-3 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div
                                            class="flex-shrink-0 h-8 w-8 rounded-full bg-green-100 dark:bg-green-900/20 flex items-center justify-center">
                                            <span class="text-green-600 dark:text-green-400 font-medium">JS</span>
                                        </div>
                                        <div class="ml-3">
                                            <div class="text-sm font-medium text-gray-900 dark:text-gray-100">Jane
                                                Smith
                                            </div>
                                            <div class="text-xs text-gray-500 dark:text-gray-400">
                                                jane.smith@example.com
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap">
                                    <span
                                        class="px-2 py-1 text-xs rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900/20 dark:text-blue-400">Utilisateur</span>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                    {{ now()->subDays(5)->format('d/m/Y') }}
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="#"
                                        class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300">Éditer</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </x-card.card-body>
        </x-card>
    </section>
</x-app-layout>
