<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use App\Models\Tracks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class TracksController extends Controller
{
    public function init()
    {
        return view('tracks.init');
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
 
    public function store(Request $request)
    {
    $request->validate([
        'name_tracks' => 'required|max:100',
        'URL' => 'required|max:200',
        'artist' => 'required|max:100',
        'genre' => 'required|max:50',
        'create_at' => 'required|date',
        'name' => 'required|max:255',
        'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // valida que el archivo subido sea una imagen
    ]);

    $foto = $request->file('foto');
    $fotoContent = base64_decode( file_get_contents($foto->getRealPath()));

    $track = new Tracks();
    $track->name_tracks = $request->input('name_tracks');
    $track->URL = $request->input('URL');
    $track->artist = $request->input('artist');
    $track->genre = $request->input('genre');
    $track->create_at = $request->input('create_at');
    $track->name = Auth::user()->name;
    $track->foto = $fotoContent;
    $track->save();

    return redirect()->route('tracks.listView')->with('success', 'Track saved/updated successfully.');
    }


    public function edit($id)
    {
        $track = Tracks::find($id);
        return view('listView', compact('track'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name_tracks' => 'required|max:100',
            'URL' => 'required|max:200',
            'artist' => 'required|max:100',
            'genre' => 'required|max:50',
            'create_at' => 'required|date',
            'name' => 'required|max:255',
        ]);

        $user = auth()->user();
        $user->name = $request->input('name');
        $user->save();

        $track = Tracks::find($id);
        $track->name_tracks = $request->input('name_tracks');
        $track->URL = $request->input('URL');
        $track->artist = $request->input('artist');
        $track->genre = $request->input('genre');
        $track->create_at = $request->input('create_at');
        $track->save();

    return redirect()->route('tracks.listView')->with('success', 'Track saved/updated successfully.');
    }



  
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

