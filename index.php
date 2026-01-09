<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Form</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            background: #f4f6f8;
            font-family: Arial, sans-serif;
        }

        .container {
            width: 400px;
            margin: 60px auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin: 15px 0 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="file"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .checkbox-group {
            margin-top: 10px;
        }

        .checkbox-group input {
            margin-right: 5px;
        }

        button {
            width: 100%;
            margin-top: 25px;
            padding: 12px;
            background: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Add Book</h2>

        <form method="POST" action="create.php" enctype="multipart/form-data">
            
            <label>Book Name</label>
            <input type="text" name="name" placeholder="Enter Book Name">

            <label>Author Name</label>
            <input type="text" name="author_name" placeholder="Enter Author Name">

            <label>Date</label>
            <input type="text" name="date" placeholder="Enter Date">

            <label>Genre</label>
            <select name="genre">
                <option value="">Select</option>
                <option value="fiction">Fiction</option>
                <option value="science">Science</option>
                <option value="history">History</option>
            </select>

            <label>Available Format</label>
            <div class="checkbox-group">
                <input type="checkbox" name="formats[]" value="Ebook"> Ebook <br>
                <input type="checkbox" name="formats[]" value="Paperback"> Paperback <br>
                <input type="checkbox" name="formats[]" value="Hardcover"> Hardcover
            </div>

            <label>Book Image</label>
            <input type="file" name="cover_image" accept="image/*">

            <button type="submit">Submit</button>
        </form>
    </div>

</body>
</html>
