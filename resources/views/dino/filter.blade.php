@extends('layout')

@section('content')
    <div class="container">
        <h1 class="my-5">{{ $name }} Dinosaurs
            <span class="text-sm text-muted">
                ({{ $data->count() }} species found!)
            </span>
        </h1>
        <div class="row text-sm">
            @foreach ($data as $item)
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 mb-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header">
                                <img src="{{ $item->card }}" alt="" class="w-100">
                                <h5 class="card-title text-center mb-0">
                                    <a href="/show/{{ $item->name }}">{{ $item->name }}</a>
                                    <a class="btn btn-sm btn-outline-secondary" href="/edit/{{ $item->id }}">
                                        <i class="far fa-edit"></i>
                                    </a>
                                </h5>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item py-1">Type: <a class="btn btn-sm btn-outline-dark float-end"
                                        href="/list?type={{ $item->type }}">{{ $item->type }}</a></li>
                                <li class="list-group-item py-1">Class: <a class="btn btn-sm btn-outline-dark float-end"
                                        href="/class/{{ $item->class }}">{{ $item->class }}</a></li>
                                <li class="list-group-item py-1">Rank: <a class="btn btn-sm btn-outline-dark float-end"
                                        href="/rank/{{ $item->rank }}">{{ $item->rank }}</a></li>
                                <li class="list-group-item py-1">Breed: <a class="btn btn-sm btn-outline-dark float-end"
                                        href="/breed/{{ $item->breed }}">{{ $item->breed }}</a></li>
                                <li class="list-group-item py-1">
                                    <div class="alert alert-success mb-0 p-1">
                                        HP: {{ $item->hp }}
                                    </div>
                                </li>
                                <li class="list-group-item py-1">
                                    <div class="alert alert-danger mb-0 p-1">
                                        Attack: {{ $item->attack }}
                                    </div>
                                </li>
                                <li class="list-group-item py-1">
                                    <div class="alert alert-dark mb-0 p-1">
                                        Ferocity: {{ $item->ferocity }}
                                    </div>
                                </li>
                                <li class="list-group-item py-1">
                                    <div class="alert alert-warning mb-0 p-1">
                                        Cost: {{ ($item->cost ?? 'N\A') . ' (' . $item->cost_type . ')' }}
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
