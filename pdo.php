<?php
  $mysql = new PDO('mysql:host=localhost;port=3307;dbname=wtl_miniproject', 'root', '');
  $mysql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 ?>
