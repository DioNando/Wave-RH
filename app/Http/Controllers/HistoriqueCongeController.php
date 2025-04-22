<?php

namespace App\Http\Controllers;

use App\Models\HistoriqueConge;
use Illuminate\Http\Request;

class HistoriqueCongeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.conges.index');
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
    public function show(HistoriqueConge $historiqueConge)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HistoriqueConge $historiqueConge)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HistoriqueConge $historiqueConge)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HistoriqueConge $historiqueConge)
    {
        //
    }
}
