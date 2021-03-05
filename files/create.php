<?php
include 'header.php';
include 'data.php';
include 'database.php';
?>
<?php

$db = new DataBase();
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
		$query="INSERT INTO information(name,dept,email,contact) VALUES('$name','$dept','$email','$contact')";
		$create = $db->insert($query);
	}
}



?>



	<form action="create.php" method="POST">
		<table class="col-md-10 text-center">
		<tr>
			<td>Name</td>
			<td><input type="text" name="name" placeholder="Enter Your Name" class="form-control"></td>

		</tr>
			<tr>
			<td>Department</td>
			<td><input type="text" name="dept" placeholder="Enter Your  Department" class="form-control"></td>

		</tr>
			<tr>
			<td>Email</td>
			<td><input type="text" name="email" placeholder="Enter Your Email " class="form-control"></td>

		</tr>
			<tr>
			<td>Phone</td>
			<td><input type="tel" name="contact" placeholder="Enter Your contact" class="form-control"></td>

		</tr>
			<tr>
			<td></td>
			<td class="py-4">
				<input type="submit" name="submit" value="Submit"  class="btn btn-info">
				<input type="reset" name="cancel"  class="btn btn-danger">

			</td>

		</tr>
		
		


</table>
	</form>

<a href="index.php" class="btn btn-outline-info">Go Back</a>











<?php
include 'footer.php';
?>