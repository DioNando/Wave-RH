<?php

namespace App\Http\Controllers;

use App\Models\DocumentAdministratif;
use Illuminate\Http\Request;

class DocumentAdministratifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.documents-administratifs.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.documents-administratifs.create');
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
    public function show(DocumentAdministratif $documentAdministratif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $documentAdministratif = DocumentAdministratif::findOrFail($id);
        return view('pages.documents-administratifs.edit', compact('documentAdministratif'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DocumentAdministratif $documentAdministratif)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DocumentAdministratif $documentAdministratif)
    {
        //
    }
}
