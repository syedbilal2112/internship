<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
	#my-container{
		max-width: 600px;
		height: 600px;
		box-shadow: 1px 1px 6px 2px #ccc;
		margin:auto;
		padding: 20px;
	}
</style>
</head>
<body>

<div id="my-container">
		<?php 
		if(isset($_GET['message'])){
			$message = $_GET['message'];
			?>
		<div class="alert alert-danger">
			<?php echo $message;?>
		</div>
	<?php }
	?>
	<form>
		<div class="form-group">
			<label for="email" >email</label>
			<input type="email" class="form-control" name="email" id="email" placeholder="Enter your Email">
		</div>
		<div class="form-group">
			<label for="Password" >Password</label>
			<input type="password" class="form-control" name="password" id="password" placeholder="Enter your Password">
		</div>
		<input type="button" id="btn" name="submit" class="btn btn-primary" value="Register">
	</form>
</div>

<script type="text/javascript">
	$(function(){
		$('#btn').click(function(){
			var email = $('#email').val();
			var password = $('#password').val();
			$.ajax({
				url:'verify.php',
				type:'post',
				data:{
					email:email,
					password:password
				},
				success:function(res){
					if(res.includes("success")){
						alert("successful login")
						location.href="index.php";
						localStorage.setItem("adminEmail",email);
					}else{
						alert("login failed")
					}
				},
				error:function(){
					alert("login failer")
				}
			})
		})
	})
</script>

</body>
</html>