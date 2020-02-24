<link rel="stylesheet" href="./css/style.css"/>
<?php
    include('./inc/Menu.php');
    include('./inc/DbConn.php');

    DbConn::init("127.0.0.1",'bob','bobbobby','utf8','rose');
    $pdo = DbConn::getPDO();
?>

<nav>
    <div class="nav-main">
    <div id="logo">
    <img src="./img/roselogo-w.svg" alt="Rose Logo">
    </div>
        <ul>
            <li>
                <?php
                //the number is the order in the menu -browser-
                    $menuObj = new Menu("nav-menu");
                    $menuObj->addItem("Home","default");
                    $menuObj->addItem("About","about");
                    $menuObj->addItem("Products","products");
                    $menuObj->addItem("Log In","login");
                    $menuObj->setDesc(false);
                    echo $menuObj->render();
                ?>
            </li>
        <ul>
    </div>
</nav>

<main>
    <div class="main-content">
        <?php
        include('./user/user.php');
        ?>
</div>
</main>

<footer>
    <div class="footer-main">
        <p> &copy <?php echo date('Y');?> Rose Skin Solutions</p>
    </div>
</footer>
    
</body>
</html>

<?php
    $qGetVisit = $pdo->query('SELECT count(*) as `cnt` FROM `visits`');
    //add visit to data
    while($row = $qGetVisit->fetch()){
       // echo "<br/>{$row['cnt']}";
    }
?>