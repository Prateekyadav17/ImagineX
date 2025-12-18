
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

$message = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm-password"];

    // Validate form data
    $errors = array();
    if (empty($fullname)) {
        $errors[] = "Full name is required";
    }
    if (empty($email)) {
        $errors[] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }
    if (empty($password)) {
        $errors[] = "Password is required";
    } elseif (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters long";
    }
    if ($password !== $confirm_password) {
        $errors[] = "Passwords do not match";
    }
    if (!isset($_POST["terms"])) {
        $errors[] = "You must agree to the terms and conditions";
    }

    // Check if user already exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $errors[] = "User already exists";
    }
    $stmt->close();

    if (empty($errors)) {
        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO users (fullname, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $fullname, $email, $hashed_password);

        if ($stmt->execute()) {
            echo "<script>alert('Signup successful!'); window.location.href='index.html';</script>";
            exit;
        } else {
            $errors[] = "Error inserting data: " . $stmt->error;
        }

        $stmt->close();
    } else {
        foreach ($errors as $error) {
            echo "<script>alert('$error');</script>";
        }
    }
}

$conn->close();


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - ImagineX</title>
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
            
            <ul class="nav-links" id="navLinks">
               
                <li><a href="about.html">About</a></li>
               
                <li><a href="index.php">Login</a></li>
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
                    <h1>Create Your Account</h1>
                    <p>Join ImagineX to start generating amazing AI art</p>
                </div>
                <form class="auth-form" id="signupForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" id="fullname" name="fullname" placeholder="Enter your full name" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="password-input">
                            <input type="password" id="password" name="password" placeholder="Create a password" required>
                            <button type="button" class="toggle-password" aria-label="Show password" onclick="toggel_password()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                            </button>
                        </div>
                        <div class="password-hint">
                            <span>Must be at least 8 characters</span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="confirm-password">Confirm Password</label>
                        <div class="password-input">
                            <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm your password" required>
                            <button type="button" class="toggle-password" aria-label="Show password" onclick="toggel_confirm_password()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                            </button>
                        </div>
                    </div>
                    
                    <div class="form-group checkbox-group">
                        <input type="checkbox" id="terms" name="terms" required>
                        <label for="terms">I agree to the <a href="terms.html">Terms of Service</a> and <a href="privacy.html">Privacy Policy</a></label>
                    </div>
                    
                    <button type="submit" class="auth-btn">Create Account</button>
                    
                    <div class="auth-divider">
                        <span>or</span>
                    </div>
                    
                    <div class="social-login">
                        <button type="button" class="social-btn google">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 12 a9 9 0 1 1-18 0 9 9 0 0 1 18 0z"></path>
                                <path d="M12 8v8l3-3-3-3z"></path>
                            </svg>
                            Sign up with Google
                        </button>
                        
                    </div>
                    
                    <div class="auth-footer">
                        Already have an account? <a href="index.php">Log in</a>
                    </div>
                </form>
            </div>
            
            <div class="auth-illustration">
                <img src="WhatsApp Image 2025-03-21 at 18.15.56_a141a702.jpg" alt="AI Art Creation">
            </div>
        </section>
    </div>

    <script src="script.js"></script>
</body>
</html>