
<?php

		$error="";
		$remember="";
		$isLogged="";
	
	if (isset($_POST["submit"])){
		
	
		$uname = ($_POST["uname"]);
		$pass = ($_POST["pass"]);
		$rem = ($_POST["remember"]);
		
		SESSION_START();
		if($uname == "admin" && $pass == "1234"){
						$_SESSION["uname"] =$uname;
						$_SESSION["isLogged"] =true;
						header("Location: /php/crud/index.php"); 
						exit();
		}	
			if (isset($_POST["remember"]))
			
					setcookie("uname",$uname,time()+60+60*7);
					
						
		
				else				
					$error="Wrong Password";
					
					
	}

	?>
	
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Database</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="css/style.css" />

</head>

<body>
    <header>

	<div class="container">

	<h1>Data Base</h1>	

	<form action="login.php" method="POST">

		<div class="container">
			<label for="uname"><b>Username</b></label>
			<input type="text" placeholder="Enter Username" name="uname" required>

			<label for="psw"><b>Password</b></label>
			<input type="password" placeholder="Enter Password" name="pass" required>

			<label><input type="checkbox" name="remember"> Remember me</label>

			<button class="mybutton" type="submit" name="submit" >Login</button>
			<p class="error"><?php echo $error; ?></p>
		</div>

	</form>
</div>
</header>
</body>
	