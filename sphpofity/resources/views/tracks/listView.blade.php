<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/listView.css">
    @vite(['resources/js/app.js','resources/css/app.css'])
	<title>sphpotify</title>
</head>
<body class="bg-cover bg-no-repeat h-screen " style="background-image: url('images/fondoEscenario.png')">
    <div class="containerList flex pl-2">
        <div class="logoMicro pt-8">
            <img class="microLog pt-15 ml-1" src={{ asset('images/logo/para-fondo-negro.png') }} alt="logo con micro"/>
            <a href="{{ route('formView') }}">
                <button class="border border-transparent ml-20 text-sm w-20 h-10 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">Add Song</button> 
            </a>
        </div> 
        <div class="flex overflow-y-auto">
            <table class="table1 table-auto min-w-full">
               <thead>
                    <tr class="celdas">
                        <td class="py-2 px-4">Song</td>
                        <td class="py-2 px-4">URL</td>
                        <td class="py-2 px-4">Artist</td>
                        <td class="py-2 px-4">Genre</td>
                        <td class="py-2 px-4">Date</td>
                        <td class="py-2 px-4">Image</td>
                        <td class="py-2 px-4">User</td>
                        <td class="py-2 px-4">Status</td>
                        <td class="py-2 px-4">Options</td>
                    </tr>
               </thead>
               <tbody>
                    @foreach($table as $item)
                    <tr>
                        <td class="py-2 px-4">{{ $item->name_tracks }}</td>
                        <td class="py-2 px-4">
                            <a href="{{ $item->URL }}"target="_blank">{{ $item->URL }}</a>
                        </td>
                        <td class="py-2 px-4">{{ $item->artist }}</td>
                        <td class="py-2 px-4">{{ $item->genre }}</td>
                        <td class="py-2 px-4">{{ $item->create_at }}</td>
                        <td class="py-2 px-4">
                            <img src="{{ url('tracks.foto', ['id_tracks' => $item->id_tracks]) }}" alt="Foto de la canción" class="max-w-full h-auto">
                        </td>
                        <td class="py-2 px-4">{{ $item->name = Auth::user()->name }}</td>
                        <td class="py-2 px-4 text-gray-500">
                            {{-- <form action="{{ route('tracks.updateStatus', ['id_tracks' => $item->id_tracks])  }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT') --}}
                                <select name="status" id="status" onchange="this.form.submit()">
                                    <option value="Played" @if($item->status == 'Played') selected @endif>Played</option>
                                    <option value="unPlayed" @if($item->status == 'unPlayed') selected @endif>Unplayed</option>
                                </select>
                            {{-- </form> --}}
                        </td>
                        <td class="py-2 px-4">
                            <button onclick="deleteRow({{ $item->id_tracks }})" >
                                <img src={{ asset('images\trash.png') }} alt="basura"/>
                            </button>
                        </td>    
                    </tr>
                @endforeach
            </tbody>    
        </table>
    </div>    
</body>
</html>