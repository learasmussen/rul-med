<?php

/**
 * @var db $db
 */

require "settings/init.php";

if (!empty($_POST["data"])) {
    $data = $_POST["data"];

    // Insert the new place
    $placeSql = "INSERT INTO places (placeName, placeCategory, placeDesc, placeAddress, placeCity, placePostal, placeRating) 
                 VALUES (:placeName, :placeCategory, :placeDesc, :placeAddress, :placeCity, :placePostal, :placeRating)";
    $placeBind = [
        ":placeName" => $data["placeName"],
        ":placeCategory" => $data["placeCategory"],
        ":placeDesc" => $data["placeDesc"],
        ":placeAddress" => $data["placeAddress"],
        ":placeCity" => $data["placeCity"],
        ":placePostal" => $data["placePostal"],
        ":placeRating" => $data["placeRating"]
    ];

    $db->sql($placeSql, $placeBind, false);

    // Retrieve the ID of the last inserted place
    $placeIdResult = $db->sql("SELECT LAST_INSERT_ID() AS placeId");
    $placeId = $placeIdResult[0]->placeId;

    // Insert accessibility info linked to the new place
    $accessSql = "INSERT INTO accessibility 
        (placeId, hasRamp, hasStepEntrance, hasElevator, doorWidthCM, hasAccessibleToilet) 
        VALUES (:placeId, :hasRamp, :hasStepEntrance, :hasElevator, :doorWidthCM, :hasAccessibleToilet)";
    $accessBind = [
        ":placeId" => $placeId,
        ":hasRamp" => $data["hasRamp"],
        ":hasStepEntrance" => $data["hasStepEntrance"],
        ":hasElevator" => $data["hasElevator"],
        ":doorWidthCM" => $data["doorWidthCM"],
        ":hasAccessibleToilet" => $data["hasAccessibleToilet"]
    ];

    $db->sql($accessSql, $accessBind, false);
}



?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>Registrer Steder</title>

    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <link href="css/styles.css" rel="stylesheet" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body class="mb-5">
    <h1>

    </h1>
    <div class="container py-5">
        <h1 class="mb-4 text-center">Add New Place</h1>

        <form method="POST" action="registerPlaces.php" class="row g-4">

            <!-- 🌆 Place Information -->
            <div class="col-12">
                <h4 class="border-bottom pb-2 mb-3">Place Information</h4>
            </div>

            <div class="col-md-6">
                <label for="placeName" class="form-label">Place Name</label>
                <input type="text" id="placeName" name="data[placeName]" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label for="placeCategory" class="form-label">Category</label>
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
                <label for="placeDesc" class="form-label">Description</label>
                <textarea id="placeDesc" name="data[placeDesc]" class="form-control"></textarea>
            </div>

            <div class="col-md-6">
                <label for="placeAddress" class="form-label">Address</label>
                <input type="text" id="placeAddress" name="data[placeAddress]" class="form-control" required>
            </div>

            <div class="col-md-3">
                <label for="placeCity" class="form-label">City</label>
                <input type="text" id="placeCity" name="data[placeCity]" class="form-control" required>
            </div>

            <div class="col-md-3">
                <label for="placePostal" class="form-label">Postal Code</label>
                <input type="number" id="placePostal" name="data[placePostal]" class="form-control" required>
            </div>

            <div class="col-md-4">
                <label for="placeRating" class="form-label">Rating (1–5)</label>
                <input type="number" id="placeRating" min="1" max="5" name="data[placeRating]" class="form-control">
            </div>

            <!-- ♿ Accessibility Information -->
            <div class="col-12 mt-5">
                <h4 class="border-bottom pb-2 mb-3">Accessibility Features</h4>
            </div>

            <div class="col-md-3 form-check form-switch">
                <input class="form-check-input" type="checkbox" id="hasRamp" name="data[hasRamp]" value="1">
                <label class="form-check-label" for="hasRamp">Has Ramp</label>
            </div>

            <div class="col-md-3 form-check form-switch">
                <input class="form-check-input" type="checkbox" id="hasStepEntrance" name="data[hasStepEntrance]" value="1">
                <label class="form-check-label" for="hasStepEntrance">Has Step Entrance</label>
            </div>

            <div class="col-md-3 form-check form-switch">
                <input class="form-check-input" type="checkbox" id="hasElevator" name="data[hasElevator]" value="1">
                <label class="form-check-label" for="hasElevator">Has Elevator</label>
            </div>

            <div class="col-md-3 form-check form-switch">
                <input class="form-check-input" type="checkbox" id="hasAccessibleToilet" name="data[hasAccessibleToilet]" value="1">
                <label class="form-check-label" for="hasAccessibleToilet">Accessible Toilet</label>
            </div>

            <div class="col-md-4">
                <label for="doorWidthCM" class="form-label mt-3">Door Width (cm)</label>
                <input type="number" id="doorWidthCM" name="data[doorWidthCM]" class="form-control" placeholder="e.g. 90">
            </div>

            <div class="col-12 mt-4">
                <button type="submit" class="btn btn-primary px-4">Add Place</button>
            </div>

        </form>
    </div>


    <?php include "includes/navFooter.php"?>
</body>
</html>