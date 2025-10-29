<?php
$con = mysqli_connect("localhost","root","","pojazd");
if($con==false)
{
   die("". mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Pojazdy</h1>
    <form action="./" method="get">
        <select name="marka">
            <option>Ford</option>
            <option>Fiat</option>
            <option>Citroen</option>
            <option>Volkswagen</option>
        </select>
        <?php
        $marka = $_GET['marka'];
        $query = "SELECT DISTINCT model FROM pojazd WHERE marka = '$marka'";
        $result = mysqli_query($con,$query);
        echo "<select name='model'>";
        while($row = mysqli_fetch_array($result))
            {
                echo "<option>$row[model]</option>";
            }
            echo "</select>";
            ?>
        <input type="submit" value="Panie co tak drogo">
    </form>
    <br>
    <?php
    $marka = "*";
    if(isset($_GET['marka']))
    {
        $marka = $_GET['marka'];
    }
    if($marka== "*")
    {
        $query = "SELECT * FROM pojazd";
    }else{
        $query = "SELECT * FROM pojazd WHERE marka='$marka'";
    }
    
    echo $query."<br>";
    $odp = mysqli_query($con,$query);


    echo "<ol>";
    while($row = mysqli_fetch_array($odp))
    {
        echo("<li> $row[marka] $row[model] $row[kolor], $row[rocznik] rok, $row[cena]zł </li>");
    }
    echo "</ol>";

    $odp = mysqli_query($con,$query);
    echo "<table> <tr><td>Marka</td><td>Model</td><td>Kolor</td><td>Rocznik</td><td>Przebieg(km)</td><td>Cena(zł)</td>";
    while($row = mysqli_fetch_array($odp))
    {
        echo("<tr> <td>$row[marka]</td> <td>$row[model]</td> <td>$row[kolor]</td> <td>$row[rocznik]</td> <td>$row[przebieg]</td> <td>$row[cena]</td> </li>");
    }
    echo "</table>";
    ?>
</body>
</html>
<?php
 mysqli_close($con);
?>