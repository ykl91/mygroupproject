<?php
ini_set('display_errors', 0);
error_reporting(E_ALL);
	define('DB_HOST', '54.153.169.253');
	define('DB_USER', 'eventureadmin');
	define('DB_PASS', 'iiirnkejbrw');
    define('DB_NAME', 'eventure');
    
    	// Create Connection
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	// Check Connection
	if(mysqli_connect_errno()){
		// Connection Failed
		echo 'Failed to connect to MySQL '. mysqli_connect_errno();
	}
