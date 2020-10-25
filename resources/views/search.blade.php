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
    <div class="col-md-8 offset-md-2">
        <div class="input-group md-form form-sm form-2 pl-0">
            <input id="search" class="form-control my-0 py-1 red-border" type="search" placeholder="Search" aria-label="Search">
        </div>
    </div>

    <div id="apt-card" class="row justify-content-center">

        <ul id="apts">

        </ul>

    </div>
</div>

@endsection 