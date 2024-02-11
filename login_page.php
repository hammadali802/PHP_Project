<?php
include("./include/mysql_conn.php");
include("./include/html_meta_head.php");

?>


<body style="margin: 0;">
    <?php
    include("./include/header.php");
    echo "<link rel='stylesheet' href='" . CSSDIR . "login.css'/>";
    ?>
    <div class="container">
        <form class="login-form" style="margin: 48px;" action="login.php" method="post">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="">

            <label for="password">Password</label>
            <input type="password" id="password" name="password" value="">

            <input type="submit" value="Login" id="submit-btn">
        </form>
    </div>
</body>