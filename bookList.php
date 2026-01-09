<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book List</title>

<style>
    body {
        margin: 0;
        padding: 0;
        background: #f4f6f8;
        font-family: Arial, sans-serif;
    }

    .container {
        width: 95%;
        max-width: 1200px;
        margin: 40px auto;
        background: #ffffff;
        padding: 25px;
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #ccc;   /* ✅ table border */
    }

    th, td {
        padding: 12px;
        border: 1px solid #ccc;   /* ✅ row & column lines */
        text-align: center;
    }

    th {
        background: #007bff;
        color: #ffffff;
    }

    tr:hover {
        background: #f1f1f1;
    }

    img {
        border-radius: 5px;
        object-fit: cover;
    }

    .btn {
        padding: 6px 12px;
        border-radius: 5px;
        text-decoration: none;
        color: #fff;
        font-size: 14px;
        display: inline-block;
    }

    .btn-edit {
        background: #28a745;
    }

    .btn-delete {
        background: #dc3545;
    }

    .btn-back {
        margin-top: 20px;
        background: #6c757d;
    }
</style>

</head>
<body>

<div class="container">
    <h2>Book List</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Author</th>
            <th>Publish</th>
            <th>Genre</th>
            <th>Formats</th>
            <th>Cover Image</th>
            <th>Action</th>
        </tr>

        <?php 
        include "connection.php";
        $num = 1;
        $sql = "SELECT * FROM bookstore";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
            <tr>
                <td><?= $num++ ?></td>
                <td><?= $row["name"] ?></td>
                <td><?= $row["author_names"] ?></td>
                <td><?= $row["publish_date"] ?></td>
                <td><?= $row["genre"] ?></td>
                <td><?= $row["formats"] ?></td>
                <td>
                    <?php if (!empty($row["cover_image"])): ?>
                        <img src="<?= $row["cover_image"] ?>" width="80" height="100">
                    <?php endif; ?>
                </td>
                <td>
                    <a href="edit.php?id=<?= $row["id"] ?>" class="btn btn-edit">Edit</a>
                    <a href="delete.php?id=<?= $row["id"] ?>" class="btn btn-delete">Delete</a>
                </td>
            </tr>
        <?php 
            }
        } else {
            echo "<tr><td colspan='8'>No records found</td></tr>";
        }
        $conn->close();
        ?>
    </table>

    <a href="index.php" class="btn btn-back">Go Back</a>
</div>

</body>
</html>
