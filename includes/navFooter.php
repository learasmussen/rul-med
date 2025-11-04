<!-- Bottom navigation -->
<div class="bottom-nav bg-primary d-flex justify-content-center fixed-bottom d-md-none d-lg-none p-0">
    <div class="nav-wrapper position-relative d-flex justify-content-around align-items-center w-100">

        <!-- Fremhævning (cirklen) -->
        <div class="nav-highlight position-absolute rounded-circle" id="highlight"></div>

        <!-- Ikoner -->
        <a href="index.php" class="nav-link pt-1" data-page="index.php">
            <svg width="35" height="35" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M33.8174 18.4994C32.6721 17.5943 31.3251 17.8865 30.6658 19.1697C30.3929 19.6966 30.1628 20.2495 29.7734 20.7242C28.7788 21.9449 27.5227 22.7065 25.792 22.597C24.8116 22.537 23.9533 22.1275 23.1747 21.6189C21.623 20.6043 20.2987 19.3158 18.5595 18.4316C18.7528 18.3012 18.8949 18.2125 19.0284 18.116C22.4131 15.8051 24.2176 12.7769 23.8539 8.83839C23.601 6.10754 22.1971 3.89313 19.8583 2.23427C16.8715 0.121582 13.4414 -0.397462 9.81237 0.278078C6.0782 0.974484 3.33867 2.99589 1.45169 6.00582C0.57356 7.40907 -0.0431111 8.90621 0.00235827 10.5703C0.0194093 11.2406 0.368956 11.7023 1.051 11.9787L1.05952 11.984L8.54207 15.9459C3.98661 17.3544 0.80944 21.418 1.35223 26.0999C1.6222 28.4369 2.58558 30.4713 4.38446 32.1276C6.84265 34.3941 9.82942 35.3201 13.2936 34.9028C15.6523 34.6185 17.6871 33.7108 19.4092 32.2084C21.3445 30.5261 22.3164 28.4108 22.6262 25.9955C22.8337 26.0738 23.0241 26.1468 23.2145 26.2094C24.4706 26.6476 25.7721 26.8537 27.0936 26.7128C31.0039 26.2877 33.6241 23.5803 34.3942 20.3069C34.5477 19.6496 34.417 18.9767 33.8145 18.502L33.8174 18.4994ZM4.36173 9.27136C4.95283 8.32196 5.62066 7.42471 6.45616 6.62137C9.1076 4.07049 12.8077 3.44972 16.0332 5.02772C18.7471 6.35533 19.9663 9.12008 18.9375 11.6762C18.3237 13.202 16.8601 14.3653 15.0669 14.9443L4.36173 9.26876V9.27136ZM11.9295 30.7973C8.69553 30.826 5.92758 28.4682 5.87927 25.1844C5.83096 22.0779 8.69553 19.6027 11.904 19.6001C15.1607 19.5923 18.0281 22.0049 18.0963 25.1244C18.1588 28.2673 15.3795 30.7869 11.9324 30.8L11.9295 30.7973Z" fill="white"/>
                <path d="M12.6058 11.3448C13.6338 11.3448 14.4672 10.5799 14.4672 9.63639C14.4672 8.69286 13.6338 7.92798 12.6058 7.92798C11.5778 7.92798 10.7444 8.69286 10.7444 9.63639C10.7444 10.5799 11.5778 11.3448 12.6058 11.3448Z" fill="white"/>
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
        let activeLink = [...links].find(link => link.getAttribute("data-page") === currentPage);

        console.log(activeLink)
        console.log(currentPage)
        if(!currentPage){
            activeLink = links[0];
        }

        if (currentPage === "indiPlace.php") {
            activeLink = links[1]
        }

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
