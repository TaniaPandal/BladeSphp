<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/listView.css">
    @vite(['resources/js/app.js','resources/css/app.css'])
	<title>Lista de tracks</title>
</head>
<body class="bg-cover bg-no-repeat h-screen " style="background-image: url('images/fondoEscenario.png')">
    <div class="containerList flex pl-2">
        <div class="logoMicro pt-8">
            <img class="microLog pt-15" src={{ asset('images//logo/para-fondo-negro.png') }} alt="logo con micro"/>
            <a href="{{ route('formView') }}">
                <button class="border border-transparent text-sm w-20 h-10 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">Add Song</button> 
            </a>
        </div> 
        <div class="flex overflow-y-auto">
            <table class="table1">
                    <tr class="celdas">
                        <td>Song</td>
                        <td>URL</td>
                        <td>Artist</td>
                        <td>Genre</td>
                        <td>Date</td>
                        <td>Image</td>
                        <td>User</td>
                        <td>Options</td>
                    </tr>
                    @foreach($table as $item)
                    <tr class="w-auto h-auto">
                        <td>{{ $item->name_tracks }}</td>
                        <td><a href="{{ $item->URL }}">{{ $item->URL }}</a></td>
                        <td>{{ $item->artist }}</td>
                        <td>{{ $item->genre }}</td>
                        <td>{{ $item->create_at }}</td>
                        <td>
                            <img src="{{ url('tracks.foto', ['id_tracks' => $item->id_tracks]) }}" alt="Foto de la canción" class="max-w-full h-auto">
                        </td>
                        <td>{{ $item->name = Auth::user()->name }}</td>
                        <td>
                            <button onclick="deleteRow({{ $item->id_tracks }})" >
                                <img src={{ asset('images\trash.png') }} alt="basura"/>
                            </button>
                        </td>    
                    </tr>
                </div>    
                @endforeach
        </table>
    </div>    
</body>
</html>