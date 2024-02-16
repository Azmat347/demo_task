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
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $billingAddress1 = $_POST['billing_address_1'];
    $billingAddress2 = $_POST['billing_address_2'];
    $billingCity = $_POST['billing_city'];
    $billingState = $_POST['billing_state'];
    $billingPostcode = $_POST['billing_postcode'];
    $billingCountry = $_POST['billing_country'];
    $billingPhone = $_POST['billing_phone'];

    $data = [
        'email' => $email,
        'first_name' => $firstName,
        'last_name' => $lastName,
        'billing' => [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'company' => '',
            'address_1' => $billingAddress1,
            'address_2' => $billingAddress2,
            'city' => $billingCity,
            'state' => $billingState,
            'postcode' => $billingPostcode,
            'country' => $billingCountry,
            'email' => $email,
            'phone' => $billingPhone
        ],
        'shipping' => [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'company' => '', // Company name for shipping, adjust as needed
            'address_1' => $billingAddress1,
            'address_2' => $billingAddress2,
            'city' => $billingCity,
            'state' => $billingState,
            'postcode' => $billingPostcode,
            'country' => $billingCountry
        ]
    ];

    $result = $woocommerce->post('customers', $data);
    print_r($result);
} catch (HttpClientException $e) {
    echo "Error: " . $e->getMessage();
}
?>
