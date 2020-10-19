@extends('layouts.main-layout')

@section('content')
<div class="container body">
    <div class="row justify-content-center">
      <h1 class="col-md-12">Appartamenti in evidenza</h1>
      @foreach ($apts as $apt)
        <div class="col-md-4 ">

            <div class="card apartment">
                <div class="card-header">
                {{ $apt -> description }}
                </div>
                <div class="card-body">
                  <img src="https://image.freepik.com/free-vector/two-storey-house_1308-16176.jpg" alt="img">
                </div>
            </div>

        </div>
      @endforeach
    </div>
</div>
@endsection
