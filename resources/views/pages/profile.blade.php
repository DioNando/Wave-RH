<x-app-layout>
    <x-slot name="header">
        <x-label.page-title label="Profile" />
    </x-slot>
    
    <div class="space-y-6">
        <x-card>
            <x-card.card-header :dropdown="true" title="Informations du profil"
                subtitle="Mettez à jour les informations de votre profil et votre adresse e-mail." />
            <x-card.card-body>
                <livewire:profile.update-profile-information-form />
            </x-card.card-body>
        </x-card>
        <x-card defaultOpen=false>
            <x-card.card-header :dropdown="true" title="Modifier le mot de passe"
                subtitle="Assurez-vous que votre compte utilise un mot de passe long et aléatoire pour rester sécurisé." />
            <x-card.card-body>
                <livewire:profile.update-password-form />
            </x-card.card-body>
        </x-card>
        <x-card defaultOpen=false>
            <x-card.card-header :dropdown="true" title="Supprimer le compte"
                subtitle="Une fois votre compte supprimé, toutes ses ressources et données seront définitivement supprimées. Avant de supprimer votre compte, veuillez télécharger toutes les données ou informations que vous souhaitez conserver." />
            <x-card.card-body>
                <livewire:profile.delete-user-form />
            </x-card.card-body>
        </x-card>
    </div>
</x-app-layout>
