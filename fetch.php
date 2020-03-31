
<?php
	require 'db.php';
	
	
	
	if (isset($_POST["query"])){
		
		
		$q=$_POST["query"];
		
		$sql="SELECT * FROM users WHERE user LIKE '%".$q."%' OR pwd LIKE  '%".$q."%'";
		$statement = $connection->prepare($sql); 
		$statement->execute();
		
		$name=$statement->setFetchMode(PDO::FETCH_ASSOC);
	
	}		
	
	else
	{				
		
		$sql='SELECT * FROM users';
		$statement = $connection->prepare($sql);
		$statement->execute();
		
		
		$name=$statement->setFetchMode(PDO::FETCH_ASSOC); 	
		
	
	}	
	
	
	while ($name= $statement->fetch(PDO::FETCH_ASSOC)){
		
		
		echo '<tr>';
		
		
		echo	'<td>' .$name["id"]. '</td>';
		echo	'<td>' .$name["user"]. '</td>';
		echo	'<td>' .$name["pwd"]. '</td>';
		echo	'<td>' .$name["email"]. '</td>';
		
		
		
		
		echo '<td>	<a href="http://localhost:80/php/crud/edit.php?id='.$name["id"].'&choice=edit" class="btn btn-info">Edit</a>';
		
		echo '<a onclick="return confirm(\'Are you sure you want to delete this entry?\')" href="http://localhost:80/php/crud/edit.php?id='.$name["id"].'&choice=delete" class="btn btn-danger">Delete</a>';
		
		echo '</td>';
				
		echo '</tr>';
	}			

	