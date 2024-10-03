<?php
/**
 * @author Nicolas Fournier & Fabrice Senécal
 */

namespace Database\Seeders;

use App\Models\Telephone;
use Illuminate\Database\Seeder;

class TelephoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Telephone::factory()
            ->count(20)
            ->create();
    }
}
