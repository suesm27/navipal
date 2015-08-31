<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>Stripe API Test</title>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    // This identifies your website in the createToken call below
    Stripe.setPublishableKey('pk_test_6pRNASCoBOKtIshFeQd4XMUh');
    var stripeResponseHandler = function(status, response) {
        var $form = $('#payment-form');
        if (response.error) {
        // Show the errors on the form
        $form.find('.payment-errors').text(response.error.message);
        $form.find('button').prop('disabled', false);
    } else {
        // token contains id, last4, and card type
        var token = response.id;
        // Insert the token into the form so it gets submitted to the server
        $form.append($('<input type="hidden" name="stripeToken" />').val(token));
        // and re-submit
        $form.get(0).submit();
    }
};
jQuery(function($) {
    $('#payment-form').submit(function(e) {
        var $form = $(this);
        // Disable the submit button to prevent repeated clicks
        $form.find('button').prop('disabled', true);
        Stripe.card.createToken($form, stripeResponseHandler);
        // Prevent the form from submitting with the default action
        return false;
    });
});
</script>
<style>
form {
    margin: 0 auto;
}
</style>
</head>
<body>
    <div class="container">
        <h1>CC Auth with Stripe</h1>
        <form class="form" role="form" action="" method="POST" id="payment-form">
            <div class="payment-errors"></div>

            <div class="form-row">
                <label>
                    <span>Card Number</span>
                </label>
                <input type="text" size="20" data-stripe="number"/>

            </div>

            <div class="form-row">
                <label>
                    <span>CVC</span>
                </label>
                <input type="text" size="4" data-stripe="cvc"/>

            </div>

            <div class="form-row">
                <label>
                    <span>Expiration (MM/YYYY)</span>
                </label>
                <input type="text" size="2" data-stripe="exp-month"/>
                <span> / </span>
                <input type="text" size="4" data-stripe="exp-year"/>
            </div>
            <button class="btn btn-primary btn-lg" type="submit">Submit Payment</button>
        </form>
    </div>
</body>
</html>