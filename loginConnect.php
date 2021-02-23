<?php

define('db_host', 'localhost');
define('db_username', 'root');
define('db_password', '');
define('db_name', 'dbmain');
define('db_port', 3307);

$error = array();
$username = array();
$password = array();

$conn = mysqli_connect(db_host, db_username, db_password, db_name, db_port);

	if (isset($_POST['login'])) 
	{
		$username = ($_POST['username']);
		$password = ($_POST['password']);
		$hidden_json = ($_POST['hidden_json']);
		$json_array = json_decode($hidden_json, true);
		$users = array();
		if(is_array($json_array)) {
		    $users = $json_array;
		}
		$newUser = true;
		foreach($users as $user) {
		    if ($user["username"] == $username) {
		        $newUser = false;
		        if ($user["password"] !== $password) 
		        {
		            echo "";
		        } 
		        else 
		        {
		            echo "WELCOME!";
		            $query = "SELECT * FROM logins WHERE username=? LIMIT 1";
					$stmt = $conn->prepare($query);
					$stmt->bind_param('s', $username);
					$stmt->execute();
					$res = $stmt->get_result();
					$numUser = $res->num_rows;
					$stmt->close();

					if ($numUser > 0) 
					{
						$error['username'] = "Username already exists";
					} 

					if (count($error) == 0) 
					{
						$sql = "INSERT INTO logins (username, password) VALUES ('$username', '$password')";
						mysqli_query($conn, $sql);
						echo "Username and password inserted to database.";
		        	}	
		    	}
			}

			else
			{
					$query = "SELECT * FROM logins WHERE username=? LIMIT 1";
					$stmt = $conn->prepare($query);
					$stmt->bind_param('s', $username);
					$stmt->execute();
					$res = $stmt->get_result();
					$numUser = $res->num_rows;
					$stmt->close();

					if ($numUser > 0) 
					{
						$error['username'] = "Username already exists";
					} 

					if (count($error) == 0) 
					{
						$sql = "INSERT INTO logins (username, password) VALUES ('$username', '$password')";
						mysqli_query($conn, $sql);
						echo "Username and password inserted to database.";
					}
			}
		// var_dump($users);
		// var_dump(count($users));
		}
	}
?>