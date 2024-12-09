<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prime Tune - Your Fav Music</title>
    <link rel="icon" href="images/logo.png" type="image/icon type">
  <link rel="icon" href="img/logo.png" type="image/icon type">
  <link rel="stylesheet" href="album.css">
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
    <div class="search">
      <div class='ag-courses_box'>
        <?php
        include("db.php");
        $sql = "SELECT * FROM albums WHERE id IN (12, 13, 14, 15, 16, 17, 18, 19);";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='ag-courses_item'>";
            echo "<a id='" . $row["NAME"] . "' onclick='navigatealbum(this)' class='ag-courses-item_link'>";
            echo "<div class='ag-courses-item_bg'></div>";
            echo "<div class='ag-courses-item_title'>" . $row["TITLE"] . "</div>";
            echo "</a>";
            echo "</div>";
          }
        }
        mysqli_close($conn);
        ?>
      </div>
    </div>
  </div>
  <footer class="footer">
    <div class="footer-container">
      <ul class="inline-list">
        <a href="Home.php">Web Development</a>
        <a href="Search.php">Development</a>
        <a href="Add.php">Hosting</a>
      </ul>
      <ul class="social-icon">
        <a href="https://www.linkedin.com/in/pranav-kshirsagar-3a204823a/" target="_blank"><img src="img/twitter_logo.png" alt="Twitter"></a>
        <a href="https://www.instagram.com/pranav8289/" target="_blank"><img src="img/insta_logo.png" alt="Instagram"></a>
        <a href="https://www.facebook.com/pranav.kshirsagar.716/" target="_blank"><img src="img/fb_logo.png" alt="Facebook"></a>
      </ul>
    </div>
  </footer>
  <script src="https://kit.fontawesome.com/7485876171.js" crossorigin="anonymous"></script>
</body>
<script src="script.js"></script>

</html>