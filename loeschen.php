<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Julian Bittner">
    <link rel="stylesheet" href="style.css">
    <title>Abteilung löschen</title>
</head>
<body>
    <script>
        loeschen = confirm("Möchten Sie diesen Datensatz wirklich löschen?");
        if (loeschen == true) {
            window.location.href = "abteilungen.php?id=<?= $_GET["id"] ?>&loeschen=true"
        }
        else{
            window.location.href = "abteilungen.php"
        }

    </script>
</body>
</html>