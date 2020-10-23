
@extends('layouts.main-layout')
@section('import') 
<script src="{{ asset('/js/partials/create.js')}} "></script>
@endsection
@section('content')

<div class="container margintop">

    <div id="edit-cont">
        <div class="form">

            <form action="{{ route('apt-update', $apt -> id) }}" enctype="multipart/form-data" method="post" class="form-create-border">
    
                @csrf
                @method ('post')
    
                <div class="form-group">
                    <label for="">Title</label>
                    <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" minlength="3" maxlength="60" required value="{{ $apt -> title }}">
                    <span class="validity text-muted">The title must be 3 - 60 character length</span>
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
    
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" cols="30" rows="10" minlength="3" maxlength="1000" required >{{ $apt -> description }}</textarea>
                    <span class="validity text-muted">The description must be 3 - 1000 character length</span>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
    
                <div class="form-group">
                    <label for="">Address</label>
                    <input class="form-control @error('address') is-invalid @enderror" type="search" id="address-input" name="address" minlength="3" maxlength="230" required value="{{ $apt -> address }}">
                    <span class="address validity text-muted">The address must have minimun 3 characters</span>
                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group d-none">
                    <input id="longitude" class="form-control" type="text" name="longitude" value="{{ $apt -> longitude }}">
                    <input id="latitude" class="form-control" type="text" name="latitude" value="{{ $apt -> latitude }}">
                </div>
    
                <div class="form-group">
                    <label for="">Room Quantity</label>
                    <input class="form-control @error('room_qt') is-invalid @enderror" type="number" name="room_qt" min="1" max="20" required value="{{ $apt -> room_qt }}">
                    <span class="validity text-muted">Accepted range of values: 1 - 20</span>
                    @error('room_qt')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
    
                <div class="form-group">
                    <label for="">Bed Quantity</label>
                    <input class="form-control @error('bed_qt') is-invalid @enderror" type="number" name="bed_qt" min="1" max="50" required value="{{ $apt -> bed_qt }}">
                    <span class="validity text-muted">Accepted range of values: 1 - 50</span>
                    @error('bed_qt')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
    
                <div class="form-group">
                    <label for="">Bathroom Quantity</label>
                    <input class="form-control @error('bathroom_qt') is-invalid @enderror" type="number" name="bathroom_qt" min="1" max="8" required value="{{ $apt -> bathroom_qt }}"> 
                    <span class="validity text-muted">Accepted range of values: 1 - 8</span>
                    @error('bathroom_qt')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
    
                <div class="form-group">
                    <label for="">Square Meters</label>
                    <input class="form-control @error('mq') is-invalid @enderror" type="number" name="mq"  min="15" max="5000" required value="{{ $apt -> mq }}">
                    <span class="validity text-muted">Accepted range of values: 15 - 5000</span>
                    @error('mq')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
    
                <button id="create-submit" class="btn btn-primary btn-save" type="submit">Save</button>
            </form>
        </div>
    </div>
</div>
   

@endsection

