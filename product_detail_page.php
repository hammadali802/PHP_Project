<?php
include("./include/mysql_conn.php");
include("./include/html_meta_head.php");
echo "<link rel='stylesheet' href='" . CSSDIR . "product_detail_page.css'/>";
?>

<body style="margin: 0">

    <?php
    include("./include/header.php");
    ?>
    <div class="products-detail-wrapper">

        <div class='product_page'>
            <?php
            $id = '';

            if (isset($_GET['id']) && !empty($_GET['id'])) {
                $id = $_GET["id"];
            } else {
                die("Id parameter not found");
            }

            $sql = "SELECT * FROM Produkte WHERE id = '$id'";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <div class='product' data-id='" . $row["id"] . "'>
                        <img src='" . $row["picture_b64"] . "' style='height:500px; width:500px;'>
                    </div>
                    <div class='details'>
                        <span id='product-title'>" . $row["title"] . " " . $row["size"] . "</span>

                        <div class='property-wrapper'>
                            <span class='property-description'> Preis: </span>
                            <span class='property'>€" . $row["price"] . "</span>
                        </div>

                        <div class='property-wrapper'>
                            <span class='property-description'> Große: </span>
                            <span class='property'>" . $row["size"] . "</span>
                        </div>

                        <div class='property-wrapper'>
                            <span class='property-description'> Farbe: </span>
                            <span class='property'>" . $row["color"] . "</span>
                        </div>

                        <div class='property-wrapper'>
                            <span class='property-description'> Oberfläche: </span>
                            <span class='property'>" . $row["surface_type"] . "</span>
                        </div>
                    </div>
                 
                    ";
                }
            }
            ?>
        </div>
    </div>

</body>

</html>