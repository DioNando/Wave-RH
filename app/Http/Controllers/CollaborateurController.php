<?php

namespace App\Http\Controllers;

use App\Models\Collaborateur;
use Illuminate\Http\Request;

class CollaborateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.collaborateurs.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.collaborateurs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Collaborateur $collaborateur)
    {
        // Récupérer le poste actuel (le plus récent) du collaborateur
        $poste_actuel = $collaborateur->historique_postes()
            ->orderBy('date_debut', 'desc')
            ->first();

        // Assigner le poste actuel au collaborateur
        $collaborateur->poste_actuel = $poste_actuel;

        return view('pages.collaborateurs.show', compact('collaborateur'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Collaborateur $collaborateur)
    {
        return view('pages.collaborateurs.edit', compact('collaborateur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Collaborateur $collaborateur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Collaborateur $collaborateur)
    {
        //
    }
}
