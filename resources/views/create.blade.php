@extends('layout')

@section('content')
    <div class="container">
        <div class="row justify-center">
            <div class="card border-dark mb-3 col-lg-6 mt-3">
                <div class="card-header h4">Add Dinosaur</div>
                <div class="card-body text-dark">
                    <form class="row g-3" action="/create" method="POST">
                        @csrf
                        <div class="col-md-4">
                            <label for="type" class="form-label"> Creature Type</label>
                            <select id="type" name="type" class="form-select" aria-label="Default select example">
                                <option selected value="land">Land</option>
                                <option value="aquatic">Aquatic</option>
                                <option value="cenozoic">Cenozoic</option>
                            </select>
                        </div>
                        <div class="col-md-8">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="name" required>
                        </div>
                        <div class="col-4">
                            <label for="class" class="form-label">Class</label>
                            <select id="class" name="class" class="form-select" aria-label="Default select example">
                                <option selected value="Herbivores">Herbivores</option>
                                <option value="Carnivores">Carnivores</option>
                                <option value="Pterosaurs">Pterosaurs</option>
                                <option value="Amphibians">Amphibians</option>
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
                            <input type="number" name="dna" class="form-control" id="dna" required>
                        </div>
                        <div class="p-2">
                          <div class="col-5 card p-2 float-start">
                              <label class="form-label">Status</label>
                              <div class="form-check">
                                  <input class="form-check-input" type="radio" value="Locked" name="status" id="st-lo"
                                      checked>
                                  <label class="form-check-label" for="st-lo">Locked</label>
                              </div>
                              <div class="form-check">
                                  <input class="form-check-input" type="radio" value="Unlocked" name="status" id="st-ul">
                                  <label class="form-check-label" for="st-ul">Unlocked</label>
                              </div>
                          </div>
                          <div class="col-5 card p-2 float-end">
                              <label class="form-label">Maxed?</label>
                              <div class="form-check">
                                  <input class="form-check-input" type="radio" value="no" name="max" id="max-n" checked>
                                  <label class="form-check-label" for="max-n">No</label>
                              </div>
                              <div class="form-check">
                                  <input class="form-check-input" type="radio" value="yes" name="max" id="max-y">
                                  <label class="form-check-label" for="max-y">Yes</label>
                              </div>
                          </div>
                        </div>
                        <div class="col-12">
                            <input type="submit" name="createDino" class="btn btn-primary" value="Add">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
