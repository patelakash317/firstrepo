<?php
	if ($_SERVER["REQUEST_METHOD"] == "GET") {
		if(isset($_GET['create_token'])){
			if(!empty($_GET['create_token'])){
				if($_GET['create_token'] == 'fdugin@*E&#GREFiudjdefr'){
					// Create database
						$servername = "localhost";
						$username = "root";
						$password = "";

						$conn = new mysqli($servername, $username, $password); // Create connection
						// Check connection
						if ($conn->connect_error) {
						  die("Connection failed: " . $conn->connect_error);
						}

						$sql = "CREATE DATABASE webcomputing";
						if ($conn->query($sql) === TRUE) { // executing and verifying query
						  echo "Database created successfully.";
						} else {
						  echo "Error creating database: " . $conn->error;
						}
						$conn->close(); // closing the connection
					// Create database ends

					// Create table
						$servername = "localhost";
						$username = "root";
						$password = "";
						$dbname = "webcomputing";

						// Create connection
							$conne = new mysqli($servername, $username, $password, $dbname);

						if ($conne->connect_error) {
						  die("Connection failed while create a table: " . $conn->connect_error);
						} else {
							// Create table
								$sql = "CREATE TABLE users (
									usr_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
									usr_fullname VARCHAR(100) NOT NULL,
									usr_created_on TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
									usr_updated_on TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
								)";

								if ($conne->query($sql) === TRUE) { // executing and verifying query
								  echo "<br/><br/>Table users created successfully.";
								} else {
								  echo "<br/><br/>Error creating table: " . $conne->error;
								}

							$conne->close(); // closing the connection
						}
					// Create table ends
				} else {
					echo "invalid_access";
				}
			} else {
				echo "empty_data";
			}
		} else {
			echo "invalid_data";
		}
	} else {
		echo "invalid_method";
	}
?>

<br/><br/><a href="http://localhost/html/workshop_7/">Go back</a>