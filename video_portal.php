<?php
include("./include/mysql_conn.php");
include("./include/html_meta_head.php");
echo "<link rel='stylesheet' href='" . CSSDIR . "video_portal.css'/>";
?>

<body style="margin: 0">

    <?php
    include("./include/header.php");
    ?>

    <hr>

    <div class="view-wrapper">
        <div class="thema-wrapper">
            <?php
            $sql = "SELECT * FROM Themen";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo
                    "<div class='thema' data-id='" . $row["id"] . "' >
                <span>" . $row["title"] . "</span>
                </div>";
                }
            } else {
                echo "0 results";
            }
            ?>
        </div>

        <div class="video-wrapper">

            <?php
            $thema_id = 1;

            if (isset($_GET['id']) && !empty($_GET['id'])) {
                $thema_id = $_GET["id"];
            }

            $sql = "SELECT * FROM Video WHERE thema_id= '$thema_id'";
            $result = $conn->query($sql);

            //     <div> id: " . $row["id"] .
            //     " - Title: " . $row["title"] .
            //     " - Description: " . $row["description"] .
            //     " - Rating: " . $row["rating"] .
            //     " - Video URL: " . $row["video_url"] .
            //     " - Thema ID: " . $row["thema_id"] .
            //     "<br>
            // </div>

            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "
                <div class='video'>
                        <iframe width='500' 
                        height='300' 
                        src='" . $row["video_url"] . "'
                        title='YouTube video player' 
                        frameborder='0' 
                        allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share'
                        allowfullscreen>
                        </iframe>
                    
                        
                    </div>
                <div class='video-text-div'>
                        <h3>" . $row["title"] . "</h3>
                        <span> " . $row["description"] . "</span>
                    </div>
                ";
                }
            } else {
                echo "In Bearbeitung";
            }
            ?>
        </div>
    </div>


    <script type="text/javascript">
    // Getting all thema divs in array
    let themeDivsArr = document.getElementsByClassName('thema');

    for (const themaDiv of themeDivsArr) {
        console.log('themeDivsArr: ', themaDiv.dataset.id);

        themaDiv.addEventListener('click', () => {
            window.location.assign(
                `${window.location.protocol}//${window.location.host}/php/swe2/video_portal/video_portal.php?id=${themaDiv.dataset.id}`
            );
        });
    }
    </script>
</body>

</html>