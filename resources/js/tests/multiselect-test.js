/**
 * Test pour le composant multiselect
 *
 * Comment utiliser ce test:
 * 1. Ouvrez la console de votre navigateur sur une page contenant le multiselect
 * 2. Copiez et collez le contenu de ce fichier dans la console
 * 3. Exécutez le code pour voir les résultats des tests
 */

function testMultiselect() {
    console.log('🧪 Test du composant multiselect...');

    // Identifiez un multiselect dans la page
    const multiselectId = document.querySelector('.multiselect-container')?.id?.replace('_container', '');

    if (!multiselectId) {
        console.error('❌ Aucun composant multiselect trouvé dans la page');
        return;
    }

    console.log(`✓ Composant multiselect trouvé avec l'identifiant: ${multiselectId}`);

    // Récupérez les éléments du DOM
    const container = document.getElementById(`${multiselectId}_container`);
    const input = document.getElementById(`${multiselectId}_input`);
    const hiddenInput = document.getElementById(`${multiselectId}_values`);
    const dropdown = document.getElementById(`${multiselectId}_dropdown`);
    const selectedItemsContainer = document.getElementById(`${multiselectId}_selected_items`);

    // Vérifiez que tous les éléments existent
    console.log('Vérification des éléments DOM:');
    console.log(`- Container: ${container ? '✓' : '❌'}`);
    console.log(`- Input: ${input ? '✓' : '❌'}`);
    console.log(`- Hidden input: ${hiddenInput ? '✓' : '❌'}`);
    console.log(`- Dropdown: ${dropdown ? '✓' : '❌'}`);
    console.log(`- Selected items container: ${selectedItemsContainer ? '✓' : '❌'}`);

    if (!container || !input || !hiddenInput || !dropdown || !selectedItemsContainer) {
        console.error('❌ Un ou plusieurs éléments manquants');
        return;
    }

    // Obtenez les valeurs actuellement sélectionnées
    let currentValues = [];
    try {
        currentValues = JSON.parse(hiddenInput.value || '[]');
        console.log(`✓ Valeurs actuelles: ${JSON.stringify(currentValues)}`);
    } catch (e) {
        console.error('❌ Erreur lors de la lecture des valeurs actuelles', e);
    }

    // Test d'ouverture du dropdown
    console.log('Test de l\'ouverture du dropdown:');
    input.click();
    console.log(`- Dropdown visible: ${dropdown.classList.contains('hidden') ? '❌' : '✓'}`);

    // Test de fermeture du dropdown
    console.log('Test de la fermeture du dropdown:');
    document.body.click();
    console.log(`- Dropdown caché: ${dropdown.classList.contains('hidden') ? '✓' : '❌'}`);

    // Test de la liaison avec Livewire
    console.log('Vérification de la liaison Livewire:');
    console.log(`- wire:model attaché: ${hiddenInput.hasAttribute('wire:model.live') ? '✓' : '❌'}`);

    // Test de la fonctionnalité de réinitialisation
    console.log('Test de la fonctionnalité de réinitialisation:');
    if (window.multiselect && window.multiselect[multiselectId]) {
        // Sauvegardez les valeurs actuelles
        const originalValues = JSON.parse(hiddenInput.value || '[]');

        // Réinitialisez
        window.multiselect[multiselectId].reset();

        // Vérifiez que les valeurs ont été réinitialisées
        const newValues = JSON.parse(hiddenInput.value || '[]');
        console.log(`- Réinitialisation des valeurs: ${newValues.length === 0 ? '✓' : '❌'}`);

        // Restaurez les valeurs d'origine
        window.multiselect[multiselectId].updateSelectedValues(originalValues);
        console.log(`- Restauration des valeurs d'origine: ${hiddenInput.value === JSON.stringify(originalValues) ? '✓' : '❌'}`);
    } else {
        console.error('❌ Les méthodes du multiselect ne sont pas exposées correctement');
    }

    console.log('🎉 Tests terminés!');
}

// Exécutez les tests
testMultiselect();
