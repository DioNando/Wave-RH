<?php

namespace App\Http\Controllers;

use App\Models\CompetenceTechnique;
use Illuminate\Http\Request;

class CompetenceTechniqueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.competences-techniques.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.competences-techniques.create');
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
    public function show(CompetenceTechnique $competenceTechnique)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $competenceTechnique = CompetenceTechnique::findOrFail($id);
        return view('pages.competences-techniques.edit', compact('competenceTechnique'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CompetenceTechnique $competenceTechnique)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompetenceTechnique $competenceTechnique)
    {
        //
    }
}
