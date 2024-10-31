<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
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

    toggleSwitch.addEventListener('click', function() {
        document.body.classList.toggle('darkMode');
        document.querySelector('header').classList.toggle('darkMode');
        document.querySelector('footer').classList.toggle('darkMode');
        container.classList.toggle('darkMode'); 
        logo.classList.toggle('darkMode'); 

        const navLinks = document.querySelectorAll('nav a');
        navLinks.forEach(link => {
            link.classList.toggle('darkMode');
        });

        cards.forEach(card => {
            card.classList.toggle('darkMode');
        });

        headings.forEach(heading => {
            heading.classList.toggle('darkMode'); 
        });
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

