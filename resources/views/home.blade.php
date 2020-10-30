@extends('layouts.main-layout')
@section('import')
<script src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"></script>
<script src="{{ asset('/js/partials/autocomplete.js')}} "></script>
@endsection

@section('content')

<div class="home margintop">
    <section id="hero">
        <div class="hero-container">
          <h1>Welcome to BoolBnB</h1>
          <h2>Please, give credit to the back-end developers!</h2>
          <form class="row justify-content-center align-items-center" action="{{ route('to-search') }}" method="POST">
            @csrf
            @method('POST')
            <div class="col-sm-8 col-md-10">
                <div class="input-group md-form form-sm form-2 pl-0">
                    <input id="search-address-input" name="address" class="form-control my-0 py-1 red-border rounded-pill" type="search" placeholder="Search" aria-label="Search" required min="3">
                    <div class="d-none">
                       <input id="latitude" name="lat" type="text">
                       <input id="longitude" name="lon" type="text">
                    </div>
                </div>
            </div>
            <div class="col-sm-2">
                <button type="submit"class="btn btn-warning font-weight-bold rounded-pill">Search</button>
            </div>
        </form>
          
        </div>
      </section><!-- #hero -->
      <div class="container">
        <div class="row justify-content-center">
            <h1 class="col-md-12 mt-5">Appartamenti in evidenza</h1>
            @foreach ($apts as $apt)
            <div class="col-xs-12 col-md-4">
            <a href="{{ route('apt-show', $apt -> id) }}">
                <div class="card color">
                  <img class="card-img-top rounded" src="{{ $apt['img'] }}" alt="">
                  <div class="card-img-overlay">
                    <h4 class="card-title">{{ $apt -> title }}</h4>
                    <p class="card-text">{{ $apt -> description }}</p>
                  </div>
                </div>
            </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
    
@endsection
{{--
a questo link ci sono diversi effetti carini tra cui scegliere
https://miketricking.github.io/bootstrap-image-hover/ --}}
