<?php
include 'header.php';
include 'data.php';
include 'database.php';
?>
<?php
$id = $_GET['id'];
$db = new DataBase();
$query = "SELECT * FROM information
WHERE id = $id";
$getData=$db->select($query)->fetch_assoc();
if (isset($_POST['submit'])) {
	$name = mysqli_real_escape_string($db->link,$_POST['name']);
	$dept= mysqli_real_escape_string($db->link,$_POST['dept']);
	$email = mysqli_real_escape_string($db->link,$_POST['email']);
	$contact = mysqli_real_escape_string($db->link,$_POST['contact']);
	if ($name == ''|| $dept == ''|| $email == ''|| $contact == '') {
		$error = "Field not somi=ething....";
	}
	else
	{
		$query="UPDATE information
		SET
		name = '$name',
		dept = '$dept',
		email = '$email',
		contact = '$contact'
		WHERE id = $id";
		$update = $db->update($query);
	}
}
?>

<?php

if (isset($_POST['delete'])) {
	$query = "DELETE FROM information WHERE id = $id";
	$deleteData= $db->delete($query);
}

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


	<form action="update.php?id=<?php echo $id ;?>" method="POST">
		<table class="col-md-10 text-center">
		<tr>
			<td>Name</td>
             <td><input type="text" name="name"  value="<?php echo   $getData['name'];?>" class="form-control"></td>

		</tr>
			<tr>
			<td>Department</td>
			<td><input type="text" name="dept"  value="<?php echo   $getData['dept'];?>" class="form-control"></td>

		</tr>
			<tr>
			<td>Email</td>
			<td><input type="text" name="email"  value="<?php echo   $getData['email'];?>" class="form-control"></td>

		</tr>
			<tr>
			<td>Phone</td>
			<td><input type="tel" name="contact"  value="<?php echo   $getData['contact'];?>" class="form-control"></td>

		</tr>
			<tr>
			<td></td>
			<td class="py-4">
				<input type="submit" name="submit" value="Update"  class="btn btn-info">
				<input type="reset" name="cancel"  class="btn btn-danger">
				<input type="submit" name="delete" value="Delete"  class="btn btn-dark">

			</td>

		</tr>
		
		


</table>
	</form>

<a href="index.php" class="btn btn-outline-info">Go Back</a>

<?php
include 'footer.php';
?>