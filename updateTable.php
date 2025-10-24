<?php 
include "connection.php";

$sql = "alter table bookstore
    add column genre varchar(255) not null after publish_date,
    add column formats varchar(255) not null after genre

";

if ($conn->query($sql) === true){
    echo "NEW columns added successfully";
}else{
    echo "Error" . $conn->error;
}

$conn->close();

?>