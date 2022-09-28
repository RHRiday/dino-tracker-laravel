@extends('layout')

@section('content')
    <div class="container">
        <div class="row justify-center">
            <div class="card border-dark mb-3 col-xl-7 col-lg-9 mt-3">
                <div class="card-header h4">Edit Dinosaur</div>
                <div class="card-body text-dark">
                    <form class="row g-3" action="/edit/{{ $dino->id }}" method="POST">
                        @csrf
                        <div class="col-md-4">
                            <label for="type" class="form-label">Creature Type</label>
                            <select id="type" name="type" class="form-select" aria-label="Default select example">
                                @foreach ($types as $type)
                                    <option value="{{ $type }}" {{ $dino->type == $type ? 'selected' : '' }}>
                                        {{ $type }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-8">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="name"
                                value="{{ $dino->name ?? old('name') }}" required>
                        </div>
                        <div class="col-4">
                            <label for="class" class="form-label">Class</label>
                            <select id="class" name="class" class="form-select" aria-label="Default select example">
                                @foreach ($classes as $class)
                                    <option value="{{ $class }}" {{ $dino->class == $class ? 'selected' : '' }}>
                                        {{ $class }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="rank" class="form-label">Rank</label>
                            <select id="rank" name="rank" class="form-select" aria-label="Default select example">
                                @foreach ($ranks as $rank)
                                    <option value="{{ $rank }}" {{ $dino->rank == $rank ? 'selected' : '' }}>
                                        {{ $rank }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="breed" class="form-label">Breed</label>
                            <select id="breed" name="breed" class="form-select" aria-label="Default select example">
                                @foreach ($breeds as $breed)
                                    <option value="{{ $breed }}" {{ $dino->breed == $breed ? 'selected' : '' }}>
                                        {{ $breed }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <label for="hp" class="form-label">HP</label>
                            <input type="number" name="hp" class="form-control" id="hp"
                                value="{{ $dino->hp ?? old('hp') }}" required>
                        </div>
                        <div class="col-3">
                            <label for="attack" class="form-label">Attack</label>
                            <input type="number" name="attack" class="form-control" id="attack"
                                value="{{ $dino->attack ?? old('attack') }}" required>
                        </div>
                        <div class="col-3">
                            <label for="dna" class="form-label">DNA cost</label>
                            <input type="number" name="dna" class="form-control" id="dna"
                                value="{{ $dino->cost ?? old('dna') }}">
                        </div>
                        <div class="col-3">
                            <label for="cost_type" class="form-label">Cost Type</label>
                            <input type="text" name="cost_type" class="form-control" id="cost_type"
                                value="{{ $dino->cost_type ?? old('cost_type') }}">
                        </div>
                        <div class="col-4">
                            <label for="" class="col-auto col-form-label">Hybrid Species 01</label>
                            <select class="hybrid form-control" name="f1">
                                <option value="">&nbsp;</option>
                                @forelse ($species as $item)
                                    <option value="{{ $item->name }}" {{ $dino->sp_1 == $item->name ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                @empty
                                    {{ __('nothing') }}
                                @endforelse
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="" class="col-auto col-form-label">Hybrid Species 02</label>
                            <select class="hybrid form-control" name="f2">
                                <option value="{{ $dino->sp_2 ?? '' }}">{{ $dino->sp_2 ?? '' }}&nbsp;</option>
                                @forelse ($species as $item)
                                    <option value="{{ $item->name }}" {{ $dino->sp_2 == $item->name ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                @empty
                                    {{ __('nothing') }}
                                @endforelse
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="" class="col-auto col-form-label">Available Hybrid</label>
                            <select class="hybrid form-control" name="hybrid">
                                <option value="">&nbsp;</option>
                                @forelse ($species->whereIn('breed', ['Hybrid', 'Super Hybrid']) as $item)
                                    <option value="{{ $item->name }}" {{ $dino->hybrid == $item->name ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                @empty
                                    {{ __('nothing') }}
                                @endforelse
                            </select>
                        </div>
                        <div class="col-2 card p-2">
                            <label class="form-label">Status</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="status" name="status"
                                    {{ $dino->status ? 'checked' : '' }}>
                                <label class="form-check-label" for="status"></label>
                            </div>
                        </div>
                        <div class="col-2">
                            <label for="max" class="form-label">Max Level</label>
                            <input type="number" name="max" class="form-control" id="max"
                                value="{{ $dino->max ?? old('max') }}">
                        </div>
                        <div class="col-2">
                            <label for="stars" class="form-label">Stars</label>
                            <input type="number" step="any" name="stars" class="form-control" id="stars"
                                value="{{ $dino->stars ?? old('stars') }}">
                        </div>
                        <div class="col-6">
                            <label for="card" class="form-label">Card URL</label>
                            <input type="text" name="card" class="form-control" id="card"
                                value="{{ $dino->card ?? old('card') }}">
                        </div>
                        <div class="col-3">
                            <label for="sdna" class="form-label">Available S-DNA</label>
                            <input type="number" step="1" name="sdna" class="form-control" id="sdna"
                                value="{{ $dino->sdna ?? old('sdna') }}">
                        </div>
                        <div class="col-3">
                            <label for="shop" class="form-label">In Shop/Stage 1</label>
                            <input type="number" step="1" name="shop" class="form-control" id="shop"
                                value="{{ $dino->shop ?? old('shop') }}">
                        </div>
                        <div class="col-3">
                            <label for="s2" class="form-label">Stage 2</label>
                            <input type="number" step="1" name="s2" class="form-control" id="s2"
                                value="{{ $dino->s2 ?? old('s2') }}">
                        </div>
                        <div class="col-3">
                            <label for="s3" class="form-label">Stage 3</label>
                            <input type="number" step="1" name="s3" class="form-control" id="s3"
                                value="{{ $dino->s3 ?? old('s3') }}">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        let status = ['Locked', 'Unlocked'];
        let i = {{ $dino->status }};
        $('label[for=status]').text(status[i]);
        $('#status').on('change', function() {
            i = Number(!i);
            $('label[for=status]').text(status[i]);
        })
    </script>
@endsection
