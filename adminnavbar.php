<?php
$logged = False;
if(isset($_SESSION['admin'])){
  $logged = True;
}
 ?>

<div class="container-fluid header-bg">
    <div class="row d-flex justify-content-between">
        <div class="col-lg-3 col-6 p-0 div1">
            <a href="./post.php">
                <img class="logo-size" src="./Assets/Brex-Logo-Grad.png" alt="">
            </a>
        </div>

        <div class="col-lg-6 d-lg-flex d-none p-0 div2  header-content justify-content-center" id="myMenu">
            <a href="./post.php">NEW POST</a>
            <a href="./addmerch.php">NEW PRODUCT</a>
            <a href="./addalbum.php">NEW ALBUM</a>
        </div>

        <div class="col-lg-3 col-6 p-0 div3 d-flex justify-content-around align-items-center">
          <div class="header-content">
            <a style="color:white;">
              <?php
              if($logged){
                $wl = strtoupper(htmlentities($_SESSION['admin']));
                echo ($wl);
              }

               ?>
            </a>
          </div>
            <div>
              <?php
                if(!$logged){
                  echo ("<a class='login-btn' href='./adminlogin.php'>LOG IN</a>");
                }
                else{
                  echo ("<a class='login-btn' href='./logout.php'>LOG OUT</a>");
                }
               ?>
            </div>
        </div>
    </div>
</div>
