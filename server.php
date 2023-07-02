<?php
	//db
	$db = mysqli_connect('localhost', 'root', '','db_hci');
	
	//var
	$id = "";
	$product = "";
	$price = "";
	$date ="";
	$update = false;
	
	//save btn
	if(isset($_POST['save']))
	{
		$product = $_POST['product'];
		$price = $_POST['price'];
		$date = $_POST['date'];	

		mysqli_query($db, "insert into tbl_info (product, price, date) VALUES ('$product','$price','$date')");
		header('location:index.php');
	}
	if(isset($_POST['update']))
	{
		$id  = $_POST['id'];
		$product  = $_POST['product'];
		$price  = $_POST['price'];
		$date  = $_POST['date'];
		
		mysqli_query($db, "update tbl_info SET product='$product', price = '$price', date = '$date' where id = $id");
		header('location:index.php');
	}
		
		if(isset($_GET['del']))
	{
		$id = $_GET['del'];
		$record = mysqli_query($db, "delete from tbl_info where id = $id");
		header('location:index.php');
		
	}

?>