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

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['product_name'];
    $type = 'simple';
    $regular_price = $_POST['product_price'];
    $description = $_POST['product_description'];
    $short_description = $_POST['short_description'];
    $categories = array(
        array('id' => $_POST['category_id']) // Assuming you have a category ID input field in your form
    );
    $images = array(
        array('src' => $_POST['image_url']) // Assuming you have an image URL input field in your form
    );

    // Prepare data for adding product
   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Product</title>
</head>
<body>

<h2>Add Customer</h2>

<form method="POST" action="add_customer.php">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" name="email" id="email" value="dummy data" required>
    </div>
    <div class="form-group">
      <label for="first_name">First Name:</label>
      <input type="text" class="form-control" name="first_name" id="first_name" value="dummy data" required>
    </div>
    <div class="form-group">
      <label for="last_name">Last Name:</label>
      <input type="text" class="form-control" name="last_name" id="last_name" value="dummy data" required>
    </div>
    <!-- Billing Address -->
    <div class="form-group">
      <label for="billing_address_1">Billing Address 1:</label>
      <input type="text" class="form-control" name="billing_address_1" id="billing_address_1" value="dummy data" required>
    </div>
    <div class="form-group">
      <label for="billing_address_2">Billing Address 2:</label>
      <input type="text" class="form-control" name="billing_address_2" id="billing_address_2" value="dummy data">
    </div>
    <div class="form-group">
      <label for="billing_city">Billing City:</label>
      <input type="text" class="form-control" name="billing_city" id="billing_city" value="dummy data" required>
    </div>
    <div class="form-group">
      <label for="billing_state">Billing State:</label>
      <input type="text" class="form-control" name="billing_state" id="billing_state" value="dummy data" required>
    </div>
    <div class="form-group">
      <label for="billing_postcode">Billing Postcode:</label>
      <input type="text" class="form-control" name="billing_postcode" id="billing_postcode" value="dummy data" required>
    </div>
    <div class="form-group">
      <label for="billing_country">Billing Country:</label>
      <input type="text" class="form-control" name="billing_country" id="billing_country" value="dummy data" required>
    </div>
    <div class="form-group">
      <label for="billing_phone">Billing Phone:</label>
      <input type="tel" class="form-control" name="billing_phone" id="billing_phone" value="dummy data" required>
    </div>
    <!-- Shipping Address -->
    <!-- Add similar fields for shipping address if needed -->

    <button type="submit" class="btn btn-primary" id="submitBtn">Submit</button>
  </form>

</body>
</html>