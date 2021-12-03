<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// echo "<pre>";
		// print_r($_POST);
		// exit();

		if( (isset($_POST['save_token'])) && (isset($_POST['txtname'])) ){
			if( (!empty($_POST['save_token'])) && (!empty($_POST['txtname'])) ){
				if($_POST['save_token'] == 'k4tviwdfergug78H(@#I$BUdfg'){
					$txtname = $_POST['txtname'];

					// Create table
						$servername = "localhost";
						$username = "root";
						$password = "";
						$dbname = "webcomputing";

						// Create connection
							$conne = new mysqli($servername, $username, $password, $dbname);

						if ($conne->connect_error) {
						  die("Connection failed while inserting data: " . $conne->connect_error);

						} else {

							// Saving data inside a table
								$sql = "INSERT INTO users (usr_fullname, usr_verification_key)
									VALUES ('$txtname')";

									if ($conne->query($sql) === TRUE) {
									  // Send verification email
									  echo "New record created successfully.";
									} else {
									  echo "Error: " . $sql . "<br>" . $conne->error;
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
