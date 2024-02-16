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
// $productName = $_POST['productName'];
// $quantity = $_POST['quantity'];

$data = [
    'payment_method' => 'bacs',
    'payment_method_title' => 'Direct Bank Transfer',
    'set_paid' => true,
    'billing' => [
        'first_name' => 'John',
        'last_name' => 'Doe',
        'address_1' => '969 Market',
        'address_2' => '',
        'city' => 'San Francisco',
        'state' => 'CA',
        'postcode' => '94103',
        'country' => 'US',
        'email' => 'john.doe@example.com',
        'phone' => '(555) 555-5555'
    ],
    'shipping' => [
        'first_name' => 'John',
        'last_name' => 'Doe',
        'address_1' => '969 Market',
        'address_2' => '',
        'city' => 'San Francisco',
        'state' => 'CA',
        'postcode' => '94103',
        'country' => 'US'
    ],
    'line_items' => [
        [
            'product_id' => 93,
            'quantity' => 2
        ],
        [
            'product_id' => 22,
            'variation_id' => 23,
            'quantity' => 1
        ]
    ],
    'shipping_lines' => [
        [
            'method_id' => 'flat_rate',
            'method_title' => 'Flat Rate',
            'total' => '10.00'
        ]
    ]
];

print_r($woocommerce->post('orders', $data));
?>

