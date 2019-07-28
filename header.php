<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<script type="text/javascript">
        var adminId = localStorage.getItem("adminId");
        // alert(id)
        if(!adminId){
            window.location.replace("../login.php");
        }
        function logout(argument) {
            localStorage.clear();
            window.location.replace("../login.php");
        }
    </script>