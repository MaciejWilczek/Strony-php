<?php
$debug = true;
if ($debug) {
    echo "<pre>";
    echo print_r($_POST);
    echo "</pre>";
}
$suma = 0;
$suma += $_POST["ile_galek"] * 5;
echo "Liczba Gałek: " . $_POST["ile_galek"] . "<br>";
echo "Rożek: " . $_POST["rozek"] . " <br>";

if ($_POST["rozek"] == "dunski")
    $suma += 2;

if (array_key_exists("posypka", $_POST))
    if ($_POST["posypka"] == true){
        echo"Posypka <br>";
        $suma += 1;}
if (array_key_exists("polewa", $_POST))
    if ($_POST["polewa"] == true){
        echo"Polewa <br>";
        $suma += 1;}
if (array_key_exists("polewa_czekoladowa", $_POST))
    if ($_POST["polewa_czekoladowa"] == true){
        echo"Polewa czekoladowa <br>";
        $suma += 1;}

echo "<h1>Dziękujemy za złożenie zamówienia</h1> <p>Twoja suma to: " . $suma . "zł <br>";



?>