<?php

namespace App\Http\Controllers;

use App\Models\Creature;
use App\Models\Land;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DinoController extends Controller
{
    public function index(Request $request)
    {
        $rank = ['Common', 'Rare', 'Super Rare', 'Legendary', 'Limited Edition', 'VIP'];
        $breed = ['General', 'Hybrid', 'Super Hybrid'];
        switch ($request->type) {
            case 'land':
                $class = ['Herbivores', 'Carnivores', 'Pterosaurs', 'Amphibians'];
                break;
            case 'aquatic':
                $class = ['Caves', 'Reefs', 'Surfaces'];
                break;

            default:
                $class = ['Caverns', 'Savannahs', 'Snows'];
                break;
        }
        $data = Creature::all()->where('type', ucfirst($request->type))
            ->sortBy(function ($item) use ($rank, $breed, $class) {
                return [
                    array_search($item['rank'], $rank),
                    array_search($item['breed'], $breed),
                    array_search($item['class'], $class),
                    $item->ferocity
                ];
            });
        return view('dino.index', ['data' => $data]);
    }

    public function show($key)
    {
        if (is_int($key)) {
            $dino = Creature::findOrFail($key);
        } else {
            $dino = Creature::where('name', $key)->firstOrFail();
        }

        return view('dino.show', [
            'dino' => $dino,
        ]);
    }
    public function create()
    {
        return view('dino.create', [
            'species' => Creature::all()
        ]);
    }

    public function store(Request $request)
    {
        Creature::create([
            'type' => $request->type,
            'name' => $request->name,
            'class' => $request->class,
            'rank' => $request->rank,
            'breed' => $request->breed,
            'sp_1' => $request->f1,
            'sp_2' => $request->f2,
            'hp' => $request->hp,
            'attack' => $request->attack,
            'status' => $request->status == 'on' ? 1 : 0,
            'hybrid' => $request->hybrid,
            'cost' => $request->dna,
            'cost_type' => $request->cost_type,
            'stars' => $request->stars,
            'max' => $request->max,
            'card' => explode('/revision', $request->card)[0] ?? null,
            'sdna' => $request->sdna,
            'shop' => $request->shop,
            's2' => $request->s2,
            's3' => $request->s3,
        ]);

        return redirect('/list?type=' . strtolower($request->type));
    }

    public function edit(Creature $creature)
    {
        return view('dino.edit', [
            'species' => Creature::all(),
            'types' => array_unique(Creature::pluck('type')->toArray()),
            'classes' => array_unique(Creature::pluck('class')->toArray()),
            'ranks' => array_unique(Creature::pluck('rank')->toArray()),
            'breeds' => array_unique(Creature::pluck('breed')->toArray()),
            'dino' => $creature,
        ]);
    }

    public function update(Creature $creature, Request $request)
    {
        $creature->update([
            'type' => $request->type,
            'name' => $request->name,
            'class' => $request->class,
            'rank' => $request->rank,
            'breed' => $request->breed,
            'sp_1' => $request->f1,
            'sp_2' => $request->f2,
            'hp' => $request->hp,
            'attack' => $request->attack,
            'status' => $request->status == 'on' ? 1 : 0,
            'hybrid' => $request->hybrid,
            'cost' => $request->dna,
            'cost_type' => $request->cost_type,
            'stars' => $request->stars,
            'max' => $request->max,
            'card' => explode('/revision', $request->card)[0] ?? $creature->card,
            'sdna' => $request->sdna,
            'shop' => $request->shop,
            's2' => $request->s2,
            's3' => $request->s3,
        ]);

        return redirect('/show/' . $request->name);
    }

    public function filter($filter, $option)
    {
        $data = Creature::where($filter, $option)->orderByRaw('ferocity asc')->get();
        if ($filter == 'class') {
            $option = substr($option, 0, -1);
        }
        return view('dino.filter', ['name' => $option, 'data' => $data]);
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
