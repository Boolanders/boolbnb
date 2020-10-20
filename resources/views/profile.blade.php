@extends('layouts.main-layout')
@section('content')
<div class="container">

    <div class="form">

        <a class="btn btn-lg btn-warning btn-block" href="{{route('apt-create') }}">Add Apartment</a>
        
        <div class="list-group">

            @foreach($apts as $apt)
         
                <a href="{{ route('apt-show', $apt -> id) }}" class="list-group-item">{{ $apt -> title}}</a>
        
            @endforeach
        
        </div>
    </div>
</div>

@endsection

