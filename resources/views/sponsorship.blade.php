@extends('layouts.main-layout')

@section('content')
    <div class="container margintop">
        <section class="pricing py-5">
            <div class="container">
                <h1></h1>
              <div class="row">
                @foreach($promos as $promo)
                <form action="{{ route('apt-sponsorship', $promo -> id) }}" enctype="multipart/form-data" method="post" class="col-lg-4">
                      <div class="card">
                    <div class="card-body">
                      <h5 class="card-title text-muted text-uppercase text-center">{{$promo -> hours}}h Users</h5>
                      <h6 class="card-price text-center">${{$promo -> price}}<span class="period"></span></h6>
                      <hr>
                      <ul class="fa-ul">
                        <li><span class="fa-li"><i class="fas fa-check"></i></span>Always First Results</li>
                        <li><span class="fa-li"><i class="fas fa-check"></i></span>Guaranteed Visibility</li>
                      </ul>
                      <button href="#" class="btn btn-block btn-primary text-uppercase" type="submit">Buy</button>
                    </div>
                  </div>
                </form>
                @endforeach
              </div>
            </div>
        </section>
        <a class="btn btn-secondary float-right" href="{{ URL::previous() }}">Go Back</a>
    </div>
@endsection