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
    
    <title>Rul Med | Forside</title>
    
    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">
    
    <link href="css/styles.css" rel="stylesheet" type="text/css">

    <link rel="icon" href="images/favicon.png">

    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

    <!-- Hero -->
    <div class="text-center p-2 overflow-x-hidden">
        <div class="d-flex justify-content-center position-relative">
            <img src="images/headerImage.png" alt="headerimage" class="me-auto ms-auto rounded-bottom-circle opacity-50" style=" margin-top: -75px;">
            <img src="images/favicon.png" alt="icon" class="img-fluid h-50 position-absolute translate-middle-y" style="top: 55%;">
        </div>

        <h1 class="m-4 fw-bold">FRIHED PÅ HJUL</h1>

        <p>
            Vi bevæger os forskelligt men vi fortjener alle adgang til de samme steder.
            <br> <br>
            Få overblik over tilgængelighed på steder omkring dig og hjælp andre med dine oplevelser.
        </p>
        <a href="places.php" class="btn btn-primary rounded-4 text-white w-75 fw-bold">UNDERSØG</a>

    </div>

    <?php include "includes/navFooter.php"?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
