<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = [
            'Acoustic',
            'Alternative',
            'Ambient',
            'Anime',
            'Blues',
            'Classical',
            'Club/Dance',
            'Country',
            'Dance',
            'EDM',
            'Electronic',
            'Game Music',
            'Hip-Hop/Rap',
            'House',
            'アイドル',
            'Indie',
            'Instrumental',
            'J-Pop',
            'Jazz',
            'K-Pop',
            'Lo-fi',
            'Metal',
            'Pop',
            'Punk',
            'R&B/Soul',
            'Reggae',
            'Rock',
            'Vocaloid',
            'Techno',
            'Trance',
            'Trap',
        ];

        foreach ($genres as $genre) {
            DB::table('genres')->insert([
                'name' => $genre,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
