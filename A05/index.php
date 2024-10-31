<?php
include('connect.php');

$query = "SELECT friendID, requesterID, requesteeID, status FROM friends"; 
$result = executeQuery($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
    <title>A05</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <div class="logo">A05</div>
    <nav>
        <div class="navLeft">
            <div class="toggleSwitch" onclick="changeMode()">
                <div class="toggleSlider">
                    <i class="bi bi-sun" style="position: absolute; left: 6px; top: 2px; font-size: 15px; color: rgb(199, 199, 71);"></i>
                    <i class="bi bi-moon" style="position: absolute; right: 6px; top: 2px; font-size: 15px; color: black;"></i>
                </div>
            </div>
        </div>
    </nav>
</header>

<div class="container mt-4">
    <h1 class="text-center mb-4">Friend Requests</h1>
    <div class="row justify-content-center">
        <?php
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="col-md-6 mb-6">
                    <div class="card">
                        <div class="cardBody">
                            <h5 class="cardTitle">Friend ID: <?php echo htmlspecialchars($row['friendID']); ?></h5>
                            <p class="requesterID">Requester ID: <?php echo htmlspecialchars($row['requesterID']); ?></p>
                            <p class="requesteeID">Requestee ID: <?php echo htmlspecialchars($row['requesteeID']); ?></p>
                            <p class="status">Status: <?php echo htmlspecialchars($row['status']); ?></p>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "<h3 class='text-center'>No friend requests found.</h3>";
        }
        ?>
    </div>
</div>

<footer id="footer">
    <div class="footerContainer">
        <div class="footer-content">
            <span>© 2024 Isles, Inc</span>
        </div>
        <ul class="nav list-unstyled d-flex footer-content">
            <li class="ms-3">
                <a href="https://x.com/coleenislesss"><i class="bi bi-twitter"></i></a>
            </li>
            <li class="ms-3">
                <a href="https://www.instagram.com/cln.selsi/"><i class="bi bi-instagram"></i></a>
            </li>
            <li class="ms-3">
                <a href="https://www.facebook.com/coleen.isles"><i class="bi bi-facebook"></i></a>
            </li>
        </ul>
    </div>
</footer>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const toggleSwitch = document.querySelector('.toggleSwitch');
    const logo = document.querySelector('.logo');

    toggleSwitch.addEventListener('click', function() {
        document.body.classList.toggle('darkMode');
        document.querySelector('header').classList.toggle('darkMode');
        document.querySelector('footer').classList.toggle('darkMode'); 
        logo.classList.toggle('darkMode');

        const navLinks = document.querySelectorAll('nav a');
        navLinks.forEach(link => {
            link.classList.toggle('darkMode');
        });

        const cards = document.querySelectorAll('.card'); 
        cards.forEach(card => {
            card.classList.toggle('darkMode');
        });

        const headers = document.querySelectorAll('h1');
        headers.forEach(header => {
            header.classList.toggle('darkMode');
        });
    });
});
</script>


</body>
</html>
