<?php
require_once("./config.php");
$connection = mysqli_connect($host, $user, $pass, $dbname);
if (!$connection) {
    die("Błąd połączenia do bazy");
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
    <?php
    $q = "SELECT * FROM ksiazki";
    $wynik = mysqli_query($connection, $q);
    //echo "<ol>";
    echo'<table style="border: 1px solid black;"';
    echo'<tr><td>Numer</td><td>Autor</td><td>Tytuł</td></tr>';
    while ($row = mysqli_fetch_array($wynik)) {
        /*echo "<pre>";
        print_r($row);
        echo"</pre>";*/
        //echo ("<li> autor: $row[autor], tytuł: $row[tytul]. </li>");
        echo ("<tr> <td>$row[id]</td><td>$row[autor]</td> <td>$row[tytul]</td> </tr>");
    }
    echo "</ol>";
    ?>
</body>

</html>
<?php
mysqli_close($connection);
?>