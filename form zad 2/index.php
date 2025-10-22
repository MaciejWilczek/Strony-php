<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    $debug = false;
    ?>
</head>

<body>
    <form action="index.php" method="POST">
        <label for="ile_galek">Ile gałek:</label>
        <input id="ile_galek" type="number" name="ile_galek" value="1" min="1" required><br>

        <input type="radio" name="rozek" value="zwykly" checked id="zwykly">
        <label for="zwykly">Rożek zwykły</label><br>
        <input type="radio" name="rozek" value="dunski" id="dunski">
        <label for="dunski">Rożek duński (lepszy)</label><br>

        <input type="checkbox" name="posypka" id="posypka">
        <label for="posypka">posypka</label><br>
        <input type="checkbox" name="polewa" id="polewa">
        <label for="polewa">polewa</label><br>
        <input type="checkbox" name="polewa_czekoladowa" id="polewa_czekoladowa">
        <label for="polewa_czekoladowa">polewa czekoladowa</label><br>

        <input type="submit">
    </form>
    <?php
    if ($debug) {
        echo "<pre>";
        echo print_r($_POST);
        echo "</pre>";
    }
    if (isset($_POST["ile_galek"])) {
        $suma = 0;
        $suma += $_POST["ile_galek"] * 5;
        echo "Liczba Gałek: " . $_POST["ile_galek"] . "<br>";
        echo "Rożek: " . $_POST["rozek"] . " <br>";

        if ($_POST["rozek"] == "dunski")
            $suma += 2;

        if (array_key_exists("posypka", $_POST))
            if ($_POST["posypka"] == true) {
                echo "Posypka <br>";
                $suma += 1;
            }
        if (array_key_exists("polewa", $_POST))
            if ($_POST["polewa"] == true) {
                echo "Polewa <br>";
                $suma += 1;
            }
        if (array_key_exists("polewa_czekoladowa", $_POST))
            if ($_POST["polewa_czekoladowa"] == true) {
                echo "Polewa czekoladowa <br>";
                $suma += 1;
            }

        echo "<h1>Dziękujemy za złożenie zamówienia</h1> <p>Twoja suma to: " . $suma . "zł <br>";
    }


    ?>
</body>

</html>