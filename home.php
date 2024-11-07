<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "profiles_db";


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Welcome to Group 8</h1>
            <nav>
                <ul>
                    
                    <li><a href="#about">About Us</a></li>
                    
                    <li>
                        <form action="#" method="get" class="search-form">
                            <input type="text" id="search-bar" placeholder="Search for a member..." name="search">
                            <button type="submit">Search</button>
                        </form>
                    </li>
                    <li>
                        <form action="logout.php" method="post" class="logout-form">
                            <button type="submit">Logout</button>
                        </form>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="container">
        <section id="about">
            <h2>About Us</h2>
            <div class="profiles-container">
                <?php
                
                $sql = "SELECT * FROM profiles";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<div class="profile">';
                        echo '<img src="' . $row['img_url'] . '" alt="' . $row['name'] . '">';
                        echo '<h3>' . $row['name'] . '</h3>';
                        echo '<p>' . $row['nickname'] . '<br>' . $row['age'] . ' years old<br>' . $row['address'] . '<br>' . $row['description'] . '</p>';
                        echo '</div>';
                    }
                } else {
                    echo "<p>No profiles found.</p>";
                }
                ?>
            </div>
        </section>

        <section id="contact">
            <h2>Contact Us</h2>
            <p>If you have any questions, feel free to message Lorenzo Valdez. <a href="https://www.facebook.com/arwin.aguas.52">Go to Page</a></p>
        </section>
    </div>

    <footer>
        <div class="container">
            <p>&copy; 2024 Group 8. All rights reserved.</p>
        </div>
    </footer>

    <script>
        document.querySelector('.search-form').addEventListener('submit', function (event) {
            event.preventDefault();
            let searchQuery = document.getElementById('search-bar').value.toLowerCase();
            let profiles = document.querySelectorAll('.profile');
            let found = false;

            profiles.forEach(profile => {
                profile.style.display = 'none';
            });

            profiles.forEach(profile => {
                let name = profile.querySelector('h3').textContent.toLowerCase();
                if (name.includes(searchQuery)) {
                    profile.style.display = 'block';
                    found = true;
                    profile.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });

            if (!found) {
                alert("No member found with that name.");
            }
        });
    </script>
</body>
</html>
<?php
$conn->close();
?>