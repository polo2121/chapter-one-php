const footerElement = document.querySelectorAll("footer");

footerElement.forEach((footer) => {
  footer.innerHTML = `
    <div class="links">
        <img width="80px" src="./images/logo-2.svg" alt="logo 2 svg">
    <div>
            <!-- About -->
            <span>
                <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M24.0416 16.9706H8.48525" stroke="white" stroke-width="1.5" stroke-linecap="round" />
                    <path
                        d="M20.4131 12.1135C20.4131 12.1135 24.7324 15.7612 24.7324 16.9703C24.7324 18.1793 20.413 21.827 20.413 21.827"
                        stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <a href="./about.html">
                    About Chapter One
                    <span>
                        Find out what we are and
                        our stories.
                    </span>
                </a>
            </span>

            <!-- Browse Books -->
            <span>
                <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M24.0416 16.9706H8.48525" stroke="white" stroke-width="1.5" stroke-linecap="round" />
                    <path
                        d="M20.4131 12.1135C20.4131 12.1135 24.7324 15.7612 24.7324 16.9703C24.7324 18.1793 20.413 21.827 20.413 21.827"
                        stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <a href="./contact.html">
                    Contact Us
                    <span>
                        Get in touch so that we can help.
                    </span>
                </a>
            </span>

            <!-- Product Books -->
            <span>
                <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M24.0416 16.9706H8.48525" stroke="white" stroke-width="1.5" stroke-linecap="round" />
                    <path
                        d="M20.4131 12.1135C20.4131 12.1135 24.7324 15.7612 24.7324 16.9703C24.7324 18.1793 20.413 21.827 20.413 21.827"
                        stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <a href="./products.html">
                    Browse Books
                    <span>
                        Discover an endless realm of liberary
                    </span>
                </a>
            </span>

            <div class="social-media">
                <p>Social Media</p>
                <div class="icons">
                    <a>
                        <img src="./images/facebook.svg" alt="facebook svg">
                    </a>
                    <a>
                        <img src="./images/x.svg" alt="facebook svg">
                    </a>
                    <a>
                        <img src="./images/instagram.svg" alt="facebook svg">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <img width="100%" src="./images/footer-line-break.svg" alt="footer line break svg">
    <p>
        Copyright © 2024 Chapter One
    </p>

    `;
});
