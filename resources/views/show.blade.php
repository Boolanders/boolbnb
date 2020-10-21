@extends('layouts.main-layout')
@section('content')
<div class="container">
    <div class="show margintop">

      <a class="btn btn-secondary" href="{{ route('profile', Auth::user() -> id) }}">Go Back</a>

            <h1>{{ $apt -> title }}</h1>
            <h3>{{ $apt -> address }}</h3>
            <div>
                <img src="{{ $apt -> images -> first -> img -> img }}" alt="">
            </div>
            
            <div class="col-md-8">
              <p> {{ $apt -> description }}</p>
            </div>

            <div class="col-md-4">
              <ul>
                <li> Numeri di letti: {{ $apt -> bed_qt }} </li>
                <li> Numeri di Bagni: {{ $apt -> bathroom_qt }} </li>
                <li> Dimensione Stanza: {{ $apt -> mq }} </li>
                <li> Numeri di posti: {{ $apt -> room_qt }} </li>
              </ul>
            </div>

            <div class="col-md-6">
              <div class="map">
              </div>
            </div>

            <div class="col-md-6">
              <div class="message">
                <input type="text" name="" value="">
                <input type="textarea" name="" value="">
              </div>
            </div>
           
          
    </div>
</div>
@endsection