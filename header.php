<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<script type="text/javascript">
        var adminEmail = localStorage.getItem("adminEmail");
        // alert(id)
        if(!adminEmail){
            window.location.replace("login.php?message=UnauthorisedUser");
        }
        function logout() {
            localStorage.clear();
            window.location.replace("login.php?message=VisitAgain");
        }
    </script>