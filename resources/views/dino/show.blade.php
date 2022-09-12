@extends('layout')

@section('content')
    <div class="container">
        <h1 class="my-5">{{ $dino->name }}</h1>
        <div class="card mb-3 w-100">
            <div class="row g-0">
                <div class="col-md-2">
                    <img src="{{ $dino->card }}" class="img-fluid rounded-start" alt="{{ $dino->name }}">
                </div>
                <div class="col-md-4">
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item py-1">Type: <a class="btn btn-sm btn-outline-dark float-end"
                                    href="/list?type={{ $dino->type }}">{{ $dino->type }}</a></li>
                            <li class="list-group-item py-1">Class: <a class="btn btn-sm btn-outline-dark float-end"
                                    href="/class/{{ $dino->class }}">{{ $dino->class }}</a></li>
                            <li class="list-group-item py-1">Rank: <a class="btn btn-sm btn-outline-dark float-end"
                                    href="/rank/{{ $dino->rank }}">{{ $dino->rank }}</a></li>
                            <li class="list-group-item py-1">Breed: <a class="btn btn-sm btn-outline-dark float-end"
                                    href="/breed/{{ $dino->breed }}">{{ $dino->breed }}</a></li>
                            @if ($dino->hybrid != null)
                                <li class="list-group-item py-1">Hybrid: <a class="btn btn-sm btn-outline-dark float-end"
                                        href="/show/{{ $dino->hybrid }}">{{ $dino->hybrid }}</a></li>
                            @endif
                            @if ($dino->breed != 'General')
                                <li class="list-group-item py-1 text-center">Combination of
                                    <div class="d-flex justify-content-between">
                                        <a class="btn btn-sm btn-outline-primary"
                                            href="/show/{{ $dino->sp_1 }}">{{ $dino->sp_1 }}</a>
                                        <a class="btn btn-sm btn-outline-primary"
                                            href="/show/{{ $dino->sp_2 }}">{{ $dino->sp_2 }}</a>
                                    </div>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item py-1">
                                <div class="alert alert-success mb-0 p-1">
                                    HP: {{ $dino->hp }}
                                </div>
                            </li>
                            <li class="list-group-item py-1">
                                <div class="alert alert-danger mb-0 p-1">
                                    Attack: {{ $dino->attack }}
                                </div>
                            </li>
                            <li class="list-group-item py-1">
                                <div class="alert alert-dark mb-0 p-1">
                                    Ferocity: {{ $dino->ferocity }}
                                </div>
                            </li>
                            <li class="list-group-item py-1">
                                <div class="alert alert-warning mb-0 p-1">
                                    Cost: {{ $dino->cost ?? 'N\A' }}
                                    @if ($dino->cost_type != 'DNA' && $dino->cost_type != 'Loyalty Points')
                                        (<a href="/show/{{ $dino->cost_type }}">{{ $dino->cost_type }}</a>)
                                    @else
                                        {{ ' (' . $dino->cost_type . ')' }}
                                    @endif
                                </div>
                            </li>
                            <li class="list-group-item py-1">
                                <div class="alert alert-info mb-0 p-1">
                                    S-DNA: {{ $dino->sdna ?? 'N\A' }}
                                </div>
                            </li>
                            <li class="list-group-item py-1">
                                <div class="alert alert-info mb-0 p-1 d-flex">
                                    <span class="d-flex flex-column justify-content-center">Stars:</span>
                                    <div id="stars" value="{{ $dino->stars }}"></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#stars').jsRapStar({
                length: {!! $dino->stars !!},
                enabled: false,
                step: true,
                starHeight: 22,
                colorFront: 'yellow'
            });
        });
    </script>
@endsection
