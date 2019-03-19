
<?php
    //header("Content-Type: application/json; charset=utf-8");

	$servername = "127.0.0.1";
	$username = "root";
	$password = "goldtree9";
	$dbname = "todoMVC";
    
    $con = new mysqli($servername, $username, $password, $dbname); 

    if($con->connect_error) {
        echo "Connection failed";
        exit("connection failed: " . $con->connect_error);
    }
?>

