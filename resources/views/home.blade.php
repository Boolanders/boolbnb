@extends('layouts.main-layout')
@section('import')
<script src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"></script>
<script src="{{ asset('/js/partials/autocomplete.js')}} "></script>
@endsection
@section('content')
<div class="container home margintop">
    <div class="row justify-content-center">
        <div class="col-12">

            <form class="row justify-content-center align-items-center" action="{{ route('to-search') }}" method="POST">
                @csrf
                @method('POST')
                <div class="col-md-8">
                    <div class="input-group md-form form-sm form-2 pl-0">
                        <input id="search-address-input" name="address" class="form-control my-0 py-1 red-border rounded-pill" type="search" placeholder="Search" aria-label="Search" required min="3">
                        <div class="d-none">
                           <input id="latitude" name="lat" type="text">
                           <input id="longitude" name="lon" type="text">
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <button type="submit"class="btn btn-warning font-weight-bold rounded-pill">Search</button>
                </div>
            </form>
        </div>
        <h1 class="col-md-12 mt-5">Appartamenti in evidenza</h1>
        @foreach ($apts as $apt)
        <div class="col-xs-6 col-md-4">
            <a class="home-card" href=" {{ route('apt-show', $apt -> id) }} ">
                <div class="card">
                    <div class="hovereffect">

                        <img src="{{ $apt['img'] }}"
                        class="mr-3 center-cropped align-self-center image-responsive" alt="show">

                        <div class="overlay rounded">
                           <h2>{{ $apt -> title }}</h2>
                           <a class="info" href="{{ route('apt-show', $apt -> id) }}">
                            link here <br>
                            {{ $apt -> description }}
                           </a>
                        </div>
                    </div>
                </div>
            </a>

        </div>
        @endforeach
    </div>
</div>
@endsection
{{--
a questo link ci sono diversi effetti carini tra cui scegliere
https://miketricking.github.io/bootstrap-image-hover/ --}}
