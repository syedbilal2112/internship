<?php include 'header.php';?>
<body>


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
	function dele(id){
		alert(id)
		$.ajax({
			url:'deleteStudent.php',
			type:'get',
			data:{
				id:id
			},
			success:function(){
				alert("Student row successfully deleted")
				call()
			},
			error:function(){
				alert("deleting unsucccessful")
			}
		})
	}
	function call(){
		$.ajax({
			url:'view.php',
			type:'get',
			data:{
//git clone https://github.com/syedbilal2112/internship.git
			},
			success:function(res){
				var obj = JSON.parse(res)
				console.log(obj)
				 var table_content="";
                        $('#Table').find( 'tr:not(:first)' ).remove();
                        $.each(obj,function(index,value){
                            table_content+="<tr>";
                            table_content+="<td>"+value.id+"</td>";
                            table_content+="<td>"+value.student_name+"</td>";
                            table_content+="<td>"+value.student_email+"</td>";
                            table_content+="<td>"+value.student_address+"</td>";
                            table_content+="<td>"+value.student_branch+"</td>";
  table_content+="<td><a class='btn btn-primary' href='studentEdit.php?useremail=<?php echo $email;?>&email="+value.student_email+"&id="+value.id+"'>Edit</a><button class='btn btn-danger' onclick='dele("+value.id+")'>Delete</button><button class='btn btn-info' onclick='studentView("+value.id+")'>View</button></td>";
                            table_content+="</tr>";
                        });
                        $("#Table").append(table_content);
			},
			error:function(res){
				alert(res)
			}
		})
l	}
call()
</script>
</body>
</html>