<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create(['name' => 'Test User', 'username' => 'testuser', 'email' => 'testuser@gmail.com', 'password' => Hash::make('password'), 'contact' => '9800000000']);

        DB::table('events')->insert([
            [
                'title' => 'Champions League Final',
                'starts_on' => Carbon::now()->addDays(3),
                'team_one' => 'Real Madrid',
                'team_one_logo' => 'https://upload.wikimedia.org/wikipedia/en/thumb/5/56/Real_Madrid_CF.svg/1200px-Real_Madrid_CF.svg.png',
                'team_two' => 'Barcelona',
                'team_two_logo' => 'https://upload.wikimedia.org/wikipedia/en/thumb/4/47/FC_Barcelona_%28crest%29.svg/2020px-FC_Barcelona_%28crest%29.svg.png',
                'price' => 1100,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Premier League Clash',
                'starts_on' => Carbon::now()->addWeek(),
                'team_one' => 'Manchester United',
                'team_one_logo' => 'https://upload.wikimedia.org/wikipedia/en/thumb/7/7a/Manchester_United_FC_crest.svg/1200px-Manchester_United_FC_crest.svg.png',
                'team_two' => 'Liverpool',
                'team_two_logo' => 'https://upload.wikimedia.org/wikipedia/en/thumb/0/0c/Liverpool_FC.svg/1200px-Liverpool_FC.svg.png',
                'price' => 1000,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'El Clasico',
                'starts_on' => Carbon::now()->addDays(10),
                'team_one' => 'Atletico Madrid',
                'team_one_logo' => 'https://upload.wikimedia.org/wikipedia/en/thumb/f/f9/Atletico_Madrid_Logo_2024.svg/800px-Atletico_Madrid_Logo_2024.svg.png',
                'team_two' => 'Sevilla',
                'team_two_logo' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTBfdCIte5S6TF_ZdRWRWYgXqGoIlk6D6TDvg&s',
                'price' => 500,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'World Cup Qualifier',
                'starts_on' => Carbon::now()->addDays(15),
                'team_one' => 'Brazil',
                'team_one_logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/99/Brazilian_Football_Confederation_logo.svg/1200px-Brazilian_Football_Confederation_logo.svg.png',
                'team_two' => 'Argentina',
                'team_two_logo' => 'https://upload.wikimedia.org/wikipedia/en/1/1e/Asociaci%C3%B3n_del_F%C3%BAtbol_Argentino_%28crest%29.svg',
                'price' => 600,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);


    }
}
