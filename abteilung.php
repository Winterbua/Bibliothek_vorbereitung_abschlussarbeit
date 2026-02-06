<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Julian Bittner">
    <link rel="stylesheet" href="style.css">
    <title>Abteilung</title>
</head>
<body>
    <h1>Abteilung einfügen/aktualisieren</h1>
    <?php
    $art = "hinzufuegen";
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $verbindung = mysqli_connect("localhost", "root", "", "abteilungen");
        $ausgabe = "SELECT * FROM abteilung WHERE abtNr=" . $id;
        $ergebnis = mysqli_query($verbindung, $ausgabe);
        $zeile = mysqli_fetch_array($ergebnis);
        $art = "bearbeiten";
    }
    ?>
    <form action="abteilungen.php" method="post" onsubmit="return pruefen()">
    <input type="hidden" name="<?php echo $art; ?>">
    <input type="hidden" name="id" value="<?php if (isset($id)) {echo $id;} ?>">
    <table>
        <tr>
            <td>Abteilungsname:</td>
            <td><input type="text" name="name" id="name" value="<?php if (isset($zeile["abtName"])) {echo $zeile["abtName"];} ?>" required></td>
        </tr>
        <tr>
            <td>Ort:</td>
            <td><input type="text" name="ort" id="ort" value="<?php if (isset($zeile["ort"])) {echo $zeile["ort"];} ?>" required></td>
        </tr>
        <tr>
            <td colspan=2><input type="submit" name="senden" id="senden" value="Senden"></td>
        </tr>
    </table>
    </form>

    <p id="fehlermeldung"></p>

    <script>
        function pruefen () {
            let ort = document.getElementById("ort").value
            let name = document.getElementById("name").value
            let umlaute = new RegExp(/[ÄäÖöÜüß]/)
            

            if (!umlaute.test(name) && (ort == "Linz" || ort == "Wels" || ort == "Steyr" || ort == "" || name == "")) {
                return true
            }
            else{
                document.getElementById("fehlermeldung").innerHTML = "Abteilungsname enthält Umlaute oder ein ungültiger Ortsname wurde angegeben!"
                return false
            }
        }
        
    </script>
</body>
</html>