<?php

/**
 * @var db $db
 */

require "settings/init.php";


?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>Rul Med | Steder</title>

    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="images/favicon.png">

    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body class="position-relative">

    <!-- Places & Search -->
    <div class="container">
        <!-- Search -->
        <div class="row mb-4 mt-5">
            <div class="col-12">
                <h1 class="h2 border border-primary rounded-4 fw-semibold p-2 text-center">Nykøbing falster</h1>
            </div>
            <div class="col-12">
                <label for="searchQuery" class="form-label"></label>
                <input id="searchQuery" type="text" class="form-control border-primary rounded-4 bg-light" placeholder="Søg efter et sted">
            </div>
        </div>
        <!-- Places -->
        <div class="row gap-3 p-2">
            <?php
                $places = $db->sql("SELECT * FROM places ORDER BY placeName ASC");
                foreach ($places as $place) {
            ?>
                <a href="indiPlace.php?placeId=<?php echo $place->placeId?>" class="align-self-end">
                <div class="col-12 card border-primary shadow rounded-4 p-0 overflow-hidden" style="height: 150px;">
                    <div class="card-body background-image-correct d-flex" style="background-image: url('images/<?php echo $place->placeImg . "Icon.png"; ?>')">
                        <div class="bg-white align-self-end rounded-3 p-1">
                            <span class="text-primary rounded-2 fs-7"><strong><?php echo "$place->placeCity"?></strong></span>
                            <br>
                            <span class="text-primary rounded-2 fs-7"><strong><?php echo "$place->placeAddress" . ", " . "$place->placePostal"?></strong></span>

                        </div>
                    </div>
                </div>
                </a>
            <?php
                }
            ?>
        </div>
    </div>

    <!-- Register Place -->
    <footer class="container mt-3 mb-5 pb-5">
        <div class="row">
            <div class="col text-center flex-center-column">
                <p>
                    Ser du et sted der mangler?
                    <br>
                    Så tilføj det her
                </p>
                <a href="registerPlaces.php" class="btn btn-primary rounded-4 text-white w-75">TILFØJ</a>

            </div>
        </div>
    </footer>

    <?php include "includes/navFooter.php"?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>