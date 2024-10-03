<?php
/**
 * @author Nicolas Fournier & Fabrice Senécal
 */

namespace Database\Seeders;

use App\Models\Vote;
use Illuminate\Database\Seeder;

class VoteSeeder extends Seeder
{
    const NOMBRE_USER_FAKER = 11;
    const NOMBRE_TELEPHONE_FAKER = 20;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($user_id = 2; $user_id <= self::NOMBRE_USER_FAKER; $user_id++) {
            for ($telephone_id = 1; $telephone_id <= self::NOMBRE_TELEPHONE_FAKER; $telephone_id++) {
                if (rand(1, 5) < 4) {
                    $vote = new Vote();
                    $vote->user_id = $user_id;
                    $vote->telephone_id = $telephone_id;
                    $vote->save();
                }
            }
        }
    }
}
