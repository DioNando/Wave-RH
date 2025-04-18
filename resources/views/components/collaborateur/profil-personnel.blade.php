@props(['collaborateur'])

<section x-show="activeTab === 'profil-personnel'" x-cloak class="space-y-4">
    <x-card>
        <x-card.card-header :dropdown="true" title="Informations personnelles" type="primary" />
        <x-card.card-body divider>
            <x-card.card-row label="Nom" value="{{ $collaborateur->nom }}" />
            <x-card.card-row label="Prénom" value="{{ $collaborateur->prenom }}" />
        </x-card.card-body>
    </x-card>
</section>
