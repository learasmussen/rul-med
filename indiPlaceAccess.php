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
<div class="container">

    <form action="indiPlaceAccess.php?placeId=<?= $placeId ?>" method="POST" class="p-4 bg-light rounded shadow-sm">
        <h4 class="mb-4"><?= $place->placeName ?>'s tilgængelighed</h4>

        <input type="hidden" name="accessId" value="<?= $access->accessId ?>">

        <!-- Step at Entrance -->
        <div class="mb-3">
            <label class="form-label fw-bold">Har stedet et trin ved indgangen?</label>
            <div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio"
                           name="data[hasStepAtEntrance]"
                           id="stepYes"
                           value="0"
                        <?= isset($access) && $access->hasStepAtEntrance == 0 ? 'checked' : '' ?>>
                    <label class="form-check-label" for="stepYes">Ja</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio"
                           name="data[hasStepAtEntrance]"
                           id="stepNo"
                           value="1"
                        <?= isset($access) && $access->hasStepAtEntrance == 1 ? 'checked' : '' ?>>
                    <label class="form-check-label" for="stepNo">Nej</label>
                </div>
            </div>
        </div>

        <!-- Has Ramp -->
        <div class="mb-3">
            <label class="form-label fw-bold">Har stedet en rampe?</label>
            <div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio"
                           name="data[hasRamp]"
                           id="stepYes"
                           value="0"
                        <?= isset($access) && $access->hasRamp == 0 ? 'checked' : '' ?>>
                    <label class="form-check-label" for="rampYes">Ja</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio"
                           name="data[hasRamp]"
                           id="stepNo"
                           value="1"
                        <?= isset($access) && $access->hasRamp == 1 ? 'checked' : '' ?>>
                    <label class="form-check-label" for="rampNo">Nej</label>
                </div>
            </div>
        </div>

        <!-- Has Elevator -->
        <div class="mb-3">
            <label class="form-label fw-bold">Har stedet en Elevator?</label>
            <div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio"
                           name="data[hasElevator]"
                           id="stepYes"
                           value="0"
                        <?= isset($access) && $access->hasElevator == 0 ? 'checked' : '' ?>>
                    <label class="form-check-label" for="eleYes">Ja</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio"
                           name="data[hasElevator]"
                           id="stepNo"
                           value="1"
                        <?= isset($access) && $access->hasElevator == 1 ? 'checked' : '' ?>>
                    <label class="form-check-label" for="eleNo">Nej</label>
                </div>
            </div>
        </div>

        <!-- Has Close Parking -->
        <div class="mb-3">
            <label class="form-label fw-bold">Er der tæt handicap parkering ved stedet?</label>
            <div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio"
                           name="data[hasCloseParking]"
                           id="stepYes"
                           value="0"
                        <?= isset($access) && $access->hasCloseParking == 0 ? 'checked' : '' ?>>
                    <label class="form-check-label" for="parkYes">Ja</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio"
                           name="data[hasCloseParking]"
                           id="stepNo"
                           value="1"
                        <?= isset($access) && $access->hasCloseParking == 1 ? 'checked' : '' ?>>
                    <label class="form-check-label" for="parkNo">Nej</label>
                </div>
            </div>
        </div>

        <!-- Has Accessible Toilet -->
        <div class="mb-3">
            <label class="form-label fw-bold">Har stedet et tilgængeligt toilet?</label>
            <div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio"
                           name="data[hasAccessibleToilet]"
                           id="stepYes"
                           value="0"
                        <?= isset($access) && $access->hasAccessibleToilet == 0 ? 'checked' : '' ?>>
                    <label class="form-check-label" for="toiletYes">Ja</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio"
                           name="data[hasAccessibleToilet]"
                           id="stepNo"
                           value="1"
                        <?= isset($access) && $access->hasAccessibleToilet == 1 ? 'checked' : '' ?>>
                    <label class="form-check-label" for="toiletNo">Nej</label>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary text-white">Save Changes</button>
        <a href="indiPlace.php?placeId=<?= $placeId ?>" class="btn btn-secondary">Cancel</a>
    </form>

</div>

<?php include "includes/navFooter.php"; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
