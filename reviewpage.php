<?php
require_once "pdo.php";
session_start();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./articlespage.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Brex</title>
</head>
<body>

    <?php include "navbar.php"; ?>

    <?php
    $sql = "SELECT * FROM post WHERE category='review' ORDER BY rand() limit 9";
    if(isset($_SESSION['user'])){
      $sql = "SELECT * FROM user,post WHERE post.category='review' AND user.user_id= ".$_SESSION['user_id']." AND (post.genre = user.genre1 OR post.genre = user.genre2) ORDER BY rand() LIMIT 9";
    }
    $stmt = $mysql->query($sql);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
     ?>

    <div class="container-fluid articlespage text-center">
        <div class="row d-flex justify-content-center text-center">
            <div class="col-12 d-flex justify-content-around p-0 rev1">
                <div class="articlepage-box" style="width:500px!important;">
                  <?php
                    echo("<a href='./newsarticle.php?post_id=".$row['post_id']."'>
                        <img class='img-fluid news-img' width='100%' src='".$row['image']."'>

                        <h3>".$row['title']."</h3>

                        <h6>".$row['author']."</h6>
                    </a>
                    ");
                  ?>


                </div>
            </div>
        </div>

    </div>





    <!-- NEWS ROW WITH 4 POSTS -->
    <div class="container-fluid news-row text-center">
        <div class="news-row-header">
            <h5>REVIEWS</h5>
        </div>

        <div class="news-row-header-line">
            <h6>__________</h6>
        </div>

        <!-- FIRST ROW -->
        <div class="row d-flex justify-content-center text-center">
          <?php
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
          } ?>
        </div>
    </div>



    <!-- NEWSLETTER -->
    <div class="container newsletter-row text-center d-flex justify-content-center">
        <div class="col-8 newsletter-border">
            <div class="newsletter-row-header">
                <h3>Join the Brex community</h3>
            </div>
            <div class="newsletter-row-header-line">
                <h6>Every week, we'll send you curated articles and reviews <br> handpicked for your Music taste</h6>

                <h6>Plus, you'll be the first to know about discounts on our Merchandise </h6>
            </div>

            <div class="newsletter-row-form d-flex text-center justify-content-center">
                <form class="form-elements">
                    <div class="">
                        <div class="">
                          <input type="text" class="join-box" placeholder="Enter email address">
                          <button class="join-btn">Join</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>


    <?php include "footer.php" ?>


    <script src="/index.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>
</html>
