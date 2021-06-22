@extends('layout')

@section('content')
    <div class="container">
        <h1 class="m-5">{{ $name }} Dinosaurs</h1>
        <div class="row">
            @foreach ($classes as $class)
                <div class="col-sm-12 col-md-6 col-lg-3 mb-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header">
                                <h5 class="card-title text-center mb-0">{{ $class->name }}</h5>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Rank: <a class="btn btn-outline-dark float-end"
                                        href="/rank/{{ $class->rank }}">{{ $class->rank }}</a></li>
                                <li class="list-group-item">Breed: <a class="btn btn-outline-dark float-end"
                                        href="/breed/{{ $class->breed }}">{{ $class->breed }}</a></li>
                                <li class="list-group-item">
                                    <div class="alert alert-success mb-0">
                                        HP: {{ $class->hp }}
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="alert alert-danger mb-0">
                                        Attack: {{ $class->attack }}
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="alert alert-dark mb-0">
                                        Ferocity: {{ $class->ferocity }}
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
