<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - ImagineX</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" href="WhatsApp Image 2025-04-16 at 21.26.09_22dc0b34.jpg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Text:ital@0;1&family=Dancing+Script:wght@400..700&family=Doto:wght@500&family=Matemasie&family=Playwrite+DE+VA+Guides&family=Satisfy&family=Sixtyfour+Convergence&display=swap" rel="stylesheet">
</head>
<body><?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "imaginex_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit;
}

// Get user's email from session
$email = $_SESSION['email'];

// Prepare SQL query to retrieve user's data
$stmt = $conn->prepare("SELECT fullname, email FROM users WHERE email = ?");
$stmt->bind_param("s", $email);

// Execute query
$stmt->execute();

// Bind results to variables
$stmt->bind_result($fullname, $user_email);

// Fetch data
$stmt->fetch();

// Close statement and connection
$stmt->close();
$conn->close();
?>


    <nav class="navbar">
        <div class="logo">ImagineX</div>
        <div class="nav-right">
            <ul class="nav-links" id="navLinks">
                <li><a href="home.php">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="profile.html" class="active">Profile</a></li>
                <li><a style="color:red;" href="logout.php">Logout</a></li>

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
        <section class="profile-section">
            <div class="profile-card">
                <div class="profile-header">
                    <h1>User Profile</h1>
                </div>
                <div class="profile-info">
                    
                    <div class="profile-details">

                             <h2>Full Name: <span id="fullName"><?php echo $fullname; ?></span></h2>
                             <h2>Email: <span id="email"><?php echo $user_email; ?></span></h2>


                     </div>
         
                </div>
                <div class="profile-actions">
                    <button class="edit-profile-btn">Edit Profile</button>
                    <button class="change-password-btn">Change Password</button>
                    <button class="logoutbtn" onclick="location.href='logout.php'"> Logout </button>
                </div>
                
            </div>
            

            
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
            &copy; 2025 ImagineX AI. All rights reserved.
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>

