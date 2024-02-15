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
    $data = array(
        'name' => $name,
        'type' => $type,
        'regular_price' => $regular_price,
        'description' => $description,
        'short_description' => $short_description,
        'categories' => $categories,
        'images' => $images
    );

    try {
        // Add product to WooCommerce
        $result = $woocommerce->post('products', $data);

        // Check if product was added successfully
        if (!empty($result) && !isset($result->errors)) {
            echo "Product added successfully!";
        } else {
            echo "Failed to add product. Error: " . print_r($result, true);
        }
    } catch (HttpClientException $e) {
        echo 'Error adding product: ' . $e->getMessage();
    }
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

<h2>Add Product</h2>

<form id="add-product-form" action="pro.php" method="post">
  <label for="product_name">Product Name:</label><br>
  <input type="text" id="product_name" name="product_name" required><br>
  
  <label for="product_price">Price:</label><br>
  <input type="text" id="product_price" name="product_price" required><br>
  
  <label for="product_description">Description:</label><br>
  <textarea id="product_description" name="product_description"></textarea><br>
  
  <label for="short_description">Short Description:</label><br>
  <textarea id="short_description" name="short_description"></textarea><br>
  
  <label for="category_id">Category ID:</label><br>
  <input type="text" id="category_id" name="category_id" required><br>
  
  <label for="image_url">Image URL:</label><br>
  <input type="text" id="image_url" name="image_url" required><br>
  
  <button type="submit">Add Product</button>
</form>

</body>
</html>
