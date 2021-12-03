<?php
	
	// Array
		// Creating and printing array, for loops in PHP
			$party_list = array("Cakes", "Flowers", "Ballons");
			echo "Purchase list for the party: <br/> " . $party_list[0] . ", <br/>" . $party_list[1] . ", <br/>" . $party_list[2] . ".";

			// for 
				$array_length = count($party_list);
				echo "<br/><br/> --Using For loop -- <br/>Purchase list for the party: <br/>";
				for ($i = 0; $i < $array_length; $i++) {
				    echo $party_list[$i];

				    if($i < ($array_length-1)){
				    	echo ', <br/>';
				    } else {
				    	echo ".";
				    }
				}

			// Multi dimensional array
				$parks = array (
				  array("Bayfront",'5 km','5 stars'),
				  array("Confederation",'15 km','4.5 stars'),
				  array("Churchill",'2 km','5 starts')
				);
				echo '<br/><br/>Printing Multi dimensional array: <br/>Park '.$parks[0][0].": is : ".$parks[0][1]." away, and having : ".$parks[0][2]." ratings.<br>";
				echo 'Park '.$parks[1][0].": is : ".$parks[1][1]." away, and having : ".$parks[1][2]." ratings.<br>";
				echo 'Park '.$parks[2][0].": is : ".$parks[2][1]." away, and having : ".$parks[2][2]." ratings.<br>";

			// Associative Arrays
				$parks_in_array = 
					array(
						array(
							"name" => 'Bayfront',
							"distance"=> '5 km',
							"rating"=> '5 stars',
						),
						array(
							"name" => 'Confederation',
							"distance"=> '15 km',
							"rating"=> '4.5 stars',
						),
						array(
							"name" => 'Churchill',
							"distance"=> '2 km',
							"rating"=> '5 stars',
						),
					);

				echo "<br/> Printing Array:<pre>";
					print_r($parks_in_array);

				echo "</pre>";

				echo "Printing using foreach: <br/>";
				foreach ($parks_in_array as $value) {
					echo 'Park '.$value["name"].": is : ".$value["distance"]." away, and having : ".$value["rating"]." ratings.<br>";
				}


?>