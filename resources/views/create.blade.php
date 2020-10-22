@extends('layouts.main-layout')
@section('import')
<script src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"></script>  
<script src="{{ asset('/js/partials/autocomplete.js')}} "></script>
@endsection
@section('content')

<div class="container margintop">

    <div id="create-cont">
        <div class="form">

            <form action="{{ route('apt-store') }}" enctype="multipart/form-data" method="post" class="form-create-border">
    
                @csrf
                @method ('post')
    
                <div class="form-group">
                    <label for="">Title</label>
                    <input class="form-control" type="text" name="title">
                </div>
    
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea class="form-control" name="description"cols="30" rows="10"></textarea>
                </div>
    
                <div class="form-group">
                    <label for="">Address</label>
                    <input class="form-control" type="search" id="address-input" name="address">
                </div>

                <div class="form-group">
                    <label for="">Longitude</label>
                    <input id="longitude" class="form-control" type="text" name="longitude" value="longitude">
                </div>

                <div class="form-group">
                    <label for="">Latitude</label>
                    <input id="latitude" class="form-control" type="text" name="latitude" value="latitude">
                </div>
    
                <div class="form-group">
                    <label for="">Room Quantity</label>
                    <input class="form-control" type="text" name="room_qt">
                </div>
    
                <div class="form-group">
                    <label for="">Bed Quantity</label>
                    <input class="form-control" type="text" name="bed_qt">
                </div>
    
                <div class="form-group">
                    <label for="">Bathroom Quantity</label>
                    <input class="form-control" type="text" name="bathroom_qt">
                </div>
    
                <div class="form-group">
                    <label for="">Square Meters</label>
                    <input class="form-control" type="text" name="mq">
                </div>
    
                <div>
                    <label for="img">Select Image:</label>
                    <input type="file" id="img" name="img" accept="image/*">
                </div>
    
                @foreach ($srvs as $srv)
                <div>
                    <label for="{{ $srv -> name }}">{{ $srv -> name }}</label>
                    <input type="checkbox" name="services[]" value="{{ $srv -> id }}">
                </div>
                @endforeach
    
                <button class="btn btn-primary btn-save" type="submit">Save</button>
            </form>
        </div>
    </div>
</div>
   

@endsection
