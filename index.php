
<?php
	
	require 'db.php';
		
?>


<head>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	
	<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
	
	
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
				<a href="http://localhost:80/php/crud/signup.php">Sign Up</a>
				
			</div>
		</div>
		
		<!-- content --> 
        <h1 class="main_title">Users List</h1>
        <div class="content">
            <form>
				
				
				
				<div class="form-group">
					<div class="col-sm-2">
						<label for="usr">Name:</label>
						<input type="text" class="form-control" name="search_text" id="search_text">
					</div>
				</div>
                
			</form>
			
		</div>
		
		
	
					
					<div class="container">
						<div class="card mt-5">
							<div class="card-header">
								<h2>All Users</h2>
							</div>
						</div>
					</div>
					
					<div class="class-body">
						
						<table class="table table-bordered" >
							
							
								
								<tr>
									<th>ID</th>
									<th>Username</th>
									<th>Password</th>
									<th>Email</th>
									<th></th>
								</tr>
								
							 <tbody id="result">
							
					
								
								</tbody>
							</div>
						</table>
					</div>
				</div>
			</div>
			
			
			<!-- Footer -->
			<footer class="page-footer font-small special-color-dark pt-4">
				
			</div><!-- container -->
		</body>
		
		<script>
		
		$(document).ready(function(){
				
				load_data();
				
				function load_data(query)
				{
					$.ajax({
						url:"fetch.php",
						method:"POST",
						data:{query:query},
						success:function(data)
						{
							$('#result').html(data);
						}
					});
				}
				
				$('#search_text').keyup(function(){
					var search = $(this).val();
					if(search != '')
					{
						load_data(search);
					}
					else
					{
						0();
					}
				});	
			});
		</script>
		