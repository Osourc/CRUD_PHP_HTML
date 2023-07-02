<?php include('server.php'); ?>
<?php 
	if(isset($_GET['edit']))
	{
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "select * from tbl_info where id = $id");
		
		if(mysqli_num_rows($record) == 1)
		{
			$n = mysqli_fetch_array($record);
			$product = $n['product'];
			$price  = $n['price'];
			$date  = $n['date'];
		}
		
	}
	
		if(isset($_GET['del']))
	{
		$id = $_GET['del'];
		$record = mysqli_query($db, "delete from tbl_info where id = $id");
		
	}
?>


<html>
<head>
	<title> CRUD PROJECT </title>
	<link rel = "stylesheet" type = "text/css" href ="style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&family=Roboto:wght@300&display=swap" rel="stylesheet">

</head>

<body>


<?php $results = mysqli_query($db, "SELECT * FROM tbl_info"); ?>

<table>
	<thead>
		<tr>
			<th>Product</th>
			<th>Price</th>
			<th>Date</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['product']; ?></td>
			<td><?php echo $row['price']; ?></td>
			<td><?php echo $row['date']; ?></td>
			<td>
				<a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>



	<form action = "server.php" method = "post">
	
	<input type ="hidden" name = "id" value = "<?php echo $id; ?>">
	<div class = "input-group">
		<label>Product</label>
		<input type ="text" name = "product" value ="<?php echo $product; ?>" required>
	</div>
	<div class = "input-group">
		<label>Price</label>
		<input type ="text" name = "price" value ="<?php echo $price; ?>" required>
	</div>
	<div class = "input-group">
		<label>Date</label>
		<input type ="date" data-date-format="DD MMMM YYYY" name = "date" value ="<?php echo $date; ?>" required>
	</div>
	<?php if ($update == true): ?>
	<div class = "button-group">
		<button type ="submit" name = "update" class = "save-btn btn"> Update</button>
	<?php else: ?>
		<button type ="submit" name = "save" class = "save-btn btn"> Save</button>
	<?php endif ?>
	</div>
	</form>
</body>
</html>