<!-- Bottom navigation -->
<div class="bottom-nav bg-primary d-flex justify-content-center fixed-bottom d-md-none d-lg-none p-0">
    <div class="nav-wrapper position-relative d-flex justify-content-around align-items-center w-100">

        <!-- Fremhævning (cirklen) -->
        <div class="nav-highlight position-absolute rounded-circle" id="highlight"></div>

        <!-- Ikoner -->
        <a href="index.php" class="nav-link pt-1" data-page="index.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="29" height="35" viewBox="0 0 29 35" fill="none">
                <path d="M14.5 17.1751C19.0029 17.1751 22.6563 13.3286 22.6563 8.58753C22.6563 3.8465 19.0029 0 14.5 0C9.99707 0 6.34375 3.8465 6.34375 8.58753C6.34375 13.3286 9.99707 17.1751 14.5 17.1751ZM21.75 19.0834H18.6291C17.3717 19.6917 15.9727 20.0376 14.5 20.0376C13.0273 20.0376 11.634 19.6917 10.3709 19.0834H7.25C3.24551 19.0834 0 22.5005 0 26.7168V30.4789C0 32.0593 2.07143 33.9399 4.14286 34.8954C4.14286 34.8954 12.8429 34.8954 14.5 34.8954C16.1571 34.8954 22.7857 35.1308 24.8571 34.8954C26.9286 34.66 29 32.7291 29 31.1488V26.7168C29 22.5005 25.7545 19.0834 21.75 19.0834Z" fill="white"/>
            </svg>
        </a>

        <a href="places.php" class="nav-link pt-1" data-page="places.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 35 35" fill="none">
                <path d="M34.524 30.2597L27.7081 23.445C27.4004 23.1374 26.9834 22.9665 26.5459 22.9665H25.4315C27.3184 20.5537 28.4396 17.5188 28.4396 14.2174C28.4396 6.36364 22.0749 0 14.2198 0C6.36472 0 0 6.36364 0 14.2174C0 22.0711 6.36472 28.4347 14.2198 28.4347C17.5218 28.4347 20.5572 27.3137 22.9704 25.4272V26.5414C22.9704 26.9788 23.1413 27.3958 23.449 27.7033L30.2649 34.5181C30.9075 35.1606 31.9467 35.1606 32.5825 34.5181L34.5172 32.5837C35.1598 31.9412 35.1598 30.9023 34.524 30.2597ZM14.2198 22.9665C9.38643 22.9665 5.46915 19.0567 5.46915 14.2174C5.46915 9.38483 9.37959 5.46822 14.2198 5.46822C19.0532 5.46822 22.9704 9.37799 22.9704 14.2174C22.9704 19.0499 19.06 22.9665 14.2198 22.9665Z" fill="white"/>
            </svg>
        </a>

        <a href="registerPlaces.php" class="nav-link pt-1" data-page="registerPlaces.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 35 35" fill="none">
                <path d="M32.5 13.75H21.25V2.5C21.25 1.11953 20.1305 0 18.75 0H16.25C14.8695 0 13.75 1.11953 13.75 2.5V13.75H2.5C1.11953 13.75 0 14.8695 0 16.25V18.75C0 20.1305 1.11953 21.25 2.5 21.25H13.75V32.5C13.75 33.8805 14.8695 35 16.25 35H18.75C20.1305 35 21.25 33.8805 21.25 32.5V21.25H32.5C33.8805 21.25 35 20.1305 35 18.75V16.25C35 14.8695 33.8805 13.75 32.5 13.75Z" fill="white"/>
            </svg>
        </a>

        <a href="likes.php" class="nav-link pt-1" data-page="likes.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="35" viewBox="0 0 40 35" fill="none">
                <path d="M36.1175 2.39318C31.8363 -1.2552 25.4692 -0.598958 21.5396 3.45566L20.0006 5.04156L18.4615 3.45566C14.5397 -0.598958 8.16486 -1.2552 3.8837 2.39318C-1.02246 6.5806 -1.28027 14.0961 3.11027 18.6351L18.2272 34.2442C19.2037 35.252 20.7896 35.252 21.7662 34.2442L36.8831 18.6351C41.2814 14.0961 41.0236 6.5806 36.1175 2.39318Z" fill="white"/>
            </svg>
        </a>

    </div>
</div>

<!-- Script -->
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const links = document.querySelectorAll(".bottom-nav .nav-link");
        const highlight = document.getElementById("highlight");
        const currentPage = window.location.pathname.split("/").pop();

        links.forEach(link => link.classList.remove("active-link"));
        const activeLink = [...links].find(link => link.getAttribute("data-page") === currentPage);

        if (activeLink) {
            const rect = activeLink.getBoundingClientRect();
            const parentRect = activeLink.parentElement.getBoundingClientRect();

            // Position highlight bag aktivt ikon
            highlight.style.left = `${rect.left - parentRect.left + rect.width / 2 - 28}px`;
            highlight.style.top = `${rect.top - parentRect.top - 25}px`; /* hævet lidt */
            highlight.style.width = "56px";
            highlight.style.height = "56px";
            highlight.style.transition = "all 0.3s ease";

            // Løft og skaler ikonet lidt
            activeLink.classList.add("active-link");
        }
    });
</script>
