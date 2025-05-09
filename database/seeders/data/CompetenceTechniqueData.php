<?php

namespace Database\Seeders\Data;

class CompetenceTechniqueData
{
    public static function getData()
    {
        return [
            // Développement Web Frontend
            [
                'nom' => 'JavaScript',
                'categorie' => 'Développement Web Frontend',
                'description' => 'Langage de programmation utilisé pour le développement web côté client'
            ],
            [
                'nom' => 'TypeScript',
                'categorie' => 'Développement Web Frontend',
                'description' => 'Surensemble de JavaScript avec typage statique'
            ],
            [
                'nom' => 'React',
                'categorie' => 'Développement Web Frontend',
                'description' => 'Bibliothèque JavaScript pour construire des interfaces utilisateur'
            ],
            [
                'nom' => 'Vue.js',
                'categorie' => 'Développement Web Frontend',
                'description' => 'Framework JavaScript progressif pour construire des interfaces utilisateur'
            ],
            [
                'nom' => 'Angular',
                'categorie' => 'Développement Web Frontend',
                'description' => 'Framework de développement front-end développé par Google'
            ],
            [
                'nom' => 'HTML5',
                'categorie' => 'Développement Web Frontend',
                'description' => 'Langage de balisage pour structurer le contenu web'
            ],
            [
                'nom' => 'CSS3',
                'categorie' => 'Développement Web Frontend',
                'description' => 'Langage de feuille de style pour la présentation des documents web'
            ],
            [
                'nom' => 'Sass/SCSS',
                'categorie' => 'Développement Web Frontend',
                'description' => 'Préprocesseur CSS qui ajoute des fonctionnalités comme variables et mixins'
            ],
            [
                'nom' => 'Tailwind CSS',
                'categorie' => 'Développement Web Frontend',
                'description' => 'Framework CSS utilitaire pour la création rapide d\'interfaces utilisateur'
            ],
            [
                'nom' => 'Bootstrap',
                'categorie' => 'Développement Web Frontend',
                'description' => 'Framework CSS pour développer des sites web responsives'
            ],

            // Développement Web Backend
            [
                'nom' => 'PHP',
                'categorie' => 'Développement Web Backend',
                'description' => 'Langage de script orienté serveur'
            ],
            [
                'nom' => 'Laravel',
                'categorie' => 'Développement Web Backend',
                'description' => 'Framework PHP pour le développement web'
            ],
            [
                'nom' => 'Symfony',
                'categorie' => 'Développement Web Backend',
                'description' => 'Framework PHP pour le développement d\'applications web'
            ],
            [
                'nom' => 'Node.js',
                'categorie' => 'Développement Web Backend',
                'description' => 'Environnement d\'exécution JavaScript côté serveur'
            ],
            [
                'nom' => 'Express',
                'categorie' => 'Développement Web Backend',
                'description' => 'Framework web minimaliste pour Node.js'
            ],
            [
                'nom' => 'Django',
                'categorie' => 'Développement Web Backend',
                'description' => 'Framework web Python de haut niveau'
            ],
            [
                'nom' => 'Flask',
                'categorie' => 'Développement Web Backend',
                'description' => 'Framework web léger pour Python'
            ],
            [
                'nom' => 'Ruby on Rails',
                'categorie' => 'Développement Web Backend',
                'description' => 'Framework d\'application web écrit en Ruby'
            ],
            [
                'nom' => 'Spring Boot',
                'categorie' => 'Développement Web Backend',
                'description' => 'Framework Java pour créer des applications web et microservices'
            ],
            [
                'nom' => 'ASP.NET Core',
                'categorie' => 'Développement Web Backend',
                'description' => 'Framework pour construire des applications web avec .NET et C#'
            ],

            // Bases de données
            [
                'nom' => 'MySQL',
                'categorie' => 'Bases de données',
                'description' => 'Système de gestion de base de données relationnelle open source'
            ],
            [
                'nom' => 'PostgreSQL',
                'categorie' => 'Bases de données',
                'description' => 'Système de gestion de base de données relationnelle-objet avancé'
            ],
            [
                'nom' => 'MongoDB',
                'categorie' => 'Bases de données',
                'description' => 'Base de données NoSQL orientée documents'
            ],
            [
                'nom' => 'Redis',
                'categorie' => 'Bases de données',
                'description' => 'Stockage de structure de données en mémoire, utilisé comme base de données, cache et broker de messages'
            ],
            [
                'nom' => 'SQL Server',
                'categorie' => 'Bases de données',
                'description' => 'Système de gestion de base de données relationnelle développé par Microsoft'
            ],
            [
                'nom' => 'Elasticsearch',
                'categorie' => 'Bases de données',
                'description' => 'Moteur de recherche et d\'analyse distribué'
            ],

            // DevOps & Cloud
            [
                'nom' => 'Docker',
                'categorie' => 'DevOps & Cloud',
                'description' => 'Plateforme de conteneurisation'
            ],
            [
                'nom' => 'Kubernetes',
                'categorie' => 'DevOps & Cloud',
                'description' => 'Système d\'orchestration de conteneurs'
            ],
            [
                'nom' => 'AWS',
                'categorie' => 'DevOps & Cloud',
                'description' => 'Services cloud d\'Amazon Web Services'
            ],
            [
                'nom' => 'Azure',
                'categorie' => 'DevOps & Cloud',
                'description' => 'Services cloud de Microsoft'
            ],
            [
                'nom' => 'Google Cloud',
                'categorie' => 'DevOps & Cloud',
                'description' => 'Services cloud de Google'
            ],
            [
                'nom' => 'CI/CD',
                'categorie' => 'DevOps & Cloud',
                'description' => 'Intégration continue et déploiement continu'
            ],
            [
                'nom' => 'Jenkins',
                'categorie' => 'DevOps & Cloud',
                'description' => 'Serveur d\'automatisation open source'
            ],
            [
                'nom' => 'Terraform',
                'categorie' => 'DevOps & Cloud',
                'description' => 'Outil d\'infrastructure as code'
            ],
            [
                'nom' => 'Ansible',
                'categorie' => 'DevOps & Cloud',
                'description' => 'Outil d\'automatisation IT'
            ],
            [
                'nom' => 'GitOps',
                'categorie' => 'DevOps & Cloud',
                'description' => 'Pratique de gestion d\'infrastructure et d\'applications à l\'aide de Git'
            ],

            // Développement mobile
            [
                'nom' => 'Flutter',
                'categorie' => 'Développement mobile',
                'description' => 'Framework UI pour construire des applications natives compilées'
            ],
            [
                'nom' => 'React Native',
                'categorie' => 'Développement mobile',
                'description' => 'Framework pour construire des applications mobiles natives avec React'
            ],
            [
                'nom' => 'Swift',
                'categorie' => 'Développement mobile',
                'description' => 'Langage de programmation pour iOS et macOS'
            ],
            [
                'nom' => 'Kotlin',
                'categorie' => 'Développement mobile',
                'description' => 'Langage de programmation moderne pour Android'
            ],
            [
                'nom' => 'Xamarin',
                'categorie' => 'Développement mobile',
                'description' => 'Plateforme de développement d\'applications mobiles cross-platform'
            ],

            // Data Science & IA
            [
                'nom' => 'Python',
                'categorie' => 'Data Science & IA',
                'description' => 'Langage de programmation polyvalent, très utilisé en data science'
            ],
            [
                'nom' => 'R',
                'categorie' => 'Data Science & IA',
                'description' => 'Langage de programmation pour l\'analyse statistique'
            ],
            [
                'nom' => 'Machine Learning',
                'categorie' => 'Data Science & IA',
                'description' => 'Sous-ensemble de l\'IA permettant aux systèmes d\'apprendre à partir des données'
            ],
            [
                'nom' => 'Deep Learning',
                'categorie' => 'Data Science & IA',
                'description' => 'Sous-ensemble du machine learning utilisant des réseaux de neurones profonds'
            ],
            [
                'nom' => 'TensorFlow',
                'categorie' => 'Data Science & IA',
                'description' => 'Bibliothèque logicielle open source pour l\'apprentissage automatique'
            ],
            [
                'nom' => 'PyTorch',
                'categorie' => 'Data Science & IA',
                'description' => 'Bibliothèque open source de machine learning basée sur Torch'
            ],
            [
                'nom' => 'NLP',
                'categorie' => 'Data Science & IA',
                'description' => 'Traitement du langage naturel'
            ],
            [
                'nom' => 'Computer Vision',
                'categorie' => 'Data Science & IA',
                'description' => 'Domaine de l\'IA qui permet aux ordinateurs de voir et comprendre des images et vidéos'
            ],

            // Design & UX
            [
                'nom' => 'Figma',
                'categorie' => 'Design & UX',
                'description' => 'Outil de conception d\'interface utilisateur basé sur le web'
            ],
            [
                'nom' => 'Adobe XD',
                'categorie' => 'Design & UX',
                'description' => 'Outil de conception d\'expérience utilisateur'
            ],
            [
                'nom' => 'Sketch',
                'categorie' => 'Design & UX',
                'description' => 'Outil de conception numérique pour Mac'
            ],
            [
                'nom' => 'UI/UX Design',
                'categorie' => 'Design & UX',
                'description' => 'Conception d\'interfaces et d\'expériences utilisateur'
            ],
            [
                'nom' => 'Design Thinking',
                'categorie' => 'Design & UX',
                'description' => 'Approche de résolution de problèmes centrée sur l\'utilisateur'
            ],

            // Business & Gestion
            [
                'nom' => 'Excel avancé',
                'categorie' => 'Business & Gestion',
                'description' => 'Utilisation avancée de Microsoft Excel pour l\'analyse de données'
            ],
            [
                'nom' => 'Power BI',
                'categorie' => 'Business & Gestion',
                'description' => 'Service d\'analyse commerciale de Microsoft'
            ],
            [
                'nom' => 'Tableau',
                'categorie' => 'Business & Gestion',
                'description' => 'Logiciel de visualisation de données'
            ],
            [
                'nom' => 'Analyse financière',
                'categorie' => 'Business & Gestion',
                'description' => 'Évaluation de la viabilité, stabilité et rentabilité d\'une entreprise'
            ],
            [
                'nom' => 'Gestion de projet',
                'categorie' => 'Business & Gestion',
                'description' => 'Organisation et gestion des ressources pour mener à bien des projets'
            ],
        ];
    }
}
