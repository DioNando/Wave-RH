<?php

namespace App\Livewire\Actions;

use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class ToggleStatus extends Component
{
    /**
     * Le modèle à modifier
     */
    public Model $entity;

    /**
     * ID du modèle
     */
    public $modelId;

    /**
     * Type du modèle (utilisé pour l'affichage)
     */
    public string $modelType;

    /**
     * Route vers laquelle rediriger après activation/désactivation
     */
    public ?string $redirectRoute = null;

    /**
     * Libellé du bouton d'activation
     */
    public string $activateLabel = 'Activer';

    /**
     * Libellé du bouton de désactivation
     */
    public string $deactivateLabel = 'Désactiver';

    /**
     * Si le bouton est responsive (adapté aux mobiles)
     */
    public bool $responsive = true;

    /**
     * Style du bouton (outlined ou primary)
     */
    public string $buttonStyle = 'outlined';

    /**
     * Si on doit utiliser le style compact (juste une icône)
     */
    public bool $simple = false;

    /**
     * Si on doit rafraîchir la page au lieu de rediriger
     */
    public bool $refresh = false;

    /**
     * Méthode pour basculer le statut
     */
    public function toggleStatus()
    {
        try {
            // Inverser le statut actuel
            $newStatus = !$this->entity->statut;

            // Mettre à jour l'entité
            $this->entity->update(['statut' => $newStatus]);

            // Message de succès
            $message = $newStatus
                ? ucfirst($this->modelType) . ' activé avec succès'
                : ucfirst($this->modelType) . ' désactivé avec succès';

            // Gérer la redirection ou le rafraîchissement
            if ($this->refresh) {
                // Rafraîchir la page avec message de succès
                session()->flash('success', $message);
                $this->dispatch('refresh');
            } elseif ($this->redirectRoute) {
                // Rediriger avec message de succès
                return redirect()->route($this->redirectRoute)->with('success', $message);
            } else {
                // Juste afficher un message de succès
                session()->flash('success', $message);
            }

        } catch (\Exception $e) {
            // En cas d'erreur, afficher un message d'erreur
            session()->flash('error', 'Erreur lors de la modification du statut : ' . $e->getMessage());
        }
    }

    /**
     * Générer un identifiant unique pour le modal
     */
    public function getModalIdProperty()
    {
        return 'confirm-toggle-status-' . $this->modelId . '-' . uniqid();
    }

    /**
     * Obtenir le titre du modal
     */
    public function getTitleProperty()
    {
        return $this->entity->statut
            ? 'Désactiver ' . $this->modelType
            : 'Activer ' . $this->modelType;
    }

    /**
     * Obtenir le corps du message du modal
     */
    public function getBodyProperty()
    {
        return 'Êtes-vous sûr de vouloir ' .
            ($this->entity->statut ? 'désactiver' : 'activer') .
            ' ce ' . $this->modelType . ' ?';
    }

    /**
     * Obtenir la couleur du bouton
     */
    public function getButtonColorProperty()
    {
        return $this->entity->statut ? 'gray' : 'green';
    }

    /**
     * Obtenir la couleur du bouton de confirmation
     */
    public function getConfirmButtonColorProperty()
    {
        return $this->entity->statut ? 'red' : 'green';
    }

    /**
     * Obtenir l'icône du bouton
     */
    public function getButtonIconProperty()
    {
        return $this->entity->statut ? 'heroicon-o-x-mark' : 'heroicon-o-check';
    }

    public function render()
    {
        return view('livewire.actions.toggle-status');
    }
}
