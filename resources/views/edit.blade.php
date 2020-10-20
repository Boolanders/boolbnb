@extends('layouts.main-layout')
@section('content')

<div class="container">

    <div class="form">

        <form action="{{ route('apt-update', $apt -> id) }}" method="post">

            @csrf
            @method ('post')

            <div class="form-group">
                <label for="">title</label>
                <input class="form-control" type="text" name="title" value="{{ $apt -> title }}">
            </div>

            <div class="form-group">
                <label for="">description</label>
                <input class="form-control" type="text" name="description" value="{{ $apt -> description }}">
            </div>

            <div class="form-group">
                <label for="">address</label>
                <input class="form-control" type="text" name="address" value="{{ $apt -> address }}">
            </div>

            <div class="form-group">
                <label for="">room qty</label>
                <input class="form-control" type="text" name="room_qt" value="{{ $apt -> room_qt }}">
            </div>

            <div class="form-group">
                <label for="">bed qty</label>
                <input class="form-control" type="text" name="bed_qt" value="{{ $apt -> bed_qt }}">
            </div>

            <div class="form-group">
                <label for="">bathroom qty</label>
                <input class="form-control" type="text" name="bathroom_qt" value="{{ $apt -> bathroom_qt }}">
            </div>

            <div class="form-group">
                <label for="">square meters</label>
                <input class="form-control" type="text" name="mq" value="{{ $apt -> mq }}">
            </div>

            <button class="btn btn-primary" type="submit">Save</button>
        </form>
    </div>
</div>

@endsection