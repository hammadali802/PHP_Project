<?php
include("./include/global_vars.php");

if (!isset($_SESSION)) {
    session_start();
}

echo "<link rel='stylesheet' href='" . CSSDIR . "header.css'/>";
echo "<link rel='stylesheet' href='" . CSSDIR . "drop_down_btn.css'/>";
?>

<header class="header">
    <a href="main_page.php">
        <img src="./assets/images/logo2.png" style="height: 48px" alt="" class="header logo" />
    </a>

    <div class="navigation">
        <ul class="navlist_ul">

            <?php
            if (isset($_SESSION[LOGGED_IN_USER_ARR])) {
                // $logged_in_user = $_SESSION[LOGGED_IN_USER_ARR];
                // if ($logged_in_user["istChef"] == 1)
                echo '
                <div>
                    <li class="navlist_li">
                        <a class="nav_a" href="add_product.php">Produkt Anlegen</a>
                    </li>
                </div>
                <div>
                    <li class="navlist_li">
                        <a class="nav_a" href="video_portal.php">Schulung</a>
                    </li>
                </div>
                ';
            }
            ?>

            <div>
                <li class="navlist_li">
                    <a class="nav_a" href="#">Home</a>
                </li>
            </div>
            <div>
                <li class="navlist_li">
                    <a class="nav_a" href="#">Sortiment</a>
                </li>
            </div>
            <div>
                <li class="navlist_li">
                    <a class="nav_a" href="https://esbau-baustoffhandel.de/about/">Über Uns</a>
                </li>
                </div<div>
                <li class="navlist_li">
                    <a class="nav_a" href="https://esbau-baustoffhandel.de/contact/">Kontakt</a>
                </li>
            </div>



            <div>
                <li class="navlist_li">
                    <?php
                    if (isset($_SESSION[LOGGED_IN_USER_ARR])) {
                        $logged_in_user = $_SESSION[LOGGED_IN_USER_ARR];
                        echo '
                            <div class="dropdown">
                                <button class="dropbtn">' . $logged_in_user["email"] . '</button>
                                <div class="dropdown-content">
                                    <a href="logout.php">Logout</a>
                                </div>
                            </div>
                        ';
                    } else {
                        echo '<a class="nav_a" href="login_page.php">Login</a>';
                    }
                    ?>
                </li>
            </div>

        </ul>
    </div>
</header>