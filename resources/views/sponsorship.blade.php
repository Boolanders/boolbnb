@extends('layouts.main-layout')

@section('import')
<script src="https://js.braintreegateway.com/web/dropin/1.8.1/js/dropin.min.js"></script>
<script src="{{ asset('/js/partials/sponsorship.js')}} "></script> 
@endsection

@section('content')
<div class="container margintop">
    <section class="pricing pb-4">
        <div class="container">
            <h1 class="pb-4 text-center">Promote your apartment</h1>
            <div class="row pb-2">
                @foreach($promos as $promo)
                <div class="col-lg-4">
                    <div class="card promo" data-price="{{$promo -> price}}" data-hours="{{$promo -> hours}}">
                        <div class="card-body">
                            <h5 class="card-title text-muted text-uppercase text-center">{{$promo -> hours}}h Users</h5>
                            <h6 class="card-price text-center">${{$promo -> price}}<span class="period"></span></h6>
                            <hr>
                            <ul class="fa-ul">
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Always First Results</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Guaranteed Visibility</li>
                            </ul>
                            <button data-id="{{ $promo -> id }}" class="btn btn-block btn-warning text-uppercase choose">Choose</button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row pt-5">
                <div class="col-md-8 offset-md-2 d-none" id="order-container">
                    <div>
                        <h4>Order Details</h4>
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                  <th scope="row">Price:</th>
                                  <td><span id="details-price"></span>$</td>
                                </tr>
                                <tr>
                                  <th scope="row">Sponsorship ending date:</th>
                                  <td><span id="details-ending"></span></td>
                                </tr>
                                <tr>
                                  <th scope="row">Apartment:</th>
                                  <td>{{ $apt -> title }} </td>
                                </tr>
                              </tbody>
                        </table>
                    </div>
                    <form id="payment-form" action="{{ route('apt-promo', $apt -> id) }}" method="post">
                        @csrf
                        @method("POST")
                        
                        <div id="bt-dropin"></div>
                        <input type="number" name="promo-id" id="promo-id" class="d-none" required>
                        <input id="nonce" name="payment_method_nonce" type="hidden">
                    
                        <button class="btn btn-warning rounded-pill" type="submit">
                            Submit Payment
                        </button>
                    </form>
                </div>
            </div>
    </section>
    <a class="btn btn-secondary float-right" href="{{ URL::previous() }}">Go Back</a>
</div>

<script>
    var form = document.querySelector('#payment-form');
    var client_token = "{{ Braintree\ClientToken::generate() }}";
    
    braintree.dropin.create({
            authorization: client_token,
            selector: '#bt-dropin',
        },
        function (createErr, instance) {
            if (createErr) {
                console.log('Create Error', createErr);
                return;
            }
            form.addEventListener('submit', function (event) {
                event.preventDefault();
                
                instance.requestPaymentMethod(function (err, payload) {
                    if (err) {
                        console.log('Request Payment Method Error', err);
                        return;
                    }
                    // Add the nonce to the form and submit
                    document.querySelector('#nonce').value = payload.nonce;
                    form.submit();
                });
            });
        });
</script>
@endsection