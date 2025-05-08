<x-app-layout>
    <x-slot name="header">
        <x-label.page-title label="Exemples de diagrammes" />
    </x-slot>

    <div class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Carte pour les diagrammes de classe -->
            <x-card>
                <x-card.card-body>
                    <div class="flex flex-col items-center p-6 text-center">
                        <div class="mb-4 text-blue-600 dark:text-blue-400">
                            <x-heroicon-o-archive-box class="h-16 w-16" />
                        </div>
                        <h3 class="text-xl font-bold mb-2">Diagrammes de Classes</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-300 mb-6">
                            Visualisez la structure du système avec des diagrammes de classes qui montrent les relations
                            entre les entités.
                        </p>
                        <x-button.primary href="{{ route('examples.diagrams.classes') }}">
                            Voir les diagrammes de classes
                        </x-button.primary>
                    </div>
                </x-card.card-body>
            </x-card>

            <!-- Carte pour les diagrammes de séquence -->
            <x-card>
                <x-card.card-body>
                    <div class="flex flex-col items-center p-6 text-center">
                        <div class="mb-4 text-green-600 dark:text-green-400">
                            <x-heroicon-o-arrows-up-down class="h-16 w-16" />
                        </div>
                        <h3 class="text-xl font-bold mb-2">Diagrammes de Séquence</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-300 mb-6">
                            Comprenez les flux de processus métier avec des diagrammes de séquence qui illustrent les
                            interactions.
                        </p>
                        <x-button.primary href="{{ route('examples.diagrams.sequences') }}" color="green">
                            Voir les diagrammes de séquence
                        </x-button.primary>
                    </div>
                </x-card.card-body>
            </x-card>

            <!-- Carte pour les diagrammes de packages -->
            <x-card>
                <x-card.card-body>
                    <div class="flex flex-col items-center p-6 text-center">
                        <div class="mb-4 text-purple-600 dark:text-purple-400">
                            <x-heroicon-o-cube class="h-16 w-16" />
                        </div>
                        <h3 class="text-xl font-bold mb-2">Diagrammes de Packages</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-300 mb-6">
                            Explorez l'architecture logicielle avec des diagrammes de packages qui visualisent la
                            structure modulaire.
                        </p>
                        <x-button.primary href="{{ route('examples.diagrams.packages') }}" color="purple">
                            Voir les diagrammes de packages
                        </x-button.primary>
                    </div>
                </x-card.card-body>
            </x-card>

            <!-- Carte pour les diagrammes de cas d'utilisation -->
            <x-card>
                <x-card.card-body>
                    <div class="flex flex-col items-center p-6 text-center">
                        <div class="mb-4 text-orange-600 dark:text-orange-400">
                            <x-heroicon-o-user-group class="h-16 w-16" />
                        </div>
                        <h3 class="text-xl font-bold mb-2">Diagrammes de Cas d'Utilisation</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-300 mb-6">
                            Découvrez les interactions entre les utilisateurs et le système avec les cas d'utilisation.
                        </p>
                        <x-button.primary href="{{ route('examples.diagrams.use-cases') }}" color="orange">
                            Voir les cas d'utilisation
                        </x-button.primary>
                    </div>
                </x-card.card-body>
            </x-card>
        </div>

        <!-- Exemple simple de diagramme Mermaid -->
        <x-card>
            <x-card.card-body>
                <h2 class="text-xl font-semibold mb-4">Exemple simple de diagramme Mermaid</h2>

                <x-diagram.mermaid caption="Structure organisationnelle simplifiée">
                    graph TD
                    DG[Direction Générale] --> DRH[Direction RH]
                    DG --> DF[Direction Financière]
                    DG --> DT[Direction Technique]

                    DRH --> RH1[Recrutement]
                    DRH --> RH2[Administration]
                    DRH --> RH3[Formation]

                    DT --> DEV[Développement]
                    DT --> INFRA[Infrastructure]

                    DEV --> FRONT[Frontend]
                    DEV --> BACK[Backend]

                    classDef direction fill:#f9f,stroke:#333,stroke-width:2px;
                    classDef departement fill:#bbf,stroke:#333,stroke-width:1px;
                    classDef service fill:#ddf,stroke:#333,stroke-width:1px;

                    class DG,DRH,DF,DT direction;
                    class RH1,RH2,RH3,DEV,INFRA departement;
                    class FRONT,BACK service;
                </x-diagram.mermaid>
            </x-card.card-body>
        </x-card>

        <!-- Comment utiliser Mermaid -->
        <x-card>
            <x-card.card-body>
                <h2 class="text-xl font-semibold mb-4">Comment utiliser Mermaid dans vos vues</h2>

                <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-md mb-4 overflow-x-auto">
                    <pre><code class="text-sm">&lt;x-diagram.mermaid caption="Titre du diagramme"&gt;
    graph TD
        A[Boîte A] --> B[Boîte B]
        A --> C[Boîte C]
&lt;/x-diagram.mermaid&gt;</code></pre>
                </div>

                <p class="text-gray-600 dark:text-gray-300 mb-4">
                    Mermaid prend en charge plusieurs types de diagrammes :
                </p>

                <ul class="list-disc list-inside text-gray-600 dark:text-gray-300 mb-4 ml-4 space-y-2">
                    <li><span class="font-semibold">graph/flowchart</span> - Pour les diagrammes de flux et
                        organigrammes
                    </li>
                    <li><span class="font-semibold">sequenceDiagram</span> - Pour les diagrammes de séquence</li>
                    <li><span class="font-semibold">classDiagram</span> - Pour les diagrammes de classes</li>
                    <li><span class="font-semibold">stateDiagram</span> - Pour les diagrammes d'états</li>
                    <li><span class="font-semibold">gantt</span> - Pour les diagrammes de Gantt</li>
                    <li><span class="font-semibold">pie</span> - Pour les diagrammes en camembert</li>
                    <li><span class="font-semibold">usecase</span> - Pour les diagrammes de cas d'utilisation</li>
                </ul>

                <p class="text-gray-600 dark:text-gray-300">
                    Les diagrammes s'adaptent automatiquement au thème clair/foncé de l'application.
                    Consultez la <a href="https://mermaid.js.org/intro/" target="_blank"
                        class="text-blue-600 dark:text-blue-400 hover:underline">documentation officielle de Mermaid</a>
                    pour plus d'informations.
                </p>
            </x-card.card-body>
        </x-card>
    </div>
</x-app-layout>
