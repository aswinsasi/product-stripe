@extends('layouts.master')
@section('content')

    @foreach($products->chunk(4) as $chunk)
    <div class="row">
       @foreach($chunk as $product)
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text h-50">{{ $product->description }}</p>
                        <button class="btn btn-primary btn-block pro"  data-id="{{ $product->id }}" id="checkout-button-{{ $product->id }}"><i class="fa fa-cc-stripe"></i> Buy Now INR({{ number_format($product->price) }})</button>
                    </div>
                </div>
            </div>
       @endforeach
    </div> <br>
    @endforeach
    <section id="loading">
        <div id="loading-content"></div>
    </section>
@endsection

@push('header')
    <script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
    <script src="https://js.stripe.com/v3/"></script>
@endpush

@push('footer')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
    <script type="text/javascript">

    $(document).on('click', ".pro", function () {
        $('#loading').addClass('loading');
        $('#loading-content').addClass('loading-content');
        var prod_id = $(this).attr("data-id");
        var stripe = Stripe("{{ env('STRIPE_KEY') }}");
        var checkoutButton = document.getElementById("checkout-button-"+prod_id);

        // checkoutButton.addEventListener("click", function () {
            fetch("{{ route('checkout') }}", {
                method: "POST",
                headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
                },
                body: JSON.stringify({ product_id: prod_id })
            })
            .then(function (response) {
                return response.json();
            })
            .then(function (session) {
                return stripe.redirectToCheckout({ sessionId: session.id });
            })
            .then(function (result) {
                if (result.error) {
                    alert(result.error.message);
                }
            })
            .catch(function (error) {
                console.error("Error:", error);
            });
        // });

    });
    </script>
@endpush
