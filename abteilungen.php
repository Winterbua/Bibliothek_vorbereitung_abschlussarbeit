<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Julian Bittner">
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
            <th></th>
            <th></th>
        </tr>

        <?php
        $verbindung = mysqli_connect("localhost", "root", "", "abteilungen");
        $ausgabe = "SELECT * FROM abteilung";
        $ergebnis = mysqli_query($verbindung, $ausgabe);

        // Alle Datensätze ausgeben
        while ($zeile = mysqli_fetch_array($ergebnis)) {
            echo "<tr>";
            echo "<td>" . $zeile["abtNr"] . "</td>";
            echo "<td>" . $zeile["abtName"] . "</td>";
            echo "<td>" . $zeile["ort"] . "</td>";
            echo "<td><a href='abteilung.php?id=" . $zeile["abtNr"] . "'>bearbeiten</a></td>";
            echo "<td><a href='loeschen.php?id=" . $zeile["abtNr"] . "'>loeschen</a></td>";
            echo "</tr>";
        }

        // Datensatz einfügen
        if (isset($_POST["senden"]) && isset($_POST["hinzufuegen"])) {
            $einfuegen = "INSERT INTO abteilung(abtName, ort) VALUES ('" . $_POST["name"] . "', '" . $_POST["ort"] . "')";
            mysqli_query($verbindung, $einfuegen);
            header("Location: abteilungen.php");
            exit;
        }

        // Datensatz ändern
        if (isset($_POST["senden"]) && isset($_POST["bearbeiten"])) {
            $einfuegen = "UPDATE abteilung SET abtName='" . $_POST["name"] . "', ort='" . $_POST["ort"] . "' WHERE abtNr=" . $_POST["id"];
            mysqli_query($verbindung, $einfuegen);
            header("Location: abteilungen.php");
            exit;
        }

        // Datensatz löschen
        if (isset($_GET["loeschen"]) && $_GET["loeschen"] === 'true') {
            $ausgabe = "DELETE FROM abteilung WHERE abtNr=" . $_GET["id"];
            mysqli_query($verbindung, $ausgabe);
            header("Location: abteilungen.php");
            exit;
        }
        ?>
    </table>

    <ul>
        <li><a href="abteilung.php" id="neu">Neue Abteilung einfügen</a></li>
    </ul>

</body>
</html>