@extends('layouts.main-layout')
@section('import')
<script src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"></script>
<script src="{{ asset('/js/partials/search.js')}} "></script> 
@endsection
@section('content')

<script id="apt-template" type="text/x-handlebars-template">

    <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
          <div class="col-md-4">
            <img src="public\storage\images12\index.png" class="card-img" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
          </div>
        </div>
    </div>

</script>


<div class="container home margintop">
  <div class="filters">
    <div class="col-md-8 offset-md-2">
        <div class="input-group md-form form-sm form-2 pl-0">
            <input id="search" class="form-control my-0 py-1 red-border" type="search" placeholder="Search" aria-label="Search">
            <div class="d-none">
              <span id="latitude" data-number=""></span>
              <span id="longitude" data-number=""></span>
            </div>
        </div>
    </div>
    <div class="col-md-6 offset-md-3 p-3">
      <h5>Distance</h5>
      <div class="form-group">
        <input type="range" class="form-control-range" id="distance" min="20" max="200" value="20">
        <span class="valueSpan text-primary float-right"></span>
      </div>
    </div>
    <div class="col-md-6 offset-md-3 p-3">
      <h5>Services</h5>
      @foreach ($srvs as $srv)
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="service[]" id="{{ $srv -> name }}" value="{{ $srv -> id}}">
        <label class="form-check-label" for="{{ $srv -> name }}">{{ $srv -> name }}</label>
      </div>     
      @endforeach
    </div>
    <div class="col-md-6 offset-md-3 p-3">
      <h5>Features</h5>
      <form class="form-inline">
        <label class="my-1 mr-2" >Rooms</label>
        <select class="custom-select my-1 mr-sm-2" id="rooms">
          @for ($i = 1; $i < 11; $i++)
            <option value="{{ $i }}">{{ $i }}</option> 
          @endfor
        </select>
        <div class="mx-2"></div>
        <label class="my-1 mr-2" >Beds</label>
        <select class="custom-select my-1 mr-sm-2" id="beds">
          @for ($i = 1; $i < 21; $i++)
            <option value="{{ $i }}">{{ $i }}</option> 
          @endfor
        </select>
      </form>
    </div>
    <button type="button" class="btn btn-primary btn-sm float-right">Search</button>
    

  </div>

    <div id="apt-card" class="row justify-content-center">

        <ul id="apts">

        </ul>

    </div>
</div>

@endsection 