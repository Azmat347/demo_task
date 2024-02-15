<?php
// WooCommerce API credentials
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
    // Get all customers
    $customers = $woocommerce->get('customers');
// print_r($customers);
    // Check if customers are returned
    if (!empty($customers)) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Email</th><th>First Name</th><th>Last Name</th><th>Role</th></tr>";
        
        foreach ($customers as $customer) {
            echo "<tr>";
            echo "<td>" . $customer->id . "</td>";
            echo "<td>" . $customer->email . "</td>";
            echo "<td>" . $customer->first_name . "</td>";
            echo "<td>" . $customer->last_name . "</td>";
            echo "<td>" . $customer->role . "</td>";
            echo "</tr>";
        }
        
        echo "</table>";
    } else {
        echo "No customers found.";
    }
} catch (HttpClientException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>
