<?php
$consumer_key = "ck_1f5a3a6df210d76fae245731217750f142eb2d0d";
$consumer_secret = "cs_8dd87f9d8e0271781d3a1719f903357413c8ed0e";
// Include the WooCommerce API client library
require __DIR__ . '/vendor/autoload.php';
use Automattic\WooCommerce\Client;
use Automattic\WooCommerce\HttpClient\HttpClientException;

// WooCommerce API credentials
$store_url = 'https://dev-azmatecommerse.pantheonsite.io'; // Replace with your store URL

// Instantiate the WooCommerce API client
$woocommerce = new Client(
    $store_url,
    $consumer_key,
    $consumer_secret,
    [
        'version' => 'wc/v3', // WooCommerce API version
    ]
);

try {
    $email = $_POST['email'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $billing_address_1 = $_POST['billing_address_1'];
    $billing_address_2 = $_POST['billing_address_2'];
    $billing_city = $_POST['billing_city'];
    $billing_state = $_POST['billing_state'];
    $billing_postcode = $_POST['billing_postcode'];
    $billing_country = $_POST['billing_country'];
    $billing_phone = $_POST['billing_phone'];

    $data = [
        'email' => $email,
        'first_name' =>  $first_name,
        'last_name' =>   $last_name,
        'username' => 'axs',
        'billing' => [
            'first_name' =>   $first_name,
            'last_name' => $last_name ,
            'company' => '',
            'address_1' => $billing_address_1,
            'address_2' => $billing_address_2,
            'city' =>   $billing_city,
            'state' =>  $billing_state,
            'postcode' => $billing_postcode,
            'country' => $billing_country,
            'email' => $email,
            'phone' => $billing_phone
        ],
        'shipping' => [
            'first_name' =>  $first_name,
            'last_name' => $last_name,
            'company' => '',
            'address_1' =>  $billing_address_1,
            'address_2' => $billing_address_2,
            'city' => $billing_city,
            'state' =>$billing_state,
            'postcode' =>$billing_postcode,
            'country' =>$billing_country
        ]
    ];

    $result = $woocommerce->post('customers', $data);
    print_r($result);
} catch (HttpClientException $e) {
    echo "Error: " . $e->getMessage();
}
?>
