<?php
    include 'header.php'; 
?>
<section class="hero">
    <h1>Coleen's Projects</h1>
</section>

<div class="container">
<section id="home" class="home">
    <div class="welcome">
        <h3 style="font-size: 30px;">Welcome to my Data Administration Project Website!</h3>
        <p>Your one-stop destination to explore my journey as an IT student.</p>
    </div>

    <h2 class="featuredTitle" style="font-size:30px; font-weight:bolder;">Featured Projects</h2>
    <div class="featuredProjectsContainer">
        <div class="featuredProjectCard">
            <h3>Featured Project 1</h3>
            <img src="mainWeb/project1.png" alt="Description of Project 1" class="projectImage">
            <p>This Java project is inspired by the "Inside Out" theme, centering on the character "Anger" and designed as a Four Pics One Word game.</p>
        </div>
        <div class="featuredProjectCard">
            <h3>Featured Project 2</h3>
            <img src="mainWeb/project2.png" alt="Description of Project 2" class="projectImage">
            <p>This recent project, developed using HTML, presents a gallery displaying a variety of images. 
            It has interactive elements like a button for dark and light mode, and collapse and expand buttons.</p>
        </div>
        <div class="featuredProjectCard">
            <h3>Featured Project 3</h3>
            <img src="mainWeb/project3.png" alt="Description of Project 3" class="projectImage">
            <p>This project highlights multimedia skills, featuring Photoshop-edited images showcased in class, using techniques like cartoonization and bubble-head effects.</p>
        </div>
    </div>

    <div class="contact">
    <h2 style="font-size:30px; font-weight:bolder;">Contact Me</h2>
    <p>If you would like to get in touch, feel free to reach out through my social media below or through this calling card!</p>
    <div class="imageContainer">
        <div class="imageColumn">
            <img src="mainWeb/isles_front.jpg" alt="Calling Card Front" class="contactImage">
        </div>
        <div class="imageColumn">
            <img src="mainWeb/isles_back.jpg" alt="Calling Card Back" class="contactImage">
        </div>
    </div>
</div>

</section>

    <section id="about" class="about" style="display: none;">
        <h3 style="font-size:30px; font-weight:bolder;">About Me</h3>
        <div class="aboutMeBox">
            <p>
                I am an IT student at the Polytechnic University of the Philippines Sto. Tomas Campus, where I am passionate about exploring the vast field of technology and its applications. 
                I strive to enhance my skills and contribute to innovative projects. My journey in IT has equipped me with problem-solving abilities and a keen interest in emerging technologies. 
                I am eager to collaborate with like-minded individuals and make a positive impact in the tech community.
            </p>
        </div>
    </section>

    <section id="projects" class="projects" style="display: none;">
    <h2 style="font-size: 30px; font-weight:bolder;"> My Projects</h2>
    <div class="projectsContainer">
        <div class="projectsCards">
            <div class="card">
                <h3 style="margin-top:100px;">Project 1</h3>
                <p>A05</p>
                <a href="A05/index.php"></a>
            </div>
            <div class="card">
                <h3 style="margin-top:100px;">Midterms</h3>
                <p>M01</p>
                <a href="M01/index.php"></a>
            </div>
            <div class="card">
                <h3 style="margin-top:100px;">Activity 6</h3>
                <p>A06</p>
                <a href="A06/index.php"></a>
            </div>
            <div class="card">
                <h3 style="margin-top:100px;">Stay Tuned!</h3>
                <p>🔜</p>
                <a href="M01/index.php"></a>
            </div>
            <div class="card">
                <h3 style="margin-top:100px;">Stay Tuned!</h3>
                <p>🔜</p>
                <a href="M01/index.php"></a>
            </div>
        </div>
    </div>
</section>

</div>

<?php
    include 'footer.php'; 
?>
