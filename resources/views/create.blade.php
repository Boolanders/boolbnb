@extends('layouts.main-layout')
@section('content')

<div class="container">

    <div class="form">

        <form action="{{ route('apt-store') }}" method="post">

            @csrf
            @method ('post')

            <div class="form-group">
                <label for="">title</label>
                <input class="form-control" type="text" name="title">
            </div>

            <div class="form-group">
                <label for="">description</label>
                <input class="form-control" type="text" name="description">
            </div>

            <div class="form-group">
                <label for="">address</label>
                <input class="form-control" type="text" name="address">
            </div>

            <div class="form-group">
                <label for="">room qty</label>
                <input class="form-control" type="text" name="room_qt">
            </div>

            <div class="form-group">
                <label for="">bed qty</label>
                <input class="form-control" type="text" name="bed_qt">
            </div>

            <div class="form-group">
                <label for="">bathroom qty</label>
                <input class="form-control" type="text" name="bathroom_qt">
            </div>

            <div class="form-group">
                <label for="">square meters</label>
                <input class="form-control" type="text" name="mq">
            </div>

            <div>
                <label for="img">Select image:</label>
                <input type="file" id="img" name="img" accept="image/*">
            </div>

            @foreach ($srvs as $srv)
            <div>
                <label for="{{ $srv -> name }}">{{ $srv -> name }}</label>
                <input type="checkbox" name="services[]" value="{{ $srv -> id }}">
            </div>
            @endforeach

            <button class="btn btn-primary" type="submit">Save</button>
        </form>
    </div>
</div>

@endsection