<?php
	// get database connection
	include_once '../config/database.php';

	$request_data = json_decode(file_get_contents("php://input"));
	// echo "<pre>";
	// print_r($request_data);
	// exit();

	if ($request_data) {
		if( (isset($request_data->api_token)) && (isset($request_data->txtname)) ){
			if( (!empty($request_data->api_token)) && (!empty($request_data->txtname)) ){
				if($request_data->api_token == 'k4tviwdfergug78H(@#I$BUdfg'){
					$txtname = $request_data->txtname;

					// Create table
						$database = new Database();
						$db = $database->getConnection();

						if($db['status'] == '0'){
							die("Connection failed while inserting data: " . $db['message']);
						} else {
							$conne = $db['connection'];

							// Saving data inside a table
								$sql = "INSERT INTO users (usr_fullname)
									VALUES ('$txtname')";

								if ($conne->query($sql) === TRUE) {
								  // Send verification email
									$response_status = '1';
									$response_code = 200;
								 	$response_desc = "New record created successfully.";
								} else {
									$response_status = '2';
									$response_code = 400;
								  	$response_desc = "Error: " . $sql . "<br>" . $conne->error;
								}

							$conne->close(); // closing the connection

							$response['response_status'] = $response_status;
							$response['response_code'] = $response_code;
							$response['response_desc'] = $response_desc;
							
							echo json_encode($response);
						}
					// Create table ends
				} else {
					$response['response_status'] = '3';
					$response['response_code'] = 400;
					$response['response_desc'] = 'invalid_access';

					$json_response = json_encode($response);
					echo $json_response;
				}
			} else {
				$response['response_status'] = '4';
				$response['response_code'] = 400;
				$response['response_desc'] = 'empty_data';

				$json_response = json_encode($response);
				echo $json_response;
			}
		} else {
			$response['response_status'] = '5';
			$response['response_code'] = 400;
			$response['response_desc'] = 'invalid_data';

			$json_response = json_encode($response);
			echo $json_response;
		}
	} else {
		$response['response_status'] = '6';
		$response['response_code'] = 400;
		$response['response_desc'] = 'invalid_method'; // -- API documentation

		$json_response = json_encode($response);
		echo $json_response;
	}
?>