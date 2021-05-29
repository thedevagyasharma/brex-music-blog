<?php
require_once "pdo.php";
session_start();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./index.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Brex</title>
</head>
<body>

    <?php
      include "navbar.php";
    ?>

    <!-- NEWS ROW WITH 4 POSTS -->

    <div class="container-fluid news-row text-center">
        <div class="news-row-header">
            <h5>TOP NEWS ARTICLES</h5>
        </div>

        <div class="news-row-header-line">
            <h6>__________</h6>
        </div>

        <!-- FIRST ROW -->
        <div class="row d-flex justify-content-center text-center">
          <?php
            $sql = "SELECT * FROM post WHERE category='news' ORDER BY rand() LIMIT 8";
            if(isset($_SESSION['user'])){
              $sql = "SELECT * FROM user,post WHERE post.category='news' AND user.user_id= ".$_SESSION['user_id']." AND (post.genre = user.genre1 OR post.genre = user.genre2) ORDER BY rand() LIMIT 8";
            }
            $stmt = $mysql->query($sql);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            while($row!==false){
              echo('<div class="col-5 d-flex justify-content-around p-0 rev1">');
              for($i=1; $i<=2;$i++){
                echo("<div class='col-5 p-0 news-row-box news-box'>
                    <a href='./newsarticle.php?post_id=".$row['post_id']."'>
                        <img class='img-fluid news-img' src='".$row['image']."'>

                        <h3>".$row['title']."</h3>

                        <h6>".$row['author']."</h6>
                    </a>
                </div>");
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
              }
              echo("</div>");
            }


           ?>

        </div>
    </div>

    <!-- REVIEWS ROW WITH 6 POSTS -->
    <div class="container-fluid reviews-row text-center">
        <div class="reviews-row-header">
            <h5>LATEST REVIEWS</h5>
        </div>

        <div class="reviews-row-header-line">
            <h6>__________</h6>
        </div>

        <!-- FIRST ROW -->
        <div class="row d-flex justify-content-center text-center">
          <?php
            $sql = "SELECT * FROM post WHERE category='review' ORDER BY rand() LIMIT 9";
            if(isset($_SESSION['user'])){
              $sql = "SELECT * FROM user,post WHERE post.category='review' AND user.user_id= ".$_SESSION['user_id']." AND (post.genre = user.genre1 OR post.genre = user.genre2) ORDER BY rand() LIMIT 9";
            }
              $stmt = $mysql->query($sql);
              $row = $stmt->fetch(PDO::FETCH_ASSOC);
              while ($row!==false) {
                echo "<div class='col-5 d-flex justify-content-around p-0'>";
                for($i=1; $i<=3;$i++){
                  echo ("<div class='col-3 p-0 reviews-row-box reviews-box'>
                      <a href='./newsarticle.php?post_id=".$row['post_id']."'>
                          <img class='img-fluid reviews-img' src='".$row['image']."'>

                          <h2>".explode("-", $row['title'])[1]."</h2>

                          <h3>".explode("-", $row['title'])[0]."</h3>

                          <h4>".$row['genre']."</h4>

                          <h5>by ".$row['author']."</h5>

                          <h6>".$row['ondate']."</h6>
                      </a>
                  </div>");
                  $row = $stmt->fetch(PDO::FETCH_ASSOC);
                }
                echo "</div>";
              }
           ?>
        </div>
    </div>

    <!-- FEATURED ROW WITH 4 POSTS -->

    <div class="container-fluid featured-row text-center">
        <div class="featured-row-header">
            <h5>FEATURED</h5>
        </div>

        <div class="featured-row-header-line">
            <h6>__________</h6>
        </div>

        <!-- FIRST ROW -->
        <div class="row d-flex justify-content-center text-center">
          <?php
            $sql = "SELECT * FROM albums WHERE featured='1' ORDER BY rand() LIMIT 4";
            if(isset($_SESSION['user'])){
                $sql = "SELECT * FROM user,albums WHERE albums.featured='1' AND user.user_id= ".$_SESSION['user_id']." AND (albums.genre = user.genre1 OR albums.genre = user.genre2) ORDER BY rand() LIMIT 4";
            }

            $stmt = $mysql->query($sql);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            while($row!==false){
                echo("<div class='col-5 d-flex justify-content-around p-0'>");
                for($i=0;$i<2;$i++){
                  echo("<div class='col-5 p-0 featured-row-box featured-box'>
                      <a href=''>
                          <img class='img-fluid featured-img' src='".$row['cover']."'>

                          <h2>".$row['name']."</h2>

                          <h3>".$row['artist']."</h3>
                          <h4>".$row['genre']."</h4>
                      </a>
                  </div>");
                  $row = $stmt->fetch(PDO::FETCH_ASSOC);
                }
                echo("</div>");

            }


           ?>

        </div>
    </div>

    <?php
      include "footer.php";
     ?>

    <script src="./index.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>
</html>
