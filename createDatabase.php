<?php
include "connection.php";

$sql = "create database book";

if($conn->query($sql) === true){
    echo "Database created successfully";
}else {
    echo "Error" . $conn->error;
}
$conn->close();

?>