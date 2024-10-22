<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DELICIOUS EATS</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome for icons (optional) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #121212; /* Dark background for the whole page */
            color: #e0e0e0; /* Light text color for readability */
        }

        .container {
            margin-top: 50px;
        }

        .panel {
            border-radius: 0.5rem;
            border: 1px solid #444;
            background-color: #1e1e1e;
            color: #e0e0e0;
        }

        .panel-heading {
            background-color: #333;
            color: #e0e0e0;
            border-bottom: 1px solid #444;
            border-radius: 0.5rem 0.5rem 0 0;
            padding: 10px 15px;
        }

        .panel-title {
            font-size: 1.25rem;
            margin: 0;
        }

        .panel-body {
            padding: 15px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }

        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }

        .alert-success {
            background-color: #2e7d32;
            border-color: #1b5e20;
            color: #e0e0e0;
        }

        .alert-success .close {
            color: #e0e0e0;
        }

        .form-control {
            background-color: #333;
            border-color: #444;
            color: #e0e0e0;
            border-radius: 0.25rem;
        }

        .form-control::placeholder {
            color: #888;
        }

        .form-group label {
            font-weight: 500;
        }

        .error {
            color: #dc3545;
            margin-top: 10px;
        }

        .return-btn {
            display: block;
            margin: 30px auto;
            text-align: center;
        }

        .alert {
            border-radius: 0.25rem;
        }
    </style>
</head>

<body>
<div class="container">
    <h5 class="text-center text-success mb-4">Make payment using your card - Total Amount $ {{$totalprice}}</h5>

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Payment Details</h3>
                </div>
                <div class="panel-body">
                    @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif

                    <form role="form" action="{{ route('stripe.post', $totalprice) }}" method="post" class="require-validation"
                          data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                        @csrf

                        <div class="form-row">
                            <div class="col-12 form-group">
                                <label for="card-name">Name on Card</label>
                                <input id="card-name" class="form-control" size="4" type="text">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-12 form-group">
                                <label for="card-number">Card Number</label>
                                <input id="card-number" autocomplete="off" class="form-control" size="20" type="text">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-4 form-group">
                                <label for="card-cvc">CVC</label>
                                <input id="card-cvc" autocomplete="off" class="form-control" placeholder="ex. 311" size="4" type="text">
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="card-expiry-month">Expiration Month</label>
                                <input id="card-expiry-month" class="form-control" placeholder="MM" size="2" type="text">
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="card-expiry-year">Expiration Year</label>
                                <input id="card-expiry-year" class="form-control" placeholder="YYYY" size="4" type="text">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-12 error form-group d-none">
                                <div class="alert alert-danger">Please correct the errors and try again.</div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-12">
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="return-btn">
        <a class="btn btn-success" href="/show_order">VIEW ORDER</a>
    </div>
</div>

<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Stripe JS -->
<script src="https://js.stripe.com/v2/"></script>
<!-- Custom JS -->
<script>
    $(function () {
        var $form = $(".require-validation");

        $('form.require-validation').on('submit', function (e) {
            var $form = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]', 'input[type=text]', 'input[type=file]', 'textarea'].join(', '),
                $inputs = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid = true;

            $errorMessage.addClass('d-none');
            $('.has-error').removeClass('has-error');

            $inputs.each(function (i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('d-none');
                    e.preventDefault();
                }
            });

            if (!$form.data('cc-on-file')) {
                e.preventDefault();
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                Stripe.createToken({
                    number: $('#card-number').val(),
                    cvc: $('#card-cvc').val(),
                    exp_month: $('#card-expiry-month').val(),
                    exp_year: $('#card-expiry-year').val()
                }, stripeResponseHandler);
            }
        });

        function stripeResponseHandler(status, response) {
            if (response.error) {
                $('.error')
                    .removeClass('d-none')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                var token = response['id'];
                $form.find('input[type=text]').val('');
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }
    });
</script>
</body>

</html>
