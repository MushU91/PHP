<?php 
include "connection.php";
$delete = $_GET["id"];

$sql = "delete from bookstore where id=$delete";

if($conn->query($sql) === true){
    echo "Delete Successfully";
}else {
    echo "Error".$conn->error;
}
header("Location: bookList.php");
exit();
$conn->close();
?>
