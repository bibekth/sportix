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
                'team_one_logo' => 'logos/real_madrid.png',
                'team_two' => 'Barcelona',
                'team_two_logo' => 'logos/barcelona.png',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Premier League Clash',
                'starts_on' => Carbon::now()->addWeek(),
                'team_one' => 'Manchester United',
                'team_one_logo' => 'logos/man_utd.png',
                'team_two' => 'Liverpool',
                'team_two_logo' => 'logos/liverpool.png',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'El Clasico',
                'starts_on' => Carbon::now()->addDays(10),
                'team_one' => 'Atletico Madrid',
                'team_one_logo' => 'logos/atletico.png',
                'team_two' => 'Sevilla',
                'team_two_logo' => 'logos/sevilla.png',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'World Cup Qualifier',
                'starts_on' => Carbon::now()->addDays(15),
                'team_one' => 'Brazil',
                'team_one_logo' => 'logos/brazil.png',
                'team_two' => 'Argentina',
                'team_two_logo' => 'logos/argentina.png',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);


    }
}
