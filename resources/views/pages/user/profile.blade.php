<x-app-layout>
    <x-slot name="header">
        <x-label.page-title label="Mon profil" />
    </x-slot>

    <div class="space-y-6 my-3">
        <x-card>
            <x-card.card-header :dropdown="true" title="Informations du profil"
                subtitle="Mettez à jour les informations de votre profil et votre adresse e-mail." type="primary" />
            <x-card.card-body>
                <livewire:profile.update-profile-information-form />
            </x-card.card-body>
        </x-card>
        <x-card defaultOpen=false>
            <x-card.card-header :dropdown="true" title="Modifier le mot de passe"
                subtitle="Assurez-vous que votre compte utilise un mot de passe long et aléatoire pour rester sécurisé." type="primary" />
            <x-card.card-body>
                <livewire:profile.update-password-form />
            </x-card.card-body>
        </x-card>
        <x-card defaultOpen=false type="danger">
            <x-card.card-header :dropdown="true" title="Supprimer le compte"
                subtitle="Une fois votre compte supprimé, toutes ses ressources et données seront définitivement supprimées. Avant de supprimer votre compte, veuillez télécharger toutes les données ou informations que vous souhaitez conserver." type="danger" />
            <x-card.card-body>
                <livewire:profile.delete-user-form />
            </x-card.card-body>
        </x-card>
    </div>
</x-app-layout>
