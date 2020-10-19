@extends('layouts.main-layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <h1 class="col-md-12">Appartamenti in evidenza</h1>
      @foreach ($apts as $apt)
        <div class="col-md-2">

            <div class="card">
                <div class="card-header">
                {{ $apt -> description }}
                </div>
                <div class="card-body">
                  <img src="{{ $apt -> image -> img }}" alt="img">
                </div>
            </div>

        </div>
      @endforeach
    </div>
</div>
@endsection
