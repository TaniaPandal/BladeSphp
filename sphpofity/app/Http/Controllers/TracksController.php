<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use App\Models\Tracks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;



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
        return view('tracks.listView', ['table' => $tracks]);
    }
    public function listViewTrainer()
    {
        $tracks = DB::table('tracks')->get();
        return view('tracks.listViewTrainer', ['table' => $tracks]);
    }
    public function formView()
    {

        return view('tracks.formView');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name_tracks' => 'required|max:100',
            'URL' => 'required|max:200',
            'artist' => 'required|max:100',
            'genre' => 'required|max:50',
            'create_at' => 'required|date',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // valida que el archivo subido sea una imagen
        ]);

        $foto = $request->file('foto');
        $foto_contents = file_get_contents($foto);
        $foto_base64 = base64_encode($foto_contents);


        $track = new Tracks();
        $track->name_tracks = $request->input('name_tracks');
        $track->URL = $request->input('URL');
        $track->artist = $request->input('artist');
        $track->genre = $request->input('genre');
        $track->create_at = $request->input('create_at');
        $track->foto = $foto_base64;
        $track->user_id = Auth::id();
        $track->save();
        // dd($track);

        return redirect()->route('listView');
    }
    public function foto($id)
    {
        $foto = DB::table('tracks')->select('foto')->where('id_tracks', $id)->first();
        return response(base64_decode($foto->foto))->header('Content-Type', 'image/jpeg');
    }
    public function updateStatus(Request $request, $id) 
    {
        $track = Tracks::where('id_tracks', $id)->first();
        $track->status = $request->status;
        $track->save();
        return redirect()->route('listView');
    }
    

    // public function show(Tracks $track)
    // {
    // return view('tracks.listView', compact('track'));
    // }

    // public function edit($id)
    // {
    //     $track = Tracks::find($id);
    //     return view('traks.formView', compact('track'));
    // }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name_tracks' => 'required|max:100',
            'URL' => 'required|max:200',
            'artist' => 'required|max:100',
            'genre' => 'required|max:50',
            'create_at' => 'required|date',
            'foto' => 'nullable|image',
        ]);


        $track = Tracks::find($id);
        $track->name_tracks = $request->input('name_tracks');
        $track->URL = $request->input('URL');
        $track->artist = $request->input('artist');
        $track->genre = $request->input('genre');
        $track->create_at = $request->input('create_at');
        
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/fotos', $filename);
            $track->foto = $filename;
        }
        $track->save();

    return redirect()->route('tracks.listView')->with('success', 'Track saved/updated successfully.');
    }
   
    
    
 
}
