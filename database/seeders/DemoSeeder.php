<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // 1. Coldplay - 2022
        \App\Models\Gig::create([
            'artist' => 'Coldplay',
            'venue' => 'Estadio Monumental',
            'gig_date' => '2022-10-25',
            'football_team_status' => 'River terminaba su año con Gallardo',
            'football_match_result' => 'Racing 1 - 2 River (días antes)',
            'cultural_note' => 'Chris Martin dijo "Aguante Messi" y el estadio explotó. Fue el récord de 10 River.',
        ]);

        // 2. Taylor Swift - 2023
        \App\Models\Gig::create([
            'artist' => 'Taylor Swift',
            'venue' => 'Estadio Monumental',
            'gig_date' => '2023-11-11',
            'football_team_status' => 'River Puntero de Copa LPF',
            'football_match_result' => 'Rosario Central 3 - 1 River (Jugaron en Arroyito porque el Monumental estaba ocupado)',
            'cultural_note' => 'El show del 10/11 se suspendió por tormenta eléctrica. Taylor dijo "I love the rain" pero fue un diluvio.',
        ]);

        // 3. Duki - 2022
        \App\Models\Gig::create([
            'artist' => 'Duki',
            'venue' => 'Estadio Velez Sarsfield',
            'gig_date' => '2022-10-06',
            'football_team_status' => 'Velez en mitad de tabla',
            'football_match_result' => 'Velez 1 - 0 Banfield (4 de Octubre)',
            'cultural_note' => 'El Duko rompiéndola en su casa. "Me puse la diez".',
        ]);
    }
}
