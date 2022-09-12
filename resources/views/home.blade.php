@extends('layout')

@section('content')
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    @if (Route::has('login'))
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        @auth
        <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
        @else
        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

        @if (Route::has('register'))
        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
        @endif
        @endauth
    </div>
    @endif

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="justify-center pt-8 sm:justify-start sm:pt-0">
            <h1 class="mb-0">Jurassic World: The Game</h1>
            <h3 class="text-gray-500">Dinosaur Tracker</h3>
        </div>
        <div class="justify-center pt-8 sm:justify-start sm:pt-0">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-header mb-2 text-center">What do you want to view?</h5>
                    <div class="d-flex justify-content-around">
                        <a href="/list?type=land" class="btn btn-primary">Land</a>
                        <a href="/list>type=aquatic" class="btn btn-primary">Aquatic</a>
                        <a href="/list?type=cenozoic" class="btn btn-primary">Cenozoic</a>
                    </div>
                </div>
            </div>
        </div>



        <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
            <p class="text-gray-500">Made by Rifat Hossen Riday</p>
        </div>
    </div>
</div>
@endsection