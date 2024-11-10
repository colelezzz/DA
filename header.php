<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Coleen's Data Ad</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <div class="logo">Data Administration</div>
    <nav>
        <div class="navLeft">
            <ul>
                <li><a href="#" onclick="showHome()">Home</a></li>
                <li><a href="#" onclick="showAbout()">About</a></li>
                <li><a href="#" onclick="showProjects()">Projects</a></li>
            </ul>
            <div class="toggleSwitch" onclick="changeMode()">
                <div class="toggleSlider">
                    <i class="bi bi-sun"
                        style="position: absolute; left: 6px; top: 2px; font-size: 15px; color: rgb(199, 199, 71);"></i>
                    <i class="bi bi-moon"
                        style="position: absolute; right: 6px; top: 2px; font-size: 15px; color: black;"></i>
                </div>
            </div>
        </div>
    </nav>
</header>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const toggleSwitch = document.querySelector('.toggleSwitch');
    const container = document.querySelector('.container');
    const logo = document.querySelector('.logo');
    const cards = document.querySelectorAll('.card, .featuredProjectCard');
    const headings = document.querySelectorAll('h3, h2, p');

    const darkModeState = localStorage.getItem('darkMode');

    if (darkModeState === 'enabled') {
        enableDarkMode();
    } else {
        disableDarkMode();
    }

    toggleSwitch.addEventListener('click', function() {
        const currentMode = document.body.classList.contains('darkMode') ? 'dark' : 'light';

        if (currentMode === 'dark') {
            disableDarkMode();
        } else {
            enableDarkMode();
        }
    });

    function enableDarkMode() {
        document.body.classList.add('darkMode');
        document.querySelector('header').classList.add('darkMode');
        document.querySelector('footer').classList.add('darkMode');
        container.classList.add('darkMode');
        logo.classList.add('darkMode');

        const navLinks = document.querySelectorAll('nav a');
        for (var i = 0; i < navLinks.length; i++) {
            navLinks[i].classList.add('darkMode');
        }

        for (var i = 0; i < cards.length; i++) {
            cards[i].classList.add('darkMode');
        }

        for (var i = 0; i < headings.length; i++) {
            headings[i].classList.add('darkMode');
        }

        localStorage.setItem('darkMode', 'enabled');
    }

    function disableDarkMode() {
        document.body.classList.remove('darkMode');
        document.querySelector('header').classList.remove('darkMode');
        document.querySelector('footer').classList.remove('darkMode');
        container.classList.remove('darkMode');
        logo.classList.remove('darkMode');

        const navLinks = document.querySelectorAll('nav a');
        for (var i = 0; i < navLinks.length; i++) {
            navLinks[i].classList.remove('darkMode');
        }

        for (var i = 0; i < cards.length; i++) {
            cards[i].classList.remove('darkMode');
        }

        for (var i = 0; i < headings.length; i++) {
            headings[i].classList.remove('darkMode');
        }

        localStorage.setItem('darkMode', 'disabled');
    }

    document.addEventListener('visibilitychange', function() {
        if (document.visibilityState === 'visible') {
            const darkModeState = localStorage.getItem('darkMode');
            if (darkModeState === 'enabled') {
                enableDarkMode();
            } else {
                disableDarkMode();
            }
        }
    });
});

function showHome() {
    document.querySelector('.home').style.display = 'block';
    document.querySelector('.about').style.display = 'none'; 
    document.querySelector('.projects').style.display = 'none'; 
}

function showAbout() {
    document.querySelector('.about').style.display = 'block'; 
    document.querySelector('.home').style.display = 'none'; 
    document.querySelector('.projects').style.display = 'none'; 
}

function showProjects() {
    document.querySelector('.projects').style.display = 'block'; 
    document.querySelector('.about').style.display = 'none'; 
    document.querySelector('.home').style.display = 'none'; 
}

showHome();

</script>

