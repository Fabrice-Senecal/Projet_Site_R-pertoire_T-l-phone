<?php
/**
 * @author Nicolas Fournier & Fabrice Senécal
 */

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::firstOrCreate(['email' => 'gabriel@email.com'], [
            'name' => 'gabriel',
            'password' => Hash::make('password'),
            'email_verified_at' => now()
        ]);

        User::factory()
            ->count(10)
            ->create();
    }
}
