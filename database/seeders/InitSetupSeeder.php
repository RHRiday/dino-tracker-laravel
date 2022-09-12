<?php

namespace Database\Seeders;

use App\Models\Creature;
use App\Models\Land;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InitSetupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $creature = DB::table('cenozoic')->get();
        // foreach ($creature as $c) {
        //     $f1 = null;
        //     $f2 = null;
        //     if ($c->breed == 'Hybrid') {
        //         $sp = DB::table('cenozoic_hybrid')->where('name', $c->name)->first();
        //         if ($sp != null) {
        //             $f1 = $sp->fusion1;
        //             $f2 = $sp->fusion2;
        //         }
        //     }
        //     Creature::create([
        //         'type' => 'Cenozoic',
        //         'name' => $c->name,
        //         'class' => $c->class,
        //         'rank' => $c->rank,
        //         'breed' => $c->breed,
        //         'sp_1' => $f1,
        //         'sp_2' => $f2,
        //         'hp' => $c->hp,
        //         'attack' => $c->attack,
        //         'status' => $c->status == 'Unlocked' ? 1 : 0,
        //         'hybrid' => $c->hybrid,
        //         'cost' => $c->dna_cost,
        //         'stars' => $this->findStars($c),
        //     ]);
        // }
    }

    private function findStars($c)
    {
        if ($c->breed == 'General') {
            switch ($c->rank) {
                case 'Common':
                    return 1;
                    break;
                case 'Rare':
                    return 2;
                    break;
                case 'Super Rare':
                    return 3;
                    break;
                case 'Legendary':
                    return 4;
                    break;
                case 'Limited Edition':
                    return 5;
                    break;
                default:
                    return 6;
                    break;
            }
        }
    }
}
