<ul role="list" class="flex flex-1 flex-col gap-y-6">
    <li>
        <ul role="list" class="-mx-2 space-y-1">
            <li>
                <x-layout.link-primary route="dashboard" icon="squares-2x2" label="Tableau de bord" />
            </li>
            {{-- <li>
                <x-layout.link-primary route="collaborateurs.index" icon="user-group" label="Collaborateurs" />
            </li> --}}
            {{-- <li>
                <x-layout.link-primary route="conges.index" icon="calendar" label="Congés" />
            </li> --}}
            {{-- <li>
                <x-layout.link-primary route="documents-administratifs.index" icon="document-text" label="Documents" />
            </li> --}}
        </ul>
    </li>
    <hr class="border-0.5 border-gray-200 dark:border-gray-700" />
    <li>
        <div class="text-xs/6 font-semibold text-gray-400">Options</div>
        <ul role="list" class="-mx-2 mt-2 space-y-1">
            @php
                $links = [
                    ['route' => 'villes.index', 'label' => 'Villes', 'icon' => 'V'],
                    ['route' => 'regions.index', 'label' => 'Régions', 'icon' => 'R'],
                    ['route' => 'pays.index', 'label' => 'Pays', 'icon' => 'P'],
                    ['route' => 'postes.index', 'label' => 'Postes', 'icon' => 'P'],
                    ['route' => 'departements.index', 'label' => 'Départements', 'icon' => 'D'],
                    ['route' => 'types-documents.index', 'label' => 'Types de documents', 'icon' => 'T'],
                    ['route' => 'jours-feries.index', 'label' => 'Jours fériés', 'icon' => 'J'],
                    // ['route' => 'competences-techniques.index', 'label' => 'Compétences techniques', 'icon' => 'C'],
                    // ['route' => 'langues.index', 'label' => 'Langues', 'icon' => 'L'],
                ];
            @endphp

            @foreach ($links as $link)
                <li>
                    <x-layout.link-secondary :route="$link['route']" :label="$link['label']" :icon="$link['icon']" />
                </li>
            @endforeach
        </ul>
    </li>
    <hr class="border-0.5 border-gray-200 dark:border-gray-700" />
    <ul role="list" class="mt-auto -mx-2 space-y-1">
        <li>
            <x-layout.link-primary route="profile" icon="user" label="Profile" />
        </li>
        @admin
            <li>
                <x-layout.link-primary route="users.index" icon="users" label="Utilisateurs" />
            </li>
        @endadmin
        <li>
            <x-layout.link-primary route="examples.ui" icon="paint-brush" label="Exemples UI" />
        </li>
        <li>
            <x-layout.link-primary route="settings" icon="wrench-screwdriver" label="Configurations" />
        </li>
    </ul>
</ul>
