<?php

namespace App\Http\Controllers;
use Illuminate\View\View;

use App\Models\Tracks;
use Illuminate\Http\Request;

class TracksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
       return view('Tracks.index');
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
    public function show(Tracks $tracks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tracks $tracks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tracks $tracks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tracks $tracks)
    {
        //
    }
}
