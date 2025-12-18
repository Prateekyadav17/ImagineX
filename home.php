<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ImagineX - AI Image Generator</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" href="WhatsApp Image 2025-04-16 at 21.26.09_22dc0b34.jpg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Serif+Text:ital@0;1&family=Dancing+Script:wght@400..700&family=Doto:wght@500&family=Matemasie&family=Playwrite+DE+VA+Guides&family=Satisfy&family=Sixtyfour+Convergence&display=swap" rel="stylesheet">
</head>
<body>
    <nav class="navbar">
        <div class="logo">ImagineX</div>
        <div class="nav-right">
          
    
</button>
            <ul class="nav-links" id="navLinks">
                <li><a href="about.html">About</a></li>
                <li><a href="profile.php">Profile</a></li>
            </ul>
        </div>
        <div class="hamburger" id="hamburger">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="3" y1="12" x2="21" y2="12"></line>
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <line x1="3" y1="18" x2="21" y2="18"></line>
            </svg>
        </div>
    </nav>
    

    <div class="main-container">
        <section class="image-section">
            <div class="image-container" id="imageContainer">
                <img src="WhatsApp Image 2025-03-16 at 17.03.41_5e83a7b7.jpg" alt="Default Image" class="default-image" id="currentImage">
                <div class="loading-container" id="loadingContainer">
                    <svg class="loading-logo" viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg">
                        <path d="M25 5C15.1 5 7 13.1 7 23s8.1 18 18 18 18-8.1 18-18S34.9 5 25 5zm0 34c-8.8 0-16-7.2-16-16S16.2 7 25 7s16 7.2 16 16-7.2 16-16 16z" fill="#e94560"/>
                        <path d="M25 1C11.7 1 1 11.7 1 25s10.7 24 24 24 24-10.7 24-24S38.3 1 25 1zm0 46C12.8 47 3 37.2 3 25S12.8 3 25 3s22 9.8 22 22-9.8 22-22 22z" fill="currentColor"/>
                    </svg>
                </div>
               
    </div>
</section>


            </div>
            
        </section> 
        <section class="prompt-section">

           
            
            <form class="prompt-form" id="promptForm">
                <textarea class="prompt-input" id="promptInput" placeholder="Enter your image description here..."></textarea>
                <button type="button" class="generate-btn" id="generateBtn">Generate Image</button>
            </form>
        </section>
    </div>
    <footer class="site-footer">
        <div class="footer-content">
            <div class="footer-logo">ImagineX</div>
            <div class="footer-links">
                <a href="privacy.html">Privacy Policy</a>
                <a href="terms.html">Terms of Service</a>
                <a href="contact.html">Contact Us</a>
            </div>
            <div class="footer-social">
                <a href="#"><span class="social-icon">🐦</span></a>
                <a href="#"><span class="social-icon">📸</span></a>
                <a href="#"><span class="social-icon">💻</span></a>
            </div>
        </div>
        <div class="footer-copyright">
            © 2025 ImagineX AI. All rights reserved.
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>