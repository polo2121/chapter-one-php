let header = document.querySelectorAll(".header-section");
const currentPage = document.getElementById("current-page");
console.log(currentPage);

header.forEach((headerContainer) => {
  headerContainer.innerHTML = `
    <div class="logo-navlinks">
        <a href="/index.html">
            <img width="46px" src="./images/Logo.svg" alt="logo image">
        </a>
        <ul>
            <li>
                <a href="./index.html" class=${
                  currentPage.value === "Home" && "active-link"
                }>Home</a>
            </li>
            <li>
                <a href="./products.html" class=${
                  currentPage.value === "Books" && "active-link"
                }>Books</a>
            </li>
            <li>
                <a href="./about.html" class=${
                  currentPage.value === "About" && "active-link"
                }>About</a>
            </li>
            <li>
                <a href="./contact.html" class=${
                  currentPage.value === "Contact" && "active-link"
                }>Contact</a>
            </li>
        </ul>
    </div>
    
    <a href="./login.html" class="signup-btn">
        <button>Sign Up Now</button>
        <div class="circle">
            <img src="./images/outlined arrow.svg" alt="outlined arrow icon">
        </div>
    </a>

    <div class="mobile-header">
        <a href="/index.html">
            <img width="46px" src="./images/Logo.svg" alt="logo image">
        </a>
        <h4>${currentPage.value}</h4>
        <button id="mobile-navi-trigger">
            <img src="./images/burger.svg" alt="burger image" id="open-nav-btn">
            <img class="hidden" src="./images/cross.svg" alt="cross image" id="close-nav-btn">
        </button>
        <div class="navi-panel hidden" id="mobile-nav">
            <ul>
                <li>
                    <a href="./index.html" class=${
                      currentPage.value === "Home" && "active-link"
                    }>
                        Home
                    </a>
                </li>
                <li>
                    <a href="./products.html" class=${
                      currentPage.value === "Books" && "active-link"
                    }
                    >
                        Books
                    </a>
                </li>
                <li>
                    <a href="./about.html" class=${
                      currentPage.value === "About" && "active-link"
                    }>
                        About
                    </a>
                </li>
                <li>
                    <a href="./contact.html" class=${
                      currentPage.value === "Contact" && "active-link"
                    }>Contact</a>
                </li>
                <li>
                    <a href="./login.html">Sign In</a>
                </li>
            </ul>
        </div>
    </div>

`;
});

// headerContainer.map((header) => console.log(header));
/* 




*/
