<?php 
	include "conn.php";
	$id = $_POST['id'];
	$profile = $_POST['profile'];
	
	$query = "UPDATE `students` SET  `student_profile_pic` = '$profile' WHERE `id` = $id";
	echo $query;
	$result = mysqli_query($con,$query);

	if($result){
		// echo "successfully Updated";
		header('location: studentEdit.php?id='.$id);
	}
	else{
		echo "failed to update";
	}

 ?>