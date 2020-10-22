@extends('layouts.main-layout')
@section('import') 
<script src="{{ asset('/js/partials/create.js')}} "></script>
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
                    <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" value="{{ old('title') }}">
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
    
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" cols="30" rows="10" >{{ old('description') }}</textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
    
                <div class="form-group">
                    <label for="">Address</label>
                    <input class="form-control @error('address') is-invalid @enderror" type="search" id="address-input" name="address" value="{{ old('address')}}">
                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group d-none">
                    <input id="longitude" class="form-control" type="text" name="longitude" value="{{ old('longitude')}}">
                    <input id="latitude" class="form-control" type="text" name="latitude" value="{{ old('latitude')}}">
                </div>
    
                <div class="form-group">
                    <label for="">Room Quantity</label>
                    <input class="form-control @error('room_qt') is-invalid @enderror" type="text" name="room_qt" value="{{ old('room_qt') }}">
                    @error('room_qt')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
    
                <div class="form-group">
                    <label for="">Bed Quantity</label>
                    <input class="form-control @error('bed_qt') is-invalid @enderror" type="text" name="bed_qt" value="{{ old('bed_qt') }}">
                    @error('bed_qt')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
    
                <div class="form-group">
                    <label for="">Bathroom Quantity</label>
                    <input class="form-control @error('bathroom_qt') is-invalid @enderror" type="text" name="bathroom_qt" value="{{ old('bathroom_qt') }}">
                    @error('bathroom_qt')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
    
                <div class="form-group">
                    <label for="">Square Meters</label>
                    <input class="form-control @error('mq') is-invalid @enderror" type="text" name="mq" value="{{ old('mq') }}">
                    @error('mq')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
    
                <div>
                    <label for="img">Select Image:</label>
                    <input class="@error('img') is-invalid @enderror @error('img.*') is-invalid @enderror" type="file" name="img[]" accept="image/*" multiple>
                    @error('img')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    @error('img.*')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
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
