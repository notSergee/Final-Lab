<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    
    header("Location: home.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Group 8: Team Gin with Nestea</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .contact-section {
            position: absolute;
            bottom: 20px;
            right: 20px;
            width: 250px;
            padding: 1rem;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            z-index: 1000;
        }
        .contact-section h2 {
            font-size: 1.2rem;
            margin-bottom: 1rem;
            text-align: center;
        }
        .contact-section .form-group {
            margin-bottom: 0.5rem;
        }
        .contact-section input[type="text"],
        .contact-section input[type="email"],
        .contact-section input[type="password"] {
            width: 100%;
            padding: 0.3rem;
            font-size: 0.9rem;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .contact-section input[type="submit"] {
            width: 100%;
            padding: 0.5rem;
            font-size: 0.9rem;
            background-color: #5c9e8f;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .contact-section input[type="submit"]:hover {
            background-color: #4a8270;
        }
        .slideshow-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }
        .slideshow-container img {
            position: absolute;
            width: 100%;
            height: auto;
            max-height: 100%;
            object-fit: cover;
            object-position: center;
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }
        .slideshow-container img.active {
            opacity: 1;
        }
    </style>
</head>
<body>
    <header>
        <h1>Group 8: Team Gin with Nestea</h1>
    </header>

    <div class="container">
        <div class="contact-section">
            <div class="slideshow-container">
                <img src="arwin.jpg" class="slide" alt="Slide 1">
                <img src="drei.jpg" class="slide" alt="Slide 2">
                <img src="moy.jpg" class="slide" alt="Slide 3">
                <img src="serg.jpg" class="slide" alt="Slide 4">
                <img src="rj.jpg" class="slide" alt="Slide 5">
            </div>

            <div class="form-content">
                <h2>Log In</h2>
                <form id="contactForm" method="post" action="">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required>
                        <input type="checkbox" id="showPassword"> Show Password
                    </div>
                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>

    <script>
        let slideIndex = 0;
        const slides = document.querySelectorAll('.slideshow-container img');
        const totalSlides = slides.length;

        function showSlides() {
            slides.forEach((slide, index) => {
                slide.classList.remove('active');
                if (index === slideIndex) {
                    slide.classList.add('active');
                }
            });

            slideIndex = (slideIndex + 1) % totalSlides;
        }

        setInterval(showSlides, 3000); 
        showSlides();
    </script>
</body>
</html>
