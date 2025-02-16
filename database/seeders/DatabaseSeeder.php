<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

            $this->call([
                AdminUserSeeder::class,
                LanguageSeeder::class,
            ]);

        try {
            User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]);
        } catch (\Throwable $th) {
            //throw $th;
        }


        $this->call(Setting20241025115804::class);    }
}
