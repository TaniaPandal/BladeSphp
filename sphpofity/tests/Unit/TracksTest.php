<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Tracks;

class TracksTest extends TestCase
{

    public function test_track_creation()
    {
        $current_date_time = date('Y-m-d H:i:s', time());

        $track = new Tracks();
        $track->name_tracks = 'Sample song';
        $track->URL = 'https://example.com/song.mp3';
        $track->artist = 'Sample artist';
        $track->genre = 'Sample genre';
        $track->create_at = $current_date_time;;
        $track->foto = 'https://example.com/photo.jpg';
        $track->user_id = 1;
        $track->save();

        // Check if the track was saved in the database
        $this->assertDatabaseHas('tracks', [
            'name_tracks' => 'Sample song',
            'URL' => 'https://example.com/song.mp3',
            'artist' => 'Sample artist',
            'genre' => 'Sample genre',
            'create_at' => $current_date_time,
            'foto' => 'https://example.com/photo.jpg',
            'user_id' => 1,
        ]);

        // Check if the properties of the Track model were set correctly
        $this->assertEquals('Sample song', $track->name_tracks);
        $this->assertEquals('https://example.com/song.mp3', $track->URL);
        $this->assertEquals('Sample artist', $track->artist);
        $this->assertEquals('Sample genre', $track->genre);
        $this->assertEquals($current_date_time, $track->create_at);
        $this->assertEquals('https://example.com/photo.jpg', $track->foto);
        $this->assertEquals(1, $track->user_id); // Store the ID of the last inserted track
        $this->tearDown();

        // End the test
        $this->assertTrue(true);
    }

    protected function tearDown(): void
    {
        $track = Tracks::where('name_tracks', 'Sample song');
        $track->delete();
    }


    public function test_track_update()
    {
        // First, create a track
        $current_date_time = date('Y-m-d H:i:s', time());

        $track = new Tracks();
        $track->name_tracks = 'Sample song';
        $track->URL = 'https://example.com/song.mp3';
        $track->artist = 'Sample artist';
        $track->genre = 'Sample genre';
        $track->create_at = $current_date_time;;
        $track->foto = 'https://example.com/photo.jpg';
        $track->user_id = 1;
        $track->save();

        // Find the track that was just created
        $track = Tracks::where('name_tracks', 'Sample song');

        // Update some of the properties
        $track->URL = 'https://example.com/new-song.mp3';
        $track->genre = 'New genre';
        $track->save();

        // Check if the track was updated in the database
        $this->assertDatabaseHas('tracks', [
            'name_tracks' => 'Sample song',
            'URL' => 'https://example.com/new-song.mp3',
            'genre' => 'New genre',
        ]);

        // Check if the properties of the Track model were updated correctly
        $this->assertEquals('https://example.com/new-song.mp3', $track->URL);
        $this->assertEquals('New genre', $track->genre);

        // Delete the track to clean up
        // $this->tearDown();
    }

    public function test_track_deletion()
    {
        // First, create a track
        $this->test_track_creation();

        // Find the track that was just created
        $track = Tracks::where('name_tracks', 'Sample song')->first();

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
        $this->test_track_creation();

        // Find the track that was just created
        $track = Tracks::where('name_tracks', 'Sample song')->first();

        // Find the track by name
        $trackByName = Tracks::where('name_tracks', 'Sample song')->first();
        $this->assertEquals('Sample song', $trackByName->name_tracks);

        // Try to find the track by an incorrect name
        $trackByIncorrectName = Tracks::where('name_tracks', 'Incorrect song name')->first();
        $this->assertNull($trackByIncorrectName);

        // Delete the track to clean up
        $this->tearDown();
    }
}
