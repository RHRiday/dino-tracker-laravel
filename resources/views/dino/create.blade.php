@extends('layout')

@section('content')
    <div class="container">
        <div class="row justify-center">
            <div class="card border-dark mb-3 col-xl-7 col-lg-9 mt-3">
                <div class="card-header h4">Add Dinosaur</div>
                <div class="card-body text-dark">
                    <form class="row g-3" action="/create" method="POST">
                        @csrf
                        <div class="col-md-4">
                            <label for="type" class="form-label"> Creature Type</label>
                            <select id="type" name="type" class="form-select" aria-label="Default select example">
                                <option selected value="Land">Land</option>
                                <option value="Aquatic">Aquatic</option>
                                <option value="Cenozoic">Cenozoic</option>
                            </select>
                        </div>
                        <div class="col-md-8">
                            <label for="name" class="form-label">Name
                                <small class="text-danger name-taken" hidden>Already entered!</small>
                            </label>
                            <input type="text" name="name" class="form-control" id="name" required>
                        </div>
                        <div class="col-4">
                            <label for="class" class="form-label">Class</label>
                            <select id="class" name="class" class="form-select" aria-label="Default select example">
                                <option selected value="Herbivores">Herbivores</option>
                                <option value="Carnivores">Carnivores</option>
                                <option value="Pterosaurs">Pterosaurs</option>
                                <option value="Amphibians">Amphibians</option>
                                <option value="Caves">Caves</option>
                                <option value="Reefs">Reefs</option>
                                <option value="Surfaces">Surfaces</option>
                                <option value="Caverns">Caverns</option>
                                <option value="Savannahs">Savannahs</option>
                                <option value="Snows">Snows</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="rank" class="form-label">Rank</label>
                            <select id="rank" name="rank" class="form-select" aria-label="Default select example">
                                <option selected value="Common">Common</option>
                                <option value="Rare">Rare</option>
                                <option value="Super Rare">Super Rare</option>
                                <option value="Legendary">Legendary</option>
                                <option value="Limited Edition">Limited Edition</option>
                                <option value="VIP">VIP</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="breed" class="form-label">Breed</label>
                            <select id="breed" name="breed" class="form-select" aria-label="Default select example">
                                <option selected value="General">General</option>
                                <option value="Hybrid">Hybrid</option>
                                <option value="Super Hybrid">Super Hybrid</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="hp" class="form-label">HP</label>
                            <input type="number" name="hp" class="form-control" id="hp" required>
                        </div>
                        <div class="col-4">
                            <label for="attack" class="form-label">Attack</label>
                            <input type="number" name="attack" class="form-control" id="attack" required>
                        </div>
                        <div class="col-4">
                            <label for="dna" class="form-label">DNA cost</label>
                            <input type="number" name="dna" class="form-control" id="dna">
                        </div>
                        <div class="col-4">
                            <label for="" class="col-auto col-form-label">Hybrid Species 01</label>
                            <select class="hybrid form-control" name="f1">
                                <option value="">&nbsp;</option>
                                @forelse ($species as $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @empty
                                    {{ __('nothing') }}
                                @endforelse
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="" class="col-auto col-form-label">Hybrid Species 02</label>
                            <select class="hybrid form-control" name="f2">
                                <option value="">&nbsp;</option>
                                @forelse ($species as $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
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
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @empty
                                    {{ __('nothing') }}
                                @endforelse
                            </select>
                        </div>
                        <div class="col-2 card p-2">
                            <label class="form-label">Status</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="status" name="status">
                                <label class="form-check-label" for="status">Locked</label>
                            </div>
                        </div>
                        <div class="col-2">
                            <label for="max" class="form-label">Max Level</label>
                            <input type="number" name="max" class="form-control" id="max">
                        </div>
                        <div class="col-3">
                            <label for="total" class="form-label">Total Collected</label>
                            <input type="number" name="total" class="form-control" id="total">
                        </div>
                        <div class="col-5">
                            <label for="card" class="form-label">Card URL</label>
                            <input type="text" name="card" class="form-control" id="card">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        @php
            $array = [];
            foreach ($species as $item) {
                array_push($array, $item->name);
            }
        @endphp
        $('#name').on('input', function() {
            let arr = @json($array);
            if (arr.includes(this.value)) {
                $('.name-taken').prop('hidden', false);
                $('form button[type=submit]').prop('disabled', true);
            } else {
                $('.name-taken').prop('hidden', true);
                $('form button[type=submit]').prop('disabled', false);
            }
        });
        let status = ['Locked', 'Unlocked'];
        let i = 0;
        $('label[for=status]').text(status[i]);
        $('#status').on('change', function() {
            i = Number(!i);
            $('label[for=status]').text(status[i]);
        })
    </script>
@endsection
