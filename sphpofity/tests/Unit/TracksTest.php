<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Tracks;

use Illuminate\Support\Facades\DB;

class TracksTest extends TestCase
{
    public function TestDataTrack()
    {

        $track = new Tracks();
        $track->name_tracks = 'Sample song';
        $track->URL = 'https://example.com/song.mp3';
        $track->artist = 'Sample artist';
        $track->genre = 'Sample genre';
        $track->create_at = date('Y-m-d');
        $track->foto = 'https://example.com/photo.jpg';
        $track->user_id = 1;


        $lastInsertedId = $track->id_tracks;
        DB::statement("ALTER TABLE tracks AUTO_INCREMENT = " . ($lastInsertedId + 1));

        $track->save();

        return $track;
    }
    public function test_track_creation()
    {

        $track = $this->TestDataTrack();

        // Check if the track was saved in the database
        $this->assertDatabaseHas('tracks', [
            'name_tracks' => 'Sample song',
            'URL' => 'https://example.com/song.mp3',
            'artist' => 'Sample artist',
            'genre' => 'Sample genre',
            'create_at' => date('Y-m-d'),
            'foto' => 'https://example.com/photo.jpg',
            'user_id' => 1,
        ]);

        // Check if the properties of the Track model were set correctly
        $this->assertEquals('Sample song', $track->name_tracks);
        $this->assertEquals('https://example.com/song.mp3', $track->URL);
        $this->assertEquals('Sample artist', $track->artist);
        $this->assertEquals('Sample genre', $track->genre);
        $this->assertEquals(date('Y-m-d'), $track->create_at);
        $this->assertEquals('https://example.com/photo.jpg', $track->foto);
        $this->assertEquals(1, $track->user_id); // Store the ID of the last inserted track

        $track->delete();
    }


    public function test_track_update()
    {
        // First, create a track
        $track = $this->TestDataTrack();

        // Find the track that was just created
        $track = Tracks::where('name_tracks', 'Sample song')->first();


        // Update some of the properties
        $track->name_tracks = 'Update song';
        $track->URL = 'https://example.com/song.mp3';
        $track->artist = 'Update artist';
        $track->genre = 'Update genre';
        $track->create_at = date('Y-m-d');
        $track->foto = 'https://example.com/photo.jpg';
        $track->user_id = 1;
        $track->save();

        // Check if the track was updated in the database
        $this->assertDatabaseHas('tracks', [
            'name_tracks' => 'Update song',
            'URL' => 'https://example.com/song.mp3',
            'artist' => 'Update artist',
            'genre' => 'Update genre',
            'create_at' => date('Y-m-d'),
            'foto' => 'https://example.com/photo.jpg',
            'user_id' => 1,
        ]);

        // Check if the properties of the Track model were updated correctly
        $this->assertEquals('Update song', $track->name_tracks);
        $this->assertEquals('https://example.com/song.mp3', $track->URL);
        $this->assertEquals('Update artist', $track->artist);
        $this->assertEquals('Update genre', $track->genre);
        $this->assertEquals(date('Y-m-d'), $track->create_at);
        $this->assertEquals('https://example.com/photo.jpg', $track->foto);
        $this->assertEquals(1, $track->user_id); // Store the ID of the last inserted track

        $track->delete();
    }

    public function test_track_deletion()
    {
        // First, create a track
        $track = $this->TestDataTrack();

        // Find the track that was just created
        $track = Tracks::where('name_tracks', 'Sample song');

        // Delete the track
        $track->delete();

        // Check if the track was deleted from the database
        $this->assertDatabaseMissing('tracks', [
            'name_tracks' => 'Sample song',
        ]);

        // Try to find the track again to make sure it was deleted
        $track = Tracks::where('name_tracks', 'Sample song')->first();
        $this->assertNull($track);
    }

    public function test_track_selection()
    {
        // First, create a track
        $track = $this->TestDataTrack();

        // Find the track that was just created
        $track = Tracks::where('name_tracks', 'Sample song')->first();

        // Find the track by name
        $trackByName = Tracks::where('name_tracks', 'Sample song')->first();
        $this->assertEquals('Sample song', $trackByName->name_tracks);

        // Try to find the track by an incorrect name
        $trackByIncorrectName = Tracks::where('name_tracks', 'Incorrect song name')->first();
        $this->assertNull($trackByIncorrectName);

        // Delete the track to clean up
        $track->delete();
    }
}
