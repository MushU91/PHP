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

// image upload
$cover_image = "";
if (isset($_FILES["cover_image"]) && $_FILES["cover_image"]["error"] == 0){
    $targetDir = "uploads/";

    // create folder if not exists
    if(!file_exists($targetDir)){
        mkdir($targetDir, 0777, true);
    }

    $fileName = time(). "_" . basename($_FILES["cover_image"]["name"]);
    $targetFilepath = $targetDir . $fileName;

    // move file to upload folder
    if(move_uploaded_file($_FILES["cover_image"]["tmp_name"], $targetFilepath)){
        $cover_image = $targetFilepath;
    }
}

$sql = "insert into bookstore(name,author_names,publish_date,genre,formats, cover_image) values('$book_name',
'$book_author_name', '$book_date', '$genre','$formats', '$cover_image')";

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