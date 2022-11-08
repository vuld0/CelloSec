<!DOCTYPE html>
<html>
<head>
	<title>Payment</title>
</head>
<body>

<form method="post">
<label>Coupon</label>
<input type="text" name="search">
<input type="submit" name="submit">
	
</form>

</body>
</html>

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