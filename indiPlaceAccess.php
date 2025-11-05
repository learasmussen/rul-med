<?php
/**
 * @var db $db
 */

require "settings/init.php";

// Redirect if no placeId is given
if (empty($_GET["placeId"])) {
    header("Location: places.php");
    exit();
}

$placeId = $_GET["placeId"];

// Fetch the place record
$place = $db->sql("SELECT * FROM places WHERE placeId = :placeId", [":placeId" => $placeId]);
if (empty($place)) {
    header("Location: places.php");
    exit();
}
$place = $place[0];

// Handle form submission
if (!empty($_POST["accessId"]) && !empty($_POST["data"])) {
    $data = $_POST["data"];

    $db->sql(
        "UPDATE accessibility 
         SET hasStepAtEntrance = :hasStepAtEntrance, 
             hasRamp = :hasRamp, 
             hasElevator = :hasElevator, 
             hasCloseParking = :hasCloseParking, 
             hasAccessibleToilet = :hasAccessibleToilet
         WHERE accessId = :accessId",
        [
            ":hasStepAtEntrance" => $data["hasStepAtEntrance"],
            ":hasRamp" => $data["hasRamp"],
            ":hasElevator" => $data["hasElevator"],
            ":hasCloseParking" => $data["hasCloseParking"],
            ":hasAccessibleToilet" => $data["hasAccessibleToilet"],
            ":accessId" => $_POST["accessId"]
        ]
    );

    header("Location: indiPlace.php?placeId=" . urlencode($placeId));
    exit();
}

// Fetch accessibility record
$access = $db->sql("SELECT * FROM accessibility WHERE placeId = :placeId", [":placeId" => $placeId]);
$access = !empty($access) ? $access[0] : null;
?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">
    <title>Rul Med | <?= $place->placeName ?> Tilgængelighed</title>
    <meta name="robots" content="all">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">
    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="images/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<div class="container p-4">

    <form action="indiPlaceAccess.php?placeId=<?= $placeId ?>" method="POST">
        <div class="row">
            <h4 class="mb-4"><?= $place->placeName ?>'s tilgængelighed</h4>

            <input type="hidden" name="accessId" value="<?= $access->accessId ?>">
        </div>

        <!-- Step at Entrance -->
        <div class="row mb-3">
            <label class="form-label fw-bold">Har stedet et trin ved indgangen?</label>
            <div>
                <input type="radio" class="btn-check" name="data[hasStepAtEntrance]" id="stepYes"
                       value="0" <?= isset($access) && $access->hasStepAtEntrance == 0 ? 'checked' : '' ?>>
                <label class="btn btn-outline-primary pe-4 ps-4" for="stepYes">Ja</label>

                <input type="radio" class="btn-check" name="data[hasStepAtEntrance]" id="stepNo"
                       value="1" <?= isset($access) && $access->hasStepAtEntrance == 1 ? 'checked' : '' ?>>
                <label class="btn btn-outline-primary pe-4 ps-4" for="stepNo">Nej</label>
            </div>
        </div>

        <!-- Has Ramp -->
        <div class="row mb-3">
            <label class="form-label fw-bold">Har stedet en rampe?</label>
            <div>
                <input type="radio" class="btn-check" name="data[hasRamp]" id="rampYes"
                       value="0" <?= isset($access) && $access->hasRamp == 0 ? 'checked' : '' ?>>
                <label class="btn btn-outline-primary pe-4 ps-4" for="rampYes">Ja</label>

                <input type="radio" class="btn-check" name="data[hasRamp]" id="rampNo"
                       value="1" <?= isset($access) && $access->hasRamp == 1 ? 'checked' : '' ?>>
                <label class="btn btn-outline-primary pe-4 ps-4" for="rampNo">Nej</label>
            </div>
        </div>

        <!-- Has Elevator -->
        <div class="row mb-3">
            <label class="form-label fw-bold">Har stedet en elevator?</label>
            <div>
                <input type="radio" class="btn-check" name="data[hasElevator]" id="eleYes"
                       value="0" <?= isset($access) && $access->hasElevator == 0 ? 'checked' : '' ?>>
                <label class="btn btn-outline-primary pe-4 ps-4" for="eleYes">Ja</label>

                <input type="radio" class="btn-check" name="data[hasElevator]" id="eleNo"
                       value="1" <?= isset($access) && $access->hasElevator == 1 ? 'checked' : '' ?>>
                <label class="btn btn-outline-primary pe-4 ps-4" for="eleNo">Nej</label>
            </div>
        </div>

        <!-- Has Close Parking -->
        <div class="row mb-3">
            <label class="form-label fw-bold">Er der tæt handicap parkering ved stedet?</label>
            <div class="gap-5">
                <input type="radio" class="btn-check" name="data[hasCloseParking]" id="parkYes"
                       value="0" <?= isset($access) && $access->hasCloseParking == 0 ? 'checked' : '' ?>>
                <label class="btn btn-outline-primary pe-4 ps-4" for="parkYes">Ja</label>

                <input type="radio" class="btn-check" name="data[hasCloseParking]" id="parkNo"
                       value="1" <?= isset($access) && $access->hasCloseParking == 1 ? 'checked' : '' ?>>
                <label class="btn btn-outline-primary pe-4 ps-4" for="parkNo">Nej</label>
            </div>
        </div>

        <!-- Has Accessible Toilet -->
        <div class="row mb-3">
            <label class="form-label fw-bold">Har stedet et tilgængeligt toilet?</label>
            <div>
                <input type="radio" class="btn-check" name="data[hasAccessibleToilet]" id="toiletYes"
                       value="0" <?= isset($access) && $access->hasAccessibleToilet == 0 ? 'checked' : '' ?>>
                <label class="btn btn-outline-primary pe-4 ps-4" for="toiletYes">Ja</label>

                <input type="radio" class="btn-check" name="data[hasAccessibleToilet]" id="toiletNo"
                       value="1" <?= isset($access) && $access->hasAccessibleToilet == 1 ? 'checked' : '' ?>>
                <label class="btn btn-outline-primary pe-4 ps-4" for="toiletNo">Nej</label>
            </div>
        </div>


        <button type="submit" class="btn btn-primary text-white">Gem ændringer</button>
        <a href="indiPlace.php?placeId=<?= $placeId ?>" class="btn btn-secondary">Annuller</a>
    </form>

</div>

<?php include "includes/navFooter.php"; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
