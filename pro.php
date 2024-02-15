<?php
$consumer_key = "ck_1f5a3a6df210d76fae245731217750f142eb2d0d";
$consumer_secret = "cs_8dd87f9d8e0271781d3a1719f903357413c8ed0e";

require __DIR__ . '/vendor/autoload.php';

use Automattic\WooCommerce\Client;

$woocommerce = new Client(
    'https://dev-azmatecommerse.pantheonsite.io',
    $consumer_key,
    $consumer_secret,
    [
        'version' => 'wc/v3',
    ]
);
  // Get form data
  $name = $_POST['product_name'];
  $type = 'simple';
  $regular_price = $_POST['product_price'];
  $description = $_POST['product_description'];
  $short_description = $_POST['short_description'];
  $image_url = $_POST['image_url'];

$data = [
    'name' => $name,
    'type' => $type,
    'regular_price' =>$regular_price,
    'description' =>  $description,
    'short_description' =>  $short_description,
    'categories' => [
        [
            'id' => 9
        ],
        [
            'id' => 14
        ]
    ],
    'images' => [
        [
            'src' => $image_url
        ]
         
    ]
];
$response=$woocommerce->post('products',$data);
print_r($response);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Product Details</h2>

<table>
    <tr>
        <th>Attribute</th>
        <th>Value</th>
    </tr>
    <?php foreach ($data as $key => $value) : ?>
        <?php if (is_array($value)) : ?>
            <?php foreach ($value as $subValue) : ?>
                <?php foreach ($subValue as $subKey => $subSubValue) : ?>
                    <tr>
                        <td><?= ucfirst(str_replace('_', ' ', $subKey)) ?></td>
                        <td><?= $subSubValue ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td><?= ucfirst(str_replace('_', ' ', $key)) ?></td>
                <td><?= $value ?></td>
            </tr>
        <?php endif; ?>
    <?php endforeach; ?>
</table>

</body>
</html>
