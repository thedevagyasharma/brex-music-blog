<?php
require_once "pdo.php";
session_start();

if(isset($_GET['post_id'])){
  $sql = "SELECT * FROM post WHERE post_id=:id";
  $stmt = $mysql->prepare($sql);
  $stmt->execute(array(
    ':id' => $_GET['post_id']
  ));

  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  $article = $row['content'];
  $img = $row['image'];
  $title = $row['title'];
  $type = strtoupper($row['category']);
  $author = $row['author'];
  $date = $row['ondate'];
  $genre = strtoupper($row['genre']);
}
else{
  header("Location:newsarticle.php?post_id=1");
}

if(isset($_POST['comment'])){
  $sql = "INSERT INTO comments(comment, user_id, post_id, ondate) VALUES(:cm, :uid, :pid, :od)";
  $stmt = $mysql->prepare($sql);
  $stmt->execute(array(
    ":cm" => $_POST['cmnttext'],
    ":uid" => $_SESSION['user_id'],
    ":pid" => $_GET['post_id'],
    ":od" => date("Y-m-d")
  ));
}


  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./newsarticle.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Brex</title>
</head>
<body>

    <!-- NAVBAR -->
  <?php include "navbar.php" ?>


    <!-- SINGLE ARTICLE  -->
    <div class="container news-row text-center">

        <!-- MAIN ARTICLE  -->
        <div class="article-row-header d-flex flex-column justify-content-start">
            <!-- ARTICLE HEADER  -->
            <div class="article-header col-8 p-0 text-left" >
                <h4><?=$type." / ".$genre?></h4>
                <h1><?=$title?></h1>
                <h2>____________</h2>
                <h3>By <?=$author?></h3>
                <h5><?=$date?></h5>
            </div>
            <!-- ARTICLE CONTENT  -->
            <div class="article-content text-left">
                <img class="img-fluid article-img" src="<?=$img?>">
                <div class="article-text" >
                    <h4>
                      <?php echo(nl2br(htmlentities($article))); ?>
                    </h4>
                </div>
            </div>

        </div>

        <!-- COMMENTS SECTION  -->
        <div class="comments-row-header flex-column justify-content-start">
            <div class="comments-header text-left">
                <h3>Comments</h3>
            </div>
            <?php
              $sql = "SELECT username,comment FROM user,comments WHERE post_id=:pid AND comments.user_id=user.user_id";
              $stmt = $mysql->prepare($sql);
              $stmt->execute(array(
                ":pid" => $_GET['post_id']
              ));
              $row = $stmt->fetch(PDO::FETCH_ASSOC);
              while($row){
                echo("<div class='text-left'>
                    <hr>
                    <h6>".htmlentities($row['username'])." —</h6>
                    <p>".htmlentities($row['comment'])."</p>
                </div>");
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
              }
             ?>
        </div>
        <?php if(isset($_SESSION['user'])){
          echo("<div class='comments-row-header flex-column justify-content-start'>
              <div class='comments-header text-left'>
                  <h3>Leave your thoughts</h3>
              </div>
              <form method='POST'>
                  <textarea placeholder='Add Your Comment' name='cmnttext'></textarea>
                  <div class='btn'>
                     <input type='submit' name='comment' class='comment' value='Comment'>
                     <button id='clear' href='#'>Cancel</button>
                  </div>
              </form>
          </div>");
        } ?>


    </div>

    <!-- NEWSLETTER -->
    <div class="container-fluid newsletter-row text-center d-flex justify-content-center">
        <div class="col-8 newsletter-border">
            <div class="newsletter-row-header">
                <h3>Join the Brex community</h3>
            </div>
            <div class="newsletter-row-header-line">
                <h6>Every week, we'll send you curated articles and reviews <br> handpicked for your Music taste</h6>

                <h6>Plus, you'll be the first to know about discounts on our Merchandise </h6>
            </div>
            <div class="d-flex text-center justify-content-center">
                <form class="form-elements">
                        <div>
                          <input type="text" class="join-box" placeholder="Enter email address">
                          <button class="join-btn">Join</button>
                        </div>
                </form>
            </div>
        </div>
    </div>

    <?php include "footer.php" ?>



    <script src="./index.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>
</html>
