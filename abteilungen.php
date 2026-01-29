<?php
    //----------------------- Verbindung zu der Datenbank
    $hostname = 'localhost';
    $username = 'manuel';
    $password = '290907';
    $database = 'abteilungen';

    $verbindung = mysqli_connect($hostname, $username, $password, $database)
    or die('Verbindung fehlgeschlagen (Datenbank)');
    
    // SQL Befehl testen
    $sql = 'Select * from abteilung;';

    // Abfrage wegschicken
    $abfrage = mysqli_query($verbindung, $sql); 
    // Error handling für Abfrage
    if (!$abfrage) { 
        echo "<p>Die SQL-Anweisung ist fehlgeschlagen.</p>"; 
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="manuel mayr">
    <link rel="stylesheet" href="style.css">
    <title>Abteilungen</title>
</head>
<body>
    <h1>Abteilungen</h1>
    <table>
        <tr>
            <th>Abteilungsnummer</th>
            <th>Abteilungsname</th>
            <th>Ort</th>
        </tr>
        
        <?php
            // Ruft die Anzahl der Reihen auf
            $anzahl = mysqli_num_rows($abfrage); 
            $j = 0;
            while ($j <= $anzahl) {
                // Ruft die Datensätze auf
                while ($zeile = mysqli_fetch_array($abfrage)) { 
                    echo "<tr>"
                    . "<td>" . $zeile["abtNr"] . "</td>" 
                    . "<td>" . $zeile["abtName"] . "</td>" 
                    . "<td>" . $zeile["ort"] . "</td></tr>";
                }
                $j++;
            }
        ?>
    </table>
    <a href="abteilung.php">Neue Abteilung einfügen</a>
</body>
</html>