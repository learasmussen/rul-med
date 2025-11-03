<?php

/**
 * @var db $db
 */

require "settings/init.php";

if (!empty($_POST["data"])) {
    $data = $_POST["data"];

    $sql = "
        INSERT INTO places (placeName, placeCategory, placeDesc, placeAddress, placeCity, placePostal, placeRating)
        VALUES (:placeName, :placeCategory, :placeDesc, :placeAddress, :placeCity, :placePostal, :placeRating)
    ";

    $bind = [
        ":placeName"     => $data["placeName"],
        ":placeCategory" => $data["placeCategory"],
        ":placeDesc"      => $data["placeDesc"],
        ":placeAddress"  => $data["placeAddress"],
        ":placeCity"     => $data["placeCity"],
        ":placePostal"   => $data["placePostal"],
        ":placeRating"   => $data["placeRating"]
    ];

    $db->sql($sql, $bind, false);

    header("location: places.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>Rul Med | Registrer sted</title>

    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="images/favicon.png">

    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body class="mb-5">
    <div class="container py-5">
        <h1 class="mb-4 text-center">Tilføj et nyt sted</h1>

        <form method="POST" action="registerPlaces.php" class="row g-4">
            <div class="col-md-6">
                <label for="placeName" class="form-label">Hvad er stedets Navn?</label>
                <input type="text" id="placeName" name="data[placeName]" class="form-control" required autocomplete="off">
            </div>

            <div class="col-md-6">
                <label for="placeCategory" class="form-label">Hvilket slags sted er det?</label>
                <select id="placeCategory" name="data[placeCategory]" class="form-select" required>
                    <option value="">Choose...</option>
                    <option value="cafe">Café</option>
                    <option value="restaurant">Restaurant</option>
                    <option value="butik">Butik</option>
                    <option value="strand">Strand</option>
                    <option value="hotel">Hotel</option>
                    <option value="museum">Museum</option>
                    <option value="andet">Andet</option>
                </select>
            </div>

            <div class="col-md-12">
                <label for="placeDesc" class="form-label">Kort beskrivelse af stedet</label>
                <textarea id="placeDesc" name="data[placeDesc]" class="form-control"></textarea>
            </div>

            <div class="col-md-6">
                <label for="placeAddress" class="form-label">Hvad er dens adresse?</label>
                <input type="text" id="placeAddress" name="data[placeAddress]" class="form-control" required autocomplete="off">
            </div>

            <div class="col-md-3">
                <label for="placeCity" class="form-label">Hvilken by ligger det?</label>
                <input type="text" id="placeCity" name="data[placeCity]" class="form-control" required autocomplete="off">
            </div>

            <div class="col-md-3">
                <label for="placePostal" class="form-label">Hvad er stedets post nummer?</label>
                <input type="number" id="placePostal" name="data[placePostal]" class="form-control" required autocomplete="off">
            </div>

            <div class="col-md-4">
                <label for="placeRating" class="form-label">Bedøm din oplevelse (1–5)</label>
                <input type="number" id="placeRating" min="1" max="5" name="data[placeRating]" class="form-control" required autocomplete="off">
            </div>

            <div class="col-12 mt-4">
                <button type="submit" class="btn btn-primary px-4 text-white">Tilføj sted</button>
            </div>
        </form>
    </div>



    <?php include "includes/navFooter.php"?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>