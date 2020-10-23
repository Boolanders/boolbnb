{{-- @extends('layouts.main-layout')
@section('import')

@endsection
@section('content')
<div class="container home margintop">
    <div class="row justify-content-center">
        <h1 class="col-md-12">Appartamenti in evidenza</h1>
        @foreach ($apts as $apt)
        <div class="col-xs-6 col-md-4">
            <a class="home-card" href=" {{ route('apt-show', $apt -> id) }} ">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mt-0 mr-2"> {{ $apt -> title }} </h3>
                    </div>
                    <div class="card-body">
                        @if (($apt -> images))
                        <a href="{{ route('apt-show', $apt -> id) }}">
                            <img src=" {{ $apt -> images -> first -> img -> img }} "
                                class="mr-3 center-cropped align-self-center" alt="show">
                        </a>
                        @else

                        <img src=" {{ asset('img/image-not-found.png') }} "
                            class="mr-3 center-cropped align-self-center" alt="show">

                        @endif
                    </div>
                </div>
            </a>

        </div>
        @endforeach
    </div>
</div>
@endsection  --}}


@extends('layouts.main-layout')
@section('import')
<script src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"></script>  
<script src="{{ asset('/js/partials/autocomplete.js')}} "></script>
@endsection
@section('content')
<div class="container home margintop">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="input-group md-form form-sm form-2 pl-0">
                <input id="search-address-input" class="form-control my-0 py-1 red-border" type="search" placeholder="Search" aria-label="Search">
                <a type="submit" href="{{ route('get-all') }}">Search</a>
            </div>
        </div>
        <h1 class="col-md-12">Appartamenti in evidenza</h1>
        @foreach ($apts as $apt)
        <div class="col-xs-6 col-md-4">
            <a class="home-card" href=" {{ route('apt-show', $apt -> id) }} ">
                <div class="card">
                    <div class="hovereffect">
                        @if (($apt -> images))

                        <img src="{{ $apt -> images -> first -> img -> img }}"
                        class="mr-3 center-cropped align-self-center image-responsive" alt="show">

                        @else

                        <img src=" {{ asset('img/image-not-found.png') }} "
                            class="mr-3 center-cropped align-self-center" alt="show">
                    
                        @endif

                        <div class="overlay">
                           <h2>{{ $apt -> title }}</h2>
                           <a class="info" href="{{ route('apt-show', $apt -> id) }}">link here</a>
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


