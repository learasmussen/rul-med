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

    <title>Sigende titel</title>

    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <link href="css/styles.css" rel="stylesheet" type="text/css">

    <link rel="icon" href="images/favicon.png">

    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<h1 class="fw-bold p-3 mt-5">
    Dine favoritter
</h1>

<!-- Liked Places -->
<main class="container">
    <div class="card border-primary shadow col-12">
        <div class="card-body d-flex align-items-center justify-content-between">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 196 196" fill="none">
                <g clip-path="url(#clip0_140_149)">
                    <path d="M90.02 0.0300293H101.4C102.52 0.430029 103.67 0.110029 104.81 0.210029C115.93 0.0900293 126.37 3.03003 136.47 7.35003C155.53 15.49 170.45 28.52 181.46 46.02C189.02 58.04 193.67 71.18 195.33 85.27C196.03 91.25 195.84 97.31 195.73 103.35C195.6 110.17 194.6 116.8 192.82 123.33C188.81 138.03 181.81 151.13 171.76 162.63C163.34 172.27 153.41 179.91 142.03 185.69C131.89 190.84 121.17 194.23 109.85 195.37C102.62 196.1 95.32 195.98 88.05 195.51C76.02 194.73 64.73 191.25 54.06 185.91C36.09 176.92 22.1 163.61 12.14 146.11C6.34998 135.95 2.61998 125.08 0.709978 113.57C0.239978 110.72 0.469978 107.81 0.039978 104.95V90.37C0.409978 88.4 0.309978 86.39 0.509978 84.4C1.52998 74.25 4.72998 64.75 8.98998 55.56C14.58 43.5 22.53 33.15 32.4 24.35C46.69 11.63 63.37 3.74003 82.29 0.680029C84.84 0.270029 87.46 0.450029 90.02 0.0300293Z" fill="#E77EB2"/>
                    <path d="M104.96 0.0300293C104.95 0.140029 104.96 0.240029 105.01 0.340029C103.79 0.440029 102.56 0.600029 101.4 0.0300293H104.96Z" fill="#6A6A6A"/>
                    <path d="M97.74 161.04C92.11 151.23 86.58 141.59 81.04 131.95C74.36 120.31 67.55 108.73 61.01 97.02C47 71.95 62.13 40.45 90.44 35.56C113.61 31.56 135.17 46.59 139.35 69.81C141.01 79.02 139.72 87.98 135.11 96.13C122.95 117.65 110.55 139.03 98.23 160.47C98.15 160.61 98.02 160.73 97.74 161.05V161.04Z" fill="#FEFEFE"/>
                    <path d="M117.59 76.5301C117.63 87.4001 108.75 96.3301 97.86 96.3701C87.02 96.4101 78.07 87.5001 78.02 76.6201C77.97 65.7501 86.85 56.8501 97.77 56.8301C108.73 56.8101 117.54 65.5701 117.58 76.5301H117.59Z" fill="#E77EB2"/>
                </g>
                <defs>
                    <clipPath id="clip0_140_149">
                        <rect width="195.85" height="195.9" fill="white"/>
                    </clipPath>
                </defs>
            </svg>

            <div class="w-100 ms-3">
                <p class="fs-5 m-0 fw-bold"> Resturant Navn</p>
                <p class="text-black-50 m-0 fs-6">Lokation</p>
            </div>

            <svg xmlns="http://www.w3.org/2000/svg" width="31" height="27" viewBox="0 0 31 27" fill="none">
                <path d="M14.4004 3.82478L15.25 4.97991L16.0996 3.82478C17.5156 1.89397 19.7926 0.75 22.2111 0.75C26.3742 0.75 29.75 4.07589 29.75 8.17746V8.32254C29.75 14.5837 21.826 21.8549 17.6912 24.9632C16.9889 25.4877 16.1279 25.75 15.25 25.75C14.3721 25.75 13.5055 25.4933 12.8088 24.9632C8.67402 21.8549 0.75 14.5837 0.75 8.32254V8.17746C0.75 4.07589 4.12578 0.75 8.28887 0.75C10.7074 0.75 12.9844 1.89397 14.4004 3.82478Z" fill="#E77EB2" stroke="#E77EB2" stroke-width="1.5"/>
            </svg>
        </div>
    </div>
</main>

<nav>

</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
