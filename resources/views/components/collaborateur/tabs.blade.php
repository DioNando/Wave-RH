<div x-data="{
    activeTab: '{{ request()->query('tab', 'profil-personnel') }}',
    init() {
        // Mettre à jour l'URL quand l'onglet change
        this.$watch('activeTab', (tab) => {
            const url = new URL(window.location);
            url.searchParams.set('tab', tab);
            window.history.pushState({}, '', url);
        });

        // Vérifier si l'onglet dans l'URL est valide
        const urlTab = '{{ request()->query('tab', 'profil-personnel') }}';
        if (Object.keys(this.tabs).includes(urlTab)) {
            this.activeTab = urlTab;
        }
    },
    tabs: {
        'profil-personnel': 'Profil personnel',
        'profil-professionnel': 'Profil professionnel',
        'documents': 'Documents & Administratif',
        'finances': 'Finances',
        'historique': 'Historique',
    }
}">
    <div class="block">
        <nav class="flex overflow-x-auto pb-2 scrollbar-custom snap-x snap-mandatory" aria-label="Tabs">
            @php
                $tabClasses = [
                    'default' =>
                        'snap-start mt-1 py-3 px-4 text-sm font-medium whitespace-nowrap text-gray-500 hover:text-blue-700 dark:text-gray-200 dark:hover:text-blue-300',
                    'active' =>
                        'snap-start mt-1 py-3 px-4 bg-blue-100 dark:bg-blue-800 rounded-lg text-sm font-medium whitespace-nowrap text-blue-900 dark:text-blue-100 outline -outline-offset-1 outline-gray-200 dark:outline-gray-700',
                ];
            @endphp

            <template x-for="(label, id) in tabs" :key="id">
                <button @click.prevent="activeTab = id"
                    :class="activeTab === id ? '{{ $tabClasses['active'] }}' : '{{ $tabClasses['default'] }}'"
                    x-text="label">
                </button>
            </template>
        </nav>
    </div>
    <div class="grid grid-cols-1 mt-2">
        {{-- * Contenu des onglets --}}
        {{ $slot }}
    </div>
</div>
