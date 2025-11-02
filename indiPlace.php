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

$access = $db->sql("SELECT * FROM accessibility WHERE placeId = :placeId", [":placeId" => $placeId]);
$access = $access ? $access[0] : null;

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

        <div class="row p-3">
            <div class="col-12">
                <h2>Tilgængelighed</h2>
            </div>

            <div class="col-12">

                <!-- Det her ikoner bliver indsættet -->
                <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34" fill="none">
                    <path d="M10.625 9.91667C12.1898 9.91667 13.4584 8.64814 13.4584 7.08333C13.4584 5.51853 12.1898 4.25 10.625 4.25C9.06021 4.25 7.79169 5.51853 7.79169 7.08333C7.79169 8.64814 9.06021 9.91667 10.625 9.91667Z"
                          fill="#<?php echo ($access->hasAccessibleToilet === true) ? "DF1F11" : "1A9531";?>"
                          stroke="#<?php echo ($access->hasAccessibleToilet === true) ? "DF1F11" : "1A9531";?>"
                          stroke-linecap="round" stroke-linejoin="round"/>

                    <path d="M23.375 9.91667C24.9398 9.91667 26.2084 8.64814 26.2084 7.08333C26.2084 5.51853 24.9398 4.25 23.375 4.25C21.8102 4.25 20.5417 5.51853 20.5417 7.08333C20.5417 8.64814 21.8102 9.91667 23.375 9.91667Z"
                          fill="#<?php echo ($access->hasAccessibleToilet === true) ? "DF1F11" : "1A9531";?>"
                          stroke="#<?php echo ($access->hasAccessibleToilet === true) ? "DF1F11" : "1A9531";?>"
                          stroke-linecap="round" stroke-linejoin="round"/>

                    <path d="M7.08331 14.1667H14.1666L12.75 29.7501H8.49998L7.08331 14.1667Z"
                          fill="#<?php echo ($access->hasAccessibleToilet === true) ? "DF1F11" : "1A9531";?>"
                          stroke="#<?php echo ($access->hasAccessibleToilet === true) ? "DF1F11" : "1A9531";?>"
                          stroke-linecap="round" stroke-linejoin="round"/>

                    <path d="M19.8334 14.1667H26.9167L28.3334 21.9584H26.2084L25.5 29.7501H21.25L20.5417 21.9584H18.4167L19.8334 14.1667Z"
                          fill="#<?php echo ($access->hasAccessibleToilet === true) ? "DF1F11" : "1A9531";?>"
                          stroke="#<?php echo ($access->hasAccessibleToilet === true) ? "DF1F11" : "1A9531";?>"
                          stroke-linecap="round" stroke-linejoin="round"/>
                </svg>

            </div>
        </div>
    </div>

    <!--
        Tænker jeg kan indsætte noget her, hvor man kan springe til en underside, hvor man indsætter data omkring parkering.
    -->

    <?php include "includes/navFooter.php"?>
</body>
</html>