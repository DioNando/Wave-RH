@props(['collaborateur'])

<section x-show="activeTab === 'historique'" x-cloak class="space-y-4">
    <x-card defaultOpen="true">
        <x-card.card-header :dropdown="true" title="Historique" type="primary" />
        <x-card.card-body divider>
            <x-card.card-row label="Créé le" value="{{ \Carbon\Carbon::parse($collaborateur->created_at)->translatedFormat('d F Y') . ' (' . \Carbon\Carbon::parse($collaborateur->created_at)->diffForHumans() . ')' }}" />
            <x-card.card-row label="Modifié le" value="{{ \Carbon\Carbon::parse($collaborateur->updated_at)->translatedFormat('d F Y') . ' (' . \Carbon\Carbon::parse($collaborateur->updated_at)->diffForHumans() . ')' }}" />
        </x-card.card-body>
    </x-card>
</section>
