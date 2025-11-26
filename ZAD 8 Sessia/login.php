<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "website");
if(isset($_SESSION["zalogowany"]))
    header("Location: ./strona.php");
if(!$conn)
    die ("Błąd bazy danych");
?>



<?php
if(!isset($_POST["login"]))
{
    header("Location: ./");
    exit();
}
$login = $_POST['login'];
$haslo = $_POST['haslo'];

$q = "SELECT * FROM users WHERE login='$login'";
mysqli_query($wynik, $q);

if(mysqli_num_rows($wynik)==0)
{
    header("Location: ./");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

</body>
</html>