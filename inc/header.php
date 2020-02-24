<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css"/>
</head>
<body>
<nav>

<div class="nav-main">
    <div id="logo"> 
    <img src="./img/roselogo-w.svg" alt="RoseLogo">
    </div>
        <ul>
            <li>Home</li>
            <li>About</li>
            <li>Contact</li>
        </ul>
</nav>

<main>
<div class="main-content">

<?php
include('./content/about.php');
?>
</div>
</main>

<footer>
    <div class="footer-main">
        <p> Footer</p>
    </div>
</footer>
    
</body>
</html>


<?php
include('./inc/menu.php');
include('./inc/header.php');
?>



<?php

include('./inc/side.php');
include('./inc/footer.php');