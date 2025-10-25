<?php 
include "connection.php";
$edit = $_GET["id"];
$sql = "select * from bookstore where id=$edit";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Ubook_name = $_POST['name'];
    $UAuthor_name = $_POST['author_name'];
    $U_date = $_POST['date'];
    $Ugenre = $_POST['genre'];
    $Uformats = isset($_POST["formats"]) ? implode(",", $_POST["formats"]) : "";

    // keep old image by default
    $Ucover_image = $row["cover_image"];

    // ✅ Check if new image is uploaded
    if (!empty($_FILES["cover_image"]["name"])) {
        $targetDir = "uploads/";
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0755, true);
        }

        $fileName = basename($_FILES["cover_image"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($fileType, $allowedTypes)) {
            if (move_uploaded_file($_FILES["cover_image"]["tmp_name"], $targetFilePath)) {
                $Ucover_image = $targetFilePath; // ✅ save full path to DB
            }
        }
    }

    $conn->query("UPDATE bookstore SET 
                    name ='$Ubook_name', 
                    author_names ='$UAuthor_name', 
                    publish_date = '$U_date', 
                    genre='$Ugenre', 
                    formats='$Uformats', 
                    cover_image='$Ucover_image' 
                  WHERE id=$edit");

    header("Location:bookList.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>
     <form method="POST" enctype="multipart/form-data">
        <input type="text" name="name" id="name" value="<?= $row["name"]?>">
        <input type="text" name="author_name" id="author_name"  value="<?= $row["author_names"]?>">
        <input type="text" name="date" id="date" value="<?= $row["publish_date"]?>">

        <!-- Genre dropdown -->
        <label>Genre:</label>
        <select name="genre">
            <option value="Fiction" <?= $row['genre']=='Fiction'?'selected':'' ?>>Fiction</option>
            <option value="Science" <?= $row['genre']=='Science'?'selected':'' ?>>Science</option>
            <option value="History" <?= $row['genre']=='History'?'selected':'' ?>>History</option>
        </select><br><br>

        <!-- Format radio -->
        <label>Format:</label><br>
        <input type="checkbox" name="formats[]" value="Ebook" <?= $row['formats']=='Ebook'?'checked':'' ?>> Ebook<br>
        <input type="checkbox" name="formats[]" value="Paperback" <?= $row['formats']=='Paperback'?'checked':'' ?>> Paperback<br>
        <input type="checkbox" name="formats[]" value="Hardcover" <?= $row['formats']=='Hardcover'?'checked':'' ?>> Hardcover<br><br>

    
            <label>Book Image</label><br>
                <?php if (!empty($row['cover_image']) && file_exists($row['cover_image'])): ?>
                    <img id="previewImage" src="<?= $row['cover_image'] ?>" width="150" alt="Current Image"><br><br>
                <?php else: ?>
                    <img id="previewImage" src="" width="150" style="display:none;"><br><br>
                <?php endif; ?>
                <input type="file" name="cover_image" accept="image/*" id="cover_image"><br><br>

        <button type="submit">Submit</button>

        <!-- radio -->
           <!-- <label>Available format:</label>
          <input type="radio" name="formats" id="Ebook" value="Ebook">Ebook<br>
          <input type="radio" name="formats" id="Paperback" value="Paperback">Paperback<br>
          <input type="radio" name="formats" id="Hardcover" value="Hardcover">Hardcover<br> -->
    </form>
    <script>
        document.getElementById('cover_image').addEventListener('change', function(event) {
            const preview = document.getElementById('previewImage');
                const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                                reader.onload = function(e) {
                                     preview.src = e.target.result;
                                    preview.style.display = 'block';
                            }
                        reader.readAsDataURL(file);
                }
        });
    </script>

</body>
</html>