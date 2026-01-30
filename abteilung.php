<?php
    //----------------------- Verbindung zu der Datenbank
    $hostname = 'localhost';
    $username = 'manuel';
    $password = '290907';
    $database = 'abteilungen';

    $verbindung = mysqli_connect($hostname, $username, $password, $database)
    or die('Verbindung fehlgeschlagen (Datenbank)');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="manuel mayr">
    <link rel="stylesheet" href="style.css">
    <title>Abteilung</title>
</head>
<body>
    <h1>Abteilung Einfügen</h1>
    <form action="abteilung.php" method="post" id="einfügen">
        <table>
            <tr>
                <td>Abteilungsname</td>
                <td>
                    <input type="text" id="abName" name="abName">
                </td>
            </tr>
            <tr>
                <td>Ort</td>
                <td>
                    <input type="text" id="abOrt" name="abOrt">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button name="add" id="add" type="submit">Senden</button>
                </td>
            </tr>
        </table>
    </form>

    <?php
        /*
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $name = $_POST["abName"];
            $ort = $_POST["abOrt"];

            $sql = "INSERT INTO abteilung (abtName, ort) VALUES ('$name', '$ort')";

            $abfrage = mysqli_query($verbindung, $sql);
        }
        */
    ?>
<script src="script.js"></script>
</body>
</html>