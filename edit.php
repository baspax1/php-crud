
<?php
	require 'db.php';
	
	
	$id =$_GET['id'];
	$choice=$_GET['choice'];
	
	$Erruser=$Errpwd=$Erremail1="";
	
	if ($choice == "delete"){
		
		$sql = 'DELETE FROM users WHERE id=:id';
		
		$statement=$connection->prepare($sql);
		
		
		if ( $statement->execute([':id'=> $id]) ) {
			
			
			header("Location:http://localhost:80/php/crud/index.php");
			
			
		}
		
	}
	
	if ($choice == "edit"){
		
		$sql = 'SELECT * FROM users WHERE id=:id';
		
		$statement = $connection->prepare($sql);
		$statement->execute([':id' =>$id]);
		$name=$statement->fetch(PDO::FETCH_OBJ);
		
		
		if ( isset ($_POST['user']) && isset ($_POST['pwd']) && isset ($_POST['email']) ) {
			
			
			$user = $_POST['user'];
			$pwd = $_POST['pwd'];
			$email = $_POST['email'];
			
			if (empty($email)) {
				$GLOBALS['Erremail1']="Email is required";
				
				} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$GLOBALS['Erremail1']= "Invalid email format"; 
			} 
			else {
				
				
				$sql = 'UPDATE users SET user=:user, pwd=:pwd,email=:email WHERE id=:id';
				
				$statement = $connection->prepare($sql);
				
				if ($statement->execute([':user' => $user,':pwd' => $pwd ,':email'=> $email,':id'=>$id]) )	{ 
					//header("Location:http://localhost:80/php/crudsearch/index.php");
					$message = 'Data Inserted';
					
				}
				
				
				
				
			}
			
		}			
	}
	
?>


<html>
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
					
					
					<?php if(!empty($message)): ?>
					<div class="alert alert-success">
						<?= $message;?>
					</div>
					
					<?php endif; ?>
					
					<div class="form-group">
						<label class="control-label col-sm-2" for="user">Username:</label><span class="error"> <?php echo $Erruser;?></span>
						<div class="col-sm-2">
							<input type="text" class="form-control" name="user" id="user" value="<?= $name->user;?>">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="pwd">Password:</label><span class="error"> <?php echo $Errpwd;?></span>
						<div class="col-sm-2"> 
							<input type="text" class="form-control" name="pwd" id="pwd" value="<?= $name->pwd;?>">
						</div>
					</div>				
					
					<div class="form-group">
						<label class="control-label col-sm-2" for="email">Email:</label><span class="error"> <?php echo $Erremail1;?></span>
						<div class="col-sm-4"> 
							<input type="text" class="form-control" name="email" id="email" value="<?= $name->email;?>">
						</div>
					</div>
					
					
					<div class="form-group"> 
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-default">Submit</button>
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
