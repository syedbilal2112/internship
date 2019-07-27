<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php 
		$email = $_GET['email'];
		session_start();
		if(!isset($_SESSION[$email])) { 
		   header("location: login.php?message=unauthorised user");
		   exit; 
		}
	?>

<table id="Table" class="table table-hover">
	<tr>
		<th>ID</th>
		<th>Student Name</th>
		<th>Student Email</th>
		<th>Student Address</th>
		<th>Student Branch</th>
	</tr>
</table>

<script type="text/javascript">
	function call(){
		$.ajax({
			url:'view.php',
			type:'get',
			data:{

			},
			success:function(res){
				var obj = JSON.parse(res)
				 var table_content="";
                        $('#Table').find( 'tr:not(:first)' ).remove();
                        $.each(obj,function(index,value){
                            table_content+="<tr>";
                            table_content+="<td>"+value.id+"</td>";
                            table_content+="<td>"+value.student_name+"</td>";
                            table_content+="<td>"+value.student_email+"</td>";
                            table_content+="<td>"+value.student_address+"</td>";
                            table_content+="<td>"+value.student_branch+"</td>";
  table_content+="<td><a class='btn btn-primary' href='studentEdit.php?id="+value.id+"'>Edit</a><button class='btn btn-danger' onclick='dele("+value.id+")'>Delete</button><button class='btn btn-primary' onclick='studentView("+value.id+")'>View</button></td>";
                            table_content+="</tr>";
                        });
                        $("#Table").append(table_content);
			},
			error:function(res){
				alert(res)
			}
		})
	}
</script>
</body>
</html>