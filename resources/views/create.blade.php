@extends('layouts.main-layout')
@section('content')

<div class="container create-cont">

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
                <input class="form-control" type="text" name="description">
            </div>

            <div class="form-group">
                <label for="">Address</label>
                <input class="form-control" type="text" name="address">
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

@endsection
