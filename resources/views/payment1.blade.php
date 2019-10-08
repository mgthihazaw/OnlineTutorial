@extends('layouts.app')
@section('head')
<script src="https://js.stripe.com/v3/"></script>


@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Payment</div>

                <div class="card-body">



                    <select name="plan" id="plan" class="form-control mb-3">
                        @foreach ($plans as $key => $plan)
                    <option value="{{ $key }}">{{ $plan }}</option>
                        @endforeach

                    </select>

                    <input id="card-holder-name" type="text" class="form-control">

                    <!-- Stripe Elements Placeholder -->
                    <div id="card-element" class="my-4"></div>
                    
                    <button id="card-button" class="btn btn-primary" data-secret="{{ $intent->client_secret }}">
                        Subscribe
                    </button>

                    
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('script')
<script>
    window.addEventListener('load', function() {
        const stripe = Stripe('{{ env('STRIPE_KEY') }}')

    const elements = stripe.elements();
    const cardElement = elements.create('card');
    const plan =$('#plan').val()

    cardElement.mount('#card-element');

    const cardHolderName = document.getElementById('card-holder-name');
const cardButton = document.getElementById('card-button');

cardButton.addEventListener('click', async (e) => {
    const { paymentMethod, error } = await stripe.createPaymentMethod(
        'card', cardElement, {
            billing_details: { name: cardHolderName.value }
        }
    );

    if (error) {
        console.log('error',error)
    } else {
        console.log('handling success',paymentMethod)

        axios.post('/subscribe',{
            payment_method : paymentMethod.id,
            plan : plan
        })
        .then(res => {
            location.replace(res.data.success_url)
        })
    }
});
    })
</script>
@endsection