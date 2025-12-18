<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - ImagineX</title>
    <link rel="icon" type="image/png" href="WhatsApp Image 2025-04-16 at 21.26.09_22dc0b34.jpg">

    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Serif+Text:ital@0;1&family=Dancing+Script:wght@400..700&family=Doto:wght@500&family=Matemasie&family=Playwrite+DE+VA+Guides&family=Satisfy&family=Sixtyfour+Convergence&display=swap" rel="stylesheet">
</head>
<body>
    <?php 
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Prepare SQL query to retrieve user's data
    $stmt = $conn->prepare("SELECT fullname, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);

    // Execute query
    $stmt->execute();

    // Bind results to variables
    $stmt->bind_result($fullname, $stored_password);

    // Fetch data
    if ($stmt->fetch()) {
        // Check if password is correct
        if (password_verify($password, $stored_password)) {
            // Set session variables
            $_SESSION['email'] = $email;
            $_SESSION['fullname'] = $fullname;

            // Redirect to profile page
            header("Location: home.php");
            exit;
        } else {
            $error = "Invalid email or password";
        }
    } else {
        $error = "Invalid email or password";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>


   
  <nav class="navbar">
        <div class="logo">ImagineX</div>
        <div class="nav-right">
         
            
            <ul class="nav-links" id="navLinks">
                
                
                <li><a href="signup.php">Signup</a></li>
                <li><a href="index.php" class="active">Login</a></li>
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
        <section class="auth-container">
            <div class="auth-card">
                <div class="auth-header">
                    <h1>Welcome Back</h1>
                    <p>Log in to access your AI creations and generate new images</p>
                </div>
                
                <form class="auth-form" id="loginForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="password-input">
                            <input type="password" id="password" name="password" placeholder="Enter your password" required>
                            <button type="button" class="toggle-password" aria-label="Show password" onclick="toggel_password()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                            </button>
                        </div>
                        <div class="forgot-password">
                            <a href="forgot-password.html">Forgot password?</a>
                        </div>
                    </div>
                    
                    <button type="submit" class="auth-btn">Log In</button>
                    
                    <div class="auth-divider">
                        <span>or</span>
                    </div>
                    
                    <div class="social-login">
                        <button type="button" class="social-btn google">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0z"></path>
                                <path d="M12 8v8l3-3-3-3z"></path>
                            </svg>
                            Continue with Google
                        </button>
                        
                    </div>
                    
                    <div class="auth-footer">
                        Don't have an account? <a href="signup.php">Sign up</a>
                    </div>
                    <?php if (isset($error)) { echo "<p style='color: red'>$error</p>"; } ?>

                </form>
            </div>
            
            <div class="auth-illustration">
                <img src="WhatsApp Image 2025-04-04 at 15.43.59_9ca9f629.jpg" alt="AI Art Creation">
            </div>
        </section>
    </div>

    <script src="script.js"></script>
</body>
</html>

