<?php 
$servername = "localhost";
$username = "root";
$userpassword = "";
$datebasename = "book";

$conn = new mysqli($servername, $username, $userpassword, $datebasename);

if ($conn->connect_error){
    die(
        "Connection failed" . $conn->connect_error
    );
}

?>