// Mobile menu toggle
document.getElementById("hamburger").addEventListener("click", function() {
    document.getElementById("navLinks").classList.toggle("active");
});

// Image generation
document.getElementById("generateBtn").addEventListener("click", generateImage);

async function generateImage() {
    const prompt = document.getElementById("promptInput").value.trim();
    if (!prompt) {
        alert("Please enter a prompt");
        return;
    }

    const apiKey = "here api key your api key paste here!!"; // Replace with your actual API key
    const generateBtn = document.getElementById("generateBtn");
    const currentImage = document.getElementById("currentImage");
    const loadingContainer = document.getElementById("loadingContainer");
    
    // Show loading state
    generateBtn.disabled = true;
    generateBtn.textContent = "Generating...";
    
    // Apply glass blur effect to current image
    currentImage.classList.add("glass-effect");
    
    // Show loading animation
    loadingContainer.style.display = "flex";

    const myHeaders = new Headers();
    myHeaders.append("Authorization", `Bearer ${apiKey}`);

    const formdata = new FormData();
    formdata.append("prompt", prompt);
    formdata.append("aspect_ratio", "16:9");
    formdata.append("style", "realistic");

    try {
        const response = await fetch("https://api.vyro.ai/v2/image/generations", {
            method: 'POST',
            headers: myHeaders,
            body: formdata
        });

        if (!response.ok) {
            throw new Error(`HTTP Error! Status: ${response.status}`);
        }

        // Try to parse response as JSON
        const contentType = response.headers.get("content-type");
        if (contentType && contentType.includes("application/json")) {
            const result = await response.json();
            console.log("API JSON Response:", result);
            if (result.image_url) {
                displayImage(result.image_url);
            } else {
                throw new Error("Image URL not found in API response.");
            }
        } else {
            // If response is not JSON, assume it's an image
            const blob = await response.blob();
            const imageUrl = URL.createObjectURL(blob);
            displayImage(imageUrl);
        }
    } catch (error) {
        console.error("Fetch Error:", error);
        alert("Failed to generate image. Check console for details.");
    } finally {
        // Reset button state
        generateBtn.disabled = false;
        generateBtn.textContent = "Generate Image";
        
        // Remove loading effects
        loadingContainer.style.display = "none";
        currentImage.classList.remove("glass-effect");
    }
    
}

function displayImage(imageUrl) {
    const currentImage = document.getElementById("currentImage");
    
    // Update the existing image source
    currentImage.src = imageUrl;
    currentImage.classList.remove("default-image");
    currentImage.alt = "Generated Image";
    currentImage.style.maxWidth = "100%";
    currentImage.style.maxHeight = "100%";
    currentImage.style.objectFit = "contain";
    
}

    // Toggle password visibility
    
    
        function toggel_password(

        ) {
            const passwordInput = document.getElementById("password");
            if(passwordInput.type==='password'){
                  passwordInput.type='text';
            }
             else
             passwordInput.type='password';
               
        };

        function toggel_confirm_password()
            
         {
            const passwordInput = document.getElementById("confirm-password");
           if(passwordInput.type==='password'){
                 passwordInput.type='text';
           }
            else
            passwordInput.type='password';
                
        };
                // signup form functionality
        const form = document.getElementById('signupForm');

        form.addEventListener('submit', (e) => {
          e.preventDefault();
          const fullname = document.getElementById('fullname').value;
          const email = document.getElementById('email').value;
          const password = document.getElementById('password').value;
        
          // Send data to server using AJAX
          const xhr = new XMLHttpRequest();
          xhr.open('POST', 'http://localhost/signup.php', true);
          xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
          xhr.send(`fullname=${fullname}&email=${email}&password=${password}`);
        
          xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
              console.log(xhr.responseText);
            }
          };
        });

       // Hamburger menu toggle
document.getElementById('hamburger').addEventListener('click', function() {
    const navLinks = document.getElementById('navLinks');
    navLinks.classList.toggle('active');
});

// Edit profile functionality
document.querySelector('.edit-profile-btn').addEventListener('click', function() {
    // Add your edit profile logic here
    // For example, you can show a form to edit profile details
    const profileDetails = document.querySelector('.profile-details');
    profileDetails.innerHTML = `
        <form>
            <label>Full Name:</label>
            <input type="text" value="John Doe">
            <label>Email:</label>
            <input type="email" value="johndoe@example.com">
            <button type="submit">Save Changes</button>
        </form>
    `;
});

document.getElementById("generateBtn").addEventListener("click", function() {
    fetch('check_login.php')
    .then(response => response.json())
    .then(data => {
        if (data.logged_in) {
            // User is logged in, proceed with generating image
            // Your image generation code here
        } else {
            // User is not logged in, redirect to login page
            window.location.href = "login.php";
        }
    });
});



// Change password functionality
document.querySelector('.change-password-btn').addEventListener('click', function() {
    // Add your change password logic here
    // For example, you can show a form to change password
    const profileActions = document.querySelector('.profile-actions');
    profileActions.innerHTML = `
        <form>
            <label>Current Password:</label>
            <input type="password">
            <label>New Password:</label>
            <input type="password">
            <label>Confirm New Password:</label>
            <input type="password">
            <button type="submit">Change Password</button>
        </form>
    `;
});
document.getElementById('downloadBtn').addEventListener('click', function() {
    var img = document.getElementById('currentImage');
    var link = document.createElement('a');
    link.href = img.src;
    link.download = 'image.jpg';
    link.click();
});


        
    





