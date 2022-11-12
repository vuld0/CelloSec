<!DOCTYPE html>
<html>
<head>
	<title>Cello</title>
	
	<link rel="icon" href="img/logo.jpg" />
	<link rel = "stylesheet" type = "text/css" href="css/style.css" media="all">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script src="php/jquery-1.7.2.min.js"></script>

	<script src="php/carousel.js"></script>


</head>
<body>
	<div id="header">
		<img src="img/logo.jpg">
		<label>Cello</label>
		<ul>
			<li><a href="logout.php" class="">Logout</a></li>
			<li><a href="home.php"><i class="icon-home"></i>Home</a></li>
		</ul>
	</div>
			
	
	


<div id="container">

	<div class="nav">
	
			 <ul>
				<li><a href="#"><i></i>  </a></li>
				
			</ul>
	</div>
	
	
	<div id="carousel">
		<div id="myCarousel" class="carousel slide">
			<div class="carousel-inner">
				<div class="active item" style="padding:0; border-bottom:0 solid #111;"><img src="img/i1.jpg" class="carousel"></div>
				<div class="item" style="padding:0; border-bottom:0 solid #111;"><img src="img/i2.jpg" class="carousel"></div>
				<div class="item" style="padding:0; border-bottom:0 solid #111;"><img src="img/i3.jpg" class="carousel"></div>
			</div>
				<a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
				<a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
		</div>
	</div>
	

	<div id="video">
		<video controls autoplay width="445px" height="300px">
			<source src="video/clothing.mp4" type="video/mp4">
		</video>
	</div>

	
	<div id="content">
		<div id="product" style="position:relative; margin-top:30%;">
			<center><h2><legend>Payment</legend></h2></center>
			<br />
			<form method="post">
			<label>Coupon</label>
			<input type="text" name="search">
			<input type="submit" name="submit">
				
			</form>
			
			<?php



				if (isset($_POST["submit"])) {

					include "db_conn.php";
					$str = $_POST["search"];
					$sth = $conn->prepare("SELECT * FROM `coupon` WHERE coupon_name = '$str'");

					$sth->setFetchMode(PDO:: FETCH_OBJ);
					$sth -> execute();

					if($row = $sth->fetch())
					{
			?>
			<br><br><br>
			<table>
				<tr>
					<th>Coupon Name</th>
					<th>Validity</th>
				</tr>
				<tr>
					<td><?php echo $row->coupon_name; ?></td>
					<td><?php echo $row->validity;?></td>
				</tr>

			</table>
		<?php 
			}
		
		
		else{
			echo "Coupon Does not exist";
		}
	}

?>
		</div>
	</div>

	<br />
</div>
	<br />
	<div id="footer">
		<div class="foot">
			<label style="font-size:17px;"> Copyright &copy; </label>
			<p style="font-size:25px;">Cello Inc.2022</p>
		</div>
	</div>
</body>
</html>


<!-- <!DOCTYPE html>
<html>
<head>
	<title>Payment</title>
</head>
<body>



</body>
</html>-->

