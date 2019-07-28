<?php include 'header.php';?>
<style type="text/css">
	#div-container{
		max-width: 600px;
		height: 600px;
		box-shadow: 1px 1px 6px 2px #eee;
		margin:auto;
		padding: 20px;
	}
</style>
<body>
<?php 
include 'conn.php';
		$id = $_GET['id'];
		$query="SELECT * FROM `students` WHERE `id`=$id";
		$result=mysqli_query($con,$query);
		$row=mysqli_fetch_row($result);
		$student_name = $row[1];
		$student_email = $row[2];
		$student_address = $row[3];
		$student_branch = $row[4];
		$student_profile_pic = $row[5];
	?>


	<div id="div-container">
		<center><img src="<?php echo $student_profile_pic;?>" id="profile_pic" style="width: 150px;height: 150px;border-radius: 50%;">
		<input type="file" name="files[]" id="file" accept=".jpg" required>
		<button type="button" id="upload_profile_pic" class="btn btn-primary">Save</button></center>
		<form action="studentUpdate.php" method="post">
			<input type="hidden" name="id" id="id1" value="<?php echo $id;?>">
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

		<a href="index.php" class="btn btn-info">Go Back!</a>

		<button type="button" onclick="logout()" class="btn btn-danger">Logout</button>
	</form>
	</div>


	<script type="text/javascript">
		// $(function(){
			$('#file').on('change', function () {
                    var file_data = $('#file').prop('files')[0];
                    var form_data = new FormData();
                    form_data.append('file', file_data);
                    $.ajax({
                        url: 'upload.php', // point to server-side PHP script 
                        dataType: 'text', // what to expect back from the PHP script
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        success: function (response) {
                        
                            alert(response)
                            document.getElementById("profile_pic").src=response;
                            x=response;

                           
                        },
                        error: function (response) {
                          
                           alert(response);
                        }
                    });
                });
		    $('#upload_profile_pic').on('click', function () {
				var id=$("#id1").val();
                var profile=x;
                   
                $.ajax({
                    url:"update_profile_pic.php",
                    type:"post",
                    data:{
                        "id":id,
                        "profile":profile
                    },
                    success:function(data){
                      alert(data);
                     // window.reload();   
                      },
                      error:function(){
                        alert(';hi');
                      }
                }); 
      		});
		// })
	</script>
</body>
</html>