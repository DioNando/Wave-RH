<?php

namespace App\Http\Controllers;

use App\Models\JourFerie;
use Illuminate\Http\Request;

class JourFerieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.jours-feries.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(JourFerie $jourFerie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JourFerie $jourFerie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JourFerie $jourFerie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JourFerie $jourFerie)
    {
        //
    }
}
