<?php
/**
 * @author Nicolas Fournier & Fabrice Senécal
 */

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([UserSeeder::class]);
        $this->call([TelephoneSeeder::class]);
        $this->call([CommentaireSeeder::class]);
        $this->call([VoteSeeder::class]);
    }
}
