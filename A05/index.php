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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
    <title>A05</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="../mainWeb/logo.png" type="image/png">
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

<div class="container-fluid d-flex justify-content-center align-items-center">
    <div class="container mt-4">
        <h1 class="text-center mb-4">Friend Requests</h1>
        <div class="row justify-content-center g-3">
            <?php
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <div class="col-lg-4 col-md-6 col-sm-10">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="friendID">Friend ID: <?php echo htmlspecialchars($row['friendID']); ?></h5>
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

    const darkModeState = localStorage.getItem('darkMode');
    if (darkModeState === 'enabled') {
        enableDarkMode();
    }

    toggleSwitch.addEventListener('click', function() {
        if (document.body.classList.contains('darkMode')) {
            disableDarkMode();
        } else {
            enableDarkMode();
        }
    });

    function enableDarkMode() {
        document.body.classList.add('darkMode');
        document.querySelector('header').classList.add('darkMode');
        document.querySelector('footer').classList.add('darkMode');
        logo.classList.add('darkMode');

        var navLinks = document.querySelectorAll('nav a');
        for (var i = 0; i < navLinks.length; i++) {
            navLinks[i].classList.add('darkMode');
        }

        var cards = document.querySelectorAll('.card');
        for (var i = 0; i < cards.length; i++) {
            cards[i].classList.add('darkMode');
        }

        var headers = document.querySelectorAll('h1');
        for (var i = 0; i < headers.length; i++) {
            headers[i].classList.add('darkMode');
        }

        localStorage.setItem('darkMode', 'enabled');
    }

    function disableDarkMode() {
        document.body.classList.remove('darkMode');
        document.querySelector('header').classList.remove('darkMode');
        document.querySelector('footer').classList.remove('darkMode');
        logo.classList.remove('darkMode');

        var navLinks = document.querySelectorAll('nav a');
        for (var i = 0; i < navLinks.length; i++) {
            navLinks[i].classList.remove('darkMode');
        }

        var cards = document.querySelectorAll('.card');
        for (var i = 0; i < cards.length; i++) {
            cards[i].classList.remove('darkMode');
        }

        var headers = document.querySelectorAll('h1');
        for (var i = 0; i < headers.length; i++) {
            headers[i].classList.remove('darkMode');
        }

        localStorage.setItem('darkMode', 'disabled');
    }
});
</script>

</body>
</html>
