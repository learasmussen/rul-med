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

$access = $db->sql("SELECT * FROM accessibility WHERE placeId = :placeId", [":placeId" => $placeId]);
$access = $access[0];

function getIconColor($access, $property) {
    // If object is null or property doesn't exist
    if (!isset($access->$property)) {
        return "CACACA"; // gray
    }

    // If property is truthy
    if ($access->$property === 1) {
        return "1A9531"; // green
    }

    // Anything else (false, 0, etc.)
    return "DF1F11"; // red
}
?>

<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>Rul Med | <?php echo $place->placeName?></title>

    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="images/favicon.png">

    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body class="position-relative pb-5">

    <div class="container mt-5 mb-5">
        <!-- Place Address & name -->
        <div class="row ps-3">
            <h1 class="fw-bold m-0"><?php echo $place->placeName?></h1>
            <p class="text-black-50 m-0"><?php echo $place->placeCategory?></p>
            <p class="text-black-50"><?php echo $place->placeAddress . ", " . $place->placePostal . " <br> " . $place->placeCity . "."?></p>
        </div>

        <!-- Img -->
        <div class="row p-0">
            <?php if (!empty($place->placeImg)) {?>
                <img src="images/<?php echo $place->placeImg . '.png'; ?>" alt="placeImg" class="img-fluid p-0">
            <?php } else {?>
                <p class="h1 text-center mt-5 mb-5 text-danger">Billed Mangler</p>
            <?php } ?>
        </div>

        <!-- Desc -->
        <div class="row p-3">
            <h2 class="fw-bold">Beskrivelse</h2>
            <p>
                <?php echo $place->placeDesc?>
            </p>
        </div>
        <hr>
        <div class="row p-3">
            <div class="col-12 d-flex justify-content-between">
                <h2>Tilgængelighed</h2>
                <a href="indiPlaceAccess.php?placeId=<?php echo $place->placeId?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                        <path d="M8 1C8 0.446875 7.55312 0 7 0C6.44688 0 6 0.446875 6 1V6H1C0.446875 6 0 6.44688 0 7C0 7.55312 0.446875 8 1 8H6V13C6 13.5531 6.44688 14 7 14C7.55312 14 8 13.5531 8 13V8H13C13.5531 8 14 7.55312 14 7C14 6.44688 13.5531 6 13 6H8V1Z" fill="#999999"/>
                    </svg>
                </a>
            </div>

            <div class="col-12">

                <!-- Det her ikoner bliver indsættet -->
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="28" viewBox="0 0 44 35" fill="none">
                    <?php $doorColor = getIconColor($access, 'hasStepAtEntrance'); ?>
                    <path d="M42.9 30.625H37.4V7.75532C37.4 5.89184 35.9198 4.37494 34.1 4.37494H26.4V8.74995H33V35H42.9C43.5078 35 44 34.5105 44 33.9062V31.7187C44 31.1144 43.5078 30.625 42.9 30.625ZM21.4665 0.0689765L8.2665 3.46918C7.28681 3.72143 6.6 4.62787 6.6 5.6683V30.625H1.1C0.49225 30.625 0 31.1144 0 31.7187V33.9062C0 34.5105 0.49225 35 1.1 35H24.2V2.2681C24.2 0.792904 22.8552 -0.289227 21.4665 0.0689765ZM18.15 19.6875C17.2391 19.6875 16.5 18.7079 16.5 17.5C16.5 16.2921 17.2391 15.3125 18.15 15.3125C19.0609 15.3125 19.8 16.2921 19.8 17.5C19.8 18.7079 19.0609 19.6875 18.15 19.6875Z"
                          fill="#<?php echo $doorColor; ?>"/>
                </svg>

                <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34" fill="none">
                    <?php $stairColor = getIconColor($access, 'hasRamp'); ?>
                    <path d="M7.08333 4.25C5.51083 4.25 4.25 5.51083 4.25 7.08333V26.9167C4.25 28.4892 5.51083 29.75 7.08333 29.75H26.9167C28.4892 29.75 29.75 28.4892 29.75 26.9167V7.08333C29.75 5.51083 28.4892 4.25 26.9167 4.25H7.08333ZM19.8333 9.91667H26.9167V12.75H22.6667V17H18.4167V21.25H14.1667V25.5H7.08333V22.6667H11.3333V18.4167H15.5833V14.1667H19.8333V9.91667Z"
                          fill="#<?php echo $stairColor; ?>"/>
                </svg>

                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 35 35" fill="none">
                    <?php $elevatorColor = getIconColor($access, 'hasElevator'); ?>
                    <path d="M27.7083 4.375H7.29167C5.6875 4.375 4.375 5.6875 4.375 7.29167V27.7083C4.375 29.3125 5.6875 30.625 7.29167 30.625H27.7083C29.3125 30.625 30.625 29.3125 30.625 27.7083V7.29167C30.625 5.6875 29.3125 4.375 27.7083 4.375ZM12.3958 8.75C13.4021 8.75 14.2188 9.56667 14.2188 10.5729C14.2188 11.5792 13.4021 12.3958 12.3958 12.3958C11.3896 12.3958 10.5729 11.5792 10.5729 10.5729C10.5729 9.56667 11.3896 8.75 12.3958 8.75ZM16.0417 20.4167H14.5833V26.25H10.2083V20.4167H8.75V16.7708C8.75 15.1667 10.0625 13.8542 11.6667 13.8542H13.125C14.7292 13.8542 16.0417 15.1667 16.0417 16.7708V20.4167ZM22.6042 24.7917L18.9583 18.9583H26.25L22.6042 24.7917ZM18.9583 16.0417L22.6042 10.2083L26.25 16.0417H18.9583Z"
                          fill="#<?php echo $elevatorColor; ?>"/>
                </svg>

                <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34" fill="none">
                    <?php $toiletColor = getIconColor($access, 'hasAccessibleToilet'); ?>
                    <path d="M10.625 9.91667C12.1898 9.91667 13.4583 8.64814 13.4583 7.08333C13.4583 5.51853 12.1898 4.25 10.625 4.25C9.06015 4.25 7.79163 5.51853 7.79163 7.08333C7.79163 8.64814 9.06015 9.91667 10.625 9.91667Z"
                          fill="#<?php echo $toiletColor; ?>" stroke="#<?php echo $toiletColor; ?>" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M23.375 9.91667C24.9398 9.91667 26.2083 8.64814 26.2083 7.08333C26.2083 5.51853 24.9398 4.25 23.375 4.25C21.8102 4.25 20.5416 5.51853 20.5416 7.08333C20.5416 8.64814 21.8102 9.91667 23.375 9.91667Z"
                          fill="#<?php echo $toiletColor; ?>" stroke="#<?php echo $toiletColor; ?>" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M7.08337 14.1666H14.1667L12.75 29.75H8.50004L7.08337 14.1666Z"
                          fill="#<?php echo $toiletColor; ?>" stroke="#<?php echo $toiletColor; ?>" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M19.8333 14.1666H26.9166L28.3333 21.9583H26.2083L25.5 29.75H21.25L20.5416 21.9583H18.4166L19.8333 14.1666Z"
                          fill="#<?php echo $toiletColor; ?>" stroke="#<?php echo $toiletColor; ?>" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>

                <svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 35 35" fill="none">
                    <?php $parkColor = getIconColor($access, 'hasCloseParking'); ?>
                    <path d="M31.25 0H3.75C1.67969 0 0 1.67969 0 3.75V31.25C0 33.3203 1.67969 35 3.75 35H31.25C33.3203 35 35 33.3203 35 31.25V3.75C35 1.67969 33.3203 0 31.25 0ZM18.75 22.5H15V26.25C15 26.9375 14.4375 27.5 13.75 27.5H11.25C10.5625 27.5 10 26.9375 10 26.25V8.75C10 8.0625 10.5625 7.5 11.25 7.5H18.75C22.8828 7.5 26.25 10.8672 26.25 15C26.25 19.1328 22.8828 22.5 18.75 22.5ZM18.75 12.5H15V17.5H18.75C20.125 17.5 21.25 16.375 21.25 15C21.25 13.625 20.125 12.5 18.75 12.5Z"
                          fill="#<?php echo $parkColor ?>"/>
                </svg>
            </div>
        </div>
        <hr>
        <div class="row p-3">
            <div class="col d-flex gap-2">
                <!-- Comments -->
                <div class="d-flex">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                        <path d="M12 5.5C12 8.5375 9.31251 11 6.00001 11C5.16563 11 4.37188 10.8438 3.65001 10.5625L1.10001 11.9125C0.809383 12.0656 0.453133 12.0125 0.218757 11.7812C-0.0156175 11.55 -0.0687425 11.1906 0.0875075 10.9L1.20001 8.8C0.446883 7.88125 7.49482e-06 6.7375 7.49482e-06 5.5C7.49482e-06 2.4625 2.68751 0 6.00001 0C9.31251 0 12 2.4625 12 5.5ZM12 17C9.05938 17 6.61251 15.0594 6.10001 12.5C9.85001 12.4531 13.1094 9.78438 13.4688 6.16563C16.0719 6.76562 18 8.925 18 11.5C18 12.7375 17.5531 13.8813 16.8 14.8L17.9125 16.9C18.0656 17.1906 18.0125 17.5469 17.7813 17.7812C17.55 18.0156 17.1906 18.0688 16.9 17.9125L14.35 16.5625C13.6281 16.8438 12.8344 17 12 17Z" fill="#E77EB2"/>
                    </svg>
                    <p id="randomComment" class="m-0 ms-1"></p>
                </div>
                <!-- Likes -->
                <div class="d-flex">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="16" viewBox="0 0 18 16" fill="none">
                        <path d="M8.28125 2.47187L8.75 3.11875L9.21875 2.47187C10 1.39062 11.2562 0.75 12.5906 0.75C14.8875 0.75 16.75 2.6125 16.75 4.90938V4.99062C16.75 8.49687 12.3781 12.5687 10.0969 14.3094C9.70938 14.6031 9.23438 14.75 8.75 14.75C8.26562 14.75 7.7875 14.6062 7.40312 14.3094C5.12187 12.5687 0.75 8.49687 0.75 4.99062V4.90938C0.75 2.6125 2.6125 0.75 4.90938 0.75C6.24375 0.75 7.5 1.39062 8.28125 2.47187Z" fill="#E77EB2" stroke="#E77EB2" stroke-width="1.5"/>
                    </svg>
                    <p id="randomLike" class="m-0 ms-1"></p>
                </div>
                <!-- Rating -->
                <div class="d-flex">
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 19 18" fill="none">
                        <path d="M9.14728 1.61792L10.9434 7.14578H16.7557L12.0534 10.5622L13.8496 16.0901L9.14728 12.6736L4.445 16.0901L6.24111 10.5622L1.53883 7.14578H7.35117L9.14728 1.61792Z" fill="#F1CD58" stroke="#F1CD58"/>
                    </svg>
                    <p class="m-0 ms-1"><?php echo $place->placeRating?></p>
                </div>
            </div>
        </div>
    </div>

    <!--
        Tænker jeg kan indsætte noget her, hvor man kan springe til en underside, hvor man indsætter data omkring parkering.
    -->

    <?php include "includes/navFooter.php"?>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const randomComment = document.querySelector("#randomComment")
            const randomlike = document.querySelector("#randomLike")

            let randomNumber1 = Math.floor(Math.random()*15)
            let randomNumber2 = Math.floor(Math.random()*30)

            console.log(randomNumber1)
            console.log(randomNumber2)

            randomComment.textContent = randomNumber1
            randomlike.textContent = randomNumber2
        })
    </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>