<?php

namespace App\Http\Controllers;

use App\Models\Land;
use Illuminate\Http\Request;

class DinoController extends Controller
{
    public function show()
    {
        $data = Land::orderByRaw('rank asc, breed asc, class asc, name asc')->get();
        return view('land.index', ['lands' => $data]);
    }

    public function create()
    {
        $data = request()->all();

        $table = new Land();

        $table->name = $data['name'];
        $table->class = $data['class'];
        $table->rank = $data['rank'];
        $table->breed = $data['breed'];
        $table->hp = $data['hp'];
        $table->attack = $data['attack'];
        $table->dna_cost = $data['dna'];
        $table->status = $data['status'];
        $table->maxed = $data['max'];

        $table->save();

        return redirect('/land');
    }

    public function showClass($class)
    {
        $data = Land::where('class', $class)->orderByRaw('rank asc, breed asc, name asc')->get();

        return view('land.class', ['name'=>substr($class,0,-1), 'classes'=>$data]);
    }

    public function showRank($rank)
    {
        $data = Land::where('rank', $rank)->orderByRaw('breed asc, class asc, name asc')->get();

        return view('land.rank', ['name'=>$rank, 'ranks'=>$data]);
    }
    public function showBreed($breed)
    {
        $data = Land::where('breed', $breed)->orderByRaw('rank asc, class asc, name asc')->get();

        return view('land.breed', ['name'=>$breed, 'breeds'=>$data]);
    }
}
