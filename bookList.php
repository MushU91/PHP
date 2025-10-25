<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookList</title>
    <style>
        body{
            margin: 0;
            padding: 0;
        }
        table {
            text-align: center;
            margin-top: 30px;
            padding: 40px;
        }
        tr{
            margin: 20px;
            padding: 50px;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Author</th>
            <th>Publish</th>
            <th>Genre</th>
            <th>Formats</th>
            <th>Action</th>
        </tr>
        <?php 
        include "connection.php";
        $num=1;
        $sql = "select * from bookstore";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>

                    <td><?= $num++ ?></td>
                    <td><?= $row["name"]?></td>
                    <td><?= $row["author_names"]?></td>
                    <td><?= $row["publish_date"]?></td>
                    <td><?= $row["genre"]?></td>
                    <td><?= $row["formats"]?></td>
                    <td>
                        <button><a href="edit.php?id=<?= $row["id"] ?>">Edit</a></button>
                        <button ><a href="delete.php?id=<?= $row["id"]?>">Delete</a></button>
                    </td>
                </tr>
            <?php }
        }else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </table>
    <button><a href="index.php">Go Back</a></button>
</body>
</html>