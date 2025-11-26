<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "website");
if(isset($_SESSION["zalogowany"]))
{
    header("Location: ./strona.php");
    exit();
}
if(!$conn)
    die ("Błąd bazy danych");
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="./login.php" method="POST">
    <input type="text" name="login">
    <input type="password" name="haslo">
    <input type="submit">
    </form>
</body>
</html>