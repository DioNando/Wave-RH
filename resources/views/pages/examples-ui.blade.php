<x-app-layout>
    <div>
        <h1 class="text-3xl font-bold mb-8">Catalogue de composants UI</h1>

        <div class="space-y-12">
            <!-- Table des matières -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <h2 class="text-xl font-semibold mb-4">Table des matières</h2>
                <nav class="space-y-1">
                    <a href="#buttons" class="block text-blue-600 dark:text-blue-400 hover:underline">Boutons</a>
                    <a href="#badges" class="block text-blue-600 dark:text-blue-400 hover:underline">Badges</a>
                    <a href="#cards" class="block text-blue-600 dark:text-blue-400 hover:underline">Cartes</a>
                    <a href="#tables" class="block text-blue-600 dark:text-blue-400 hover:underline">Tableaux</a>
                    <a href="#forms" class="block text-blue-600 dark:text-blue-400 hover:underline">Formulaires</a>
                    <a href="#alerts" class="block text-blue-600 dark:text-blue-400 hover:underline">Alertes</a>
                    <a href="#notifications"
                        class="block text-blue-600 dark:text-blue-400 hover:underline">Notifications</a>
                </nav>
            </div>

            <!-- SECTION: BOUTONS -->
            <section id="buttons" class="scroll-mt-16">
                <h2 class="text-2xl font-bold mb-6 border-b pb-2">Boutons</h2>

                <!-- Primary Buttons -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 mb-8">
                    <h3 class="text-lg font-medium mb-4">Boutons primaires</h3>

                    <div class="flex flex-wrap gap-3 mb-6">
                        <x-button.primary>Défaut</x-button.primary>
                        <x-button.primary color="green">Vert</x-button.primary>
                        <x-button.primary color="red">Rouge</x-button.primary>
                        <x-button.primary color="yellow">Jaune</x-button.primary>
                        <x-button.primary color="purple">Violet</x-button.primary>
                        <x-button.primary color="orange">Orange</x-button.primary>
                    </div>

                    <div class="flex flex-wrap gap-3 mb-6">
                        <x-button.primary size="xs">Extra Small</x-button.primary>
                        <x-button.primary size="sm">Small</x-button.primary>
                        <x-button.primary size="md">Medium</x-button.primary>
                        <x-button.primary size="lg">Large</x-button.primary>
                        <x-button.primary size="xl">Extra Large</x-button.primary>
                    </div>

                    <div class="flex flex-wrap gap-3">
                        <x-button.primary icon="heroicon-o-user">Avec icône</x-button.primary>
                        <x-button.primary icon="heroicon-o-check" iconPosition="right">Icône à droite</x-button.primary>
                        <x-button.primary icon="heroicon-o-arrow-path" loading>Chargement</x-button.primary>
                        <x-button.primary disabled>Désactivé</x-button.primary>
                    </div>
                </div>

                <!-- Secondary Buttons -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 mb-8">
                    <h3 class="text-lg font-medium mb-4">Boutons secondaires</h3>

                    <div class="flex flex-wrap gap-3 mb-6">
                        <x-button.secondary>Défaut</x-button.secondary>
                        <x-button.secondary color="green">Vert</x-button.secondary>
                        <x-button.secondary color="red">Rouge</x-button.secondary>
                        <x-button.secondary color="yellow">Jaune</x-button.secondary>
                        <x-button.secondary color="purple">Violet</x-button.secondary>
                        <x-button.secondary color="orange">Orange</x-button.secondary>
                    </div>

                    <div class="flex flex-wrap gap-3 mb-6">
                        <x-button.secondary size="xs">Extra Small</x-button.secondary>
                        <x-button.secondary size="sm">Small</x-button.secondary>
                        <x-button.secondary size="md">Medium</x-button.secondary>
                        <x-button.secondary size="lg">Large</x-button.secondary>
                        <x-button.secondary size="xl">Extra Large</x-button.secondary>
                    </div>

                    <div class="flex flex-wrap gap-3">
                        <x-button.secondary icon="heroicon-o-user">Avec icône</x-button.secondary>
                        <x-button.secondary icon="heroicon-o-arrow-path" responsive>Responsive</x-button.secondary>
                        <x-button.secondary disabled>Désactivé</x-button.secondary>
                    </div>
                </div>

                <!-- Outlined Buttons -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 mb-8">
                    <h3 class="text-lg font-medium mb-4">Boutons avec contour</h3>

                    <div class="flex flex-wrap gap-3 mb-6">
                        <x-button.outlined>Défaut</x-button.outlined>
                        <x-button.outlined color="green">Vert</x-button.outlined>
                        <x-button.outlined color="red">Rouge</x-button.outlined>
                        <x-button.outlined color="yellow">Jaune</x-button.outlined>
                        <x-button.outlined color="purple">Violet</x-button.outlined>
                        <x-button.outlined color="gray">Gris</x-button.outlined>
                    </div>

                    <div class="flex flex-wrap gap-3">
                        <x-button.outlined icon="heroicon-o-cog-6-tooth">Paramètres</x-button.outlined>
                        <x-button.outlined href="#" color="blue">Lien</x-button.outlined>
                        <x-button.outlined size="sm" color="red">Petit</x-button.outlined>
                    </div>
                </div>
            </section>

            <!-- SECTION: BADGES -->
            <section id="badges" class="scroll-mt-16">
                <h2 class="text-2xl font-bold mb-6 border-b pb-2">Badges</h2>

                <!-- Badge Dots -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 mb-8">
                    <h3 class="text-lg font-medium mb-4">Badge Dots</h3>

                    <div class="flex flex-wrap gap-4 mb-6">
                        <x-badge.dot color="blue" />
                        <x-badge.dot color="green" />
                        <x-badge.dot color="red" />
                        <x-badge.dot color="yellow" />
                        <x-badge.dot color="purple" />
                        <x-badge.dot color="orange" />
                        <x-badge.dot color="gray" />
                    </div>

                    <div class="flex flex-wrap gap-4 mb-6">
                        <div class="flex items-center gap-2">
                            <x-badge.dot color="green" />
                            <span>En ligne</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <x-badge.dot color="red" />
                            <span>Hors ligne</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <x-badge.dot color="yellow" />
                            <span>En attente</span>
                        </div>
                    </div>

                    <!-- Badge Dot avec différentes tailles -->
                    <div class="mb-6">
                        <h4 class="text-md font-medium mb-3">Tailles</h4>
                        <div class="flex flex-wrap items-center gap-4">
                            <x-badge.dot color="blue" size="xs" label="XS" />
                            <x-badge.dot color="blue" size="sm" label="SM" />
                            <x-badge.dot color="blue" size="md" label="MD" />
                            <x-badge.dot color="blue" size="lg" label="LG" />
                            <x-badge.dot color="blue" size="xl" label="XL" />
                        </div>
                    </div>

                    <!-- Badge Dot avec différents arrondis -->
                    <div>
                        <h4 class="text-md font-medium mb-3">Coins arrondis</h4>
                        <div class="flex flex-wrap items-center gap-4">
                            <x-badge.dot color="blue" rounded="none" label="None" />
                            <x-badge.dot color="blue" rounded="sm" label="SM" />
                            <x-badge.dot color="blue" rounded="md" label="MD" />
                            <x-badge.dot color="blue" rounded="lg" label="LG" />
                            <x-badge.dot color="blue" rounded="full" label="Full" />
                        </div>
                    </div>
                </div>

                <!-- Badge Items -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 mb-8">
                    <h3 class="text-lg font-medium mb-4">Badge Items</h3>

                    <div class="flex flex-wrap gap-2 mb-6">
                        <x-badge.item text="Défaut" color="blue" />
                        <x-badge.item text="Succès" color="green" />
                        <x-badge.item text="Danger" color="red" />
                        <x-badge.item text="Avertissement" color="yellow" />
                        <x-badge.item text="Info" color="purple" />
                        <x-badge.item text="Secondaire" color="gray" />
                    </div>

                    <div class="flex flex-wrap gap-2">
                        <x-badge.item text="Indigo" color="indigo" />
                        <x-badge.item text="Rose" color="pink" />
                        <x-badge.item text="Cyan" color="cyan" />
                        <x-badge.item text="Émeraude" color="emerald" />
                        <x-badge.item text="Violet" color="violet" />
                        <x-badge.item text="Fuchsia" color="fuchsia" />
                    </div>
                </div>

                <!-- Badge Lists -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                    <h3 class="text-lg font-medium mb-4">Badge Lists</h3>

                    <div class="mb-6">
                        <h4 class="text-md font-medium mb-3">Liste avec couleur bleue</h4>
                        <x-badge.list :items="['php', 'laravel', 'livewire', 'alpine.js', 'tailwindcss']" color="blue" />
                    </div>

                    <div class="mb-6">
                        <h4 class="text-md font-medium mb-3">Listes avec différentes couleurs</h4>
                        <div class="space-y-4">
                            <x-badge.list :items="['html', 'css', 'javascript']" color="red" />
                            <x-badge.list :items="['docker', 'kubernetes', 'aws']" color="green" />
                            <x-badge.list :items="['figma', 'sketch', 'photoshop']" color="purple" />
                        </div>
                    </div>

                    <div>
                        <h4 class="text-md font-medium mb-3">Liste vide</h4>
                        <x-badge.list :items="[]" emptyText="Aucune compétence disponible" />
                    </div>
                </div>
            </section>

            <!-- SECTION: CARDS -->
            <section id="cards" class="scroll-mt-16">
                <h2 class="text-2xl font-bold mb-6 border-b pb-2">Cartes</h2>

                <!-- Simple Card -->
                <div class="mb-8">
                    <x-card>
                        <div class="p-6">
                            <h3 class="font-bold text-lg mb-2">Carte simple</h3>
                            <p class="text-gray-700 dark:text-gray-300">Contenu de la carte sans en-tête ni pied de
                                page.</p>
                        </div>
                    </x-card>
                </div>

                <!-- Card with Header and Footer -->
                <div class="mb-8">
                    <x-card type="primary">
                        <x-card.card-header title="Titre de la carte"
                            subtitle="Ceci est le sous-titre de la carte qui donne plus d'informations" />

                        <x-card.card-body>
                            <p class="text-gray-700 dark:text-gray-300">
                                Contenu principal de la carte. Vous pouvez y mettre du texte, des images, ou d'autres
                                éléments.
                                Cette carte comporte un en-tête avec titre et sous-titre, ainsi qu'un pied de page avec
                                des boutons d'action.
                            </p>
                        </x-card.card-body>

                        <x-card.card-footer>
                            <div class="flex gap-2">
                                <x-button.primary>Enregistrer</x-button.primary>
                                <x-button.secondary>Annuler</x-button.secondary>
                            </div>
                        </x-card.card-footer>
                    </x-card>
                </div>

                <!-- Card with Dropdown -->
                <div class="mb-8">
                    <x-card type="primary">
                        <x-card.card-header :dropdown="true" title="Carte avec dropdown"
                            subtitle="En-tête avec menu déroulant" />

                        <x-card.card-body>
                            <p class="text-gray-700 dark:text-gray-300">
                                Cette carte dispose d'un menu déroulant dans son en-tête. Le menu déroulant peut
                                contenir
                                différentes actions ou options.
                            </p>
                        </x-card.card-body>
                    </x-card>
                </div>

                <!-- Different Card Types -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <x-card type="primary">
                        <div class="p-6">
                            <h3 class="font-bold text-lg mb-2">Type: Primary</h3>
                            <p class="text-gray-700 dark:text-gray-300">Carte avec le style primaire.</p>
                        </div>
                    </x-card>

                    <x-card type="secondary">
                        <div class="p-6">
                            <h3 class="font-bold text-lg mb-2">Type: Secondary</h3>
                            <p class="text-gray-700 dark:text-gray-300">Carte avec le style secondaire.</p>
                        </div>
                    </x-card>
                </div>
            </section>

            <!-- SECTION: TABLES -->
            <section id="tables" class="scroll-mt-16">
                <h2 class="text-2xl font-bold mb-6 border-b pb-2">Tableaux</h2>

                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 mb-8">
                    <h3 class="text-lg font-medium mb-4">Tableau de base</h3>

                    @php
                        $headers = ['Nom', 'Email', 'Rôle', 'Statut'];
                        $tableData = [
                            (object) [
                                'nom' => 'John Doe',
                                'email' => 'john@example.com',
                                'role' => 'Admin',
                                'statut' => 'Actif',
                            ],
                            (object) [
                                'nom' => 'Jane Smith',
                                'email' => 'jane@example.com',
                                'role' => 'Utilisateur',
                                'statut' => 'Inactif',
                            ],
                            (object) [
                                'nom' => 'Mark Johnson',
                                'email' => 'mark@example.com',
                                'role' => 'Éditeur',
                                'statut' => 'En attente',
                            ],
                        ];
                    @endphp

                    <x-table.table :headers="$headers">
                        <x-table.body>
                            @foreach ($tableData as $item)
                                <tr>
                                    <x-table.cell>
                                        <div class="flex items-center">
                                            <span class="font-medium">{{ $item->nom }}</span>
                                        </div>
                                    </x-table.cell>
                                    <x-table.cell>
                                        <div class="flex items-center">
                                            <span>{{ $item->email }}</span>
                                        </div>
                                    </x-table.cell>
                                    <x-table.cell>
                                        <div class="flex items-center">
                                            @if ($item->role === 'Admin')
                                                <x-badge.item text="{{ $item->role }}" color="blue" />
                                            @elseif ($item->role === 'Éditeur')
                                                <x-badge.item text="{{ $item->role }}" color="purple" />
                                            @else
                                                <x-badge.item text="{{ $item->role }}" color="gray" />
                                            @endif
                                        </div>
                                    </x-table.cell>
                                    <x-table.cell>
                                        <div class="flex items-center">
                                            @if ($item->statut === 'Actif')
                                                <div class="flex items-center">
                                                    <x-badge.dot color="green" />
                                                    <span class="ml-2">{{ $item->statut }}</span>
                                                </div>
                                            @elseif ($item->statut === 'Inactif')
                                                <div class="flex items-center">
                                                    <x-badge.dot color="red" />
                                                    <span class="ml-2">{{ $item->statut }}</span>
                                                </div>
                                            @else
                                                <div class="flex items-center">
                                                    <x-badge.dot color="yellow" />
                                                    <span class="ml-2">{{ $item->statut }}</span>
                                                </div>
                                            @endif
                                        </div>
                                    </x-table.cell>
                                </tr>
                            @endforeach
                        </x-table.body>
                    </x-table.table>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 mb-8">
                    <h3 class="text-lg font-medium mb-4">Tableau sans données</h3>

                    @php
                        $headers = ['Nom', 'Email', 'Rôle', 'Statut'];
                        $emptyData = [];
                        $emptyText = 'Aucun enregistrement trouvé';
                    @endphp

                    <x-table.table :headers="$headers">
                        <x-table.body>
                            @forelse ($emptyData as $item)
                                <tr>
                                    <x-table.cell>{{ $item->nom }}</x-table.cell>
                                    <x-table.cell>{{ $item->email }}</x-table.cell>
                                    <x-table.cell>{{ $item->role }}</x-table.cell>
                                    <x-table.cell>{{ $item->statut }}</x-table.cell>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="{{ count($headers) }}"
                                        class="text-center py-5 text-gray-500 dark:text-gray-400">
                                        {{ $emptyText }}
                                    </td>
                                </tr>
                            @endforelse
                        </x-table.body>
                    </x-table.table>
                </div>
            </section>

            <!-- SECTION: FORMULAIRES -->
            <section id="forms" class="scroll-mt-16">
                <h2 class="text-2xl font-bold mb-6 border-b pb-2">Formulaires</h2>

                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 mb-8">
                    <h3 class="text-lg font-medium mb-4">Formulaire de connexion</h3>

                    <form>
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
                            {{-- * Remember me --}}
                            <div class="col-span-full flex items-center gap-x-3">
                                <x-form.checkbox name="remember" />
                                <x-form.label name="remember" :label="__('Se souvenir de moi')" />
                            </div>
                        </div>
                        <div class="mt-5 flex flex-col items-center gap-4 justify-end">
                            <a class="self-end text-sm font-semibold text-blue-600 hover:text-blue-500" href="#">
                                {{ __('Mot de passe oublié ?') }}
                            </a>
                            <x-button.primary class="w-full justify-center">
                                {{ __('Connexion') }}
                            </x-button.primary>
                            <p class="mt-4 text-sm text-gray-600 dark:text-gray-400"> Vous n'avez pas de compte ? <a
                                    class="font-semibold text-blue-600 hover:text-blue-500" href="#">
                                    {{ __('Créer un compte') }}
                                </a></p>
                        </div>
                    </form>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 mb-8">
                    <h3 class="text-lg font-medium mb-4">Formulaire d'inscription</h3>

                    <form>
                        <div class="grid grid-cols-1 gap-x-6 gap-y-8">
                            {{-- * Nom --}}
                            <div class="col-span-full">
                                <x-form.group name="nom" :label="__('Nom')">
                                    <x-form.input name="nom" required />
                                </x-form.group>
                            </div>

                            {{-- * Prénom --}}
                            <div class="col-span-full">
                                <x-form.group name="prenom" :label="__('Prénom')">
                                    <x-form.input name="prenom" required />
                                </x-form.group>
                            </div>

                            {{-- * Adresse email --}}
                            <div class="col-span-full">
                                <x-form.group name="email" :label="__('Email')">
                                    <x-form.input name="email" type="email" required />
                                </x-form.group>
                            </div>

                            {{-- * Mot de passe --}}
                            <div class="col-span-full">
                                <x-form.group name="password" :label="__('Mot de passe')">
                                    <x-form.input name="password" type="password" required />
                                </x-form.group>
                            </div>

                            {{-- * Confirmation du mot de passe --}}
                            <div class="col-span-full">
                                <x-form.group name="password_confirmation" :label="__('Confirmation du mot de passe')">
                                    <x-form.input name="password_confirmation" type="password" required />
                                </x-form.group>
                            </div>

                            {{-- * Rôle --}}
                            <div class="col-span-full">
                                <x-form.group name="role" :label="__('Rôle')">
                                    <x-form.select name="role" :options="['admin' => 'Administrateur', 'user' => 'Utilisateur']" required />
                                </x-form.group>
                            </div>

                            {{-- * Statut --}}
                            <div class="col-span-full">
                                <x-form.group name="statut" :label="__('Actif')">
                                    <x-form.checkbox name="statut" />
                                </x-form.group>
                            </div>
                        </div>

                        <div class="mt-5 flex flex-col items-center gap-4 justify-end">
                            <a class="self-end text-sm font-semibold text-blue-600 hover:text-blue-500" href="#">
                                {{ __('Déjà inscrit ?') }}
                            </a>
                            <x-button.primary class="w-full justify-center">
                                {{ __('Créer un compte') }}
                            </x-button.primary>
                        </div>
                    </form>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 mb-8">
                    <h3 class="text-lg font-medium mb-4">Éléments de formulaire individuels</h3>

                    <div class="space-y-8">
                        <!-- Input text -->
                        <div>
                            <h4 class="text-md font-medium mb-3">Input Text</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <x-form.group name="input_default" :label="__('Input par défaut')">
                                    <x-form.input name="input_default" placeholder="Saisissez du texte..." />
                                </x-form.group>

                                <x-form.group name="input_with_error" :label="__('Input avec erreur')" :error="__('Ce champ est obligatoire')">
                                    <x-form.input name="input_with_error" placeholder="Champ requis" />
                                </x-form.group>
                            </div>
                        </div>

                        <!-- Input types -->
                        <div>
                            <h4 class="text-md font-medium mb-3">Types d'input</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <x-form.group name="input_email" :label="__('Type email')">
                                    <x-form.input name="input_email" type="email" placeholder="email@exemple.com" />
                                </x-form.group>

                                <x-form.group name="input_number" :label="__('Type nombre')">
                                    <x-form.input name="input_number" type="number" placeholder="42" />
                                </x-form.group>

                                <x-form.group name="input_date" :label="__('Type date')">
                                    <x-form.input name="input_date" type="date" />
                                </x-form.group>

                                <x-form.group name="input_password" :label="__('Type mot de passe')">
                                    <x-form.input name="input_password" type="password" placeholder="••••••••" />
                                </x-form.group>
                            </div>
                        </div>

                        <!-- Select -->
                        {{-- <div>
                            <h4 class="text-md font-medium mb-3">Select</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <x-form.group name="select_basic" :label="__('Select de base')">
                                    <x-form.select name="select_basic" :options="[
                                        '' => 'Sélectionnez une option',
                                        'option1' => 'Option 1',
                                        'option2' => 'Option 2',
                                        'option3' => 'Option 3',
                                    ]" />
                                </x-form.group>

                                <x-form.group name="select_grouped" :label="__('Select avec groupes')">
                                    <x-form.select name="select_grouped" :options="[
                                        '' => 'Sélectionnez une option',
                                        'Développement' => [
                                            'php' => 'PHP',
                                            'js' => 'JavaScript',
                                            'python' => 'Python',
                                        ],
                                        'Design' => [
                                            'ui' => 'UI Design',
                                            'ux' => 'UX Design',
                                        ],
                                    ]" />
                                </x-form.group>
                            </div>
                        </div> --}}

                        <!-- Textarea -->
                        <div>
                            <h4 class="text-md font-medium mb-3">Textarea</h4>
                            <x-form.group name="textarea" :label="__('Description')">
                                <x-form.textarea name="textarea" placeholder="Entrez une description détaillée..." rows="4" />
                            </x-form.group>
                        </div>

                        <!-- Checkbox & Radio -->
                        <div>
                            <h4 class="text-md font-medium mb-3">Checkbox et Radio</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <p class="text-sm font-medium mb-2">Checkbox</p>
                                    <div class="space-y-2">
                                        <div class="flex items-center gap-x-3">
                                            <x-form.checkbox name="checkbox1" />
                                            <x-form.label name="checkbox1" :label="__('Option 1')" />
                                        </div>
                                        <div class="flex items-center gap-x-3">
                                            <x-form.checkbox name="checkbox2" checked />
                                            <x-form.label name="checkbox2" :label="__('Option 2 (sélectionnée)')" />
                                        </div>
                                        <div class="flex items-center gap-x-3">
                                            <x-form.checkbox name="checkbox3" disabled />
                                            <x-form.label name="checkbox3" :label="__('Option 3 (désactivée)')" />
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <p class="text-sm font-medium mb-2">Radio</p>
                                    <div class="space-y-2">
                                        <div class="flex items-center gap-x-3">
                                            <x-form.radio name="radio_group" value="option1" checked />
                                            <x-form.label name="radio_group" :label="__('Option 1')" />
                                        </div>
                                        <div class="flex items-center gap-x-3">
                                            <x-form.radio name="radio_group" value="option2" />
                                            <x-form.label name="radio_group" :label="__('Option 2')" />
                                        </div>
                                        <div class="flex items-center gap-x-3">
                                            <x-form.radio name="radio_group" value="option3" disabled />
                                            <x-form.label name="radio_group" :label="__('Option 3 (désactivée)')" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Switch -->
                        <div>
                            <h4 class="text-md font-medium mb-3">Switch (Toggle)</h4>
                            <div class="space-y-4">
                                <div class="flex items-center justify-between">
                                    <x-form.label name="switch1" :label="__('Notifications par email')" />
                                    <x-form.switch name="switch1" checked />
                                </div>
                                <div class="flex items-center justify-between">
                                    <x-form.label name="switch2" :label="__('Mode sombre')" />
                                    <x-form.switch name="switch2" />
                                </div>
                            </div>
                        </div>

                        <!-- Validation -->
                        <div>
                            <h4 class="text-md font-medium mb-3">Validation d'erreurs</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <x-form.group name="invalid_email" :label="__('Email invalide')" :error="__('L\'adresse email est invalide')">
                                    <x-form.input name="invalid_email" type="email" value="email-invalide" />
                                </x-form.group>

                                <x-form.group name="required_field" :label="__('Champ obligatoire')" :error="__('Ce champ est obligatoire')">
                                    <x-form.input name="required_field" />
                                </x-form.group>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- SECTION: ALERTS -->
            <section id="alerts" class="scroll-mt-16">
                <h2 class="text-2xl font-bold mb-6 border-b pb-2">Alertes</h2>

                <div class="space-y-6 mb-8">
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                        <h3 class="text-lg font-medium mb-4">Alertes par type</h3>

                        <div class="space-y-4">
                            <x-alert.default type="info">
                                Ceci est une alerte d'information.
                            </x-alert.default>

                            <x-alert.default type="success">
                                L'opération a été effectuée avec succès !
                            </x-alert.default>

                            <x-alert.default type="warning">
                                Attention, cette action ne peut être annulée.
                            </x-alert.default>

                            <x-alert.default type="error">
                                Une erreur s'est produite lors de l'enregistrement des données.
                            </x-alert.default>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                        <h3 class="text-lg font-medium mb-4">Options d'alertes</h3>

                        <div class="space-y-4">
                            <div>
                                <h4 class="text-md font-medium mb-2">Alerte sans icône</h4>
                                <x-alert.default type="info" :icon="false">
                                    Cette alerte est affichée sans icône.
                                </x-alert.default>
                            </div>

                            <div>
                                <h4 class="text-md font-medium mb-2">Alerte non-dismissable</h4>
                                <x-alert.default type="warning" :dismissable="false">
                                    Cette alerte ne peut pas être fermée.
                                </x-alert.default>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- SECTION: NOTIFICATIONS -->
            <section id="notifications" class="scroll-mt-16">
                <h2 class="text-2xl font-bold mb-6 border-b pb-2">Notifications</h2>

                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 mb-8">
                    <h3 class="text-lg font-medium mb-4">Notifications de type flash</h3>
                    <p class="mb-4 text-gray-700 dark:text-gray-300">
                        Ces notifications sont déclenchées par les messages flash de la session. Pour les visualiser en
                        action,
                        vous devriez définir les valeurs de session suivantes dans votre contrôleur :
                    </p>

                    <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-md mb-6 overflow-x-auto">
                        <pre><code>// Pour une notification de succès
session()->flash('success', 'Opération réalisée avec succès');
session()->flash('success_description', 'Détails supplémentaires optionnels');

// Pour une notification d'erreur
session()->flash('error', 'Une erreur s\'est produite');

// Pour une notification d'information
session()->flash('info', 'Information importante');

// Pour une notification d'avertissement
session()->flash('warning', 'Attention à cette action');</code></pre>
                    </div>

                    <p class="mb-4 text-gray-700 dark:text-gray-300">
                        Exemple visuel des notifications (simulées) :
                    </p>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div
                            class="flex flex-col items-center border border-dashed p-4 rounded-md border-gray-300 dark:border-gray-600">
                            <span class="rounded-lg bg-green-600 text-white p-3 mb-3">
                                <x-heroicon-o-check-circle class="size-6" />
                            </span>
                            <p class="font-medium">Notification succès</p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Position: top-right</p>
                        </div>

                        <div
                            class="flex flex-col items-center border border-dashed p-4 rounded-md border-gray-300 dark:border-gray-600">
                            <span class="rounded-lg bg-red-600 text-white p-3 mb-3">
                                <x-heroicon-o-x-circle class="size-6" />
                            </span>
                            <p class="font-medium">Notification erreur</p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Position: top-right</p>
                        </div>

                        <div
                            class="flex flex-col items-center border border-dashed p-4 rounded-md border-gray-300 dark:border-gray-600">
                            <span class="rounded-lg bg-blue-600 text-white p-3 mb-3">
                                <x-heroicon-o-information-circle class="size-6" />
                            </span>
                            <p class="font-medium">Notification info</p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Position: top-right</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                    <h3 class="text-lg font-medium mb-4">Tableau des notifications</h3>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead>
                                <tr>
                                    <th
                                        class="px-4 py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        Type</th>
                                    <th
                                        class="px-4 py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        Couleur</th>
                                    <th
                                        class="px-4 py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        Icône</th>
                                    <th
                                        class="px-4 py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        Position</th>
                                    <th
                                        class="px-4 py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        Durée</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-800">
                                <tr>
                                    <td class="px-4 py-3">success</td>
                                    <td class="px-4 py-3">
                                        <div class="flex items-center">
                                            <span class="size-4 rounded-full bg-green-600 mr-2"></span>
                                            <span>green-600</span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3">heroicon-o-check-circle</td>
                                    <td class="px-4 py-3">top-right</td>
                                    <td class="px-4 py-3">4000ms</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3">error</td>
                                    <td class="px-4 py-3">
                                        <div class="flex items-center">
                                            <span class="size-4 rounded-full bg-red-600 mr-2"></span>
                                            <span>red-600</span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3">heroicon-o-x-circle</td>
                                    <td class="px-4 py-3">top-right</td>
                                    <td class="px-4 py-3">6000ms</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3">warning</td>
                                    <td class="px-4 py-3">
                                        <div class="flex items-center">
                                            <span class="size-4 rounded-full bg-yellow-600 mr-2"></span>
                                            <span>yellow-600</span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3">heroicon-o-exclamation-triangle</td>
                                    <td class="px-4 py-3">top-left</td>
                                    <td class="px-4 py-3">5000ms</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3">info</td>
                                    <td class="px-4 py-3">
                                        <div class="flex items-center">
                                            <span class="size-4 rounded-full bg-blue-600 mr-2"></span>
                                            <span>blue-600</span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3">heroicon-o-information-circle</td>
                                    <td class="px-4 py-3">top-right</td>
                                    <td class="px-4 py-3">4000ms</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <!-- SECTION: EXEMPLES D'UTILISATION -->
            <section id="usage-examples" class="scroll-mt-16 mt-12">
                <h2 class="text-2xl font-bold mb-6 border-b pb-2">Exemples d'utilisation</h2>

                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 mb-8 overflow-auto">
                    <h3 class="text-lg font-medium mb-4">Tableau d'utilisateurs avec statuts</h3>
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead>
                            <tr>
                                <th
                                    class="px-6 py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Nom</th>
                                <th
                                    class="px-6 py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Rôle</th>
                                <th
                                    class="px-6 py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Statut</th>
                                <th
                                    class="px-6 py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Compétences</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-800 ">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">John Doe</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <x-badge.item text="Admin" color="blue" />
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <x-badge.dot color="green" />
                                        <span class="ml-2">En ligne</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <x-badge.list :items="['php', 'laravel', 'vue']" color="indigo" />
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">Jane Smith</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <x-badge.item text="Développeur" color="green" />
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <x-badge.dot color="red" />
                                        <span class="ml-2">Hors ligne</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <x-badge.list :items="['javascript', 'react', 'node']" color="cyan" />
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">Mark Johnson</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <x-badge.item text="Designer" color="purple" />
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <x-badge.dot color="yellow" />
                                        <span class="ml-2">Inactif</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <x-badge.list :items="['figma', 'photoshop', 'illustrator']" color="fuchsia" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                    <h3 class="text-lg font-medium mb-4">Liste de tâches avec états</h3>
                    <ul class="space-y-3">
                        <li class="flex items-center justify-between">
                            <span>Mise à jour du système</span>
                            <x-badge.item text="Terminé" color="green" />
                        </li>
                        <li class="flex items-center justify-between">
                            <span>Migration de la base de données</span>
                            <x-badge.item text="En cours" color="blue" />
                        </li>
                        <li class="flex items-center justify-between">
                            <span>Déploiement de l'application</span>
                            <x-badge.item text="En attente" color="yellow" />
                        </li>
                        <li class="flex items-center justify-between">
                            <span>Intégration de l'API</span>
                            <div class="flex items-center">
                                <x-badge.dot color="red" />
                                <span class="ml-2">Échoué</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
