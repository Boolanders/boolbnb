@extends('layouts.main-layout')
@section('import')
    
@endsection
@section('content')
<div class="container home margintop">
    <div class="row justify-content-center">
      <h1 class="col-md-12">Appartamenti in evidenza</h1>
      @foreach ($apts as $apt)
        <div class="col-xs-6 col-md-4">
            <div class="card">
                <div class="card-header">
                  <a href=" {{ route('apt-show', $apt -> id) }} ">
                      <h3 class="mt-0 mr-2"> {{ $apt -> title }} </h3>
                  </a>
                </div>
                <div class="card-body">
                  @if (($apt -> images))
                  <a href="{{ route('apt-show', $apt -> id) }}">
                      <img src=" {{ $apt -> images -> first -> img -> img }} " class="mr-3 center-cropped align-self-center" alt="show">
                  </a>
                  @else

                  <img src=" {{ asset('img/image-not-found.png') }} " class="mr-3 center-cropped align-self-center" alt="show">

                  @endif
                </div>
            </div>

        </div>
      @endforeach
    </div>
</div>
@endsection


