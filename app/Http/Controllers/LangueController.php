<?php

namespace App\Http\Controllers;

use App\Models\Langue;
use Illuminate\Http\Request;

class LangueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.langues.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.langues.create');
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
    public function show(Langue $langue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Langue $langue)
    {
        return view('pages.langues.edit', compact('langue'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Langue $langue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Langue $langue)
    {
        //
    }
}
