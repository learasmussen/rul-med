<?php

/**
 * @var db $db
 */

require "settings/init.php";

if(empty($_GET["placeId"])) {
    header("Location:index.php");
}

$placeId = $_GET["placeId"];
$place = $db->sql("SELECT * FROM places WHERE placeId = :placeId", [":placeId" => $placeId]);
$place = $place[0];
?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>Steder</title>

    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <link href="css/styles.css" rel="stylesheet" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <div class="container mt-5">
        <div class="row ps-3">
            <h1 class="fw-bold m-0"><?php echo $place->placeName?></h1>
            <p class="text-black-50 m-0"><?php echo $place->placeCategory?></p>
            <p class="text-black-50"><?php echo $place->placeAddress . " " . $place->placePostal . " " . $place->placeCity?></p>
        </div>

        <div class="row p-0">
            <img src="images/<?php echo $place->placeImg . '.png'; ?>" alt="placeImg" class="img-fluid p-0">
        </div>

        <div class="row p-3">
            <h2 class="fw-bold">Beskrivelse</h2>
            <p>
                <?php echo $place->placeDesc?>
            </p>
        </div>
    </div>

    <?php include "includes/navFooter.php"?>
</body>
</html>