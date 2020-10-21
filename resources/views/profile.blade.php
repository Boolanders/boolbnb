@extends('layouts.main-layout')
@section('content')
<div id="profile">
    <div class="container">
    
        <div class="row">
            <div class="col-12 text-center p-3">
                <a class="btn btn-primary" href="{{route('apt-create') }}">Add Apartment</a>
            </div>
        </div>
        @foreach ($apts as $apt)
        <div class="media border rounded m-2 p-2 ">
            @if ($apt -> images -> first -> img -> img)

            <img src=" {{ $apt -> images -> first -> img -> img }} " class="mr-3 center-cropped align-self-center" alt="...">

            @else

            <img src=" {{ asset('img/image-not-found.png') }} " class="mr-3 center-cropped align-self-center" alt="...">

            @endif

            <div class="media-body">
              <h3 class="mt-0"> {{ $apt -> title }} </h3>
              <div class="txt">
                  {{ $apt -> description }}
              </div>
            </div>
            <div class="btn-wrapper d-flex flex-column justify-content-around align-items-center">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="VisibilitySwitch1">
                    <label class="custom-control-label" for="visibilitySwitch1">Set Visibility</label>
                </div>
                <div>
                    <button href=" {{ route('apt-edit', $apt -> id) }}" type="button" class="btn btn-primary btn-sm m-1">Edit</button>
                    <button type="button" class="btn btn-danger btn-sm m-1">DELETE</button>
                </div>
            </div>
        </div>
        @endforeach
            
        {{-- <div class="list-group">

            @foreach($apts as $apt)
            
                <div class="list-group-item">

                <a href="{{ route('apt-show', $apt -> id) }}" >{{ $apt -> title}}</a>
                
                <a class="btn btn-sm btn-primary float-right" href="{{ route('apt-edit', $apt -> id) }}">EDIT</a>

                <a class="btn btn-sm btn-danger float-right mr-2" href="{{route('apt-delete', $apt -> id)}}">DELETE</a>

                </div>
        
            @endforeach

        </div> --}}
    </div>
</div>
@endsection

