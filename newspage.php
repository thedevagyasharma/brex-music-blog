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
    $sql = "SELECT * FROM post WHERE category='news' ORDER BY rand() limit 17";
    if(isset($_SESSION['user'])){
      $sql = "SELECT * FROM user,post WHERE post.category='news' AND user.user_id= ".$_SESSION['user_id']." AND (post.genre = user.genre1 OR post.genre = user.genre2) ORDER BY rand() LIMIT 9";
    }
    $stmt = $mysql->query($sql);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
     ?>

    <div class="container-fluid articlespage text-center">
        <div class="row d-flex justify-content-center text-center">
            <div class="col-12 d-flex justify-content-around p-0 rev1">
                <div class="articlepage-box">
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
            <h5>NEWS ARTICLES</h5>
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


    <footer>
        <div class="foote" id="go-to-support">

            <div class="col-3">
            </div>
            <div class="col-2">
                <ul>
                    <h3>Social</h3>
                    <div class="d-flex">
                        <li><a class="icons-link" href=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                            <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                          </svg></a></li>
                        <li><a class="icons-link" href=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                            <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                          </svg></a></li>
                        <li><a class="icons-link" href=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-twitch" viewBox="0 0 16 16">
                            <path d="M3.857 0L1 2.857v10.286h3.429V16l2.857-2.857H9.57L14.714 8V0H3.857zm9.714 7.429l-2.285 2.285H9l-2 2v-2H4.429V1.143h9.142v6.286z"/>
                            <path d="M11.857 3.143h-1.143V6.57h1.143V3.143zm-3.143 0H7.571V6.57h1.143V3.143z"/>
                          </svg></a></li>
                    </div>

                </ul>
            </div>

            <div class="col-2">
                <ul>
                    <h3>Company</h3>
                    <li><a href="">About Us</a></li>
                    <li><a href="">Jobs</a></li>
                    <li><a href="">Press</a></li>
                    <li><a href="">Investor Relations</a></li>
                    <li><a href="">Blog</a></li>
                </ul>
            </div>

            <div class="col-2">
                <ul>
                    <h3>Support</h3>
                    <li><a href="">Help Centre</a></li>
                    <li><a href="">Contact Us</a></li>
                    <li><a href="">Cookies</a></li>
                    <li><a href="">Privacy & terms</a></li>
                    <li><a href="">Sitemap</a></li>
                </ul>
            </div>

            <div class="col-2">
                <ul>
                    <h3>Community</h3>
                    <li><a href="">Developers</a></li>
                    <li><a href="">Referrals</a></li>
                    <li><a href="">Forum</a></li>
                </ul>
            </div>

        </div>
    </footer>


    <script src="/index.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>
</html>
