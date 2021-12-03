<?php
   	session_start();

    unset($_SESSION['type']);
    unset($_SESSION['userfullname']);
    unset($_SESSION['valid']);

    // OR remove all session variables
	// session_unset();

	session_destroy();

	$url = "http://localhost/html/workshop_8/";

   	header('Location: ' . $url);

?>