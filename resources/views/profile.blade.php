@extends('layouts.main-layout')
@section('content')
<div class="container">

    <div class="form">

        <a class="btn btn-lg btn-warning btn-block" href="{{route('apt-create') }}">Add Apartment</a>
        
        <div class="list-group">

            @foreach($apts as $apt)
         
                <div class="list-group-item">

                <a href="{{ route('apt-show', $apt -> id) }}" >{{ $apt -> title}}</a>
                
                <a class="btn btn-sm btn-primary float-right" href="{{ route('apt-edit', $apt -> id) }}">EDIT</a>

                <a class="btn btn-sm btn-danger float-right mr-2" href="">DELETE</a>

                </div>


        
            @endforeach


        </div>
    </div>
</div>


@endsection

