<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
</head>

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
        <div class="home">
            <div id="horizontalLine"></div>
            <div class="slider">
                <section id="slider">
                    <input type="radio" name="slider" id="s1">
                    <input type="radio" name="slider" id="s2">
                    <input type="radio" name="slider" id="s3" checked>
                    <input type="radio" name="slider" id="s4">
                    <input type="radio" name="slider" id="s5">
                    <label for="s1" id="slide1"></label>
                    <label for="s2" id="slide2"></label>
                    <label for="s3" id="slide3"></label>
                    <label for="s4" id="slide4"></label>
                    <label for="s5" id="slide5"></label>
                </section>
            </div>
            <div>
                <h2>Recommended songs</h2>
            </div>
            <div class="album">
                <?php
                include("db.php");
                $sql = "SELECT * FROM albums LIMIT 6";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<div class='card'>";
                        echo " <img src='" . $row["COVER"] . "' id='" . $row["NAME"] . "' onclick='navigatealbum(this)'>";
                        echo "<div class='content'>";
                        echo "<h3>" . $row["NAME"] . "</h3>";
                        echo "</div>";
                        echo "</div>";
                    }
                }
                mysqli_close($conn);
                ?>
            </div>
            <div>
                <h2>Recommended Artists</h2>
            </div>
            <div class="artist">
                <?php
                include("db.php");
                $sql = "SELECT * FROM albums WHERE id BETWEEN 7 AND 11";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<div class='card-artist'>";
                        echo " <img src='" . $row["COVER"] . "' id='" . $row["NAME"] . "' onclick='navigatealbum(this)'>";
                        echo "<div class='content'>";
                        echo "<h3>" . $row["TITLE"] . "</h3>";
                        echo "<span>" . $row["SUBNAME"] . "</span>";
                        echo "</div>";
                        echo "</div>";
                    }
                }
                mysqli_close($conn);
                ?>
            </div>
        </div>
    </div>
    <div class="bottom" id="hideBottom">
        <img alt="" id="masterSongCover">
        <div id="masterSongName"></div>
        <img src="images/playing.gif" alt="" id="gif">
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
    <script src="script.js"></script>
</body>

</html>