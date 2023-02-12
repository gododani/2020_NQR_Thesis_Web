<?php
    session_start();
    require_once("../html/header.html");
?>
<body data-spy="scroll" data-target=".navTarget" data-offset="60">
<header>
    <div class="brand">AtomFix</div>
    <nav class="navTarget">
        <ul>
            <li>
                <a class="nav-link active" href="index.php">Kezdőlap</a>
            </li>
            <!-- Admin fül -->
            <?php
                if(isset($_SESSION['admin'])){
                    echo '<li><a class="nav-link" href="admin.php">Admin fül</a></li>';
                }
            ?>
            <li>
                <a class="nav-link" href="#aboutUs">Rólunk</a>
            </li>
            <li>
                <a class="nav-link" href="#WorkersLink">Kollégák</a>
            </li>
            <li>
                <a class="nav-link "href="#ContactLink">Kapcsolat</a>
            </li>
            <?php
                if(isset($_SESSION['username']) || isset($_SESSION['admin'])){
                    echo '<li><a href="logout.php">Kilépés</a></li>';
                }
                else{
                    echo '<li><a href="loginForm.php">Belépés</a></li>';
                }
            ?>
        </ul>
    </nav>
    <div class="menu-toggle"><i class="fas fa-bars"></i></div>
</header>
    <!--- MAIN CONTENT --->
    <div class="content">
        <?php
            require_once('../html/slider.html');
            require_once('../html/aboutUs.html');
            require_once('../html/testimonials.html');
            require_once('dataTable.php');
        ?>

        <!--- CONTACT --->
        <div class="wrapper text-grey p-5" id="body-footer">
            <div id="ContactLink"></div>
            <div class="row">
                <?php
                    require_once('../html/availability.html');
                    require_once('../html/news.html');
                    require_once('../html/message.html');
                ?>
            </div>
        </div>
        <?php
            require_once('../html/copyright.html');
        ?>
    </div>
</body>
</html>