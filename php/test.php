<?php
$host = 'db';

// Database use name
$user = 'sakda';

//database user password
$pass = '1234';

// check the MySQL connection status
$conn = new mysqli($host, $user, $pass);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected to MySQL server successfully!";
}
?>