<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Tracks;

use Illuminate\Support\Facades\DB;

class TracksTest extends TestCase
{
    public function TestDataTrack()
    {
        // Construye el objeto track para el cruce don la DB y la data de test
        $track = new Tracks();
        $track->name_tracks = 'Sample song';
        $track->URL = 'https://example.com/song.mp3';
        $track->artist = 'Sample artist';
        $track->genre = 'Sample genre';
        $track->create_at = date('Y-m-d');
        $track->foto = 'https://example.com/photo.jpg';
        $track->user_id = 1; // este debe existir ya en la tabla user

        // Para garantizar se continue el debido orden de auto incremento post test
        $lastInsertedId = $track->id_tracks;
        DB::statement("ALTER TABLE tracks AUTO_INCREMENT = " . ($lastInsertedId + 1));

        // Comisionar data en la BD por medio de los atributos del objeto
        $track->save();

        return $track; // Debe ser retornado el objeto para el uso en cada test
    }
    public function test_track_creation()
    {

        // Llamada al metodo que crea la data de prueba 
        $track = $this->TestDataTrack();

        // Verifica si el test ha sido capaz de guardar la data en la BD
        $this->assertDatabaseHas('tracks', [
            'name_tracks' => 'Sample song',
            'URL' => 'https://example.com/song.mp3',
            'artist' => 'Sample artist',
            'genre' => 'Sample genre',
            'create_at' => date('Y-m-d'),
            'foto' => 'https://example.com/photo.jpg',
            'user_id' => 1,
        ]);

        // Verificar que las propiedades del objeto son iguales a los campos de la tabla
        $this->assertEquals('Sample song', $track->name_tracks);
        $this->assertEquals('https://example.com/song.mp3', $track->URL);
        $this->assertEquals('Sample artist', $track->artist);
        $this->assertEquals('Sample genre', $track->genre);
        $this->assertEquals(date('Y-m-d'), $track->create_at);
        $this->assertEquals('https://example.com/photo.jpg', $track->foto);
        $this->assertEquals(1, $track->user_id);

        // Eliminar el objeto y registro en BD del test
        $track->delete();
    }


    public function test_track_update()
    {

        // Llamada al metodo que crea la data de prueba 
        $track = $this->TestDataTrack();

        // encuentra y apunta al registro recinetemete creado
        $track = Tracks::where('name_tracks', 'Sample song')->first();


        // Se actualizan las propiedades del objeto que registrar cambios en la DB
        $track->name_tracks = 'Update song';
        $track->URL = 'https://example.com/song.mp3';
        $track->artist = 'Update artist';
        $track->genre = 'Update genre';
        $track->create_at = date('Y-m-d');
        $track->foto = 'https://example.com/photo.jpg';
        $track->user_id = 1;
        $track->save();

        // Verifica que los cambios fueron comisionados 
        $this->assertDatabaseHas('tracks', [
            'name_tracks' => 'Update song',
            'URL' => 'https://example.com/song.mp3',
            'artist' => 'Update artist',
            'genre' => 'Update genre',
            'create_at' => date('Y-m-d'),
            'foto' => 'https://example.com/photo.jpg',
            'user_id' => 1,
        ]);

        // Verifica que el cruce de datos entre propiedades del objeto y los datos de la taba son iguales post update
        $this->assertEquals('Update song', $track->name_tracks);
        $this->assertEquals('https://example.com/song.mp3', $track->URL);
        $this->assertEquals('Update artist', $track->artist);
        $this->assertEquals('Update genre', $track->genre);
        $this->assertEquals(date('Y-m-d'), $track->create_at);
        $this->assertEquals('https://example.com/photo.jpg', $track->foto);
        $this->assertEquals(1, $track->user_id); // Store the ID of the last inserted track

        //Eliminar el objeto y registro en BD del test
        $track->delete();
    }

    public function test_track_deletion()
    {
        // Llamada al metodo que crea la data de prueba 
        $track = $this->TestDataTrack();

        // encuentra y apunta al registro recinetemete creado
        $track = Tracks::where('name_tracks', 'Sample song');

        // Elimina el objeto y el registro de test en la BD
        $track->delete();

        // Verifica que el registro fue realmente elimniado de la tabla tracks
        $this->assertDatabaseMissing('tracks', [
            'name_tracks' => 'Sample song',
        ]);

        // Prueba si hay ocurrencia a la consulta select condicionada al nombre del track del test
        // en es correcto caso de eliminacion sera null el resultado de la consulta
        $track = Tracks::where('name_tracks', 'Sample song')->first();
        $this->assertNull($track);
    }

    public function test_track_selection()
    {
        // Llamada al metodo que crea la data de prueba 
        $track = $this->TestDataTrack();

        // encuentra y apunta al registro recinetemete creado
        $track = Tracks::where('name_tracks', 'Sample song')->first();

        // Encuentra el registro con el nombre del track y vverifica que sena iguales en objeto y tabla
        $trackByName = Tracks::where('name_tracks', 'Sample song')->first();
        $this->assertEquals('Sample song', $trackByName->name_tracks);

        // Prueba cuando la consulta sea errada con nombre incorrecto de track lo que devuelve null la consulta
        $trackByIncorrectName = Tracks::where('name_tracks', 'Incorrect song name')->first();
        $this->assertNull($trackByIncorrectName);

        // Eliminar registro del test en la BD
        $track->delete();
    }
}
