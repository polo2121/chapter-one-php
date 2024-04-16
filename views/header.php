<header class="header-section">
    <input type="hidden" value="Home" id="current-page">

    <div class="logo-navlinks">
        <a href="/index.php">
            <img width="46px" src="../assets/images/Logo.svg" alt="logo image">
        </a>
        <ul>
            <li>
                <a href="./home.php" <?php if ($_SESSION['current_path'] === "home") echo "class='active-link'" ?>>Home</a>
            </li>
            <li>
                <a href="./products.php" <?php if ($_SESSION['current_path'] === "books") echo "class='active-link'" ?>>Books</a>
            </li>
            <li>
                <a href="./about.php" <?php if ($_SESSION['current_path'] === "about") echo "class='active-link'" ?>>About</a>
            </li>
            <li>
                <a href="./contact.php" <?php if ($_SESSION['current_path'] === "contact") echo "class='active-link'" ?>>Contact</a>
            </li>
        </ul>
    </div>

    <?php if (!isset($_SESSION['user'])) { ?>
        <a href="./login.php" class="signup-btn">
            <button>Sign Up Now</button>
            <div class="circle">
                <img src="../assets/images/outlined arrow.svg" alt="outlined-arrow-icon">
            </div>
        </a>
    <?php } else { ?>
        <a href="./profile.php" class="signup-btn">
            <button>My Profile</button>
            <div class="circle">
                <img src="../assets/images/outlined arrow.svg" alt="outlined-arrow-icon">
            </div>
        </a>
    <?php } ?>







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