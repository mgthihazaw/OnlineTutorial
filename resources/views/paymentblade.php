@extends('layouts.app')
@section('head')
<script src="https://js.stripe.com/v3/"></script>


@endsection

@section('content')

<div class="container">

</div>

@endsection

@section('script')
<script>
    window.addEventListener('load', function() {
        const stripe = Stripe('{{ env('
            STRIPE_KEY ') }}')

        const elements = stripe.elements();
        const cardElement = elements.create('card');

        cardElement.mount('#card-element');

        const cardHolderName = document.getElementById('card-holder-name');
        const cardButton = document.getElementById('card-button');
        const clientSecret = cardButton.dataset.sercret;

        cardButton.addEventListener('click', async (e) => {
            const {
                setupIntent,
                error
            } = await stripe.handleCardSetup(
                clientSecret,
                cardElement, {
                    payment_method_data : {

                   
                    billing_details: {
                        name: cardHolderName.value
                    }
                }
                }
            );

            if (error) {
                // Display "error.message" to the user...
            } else {
                console.log('handling',setupIntent.payment_method_data)
            }
        });
    })
</script>
@endsection