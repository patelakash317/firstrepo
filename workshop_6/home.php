<!DOCTYPE html>
<html>
	<body>
		<h1>Welcome to my home page!</h1>
		<p>Some text.</p>
		<p>Some more text.</p>

		<?php 
			// How to print variable value?
			$x = "Hi";
			echo "Printing variable using echo. ".$x." <br/><br/>";
			print("Hello using Print <br/><br/>");
		?>

		<br/>
		<p>HTML content</p>
		<br/>

		<?php
			// including other files
			// commenting like javascript
			include 'footer.php'; // without error

			include '../footer.php'; // with error
		?>
	</body>
</html>