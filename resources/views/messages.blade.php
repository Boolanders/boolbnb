@extends('layouts.main-layout')

@section('content')
<div id="messages ">
    <div class="container margintop">
        @foreach( $apts as $apt)
            @foreach ($apt -> messages as $msg)
                <div class="row media border rounded m-2 p-2 rounded">
                    <div class="col-md-3">
                        <label>email: </label>
                    <h5>{{ $msg -> email }}</h5>
                    </div>

                    <div class="col-md-7">
                        <label>message: </label>
                        <h5>{{ $msg -> message }}</h5>
                    </div>

                    <div class="col-md-2">
                        <label>apartment: </label> <br>
                        <a href=" {{ route('apt-show', $apt -> id) }} " class="mt-0 mr-2">{{ $apt -> title }}</a>
                    </div>
                </div>


            @endforeach
        @endforeach
  </div>
</div>
@endsection
