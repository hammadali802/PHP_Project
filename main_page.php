<?php
include("./include/mysql_conn.php");
include("./include/html_meta_head.php");

if (!isset($_SESSION)) {
    session_start();
}

echo "<link rel='stylesheet' href='" . CSSDIR . "main.css'/>";
echo "<link rel='stylesheet' href='" . CSSDIR . "products_list.css'/>";
?>

<body style="margin: 0">

    <?php
    // if (isset($_SESSION[LOGGED_IN_USER_ARR])) {
    //     $logged_user = $_SESSION[LOGGED_IN_USER_ARR];
    //     echo ($logged_user['email']);
    //     echo "<br><br>";
    // }

    include("./include/header.php");
    ?>

    <hr>
    <div id="main-content-wrapper">
        <div class="img-slider">
            <div class="slide active">
                <img src="./assets/images/slide1.jpeg" alt="" />
                <div class="info">
                    <span class="Text"> Wieso sollten sie sich für uns entscheiden? </span>

                </div>
            </div>

            <div class="slide">
                <img src="./assets/images/slide2.jpeg" alt="" />
                <div class="info">
                    <span class="Text">Wir bieten eine große Auswahl an hochqualitativen Fliesen zu
                        erschwinglichen Preisen</span>
                </div>
            </div>

            <div class="slide">
                <img src="./assets/images/slide3.jpeg" alt="" />
                <div class="info">
                    <span class="Text">Wir verfügen über viel Erfahrung im Fliesenhandel und können daher fundierte
                        Beratung bieten</span>
                </div>
            </div>

            <div class="navigation-banner">
                <div class="btn active"></div>
                <div class="btn"></div>
                <div class="btn"></div>
            </div>
        </div>
    </div>

    <div class="products-list-wrapper">

        <h1>Produkte</h1>

        <div class="products-list">
            <?php
            $sortBy = "Title";
            $sortOrder = "Asc";

            $sql = "SELECT * FROM Produkte";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <div class='product' data-id='" . $row["id"] . "'>
                        <img src='" . $row["picture_b64"] . "'>
                        <h3>" . $row["title"] . "</h3>
                        <span> €" . $row["price"] . "</span>
                    </div>
                    ";
                }
            }
            ?>
        </div>
    </div>
    <hr style="margin-top: 30px;">
    <footer class="footer">
        <span style="font-size: 50px">Hier können AGB stehen</span>


    </footer>

    <!-- Script for showing image slideshow -->
    <script type="text/javascript">
    var slides = document.querySelectorAll(".slide");
    var btns = document.querySelectorAll(".btn");
    let currentslide = 1;

    var manualNav = function(manual) {
        slides.forEach((slide) => {
            slide.classList.remove("active");
            btns.forEach((btn) => {
                btn.classList.remove("active");
            });
        });
        slides[manual].classList.add("active");
        btns[manual].classList.add("active");
    };

    btns.forEach((btn, i) => {
        btn.addEventListener("click", () => {
            manualNav(i);
            currentslide = i;
        });
    });

    var repeat = function(activeClass) {
        let active = document.getElementsByClassName("active");
        let i = 1;

        var repeater = () => {
            setTimeout(function() {
                [...active].forEach((activeSlide) => {
                    activeSlide.classList.remove("active");
                });

                slides[i].classList.add("active");
                btns[i].classList.add("active");
                i++;

                if (slides.length == i) {
                    i = 0;
                }
                if (i >= slides.length) {
                    return;
                }

                repeater();
            }, 5000);
        };
        repeater();
    };

    repeat();
    </script>

    <!-- Script for redirecting to product detail page on product item click -->
    <script type="text/javascript">
    // Getting all thema divs in array
    let productDivsArr = document.getElementsByClassName('product');

    for (const productDiv of productDivsArr) {
        console.log('productDivsArr: ', productDiv.dataset.id);

        productDiv.addEventListener('click', () => {
            window.location.assign(
                `${window.location.protocol}//${window.location.host}/PHP/swe2/video_portal/product_detail_page.php?id=${productDiv.dataset.id}`
            );
        });
    }
    </script>

</body>

</html>