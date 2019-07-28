<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
	#div-container{
		max-width: 600px;
		height: 600px;
		box-shadow: 1px 1px 6px 2px #eee;
		margin:auto;
		padding: 20px;
	}
</style>
</head>
<body>
<?php 
include 'conn.php';
		$email = $_GET['email'];
		$useremail = $_GET['useremail'];
		$id = $_GET['id'];
		// session_start();
		// if(!isset($_SESSION[$email])) { 
		//    header("location: login.php?message=unauthorised user");
		//    exit; 
		// }
		$query="SELECT * FROM `students` WHERE `id`=$id";
		$result=mysqli_query($con,$query);
		$row=mysqli_fetch_row($result);
		$student_name = $row[1];
		$student_email = $row[2];
		$student_address = $row[3];
		$student_branch = $row[4];
	?>


	<div id="div-container">
		<form action="studentUpdate.php" method="post">
			<input type="hidden" name="id" value="<?php echo $id;?>">
		<div class="form-group">
			<label for="Name" >Name</label>
			<input type="text" class="form-control" name="name" id="name" placeholder="Enter your name" value="<?php echo $student_name;?>">
		</div>
		<div class="form-group">
			<label for="email" >email</label>
			<input type="email" class="form-control" name="email" id="email" placeholder="Enter your Email" value="<?php echo $student_email;?>">
		</div>
		<div class="form-group">
			<label for="address" >address</label>
			<textarea  class="form-control" name="address" id="address" placeholder="Enter your Address"><?php echo $student_address;?></textarea>
		</div>
		<div class="form-group">
			<label for="branch">branch</label>
			<select name="branch" class="form-control" id="branch" value="<?php echo $student_branch;?>">
				<option value="CSE">CSE</option>
				<option value="ISE">ISE</option>
				<option value="ECE">ECE</option>
				<option value="EEE">EEE</option>
				<option value="ME">ME</option>
			</select>
		</div>
		<input type="submit" id="submit" name="submit" class="btn btn-primary" value="Register">

		<a href="index.php?email"></a>
	</form>
	</div>
</body>
</html>