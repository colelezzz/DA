<?php
include('connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $requesterID = $_POST['requesterID'];
    $requesteeID = $_POST['requesteeID'];
    $status = $_POST['status'];

    $insertQuery = "INSERT INTO friends (requesterID, requesteeID, status) VALUES (?, ?, ?)";
    
    if ($stmt = mysqli_prepare($conn, $insertQuery)) {
        mysqli_stmt_bind_param($stmt, "iis", $requesterID, $requesteeID, $status);

        if (mysqli_stmt_execute($stmt)) {
            echo "<div id='successMessage' class='alert alert-success text-center'>Friend request added successfully!</div>";
        } else {
            echo "<div id='errorMessage' class='alert alert-danger text-center'>Error adding friend request: " . mysqli_stmt_error($stmt) . "</div>";
        }

        mysqli_stmt_close($stmt);
    }
}

$query = "SELECT friendID, requesterID, requesteeID, status FROM friends";
$result = mysqli_query($conn, $query); 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <title>M01</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="../mainWeb/logo.png" type="image/png">
</head>
<body>

<header>
    <div class="logo">M01</div>
    <nav>
        <div class="navLeft">
            <div class="toggleSwitch" onclick="changeMode()">
                <div class="toggleSlider">
                    <i class="bi bi-sun" style="position: absolute; left: 6px; top: 3px; font-size: 15px; color: rgb(199, 199, 71);"></i>
                    <i class="bi bi-moon" style="position: absolute; right: 6px; top: 3px; font-size: 15px; color: black;"></i>
                </div>
            </div>
        </div>
    </nav>
</header>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 form-container">
                <h3>Friend Request Form</h3>
                <form method="POST" action="" class="mb-4">
                    <div class="form-group">
                        <label for="requesterID">Requester ID:</label>
                        <input type="number" class="form-control" id="requesterID" name="requesterID" required>
                    </div>
                    <div class="form-group">
                        <label for="requesteeID">Requestee ID:</label>
                        <input type="number" class="form-control" id="requesteeID" name="requesteeID" required>
                    </div>
                    <div class="form-group">
                        <label>Status:</label><br>
                        <label class="radio-option">
                            <input type="radio" id="friends" name="status" value="Friends"> Friends
                        </label><br>
                        <label class="radio-option">
                            <input type="radio" id="pending" name="status" value="Pending"> Pending
                        </label><br>
                        <label class="radio-option">
                            <input type="radio" id="decline" name="status" value="Decline"> Decline
                        </label><br>
                        <label class="radio-option">
                            <input type="radio" id="decline" name="status" value="Unfriended"> Unfriended
                        </label><br>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Add Friend Request</button>
                </form>
            </div>

        <div class="col-md-8">
    <div class="content">
        <div class="container-fluid mt-4">
            <h1 class="text-center mb-4">Friend Requests</h1>
            <div class="row justify-content-center">
                <?php
                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                         <div class="col-lg-4 col-md-6 col-12 mb-4">
                            <div class="card">
                                <div class="card-body text-center">
                                    <img src="profilePic.png" alt="Profile Picture" class="img-fluid rounded-circle mb-3" style="width: 80px; height: 80px;">
                                    <h4 class="cardTitle">Friend ID: <?php echo htmlspecialchars($row['friendID']); ?></h4>
                                    <p class="requesterID">Requester ID: <?php echo htmlspecialchars($row['requesterID']); ?></p>
                                    <p class="requesteeID">Requestee ID: <?php echo htmlspecialchars($row['requesteeID']); ?></p>
                                    <p class="status">Status: <?php echo htmlspecialchars($row['status']); ?></p>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "<h2 class='text-center'>No friend requests found.</h2>";
                }
                ?>
            </div>
        </div>
    </div>
</div>

<footer id="footer">
    <div class="footerContainer text-center">
        <div class="footer-content mb-2">
            <span>© 2024 Isles, Inc</span>
        </div>
        <ul class="nav list-unstyled d-flex justify-content-center footer-content">
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
        document.body.classList.add('darkMode');
        document.querySelector('header').classList.add('darkMode');
        document.querySelector('footer').classList.add('darkMode');
        logo.classList.add('darkMode');

        const navLinks = document.querySelectorAll('nav a');
        for (var i = 0; i < navLinks.length; i++) {
            navLinks[i].classList.add('darkMode');
        }

        const cards = document.querySelectorAll('.card');
        for (var i = 0; i < cards.length; i++) {
            cards[i].classList.add('darkMode');
        }

        const headers = document.querySelectorAll('h1, h2, h3, h4');
        for (var i = 0; i < headers.length; i++) {
            headers[i].classList.add('darkMode');
        }

        const formContainer = document.querySelector('.form-container');
        if (formContainer) {
            formContainer.classList.add('darkMode');
        }
    } else {
        document.body.classList.remove('darkMode');
    }

    toggleSwitch.addEventListener('click', function() {
        document.body.classList.toggle('darkMode');
        document.querySelector('header').classList.toggle('darkMode');
        document.querySelector('footer').classList.toggle('darkMode');
        logo.classList.toggle('darkMode');

        const navLinks = document.querySelectorAll('nav a');
        for (var i = 0; i < navLinks.length; i++) {
            navLinks[i].classList.toggle('darkMode');
        }

        const cards = document.querySelectorAll('.card');
        for (var i = 0; i < cards.length; i++) {
            cards[i].classList.toggle('darkMode');
        }

        const headers = document.querySelectorAll('h1, h2, h3, h4');
        for (var i = 0; i < headers.length; i++) {
            headers[i].classList.toggle('darkMode');
        }

        const formContainer = document.querySelector('.form-container');
        if (formContainer) {
            formContainer.classList.toggle('darkMode');
        }

        if (document.body.classList.contains('darkMode')) {
            localStorage.setItem('darkMode', 'enabled');
        } else {
            localStorage.setItem('darkMode', 'disabled');
        }
    });

    setTimeout(function() {
        var successMessage = document.getElementById('successMessage');
        var errorMessage = document.getElementById('errorMessage');

        if (successMessage) {
            successMessage.style.display = 'none';
        }
        if (errorMessage) {
            errorMessage.style.display = 'none';
        }
    }, 3000); 
});
    </script>

</body>
</html>
