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
                <tr>
                    <form method="GET" action="{{ url()->current() }}">
                        <th>Filter by
                            <input type="hidden" name="type" value="{{ request()->type }}">
                        </th>
                        <th>
                            <select name="class" class="form-select">
                                <option value="">&nbsp;</option>
                                @foreach ($classes as $class)
                                    <option value="{{ $class }}">
                                        {{ $class }}
                                    </option>
                                @endforeach
                            </select>
                        </th>
                        <th>
                            <select name="rank" class="form-select">
                                <option value="">&nbsp;</option>
                                @foreach ($ranks as $rank)
                                    <option value="{{ $rank }}">
                                        {{ $rank }}
                                    </option>
                                @endforeach
                            </select>
                        </th>
                        <th>
                            <select name="breed" class="form-select">
                                <option value="">&nbsp;</option>
                                @foreach ($breeds as $breed)
                                    <option value="{{ $breed }}">
                                        {{ $breed }}
                                    </option>
                                @endforeach
                            </select>
                        </th>
                        <th>
                            <select name="status" class="form-select">
                                <option value="">&nbsp;</option>
                                <option value="0">Locked</option>
                                <option value="1">Unlocked</option>
                            </select>
                        </th>
                        <th>
                            <select name="hybrid" class="form-select">
                                <option value="">&nbsp;</option>
                                <option value="1">Hybridable</option>
                                <option value="0">Non-Hybridable</option>
                            </select>
                        </th>
                        <th></th>
                        <th></th>
                        <th>
                            <button type="submit" class="btn btn-sm btn-secondary">Filter</button>
                        </th>
                    </form>
                </tr>
                @foreach ($data as $dino)
                    <tr>
                        <td>
                            <a href="/show/{{ $dino->name }}">{{ $dino->name }}</a>
                            @if ($dino->status)
                                <i class="fas fa-check-circle text-success" title="Unlocked"></i>
                            @else
                                <i class="fas fa-times-circle text-danger" title="Locked"></i>
                            @endif
                            @if ($dino->max == 40)
                                <i class="fas fa-fire-alt text-danger" title="Maxed"></i>
                            @endif
                            @if ($dino->maxable)
                                <i class="fas fa-fire-alt text-info" title="Maxable"></i>
                            @endif
                            <a class="btn btn-sm btn-outline-secondary float-end" href="/edit/{{ $dino->id }}">
                                <i class="far fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-sm btn-outline-dark"
                                href="/class/{{ $dino->class }}">{{ $dino->class }}</a>
                        </td>
                        <td>
                            <a class="btn btn-sm btn-outline-dark"
                                href="/rank/{{ $dino->rank }}">{{ $dino->rank }}</a>
                        </td>
                        <td>
                            <a class="btn btn-sm btn-outline-dark"
                                href="/breed/{{ $dino->breed }}">{{ $dino->breed }}</a>
                        </td>
                        <td>{{ $dino->hp }}</td>
                        <td>{{ $dino->attack }}</td>
                        <td>{{ $dino->cost ?? 'N\A' }}</td>
                        <td>{{ $dino->ferocity }}</td>
                        <td>
                            @if ($dino->hybrid != null)
                                <a href="/show/{{ $dino->hybrid }}">{{ $dino->hybrid }}</a>
                            @else
                                N\A
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
