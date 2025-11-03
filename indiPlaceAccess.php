<?php
/**
 * @var db $db
 */

require "settings/init.php";

if(empty($_GET["placeId"])) {
    header("Location:places.php");
}

$placeId = $_GET["placeId"];
$place = $db->sql("SELECT * FROM places WHERE placeId = :placeId", [":placeId" => $placeId]);
$place = $place[0];
?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>Rul Med | <?php echo $place->placeName?> Tilgængelighed</title>

    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="images/favicon.png">

    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

<div class="container">
    <div class="row">
        <form action="">

        </form>
    </div>
</div>

<?php include "includes/navFooter.php"?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
