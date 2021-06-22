@extends('layout')

@section('content')
    <div class="container">
        <h1 class="text-center">Land creatures</h1>
        <div class="table-responsive">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Class</th>
                        <th scope="col">Rank</th>
                        <th scope="col">Breed</th>
                        <th scope="col">HP</th>
                        <th scope="col">Attack</th>
                        <th scope="col">Ferocity</th>
                    </tr>
                </thead>
                @foreach ($lands as $land)
                    <tr>
                        <td>{{ $land->name }}</td>
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
                        <td>{{ $land->ferocity }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
