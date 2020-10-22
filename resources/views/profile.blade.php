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
                @if (count($apt -> images))
                <a href="{{ route('apt-show', $apt -> id) }}">
                    <img src=" {{ $apt -> images -> first -> img -> img }} " class="mr-3 center-cropped align-self-center" alt="show">
                </a>
                @else

                <img src=" {{ asset('img/image-not-found.png') }} " class="mr-3 center-cropped align-self-center" alt="show">

                @endif

            <div class="media-body">
                <a href=" {{ route('apt-show', $apt -> id) }} ">
                    <h3 class="mt-0 mr-2"> {{ $apt -> title }} </h3>
                </a>
                <div class="txt mr-2">
                      {{ $apt -> description }}
                </div>
            </div>
            
            <div class="btn-wrapper d-flex flex-column justify-content-around align-items-center">

                <div class="custom-control custom-switch">
                    <form action=" {{ route('apt-update', $apt -> id)}} " method="POST">

                        @csrf
                        @method('POST')
                        <input 
    
                        @if ($apt -> visible)
                            checked
                        @endif
                        type="checkbox" class="custom-control-input visibilitySwitch"
                        id="visibilitySwitch{{ $apt -> id }}" >
                        <input class="hidden-data-keeper" type="number" name="visible" style="display: none;">
                        <label class="custom-control-label" for="visibilitySwitch{{ $apt -> id }}">Set Visibility</label>

                    </form>
                </div>
                <div>
                    <a href=" {{ route('apt-edit', $apt -> id) }}" class="btn btn-primary btn-sm m-1 btn-link">Edit</a>
                    <button type="button" data-id="{{ $apt -> id }}" data-title=" {{ $apt -> title }} " data-toggle="modal" data-target="#deleteModal" class="delete-btn btn btn-danger btn-sm m-1">DELETE</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
  <!-- Modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header border-bottom-0">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to permanently delete apartment <strong><span id="apt-title"></span></strong>?</p>
        </div>
        <div class="modal-footer border-top-0">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
          <a type="button" id="confirm-delete-btn" class="btn btn-danger">DELETE</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

