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
    <h1>Zapis do bazy</h1>
    <form action="zapis1.php" method="get">
        <p>Wprowadź tekst: <br><input type="text" name="tekst" placeholder="Wprowadź tekst" required></p>
        <p>A:<input type="checkbox" name="polea"></p>
        <p>B:<input type="checkbox" name="poleb"></p>
        <p>C:<input type="checkbox" name="polec"></p>
        <p>D:<input type="checkbox" name="poled"></p>
        <input type="submit" value="Zapisz">
    </form>
</body>
</html>