<?php
		session_start();
		require_once"pdo.php";
		if(isset($_POST["sortby"])){
			Header('Location:merch.php?sortby='.$_POST["sortby"]);
			return;
		}

?>


<!DOCTYPE html>
<html>
<head>

	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./index.css">
		<link rel="stylesheet" href="./signup.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<title>Merch Store</title>
</head>
<body>

<?php include"navbar.php" ?>


<div class="container-fluid news-row text-center">
		<div class="news-row-header">
        <h5>MERCH STORE</h5>
    </div>

		<div class="news-row-header-line">
		            <h6>__________</h6>
		</div>

		<div>
			<form method="POST">
				Sort By:
				<select name="sortby" id="sort" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
					<option  selected disabled >---None---</option>
					<option value="1">Low Price to High Price</option>
					<option value="0">High Price to Low Price</option>
				</select>
				<button type="submit" name="submit1" class="login-btn">GO</button>
			</form>
		</div>

		<div>
			<div class="row">
				<?php
					$sql1="SELECT merch_id,name, price, merch_img from merch";

					if(isset($_GET['sortby'])){

						if ($_GET['sortby']==1){
						    $sql1.= " ORDER BY price asc";
						}
						elseif ($_GET['sortby']==0){
						    $sql1.= " ORDER BY price desc";
						}
					}
					$stmt = $mysql->query($sql1);
					while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
						echo '<div class="col-sm">';
						echo '<a href="merchitem.php?variable='.$row["merch_id"].'">';
						echo '<div class="p-0 featured-row-box featured-box"  style="cursor: hand;">';
						echo '<img src="'.$row["merch_img"].'">';
						echo '<div>'.$row["name"].'</div>';
						echo '<div> Rs.'.$row["price"].'</div>';
						echo '</div>';
						echo '</a>';
						echo '</div>';
					}
			?>
			</div>
		</div>
</div>

<?php include"footer.php"; ?>


	<script src="./index.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
	</script>

</body>
</html>
