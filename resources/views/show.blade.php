@extends('layouts.main-layout')

@section('import')
<script src='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css' rel='stylesheet' /> 
@endsection

@section('content')
<div class="container">
    <div class="show margintop">


        <h1>{{ $apt -> title }}</h1>
        <h3>{{ $apt -> address }}</h3>
        <div class="col-md-12">
            <img src="{{ $apt -> images -> first -> img -> img }}" alt="">
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

            <div class="col-md-6">
                <div class="message">
                    <form>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Email address</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1"
                                placeholder="name@example.com">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Example textarea</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <a class="btn btn-secondary float-right" href="{{ route('profile', Auth::user() -> id) }}">Go Back</a>

    </div>
</div>

@endsection





