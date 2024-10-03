<?php
/**
 * @author Nicolas Fournier & Fabrice Senécal
 */

namespace Database\Seeders;

use App\Models\Commentaire;
use Illuminate\Database\Seeder;

class CommentaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Commentaire::factory()
            ->count(100)
            ->create();
    }
}
