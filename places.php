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

    <title>Steder</title>

    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <link href="css/styles.css" rel="stylesheet" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body class="position-relative">

    <!-- Places & Search -->
    <div class="container">
        <!-- Search -->
        <div class="row mb-5 mt-5">
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
                <div class="col-12 card border-primary shadow rounded-4">
                    <div class="card-body">
                        <p class="fs-5 m-0"><?php echo "$place->placeName" ?></p>
                        <p class="fs-6 m-0 text-black-50"><strong>LOKATION: </strong><?php echo "$place->placeAddress" . ", " . "$place->placePostal"?></p>
                    </div>
                    <div class="card-footer">
                        <a href="indiPlace.php?placeId=<?php echo $place->placeId?>">Læs mere</a>
                    </div>
                </div>
            <?php
                }
            ?>
        </div>
    </div>

    <!-- Register Place -->
    <footer class="container mt-5">
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
</body>
</html>