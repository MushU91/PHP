<?php 
include "connection.php";


$sql = "create table if not exists bookstore (id int unsigned auto_increment primary key,
 name varchar(255) not null,
 author_names varchar(255) not null,
 publish_date varchar(255)
)";

if ($conn->query($sql) === true){
    echo "Table Books created successfully";
}else {
    echo "Error:" . $conn->error;
}
$conn->close();
?>