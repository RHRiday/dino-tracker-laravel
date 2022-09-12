@extends('layout')

@section('content')
    <div class="container">
        <h1 class="text-center">{{ ucfirst(request()->get('type')) }} creatures</h1>
        <div class="table-responsive">
            <table class="table text-sm font-monospace" id="list">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Class</th>
                        <th scope="col">Rank</th>
                        <th scope="col">Breed</th>
                        <th scope="col">HP</th>
                        <th scope="col">Attack</th>
                        <th scope="col">DNA Cost</th>
                        <th scope="col">Ferocity</th>
                        <th scope="col">Hybrid</th>
                    </tr>
                </thead>
                @foreach ($lands as $land)
                    <tr>
                        <td>
                            <a href="/show/{{ $land->name }}">{{ $land->name }}</a>
                            <a class="btn btn-sm btn-outline-secondary" href="/edit/{{ $land->id }}">
                                <i class="far fa-edit"></i>    
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-sm btn-outline-dark" href="/class/{{ $land->class }}">{{ $land->class }}</a>
                        </td>
                        <td>
                            <a class="btn btn-sm btn-outline-dark" href="/rank/{{ $land->rank }}">{{ $land->rank }}</a>
                        </td>
                        <td>
                            <a class="btn btn-sm btn-outline-dark" href="/breed/{{ $land->breed }}">{{ $land->breed }}</a>
                        </td>
                        <td>{{ $land->hp }}</td>
                        <td>{{ $land->attack }}</td>
                        <td>{{ $land->cost ?? 'N\A' }}</td>
                        <td>{{ $land->ferocity }}</td>
                        <td>{{ $land->hybrid ?? 'N\A' }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
