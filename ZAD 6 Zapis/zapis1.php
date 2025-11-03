<?php
 $conn = mysqli_connect("localhost","root","","php");
 if(!$conn)
 {
    die("Błąd połączenia z bazą danych");
 }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Zapisywanie</h1>
    <?php
    $polea =0;
    $poleb =0;
    $polec =0;
    $poled =0;
    if(!isset($_GET["tekst"]))
        die("Brak parametru get");
    $tekst = $_GET["tekst"];
    if(isset($_GET["polea"]))
        $polea =1;
    if(isset($_GET["poleb"]))
        $poleb =1;
    if(isset($_GET["polec"]))
        $polec =1;
    if(isset($_GET["poled"]))
        $poled =1;
    $q = "INSERT INTO zad_6 (tekst, polea, poleb, polec, poled) VALUES ('$tekst', '$polea', '$poleb', '$polec', '$poled')";
    //echo $q;
    if(mysqli_query($conn, $q))
        echo "Pomyślnie zapisano dane";
    ?>
</body>
</html>