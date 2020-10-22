@extends('layouts.main-layout')

@section('import')
<script src='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css' rel='stylesheet' /> 
<script src="{{ asset('/js/partials/map.js')}}"></script>
@endsection

@section('content')
<div class="container">
    <div class="show margintop">


        <h1>{{ $apt -> title }}</h1>
        <h3>{{ $apt -> address }}</h3>
        <div class="col-md-12">
            @if(count($apt -> images))
            <img src="{{ $apt -> images -> first -> img -> img }}" alt="">
            @else
            <img src="{{ asset('img\image-not-found.png') }}" alt="">
            @endif
        </div>

        <div class="row">

            <div class="col-md-4">
                <p> {{ $apt -> description }}</p>
            </div>

            <div class="col-md-4">
                <ul>
                    @foreach ($apt -> services as $srv)

                    <li>{{ $srv -> name }}</li>

                    @endforeach
                </ul>
            </div>

            <div class="col-md-4 ">
                <ul>
                    <li> Numeri di letti: {{ $apt -> bed_qt }} </li>
                    <li> Numeri di Bagni: {{ $apt -> bathroom_qt }} </li>
                    <li> Dimensione Stanza: {{ $apt -> mq }} </li>
                    <li> Numeri di posti: {{ $apt -> room_qt }} </li>
                </ul>
            </div>
        </div>

        <div class="row">

            <div class="col-md-6">

                <div id='map' style='width: 500px; height: 300px;'></div>

            </div>

            <div style="display: none;">
                <span id="lat-secrt" data-number="{{ $apt -> latitude }}"></span>
                <span id="log-secrt" data-number="{{ $apt -> longitude }}"></span>
            </div>

            <div class="col-md-6">
                <div class="message">
                    <form action="">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Email address</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1"
                                placeholder="name@example.com">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Example textarea</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-warning" href="">Send</button>
                    </form>
                </div>
            </div>
        </div>

        <a class="btn btn-secondary float-right" href="{{ route('profile', Auth::user() -> id) }}">Go Back</a>

    </div>
</div>

@endsection





