<?php
$data = $_POST; // Ricevi i dati del modulo

$file = 'db-watches.json'; 

$jsonData = file_get_contents($file); 

$existingData = json_decode($jsonData, true);


$brand = $_POST['brand'];
$model = $_POST['model'];
$description = $_POST['description'];
$price = $_POST['price'];
$discount = $_POST['discount'];
$type = $_POST['type'];
$strap = $_POST['strap'];

// Decodifica il contenuto JSON in un array associativo

$nuevoOggetto = new stdClass();
$nuevoOggetto->brand = $brand;
$nuevoOggetto->model = $model;
$nuevoOggetto->description = $description;
$nuevoOggetto->price = floatval($price); //Converto il valore in floatval altrimenti viene salvato come una stringa
$nuevoOggetto->discount=$discount;
$nuevoOggetto->type=$type;
$nuevoOggetto->strap=$strap;

$array[]= $nuevoOggetto;
echo $array;

$merge = array_merge($existingData, $array);
echo $merge;
$jsonResult = json_encode($merge, JSON_PRETTY_PRINT); 
file_put_contents($file, $jsonResult); 

echo 'Dati aggiunti al file JSON correttamente.';
?>