<?php
	session_start();
	session_destroy();
	header('location: templates/login.html.php');
?>