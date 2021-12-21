<!DOCTYPE html>
<html lang="en">
<head>
    <title>Paypal | <?php echo get_settings('website_title');?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo base_url('assets/payment/css/stripe.css');?>"
          rel="stylesheet">
  <link name="favicon" type="image/x-icon" href="<?php echo base_url().'assets/global/favicon.png' ?>" rel="shortcut icon" />
</head>
<body>
<?php
    $paypal_keys = get_settings('paypal');
    $paypal = json_decode($paypal_keys);
?>
<!--required for getting the stripe token-->

<img src="<?php echo base_url().'assets/global/logo-sm.png'; ?>" width="15%;"
     style="opacity: 0.05;">

<div class="package-details">
    <strong><?php echo get_phrase('user_name');?> | <?php echo $user_details['name'];?></strong> <br>
    <strong><?php echo get_phrase('amount_to_pay');?> | <?php echo currency($package_details['price']);?></strong> <br>
    <div id="paypal-button" style="margin-top: 20px;"></div><br>
</div>

<img src="https://www.paypalobjects.com/webstatic/i/logo/rebrand/ppcom-white.svg" width="25%;"
     style="opacity: 0.05;">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>

<script>
    paypal.Button.render({
        env: '<?php echo $paypal[0]->mode;?>', // 'sandbox' or 'production'
        style: {
            label: 'paypal',
            size:  'medium',    // small | medium | large | responsive
            shape: 'rect',     // pill | rect
            color: 'blue',     // gold | blue | silver | black
            tagline: false
        },
        client: {
            sandbox:    '<?php echo $paypal[0]->sandbox_client_id;?>',
            production: '<?php echo $paypal[0]->production_client_id;?>'
        },

        commit: true, // Show a 'Pay Now' button

        payment: function(data, actions) {
            return actions.payment.create({
                payment: {
                    transactions: [
                        {
                            amount: { total: '<?php echo $package_details['price'];?>', currency: '<?php echo get_settings('paypal_currency'); ?>' }
                        }
                    ]
                }
            });
        },

        onAuthorize: function(data, actions) {
            // executes the payment
            return actions.payment.execute().then(function() {
                // make an ajax call for saving the payment info
                $.ajax({
                   url: '<?php echo site_url('user/payment_success/paypal/'.$user_details['id'].'/'.$package_details['id'].'/'.$package_details['price']);?>'
                }).done(function () {
                    window.location = '<?php echo site_url('user/packages');?>';
                });
            });
        }

    }, '#paypal-button');
</script>

</body>
</html>
