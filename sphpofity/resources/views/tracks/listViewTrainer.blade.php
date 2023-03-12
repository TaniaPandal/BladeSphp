<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="/css/listView.css">
    <title>Lista de tracks</title>
</head>

<body>
    <div class="containerList">
        <table class="table1">
            <div class="logoMicro">
                <img class="microLog" src={{ asset('images//logo/para-fondo-negro.png') }} alt="logo con micro" />
            </div>
            <div class="bottonAdd">
                <a href="{{ url('formView') }}">
                    <button class="bottonAdd">Add Song</button>
                </a>
            </div>
            <tr class="celdas">
                <td>Song</td>
                <td>URL</td>
                <td>Artist</td>
                <td>Genre</td>
                <td>Date</td>
                <td>Image</td>
                <td>User</td>
                <td>Status</td>
                <td>Options</td>
            </tr>
            @foreach ($table as $item)
                <tr>
                    <td>{{ $item->name_tracks }}</td>
                    <td>{{ $item->URL }}</td>
                    <td>{{ $item->artist }}</td>
                    <td>{{ $item->genre }}</td>
                    <td>{{ $item->create_at }}</td>
                    <td>{{ $item->foto }}</td>

                    <td>{{ $item->status }}</td>
                    <td>
                        <button onclick="deleteRow({{ $item->id_tracks }})" src={{ asset('images/trash.png') }}
                            alt="basura">
                        </button>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</body>

</html>
