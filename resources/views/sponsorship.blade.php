@extends('layouts.main-layout')

@section('import')
<script src="https://js.braintreegateway.com/web/dropin/1.8.1/js/dropin.min.js"></script>
@endsection

@section('content')
<div class="container margintop">
    <section class="pricing py-5">
        <div class="container">
            <h1></h1>
            <div class="row">
                @foreach($promos as $promo)
                <form action="{{ route('apt-promo', $promo -> id) }}" enctype="multipart/form-data" method="post"
                    class="col-lg-4">
                    @csrf
                    @method('post')
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-muted text-uppercase text-center">{{$promo -> hours}}h Users</h5>
                            <h6 class="card-price text-center">${{$promo -> price}}<span class="period"></span></h6>
                            <hr>
                            <ul class="fa-ul">
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Always First Results</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Guaranteed Visibility</li>
                            </ul>
                            <button href="#" class="btn btn-block btn-primary text-uppercase">Buy</button>
                        </div>
                    </div>
                    <div id="dropin-container" style="margin-top:20px;"></div>
                    <a class="btn btn-primary" id="submit-button">Request payment method</a>
                    <button id="compra" type="submit" class="btn btn-success d-none">Paga</button>
                </form>
                @endforeach

            </div>
        </div>
    </section>
    <a class="btn btn-secondary float-right" href="{{ URL::previous() }}">Go Back</a>
</div>




<script type="text/javascript">
    braintree.dropin.create({
        authorization: "{{ Braintree\ClientToken::generate() }}",
        container: '#dropin-container'
    }, function (createErr, instance) {
        var button = document.querySelector('#submit-button');
        button.addEventListener('click', function () {
            instance.requestPaymentMethod(function (err, payload) {
                if (typeof (payload) != "undefined") {
                    var element = document.getElementById("compra");
                    element.classList.add("d-block");
                    var element2 = document.getElementById("submit-button");
                    element2.classList.add("d-none");
                    console.log(payload);
                }
            });
        });
    });
</script>
@endsection