<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use AlbumsSeeder;
use App\Song;
use App\Album;
use App\FlacFile;
use App\Sku;

class SongModelTest extends TestCase
{
    use RefreshDatabase;

    public function setUp()
    {
        parent::setUp();

        $this->seed(AlbumsSeeder::class);
    }

    /**
     * Ensure that any random Song belongs to an Album.
     *
     * @return true
     */
    public function test_albums_randomSong_belongsToAlbum()
    {
        $this->assertInstanceOf(Album::class, Song::inRandomOrder()->first()->album);
    }

    /**
     * Ensure that any random Song has one FlacFile.
     *
     * @return true
     */
    public function test_flacFile_randomSong_hasOneFlacFile()
    {
        $this->assertInstanceOf(FlacFile::class, Song::inRandomOrder()->first()->flacFile);
    }

    public function test_sku_randomSong_hasOneSku()
    {
        $this->assertInstanceOf(Sku::class, Song::inRandomOrder()->first()->sku);
    }
}