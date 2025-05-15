<?php

namespace App\Livewire\Actions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Routing\Route;
use Livewire\Component;

class Delete extends Component
{
    /**
     * Le modèle à supprimer
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
     * Route de redirection après suppression
     */
    public string $redirectRoute;

    /**
     * Type de redirection ('index', 'create', etc.)
     */
    public string $redirectType = 'index';

    /**
     * Paramètres supplémentaires pour la redirection
     */
    public array $redirectParams = [];

    /**
     * Libellé du bouton de suppression
     */
    public string $buttonLabel = 'Supprimer';

    /**
     * Titre du modal de confirmation
     */
    public ?string $title = null;

    /**
     * Corps du message de confirmation
     */
    public ?string $body = null;

    /**
     * Si le bouton est responsive (adapté aux mobiles)
     */
    public bool $responsive = true;

    /**
     * Couleur du bouton (red par défaut)
     */
    public string $color = 'red';

    /**
     * Icône du bouton
     */
    public string $icon = 'heroicon-o-trash';

    /**
     * Style du bouton (outlined ou solid)
     */
    public string $buttonStyle = 'outlined';

    /**
     * Méthode pour effectuer la suppression
     */
    public function delete()
    {
        try {
            // Supprimer l'élément
            $this->entity->delete();

            // Message de succès
            $message = ucfirst($this->modelType) . ' supprimé avec succès';

            // Déterminer la route de redirection
            $route = $this->redirectType === 'index'
                ? route($this->redirectRoute . '.' . $this->redirectType, $this->redirectParams)
                : route($this->redirectRoute, $this->redirectParams);

            // Rediriger avec message de succès
            return redirect($route)->with('success', $message);
        } catch (\Exception $e) {
            // En cas d'erreur, afficher un message d'erreur
            session()->flash('error', 'Erreur lors de la suppression : ' . $e->getMessage());
        }
    }

    /**
     * Générer un identifiant unique pour le modal
     */
    public function getModalIdProperty()
    {
        return 'confirm-delete-' . $this->modelId . '-' . uniqid();
    }

    /**
     * Générer le titre du modal si non défini
     */
    public function getTitleProperty()
    {
        if ($this->title) {
            return $this->title;
        }

        return 'Supprimer ' . $this->modelType . ' ?';
    }

    /**
     * Générer le corps du message si non défini
     */
    public function getBodyProperty()
    {
        if ($this->body) {
            return $this->body;
        }

        return 'Êtes-vous sûr de vouloir supprimer cet élément ? Cette action est irréversible.';
    }

    public function render()
    {
        return view('livewire.actions.delete');
    }
}
