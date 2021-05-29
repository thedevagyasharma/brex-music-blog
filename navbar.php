<?php
$logged = False;
if(isset($_SESSION['user'])){
  $logged = True;
}
 ?>

<div class="container-fluid header-bg">
    <div class="row d-flex justify-content-between">
        <div class="col-lg-3 col-6 p-0 div1">
            <a href="./index.php">
                <img class="logo-size" src="./Assets/Brex-Logo-Grad.png" alt="">
            </a>
        </div>

        <div class="col-lg-6 d-lg-flex d-none p-0 div2  header-content justify-content-center" id="myMenu">
            <a href="newspage.php">NEWS</a>
            <a href="reviewpage.php">REVIEWS</a>
            <a href="featurepage.php">FEATURES</a>
            <a href="music.php">MUSIC</a>
            <a href="merch.php">MERCH</a>
        </div>

        <div class="col-lg-3 col-6 p-0 div3 d-flex justify-content-around align-items-center">
          <div class="header-content">
            <a style="color:white;">
              <?php
              if($logged){
                $wl = strtoupper(htmlentities($_SESSION['user']));
                echo ($wl);
              }

               ?>
            </a>
          </div>
            <div>
              <?php
                if(!$logged){
                  echo ("<a class='login-btn' href='./login.php'>LOG IN</a>");
                }
                else{
                  echo ("<a class='login-btn' href='./logout.php'>LOG OUT</a>");
                }
               ?>
            </div>
        </div>
    </div>
</div>
