@extends('layouts.main-layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <h1 class="col-md-12">Appartamenti in evidenza</h1>
      @foreach ($apts as $apt)
        <div class="col-md-4">

            <div class="card">
                <div class="card-header">
                {{ $apt -> title }}
                </div>
                <div class="card-body">
                  <img src="http://www.rent-a-realestate.com/si/imagelib/full/default/temp/image_1-3x4.jpg" alt="img">
                </div>
            </div>

        </div>
      @endforeach
    </div>
</div>
@endsection
