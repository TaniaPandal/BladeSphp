<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use App\Models\Tracks;
use Illuminate\Http\Request;

class TracksController extends Controller
{
      public function login()
    {
        return view('tracks.login');
    }
 
    public function index() 
    {
       return view('tracks.index');
    }
    public function listView()
    {
        $tracks = DB::table('tracks')->get();
        return view('tracks.listView',['table' => $tracks]);
    }
    public function listViewTrainer()
    {
        $tracks = DB::table('tracks')->get();
        return view('tracks.listViewTrainer',['table' => $tracks]);
    }
    public function formView() 
    {
       return view('tracks.formView');
    }



  

//     public function store(Request $request)
//     {
//         //
//     }

//     /**
//      * Display the specified resource.
//      */
//     public function show(Tracks $tracks)
//     {
//         //
//     }

//     /**
//      * Show the form for editing the specified resource.
//      */
//     public function edit(Tracks $tracks)
//     {
//         //
//     }

//     /**
//      * Update the specified resource in storage.
//      */
//     public function update(Request $request, Tracks $tracks)
//     {
//         //
//     }

//     /**
//      * Remove the specified resource from storage.
//      */
//     public function destroy(Tracks $tracks)
//     {
//         //
//     }
}
