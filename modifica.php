<?php
// Ricevi i nuovi valori in post
$selectedmodel = $_POST['selectedmodel'];
$brand = $_POST['newbrand'];
$model = $_POST['newmodel'];
$description = $_POST['newdescription'];
$price = $_POST['newprice'];
$discount = $_POST['newdiscount'];
$type = $_POST['newtype'];
$strap = $_POST['newstrap'];


$jsonData = file_get_contents('db-watches.json');
$data = json_decode($jsonData, true);
echo $data;

foreach ($data as &$item) {
  if ($item['model'] === $selectedmodel) {
    $item['brand'] = $brand;
    $item['model'] = $model;
    $item['description'] = $description;
    $item['price'] = floatval($price);
    $item['discount'] = $discount;
    $item['type'] = $type;
    $item['strap'] = $strap;
    break;
  }
}


$jsonResult = json_encode($data, JSON_PRETTY_PRINT);

file_put_contents('db-watches.json', $jsonResult);

$response = array(
  'status' => 'success',
  'message' => 'Dati aggiornati correttamente nel file JSON.'
);
echo json_encode($response);
?>