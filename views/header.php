<header class="header-section">
    <input type="hidden" value="Home" id="current-page">

    <div class="logo-navlinks">
        <a href="/index.php">
            <img width="46px" src="../assets/images/Logo.svg" alt="logo image">
        </a>
        <ul>
            <li>
                <a href="./index.php">Home</a>
            </li>
            <li>
                <a href="./products.php">Books</a>
            </li>
            <li>
                <a href="./about.php">About</a>
            </li>
            <li>
                <a href="./contact.php">Contact</a>
            </li>
        </ul>
    </div>

    <a href="./login.php" class="signup-btn">
        <button>Sign Up Now</button>
        <div class="circle">
            <img src="../assets/images/outlined arrow.svg" alt="outlined arrow icon">
        </div>
    </a>

    <div class="mobile-header">
        <a href="/index.php">
            <img width="46px" src="../assets/images/Logo.svg" alt="logo image">
        </a>
        <!-- <h4>${currentPage.value}</h4> -->
        <button id="mobile-navi-trigger">
            <img src="../assets/images/burger.svg" alt="burger image" id="open-nav-btn">
            <img class="hidden" src="../assets/images/cross.svg" alt="cross image" id="close-nav-btn">
        </button>
        <div class="navi-panel hidden" id="mobile-nav">
            <ul>
                <li>
                    <a href="./index.php">
                        Home
                    </a>
                </li>
                <li>
                    <a href="./products.php">
                        Books
                    </a>
                </li>
                <li>
                    <a href="./about.php">
                        About
                    </a>
                </li>
                <li>
                    <a href="./contact.php">Contact</a>
                </li>
                <li>
                    <a href="./login.php">Sign In</a>
                </li>
            </ul>
        </div>
    </div>

</header>