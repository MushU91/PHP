<?php 
include "connection.php";

$book_name = $_POST["name"];
$book_author_name = $_POST["author_name"];
$book_date = $_POST["date"];
$genre = $_POST["genre"];
$formats = isset($_POST["formats"]) ? implode(",", $_POST["formats"]) : "";


// radio
/*
$formats = isset($_POST["formats"]) ? $_POST["formats"] : "";


*/

$sql = "insert into bookstore(name,author_names,publish_date,genre,formats) values('$book_name',
'$book_author_name', '$book_date', '$genre','$formats')";

if ($conn->query($sql) === true) {
    echo "Book added successfully";
}else {
    echo "Error" . $sql . "<br>". $conn->error;
}
header("Location: bookList.php");
exit();
$conn->close();
?>
<br/>
<button><a href="bookList.php">Show Lists</a></button>