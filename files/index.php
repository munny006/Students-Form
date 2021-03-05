<?php
include 'header.php';
include 'data.php';
include 'database.php';
?>
<?php

$db = new DataBase();
$query = "SELECT * FROM information";
$read = $db->select($query);

?>
<?php
if (isset($_GET['msg'])) {
	echo $_GET['msg'];
}

?>
<?php
if (isset($_GET['error'])) {
	echo $_GET['error'];
}

?>

<table class="table table-bordered bg-light text-dark col-md-12 margin text-center my-4">
	<tr>
		<th width="10%">No</th>
		<th width="20%">Name</th>
		<th width="20%">Department</th>
		<th width="20%">Email</th>
		<th width="20%">Contact</th>
		<th width="8%">Action</th>
	</tr>
<?php
if ($read) {?>
	<?php while($row = $read->fetch_assoc()){?>


	<tr>
			<td><?php echo $row['id'];?></td>
		 <td><?php echo $row['name'];?></td>
		<td><?php echo $row['dept'];?></td>
		<td><?php echo $row['email'];?></td>
		<td><?php echo $row['contact'];?></td>
		<td><a href="update.php?id=<?php echo $row['id']?>">Edit</a></td>
	</tr>
<?php }?>
	<?php } else {?>
		<p>Data NOT available</p>
	<?php }?>
</table>

<a href="create.php" class="btn btn-secondary">Create</a>











<?php
include 'footer.php';
?>