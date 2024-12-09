<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prime Tune - Your Fav Music</title>
    <link rel="icon" href="images/logo.png" type="image/icon type">
    <link rel="stylesheet" href="Song.css">
</head>
<meta name="color-scheme" content="dark light">

<body>
    <div class="container">
        <div class="sidebar">
            <div class="header">
                <img src="images/logo.png" alt="logo">
                <span class="logo">PrimeTune</span>
            </div>
            <ul class="menu-vertical">
                <li class="item"><a href="index.php"><i class="fa-solid fa-xl fa-house"></i> Home</a></li>
                <li class="item"><a href="search.php"><i class="fa-solid fa-xl fa-music"></i> Album</a></li>
                <li class="item"><a href="musicInfo.php"><i class="fa-solid fa-xl fa-book"></i>Quotes</a></li>
                <li class="item"><a href="aboutus.php"><i class="fa-solid fa-xl fa-address-card"></i>About</a></li>
            </ul>
        </div>
        <div class="Main-body">
            <?php
            // Include database connection
            include("db.php");

            // Parse query parameters from URL
            parse_str(parse_url("https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]")['query'], $params);
            $album = $params['value']; // Assuming 'value' is the parameter name

            // Initialize variables
            $cover = "";
            $data = array();

            // Retrieve album details
            $sql = "SELECT * FROM albums WHERE NAME='$album'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    // Store cover image URL
                    $cover = $row["COVER"];

                    // Display album details
                    echo "<div class='songAlbum'>
                        <div id='albumTitle'>" . $row["TITLE"] . "</div>
                        <img id='albumCover' src='" . $row["COVER"] . "'>
                    </div>";
                }
            }

            // Display song list    
            echo "<div class='songList'>Songs
            <div id='songItemContainer'>";

            // Retrieve songs from the album
            $sql = "SELECT * FROM " . strtolower($album);
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                for ($i = 0; $row = mysqli_fetch_assoc($result); $i++) {
                    // Display song details
                    echo "<div class='songItem'>
                    <img src='" . $cover . "'>
                    <span class='songName'>" . $row["NAME"] . "</span>
                    <span class='songListPlay'>
                        <span class='timestamp'>" . $row["DURATION"] . "</span>
                        <i id=$i class='songItemPlay fa-solid fa-circle-play'></i>

                    </span>
                    </div>";
                    // Store song data
                    $data[$i] = $row;
                }
            }


            // Close database connection
            mysqli_close($conn);

            // End HTML structure
            echo "</div></div></div>";

            // Encode song data as JSON
            $json = json_encode($data);
            // Encode cover URL as JSON
            $cover = json_encode($cover);
            ?>
        </div>
    </div>
    <div class="bottom">
        <div><img alt="" id="masterSongCover"></div>
        <div id="masterSongName"></div>
        <div><img src="images/playing.gif" id="gif"></div>
        <div class="icons">
            <!-- fontawesome icons -->
            <i class="fa-solid fa-xl fa-backward-step" id="previous"></i>
            <i class="fa-solid fa-2xl fa-circle-play" id="masterPlay"></i>
            <i class="fa-solid fa-xl fa-forward-step" id="next"></i>
        </div>
        <div class="progressBarContent">
            <span id="masterSongProgressDuration"></span>
            <input type="range" name="range" id="myProgressBar" value="0" step="0.1">
            <span id="masterSongDuration"></span>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/7485876171.js" crossorigin="anonymous"></script>
    <script type="text/javascript">
        let songs = <?php echo json_encode($json); ?>;
        let cover = <?php echo json_encode($cover); ?>;
    </script>
    <script type="text/javascript" src="script.js"></script>
</body>

</html>