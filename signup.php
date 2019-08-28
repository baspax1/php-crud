<?php
	
	
	// define variables and set to empty values
	$user=$pwd=$email=$message="";
	
	$Erruser=$Errpwd=$Erremail="";
	
	
	if (isset($_POST['submit']) ){
		
		Controller();
		$message = "Data Inserted";
		
		
		
	}
		
	// Vallidation Procedures
	function Validate($user,$pwd,$email)
	{
		
		$valid=true;
		
		// user Check
		
		if (empty($user)) {
			
			$valid=false;
			$GLOBALS['Erruser']="User is required";
		}
		
		
		//password Check
		
		if (empty($pwd)) {
			$valid=false;
			$GLOBALS['Errpwd']="Password is required";
			
		} 
		
		
		//email Check
		
		if (empty($email)) 
			{	$valid=false;
				$GLOBALS['Erremail']="Email is required";
				
			} 
			
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$valid=false;
				$GLOBALS['Erremail']="Invalid email format";
			}
			
		return $valid;
		
	}
	
	// Importing Data Procedure with sql
	function DataInsert($user,$pwd,$email)
	
	{
		
		$user = $_POST['user'];
		$pwd = $_POST['pwd'];
		$email = $_POST['email'];
		
		
		require 'db.php';
		
			
		if ( isset ($_POST['user']) && isset ($_POST['pwd']) && isset ($_POST['email']) ) {
			
			
			$user = $_POST['user'];
			$pwd = $_POST['pwd'];
			$email = $_POST['email'];
			
			
			$sql = 'INSERT INTO users(user,pwd,email) VALUES(:user,:pwd,:email)';
			$statement = $connection->prepare($sql);
			
			if ($statement->execute([':user' => $user,':pwd' => $pwd ,':email'=> $email]) )	{ 
				
			}
			
		}	
		
	}
	
	
	// Controller Function
	function Controller(){
		
		
		//Get Data from form	
		$user=($_POST["user"]);
		$pwd=($_POST["pwd"]);
		$email=($_POST["email"]);
		
		
		
		//Keep Data from Previous search
		$GLOBALS['user']="$user";
		$GLOBALS['pwd']="$pwd";
		$GLOBALS['email']="$email";
		
		
		//validate
		if (Validate($user,$pwd,$email)){
			
			
			//Get Data Import 
			DataInsert($user,$pwd,$email);
		}
		
	}
?>



<head>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<link rel="stylesheet" href="css/style.css" />
	
	
</head>

<body>
	
	<div class="container">
		
		<!-- header -->
		<div class="header">
			<a href="#default" class="logo">Users</a>
			<div class="header-left">
				<a class="active" href="http://localhost:80/php/crud/index.php">Home</a>
				
				
			</div>
		</div>
		
		<!-- content --> 
        <h1 class="main_title">Users List</h1>
		<br>
		<br>
		<form class="form-horizontal" method="POST">
			<div class="content">
				
				
				<?php if(!empty($message) && Validate($user,$pwd,$email)): ?>
				<div class="alert alert-success">
					<?= $message;?>
				</div>
				<?php endif; ?>
				
				<div class="form-group">
					<label class="control-label col-sm-2" for="user">Username:</label><span class="error"> <?php echo $Erruser;?></span>
					<div class="col-sm-2">
						<input type="text" class="form-control"  name="user" id="user" placeholder="Enter username" value="<?php echo $user;?>" >
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="pwd">Password:</label><span class="error"> <?php echo $Errpwd;?></span>
					<div class="col-sm-2"> 
						<input type="text" class="form-control" name="pwd" id="pwd" placeholder="Enter password"  value="<?php echo $pwd;?>">
					</div>
				</div>				
				
				<div class="form-group">
					<label class="control-label col-sm-2" for="email">Email:</label><span class="error"> <?php echo $Erremail;?></span>
					<div class="col-sm-4"> 
						<input type="text" class="form-control" name="email" id="email" placeholder="Enter Email"  value="<?php echo $email;?>">
					</div>
				</div>
				
				
				<div class="form-group"> 
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit"  name="submit" class="btn btn-default">Sign Up</button>
					</div>
				</div>
			</form>
			
		</div>
		
		
		<!-- Footer -->
		<footer class="page-footer font-small special-color-dark pt-4">
			
			<!-- Footer Elements -->
			
		</div><!-- container -->
	</body>
</html>
