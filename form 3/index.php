<!DOCTYPE html>
<html lang="pl">
<head>
    <?php

    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Stwórz własne auto!</h1>
    <form action="./" method="POST">
    <p><input type="radio" checked value="bmw" name="marka">bmw</p>
    <p><input type="radio" value="audi" name="marka">audi</p>
    <p><input type="radio" value="fiat" name="marka">fiat</p>
    <input type="submit">
    </form>
</body>
</html>
<?php
    if(isset($_POST["marka"]))
    {
        $auto = "Marka: "+$_POST["marka"]+", ";

        echo $auto;
    }
?>