<?php 
include "connection.php";

$sql = "alter table bookstore
add column cover_image varchar(255) after formats
";

if($conn->query($sql) === true){
    echo "New Column added Successfully";
}else{
    echo "Error" . $conn->error;
}

$conn->close();

?>