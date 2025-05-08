<x-app-layout>
    <x-slot name="header">
        <x-label.page-title label="Diagramme de Packages - Architecture du système" />
    </x-slot>

    <div class="space-y-6">
        <!-- Diagramme de packages principal -->
        <x-card>
            <x-card.card-body>
                <h2 class="text-xl font-semibold mb-4">Architecture générale de l'application</h2>

                <x-diagram.mermaid caption="Structure des packages de Wave HR">
                    flowchart TB
                    subgraph AppRoot["Wave Human Resource"]
                    subgraph Core["Core"]
                    App["App"]
                    Config["Config"]
                    Models["Models"]
                    Enums["Enums"]
                    Providers["Providers"]
                    end

                    subgraph UI["Interface Utilisateur"]
                    Views["Views"]
                    Livewire["Livewire"]
                    Components["Components"]
                    Assets["Assets\nCSS/JS/SCSS"]
                    end

                    subgraph Services["Services"]
                    Http["Http\nControllers"]
                    Middleware["Middleware"]
                    Routes["Routes"]
                    Console["Console"]
                    end

                    subgraph Data["Données"]
                    Database["Database"]
                    Migrations["Migrations"]
                    Seeders["Seeders"]
                    end

                    subgraph Auxiliary["Services auxiliaires"]
                    Storage["Storage"]
                    Lang["Localisation"]
                    Tests["Tests"]
                    end
                    end

                    Core --> UI
                    Core --> Services
                    Core --> Data
                    Services --> UI
                    Services --> Data

                    classDef rootPackage fill:#f9f,stroke:#333,stroke-width:2px;
                    classDef corePackage fill:#bbf,stroke:#333,stroke-width:1px;
                    classDef uiPackage fill:#bfb,stroke:#333,stroke-width:1px;
                    classDef servicesPackage fill:#fbf,stroke:#333,stroke-width:1px;
                    classDef dataPackage fill:#fbb,stroke:#333,stroke-width:1px;
                    classDef auxiliaryPackage fill:#bff,stroke:#333,stroke-width:1px;

                    class AppRoot rootPackage;
                    class Core,Models,App,Config,Enums,Providers corePackage;
                    class UI,Views,Livewire,Components,Assets uiPackage;
                    class Services,Http,Middleware,Routes,Console servicesPackage;
                    class Data,Database,Migrations,Seeders dataPackage;
                    class Auxiliary,Storage,Lang,Tests auxiliaryPackage;
                </x-diagram.mermaid>
            </x-card.card-body>
        </x-card>

        <!-- Diagramme détaillé du package App -->
        <x-card>
            <x-card.card-body>
                <h2 class="text-xl font-semibold mb-4">Structure détaillée du package App</h2>

                <x-diagram.mermaid caption="Organisation des classes dans le package App">
                    flowchart TB
                    subgraph App["App"]
                    subgraph Models["Models"]
                    User["User"]
                    Collaborateur["Collaborateur"]
                    subgraph RH["Ressources Humaines"]
                    Departement["Departement"]
                    Poste["Poste"]
                    HistoriquePoste["HistoriquePoste"]
                    HistoriqueConge["HistoriqueConge"]
                    HistoriqueFormation["HistoriqueFormation"]
                    HistoriquePrime["HistoriquePrime"]
                    HistoriqueAugmentation["HistoriqueAugmentation"]
                    JourFerie["JourFerie"]
                    end
                    subgraph Personal["Données personnelles"]
                    ContactUrgence["ContactUrgence"]
                    Diplome["Diplome"]
                    Certification["Certification"]
                    InformationBancaire["InformationBancaire"]
                    ContratTravail["ContratTravail"]
                    DocumentAdministratif["DocumentAdministratif"]
                    end
                    subgraph Geography["Données géographiques"]
                    Pays["Pays"]
                    Region["Region"]
                    Ville["Ville"]
                    end
                    subgraph Documents["Gestion documentaire"]
                    TypeDocument["TypeDocument"]
                    end
                    end

                    subgraph Enums["Enums"]
                    CollaborateurGenre["CollaborateurGenre"]
                    CollaborateurStatutMarital["CollaborateurStatutMarital"]
                    DiplomeNiveau["DiplomeNiveau"]
                    LogAction["LogAction"]
                    Monnaie["Monnaie"]
                    TypeConge["TypeConge"]
                    TypeContratTravail["TypeContratTravail"]
                    TypeFormation["TypeFormation"]
                    TypeJourFerie["TypeJourFerie"]
                    TypePrime["TypePrime"]
                    UserRole["UserRole"]
                    end

                    subgraph Http["Http"]
                    subgraph Controllers["Controllers"]
                    CollaborateurController["CollaborateurController"]
                    DepartementController["DepartementController"]
                    PosteController["PosteController"]
                    PaysController["PaysController"]
                    RegionController["RegionController"]
                    VilleController["VilleController"]
                    TypeDocumentController["TypeDocumentController"]
                    DocumentAdministratifController["DocumentAdministratifController"]
                    DiplomeController["DiplomeController"]
                    CertificationController["CertificationController"]
                    ContratTravailController["ContratTravailController"]
                    ContactUrgenceController["ContactUrgenceController"]
                    HistoriqueCongeController["HistoriqueCongeController"]
                    JourFerieController["JourFerieController"]
                    UserController["UserController"]
                    DashboardController["DashboardController"]
                    end

                    subgraph Middleware["Middleware"]
                    Authenticate["Authenticate"]
                    RedirectIfAuthenticated["RedirectIfAuthenticated"]
                    end
                    end

                    subgraph Livewire["Livewire"]
                    subgraph Components["Components"]
                    CollaborateurForm["CollaborateurForm"]
                    DepartementForm["DepartementForm"]
                    PosteForm["PosteForm"]
                    PaysForm["PaysForm"]
                    RegionForm["RegionForm"]
                    VilleForm["VilleForm"]
                    UserForm["UserForm"]
                    DocumentsAdministratifs["DocumentsAdministratifs"]
                    JoursFeries["JoursFeries"]
                    end

                    subgraph Actions["Actions"]
                    Logout["Logout"]
                    Tables["Tables"]
                    Search["Search"]
                    Forms["Forms"]
                    end
                    end
                    end

                    Models --> Http
                    Models --> Livewire
                    Enums --> Models
                    Enums --> Http
                    Enums --> Livewire
                    Http --> Livewire

                    classDef appPackage fill:#f9f,stroke:#333,stroke-width:2px;
                    classDef modelsPackage fill:#bbf,stroke:#333,stroke-width:1px;
                    classDef httpPackage fill:#fbf,stroke:#333,stroke-width:1px;
                    classDef livewirePackage fill:#bfb,stroke:#333,stroke-width:1px;
                    classDef enumsPackage fill:#fbb,stroke:#333,stroke-width:1px;

                    class App appPackage;
                    class Models,User,Collaborateur,RH,Personal,Geography,Documents modelsPackage;
                    class Http,Controllers,Middleware httpPackage;
                    class Livewire,Components,Actions livewirePackage;
                    class Enums enumsPackage;
                </x-diagram.mermaid>
            </x-card.card-body>
        </x-card>

        <!-- Diagramme de dépendances des modèles -->
        <x-card>
            <x-card.card-body>
                <h2 class="text-xl font-semibold mb-4">Dépendances entre modèles</h2>

                <x-diagram.mermaid caption="Relations et dépendances entre les principaux modèles">
                    flowchart TB
                    User --> Collaborateur

                    Collaborateur --> ContactUrgence
                    Collaborateur --> Diplome
                    Collaborateur --> Certification
                    Collaborateur --> DocumentAdministratif
                    Collaborateur --> InformationBancaire
                    Collaborateur --> ContratTravail
                    Collaborateur --> HistoriquePoste
                    Collaborateur --> HistoriqueConge
                    Collaborateur --> HistoriqueFormation
                    Collaborateur --> HistoriquePrime
                    Collaborateur --> HistoriqueAugmentation

                    Ville --> Collaborateur
                    Ville --> ContactUrgence

                    Pays --> Diplome
                    Pays --> Certification
                    Pays --> Region
                    Pays --> Ville
                    Pays --> Collaborateur

                    Region --> Ville

                    TypeDocument --> DocumentAdministratif

                    Departement --> Poste
                    Poste --> HistoriquePoste

                    classDef userClass fill:#f9f,stroke:#333,stroke-width:2px;
                    classDef collaborateurClass fill:#bbf,stroke:#333,stroke-width:2px;
                    classDef geoClass fill:#bfb,stroke:#333,stroke-width:1px;
                    classDef docClass fill:#fbf,stroke:#333,stroke-width:1px;
                    classDef depClass fill:#fbb,stroke:#333,stroke-width:1px;
                    classDef historyClass fill:#bff,stroke:#333,stroke-width:1px;

                    class User userClass;
                    class Collaborateur collaborateurClass;
                    class Ville,Pays,Region geoClass;
                    class TypeDocument,DocumentAdministratif,Diplome,Certification,ContratTravail docClass;
                    class Departement,Poste depClass;
                    class
                    HistoriquePoste,HistoriqueConge,HistoriqueFormation,HistoriquePrime,HistoriqueAugmentation,ContactUrgence,InformationBancaire
                    historyClass;
                </x-diagram.mermaid>
            </x-card.card-body>
        </x-card>

        <!-- Diagramme d'architecture Livewire et Vue -->
        <x-card>
            <x-card.card-body>
                <h2 class="text-xl font-semibold mb-4">Architecture Frontend</h2>

                <x-diagram.mermaid caption="Architecture de la couche Frontend (Livewire)">
                    flowchart TB
                    subgraph Client["Navigateur"]
                    View["Vue Blade"]
                    LivewireJS["Livewire.js"]
                    end

                    subgraph Server["Serveur"]
                    subgraph Livewire["Composants Livewire"]
                    LivewireComponent["Composant Livewire"]
                    LivewireController["Controller Logique"]
                    end

                    subgraph Models["Modèles"]
                    Eloquent["Modèles Eloquent"]
                    end

                    subgraph Blade["Templates"]
                    TemplateView["Vue Blade"]
                    Component["Composants Blade"]
                    end
                    end

                    View <--"AJAX"--> LivewireJS
                        LivewireJS <--"WebSockets /AJAX"--> LivewireComponent
                            LivewireComponent <--> LivewireController
                                LivewireController <--> Eloquent
                                    LivewireComponent --> TemplateView
                                    TemplateView --> Component

                                    classDef clientSide fill:#bbf,stroke:#333,stroke-width:1px;
                                    classDef serverSide fill:#fbb,stroke:#333,stroke-width:1px;
                                    classDef livewireClass fill:#fbf,stroke:#333,stroke-width:1px;
                                    classDef modelsClass fill:#bfb,stroke:#333,stroke-width:1px;
                                    classDef viewClass fill:#bff,stroke:#333,stroke-width:1px;

                                    class Client,View,LivewireJS clientSide;
                                    class Server serverSide;
                                    class Livewire,LivewireComponent,LivewireController livewireClass;
                                    class Models,Eloquent modelsClass;
                                    class Blade,TemplateView,Component viewClass;
                </x-diagram.mermaid>
            </x-card.card-body>
        </x-card>

        <!-- Architecture du système d'authentification -->
        <x-card>
            <x-card.card-body>
                <h2 class="text-xl font-semibold mb-4">Architecture du système d'authentification et de permissions</h2>

                <x-diagram.mermaid caption="Système d'authentification et gestion des rôles">
                    flowchart TB
                    subgraph Auth["Authentification"]
                    Login["Login"]
                    Register["Register"]
                    Middleware["Auth Middleware"]
                    Guards["Auth Guards"]
                    end

                    subgraph User["Utilisateur"]
                    UserModel["User Model"]
                    UserController["User Controller"]
                    UserTable["User Table/Component"]
                    end

                    subgraph Roles["Gestion des rôles (Spatie)"]
                    SpatiePerm["Permission"]
                    SpatieRole["Role"]
                    RoleUserPivot["Role-User"]
                    RolePermPivot["Role-Permission"]
                    end

                    Login --> UserModel
                    Register --> UserModel
                    Middleware --> Guards
                    Guards --> UserModel
                    UserModel <--> SpatieRole
                        SpatieRole <--> SpatiePerm
                            UserModel <--> RoleUserPivot
                                SpatieRole <--> RoleUserPivot
                                    SpatieRole <--> RolePermPivot
                                        SpatiePerm <--> RolePermPivot
                                            UserController <--> UserModel
                                                UserTable <--> UserController

                                                    classDef authClass fill:#bbf,stroke:#333,stroke-width:1px;
                                                    classDef userClass fill:#fbf,stroke:#333,stroke-width:1px;
                                                    classDef roleClass fill:#bfb,stroke:#333,stroke-width:1px;
                                                    classDef pivotClass fill:#fbb,stroke:#333,stroke-width:1px;

                                                    class Auth,Login,Register,Middleware,Guards authClass;
                                                    class User,UserModel,UserController,UserTable userClass;
                                                    class Roles,SpatiePerm,SpatieRole roleClass;
                                                    class RoleUserPivot,RolePermPivot pivotClass;
                </x-diagram.mermaid>
            </x-card.card-body>
        </x-card>
    </div>
</x-app-layout>
