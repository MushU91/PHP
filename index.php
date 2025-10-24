<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testing</title>

    <style>
        body{
            margin: 0;
            padding: 0;

        }
        form{
            margin-top: 30px;
            padding: 40px;
            text-align: center;
        }
        form label input {
            justify-content: center;
            margin: 30px 40px;
            padding: 40px 20px;
            text-align: justify;
        }
    </style>
</head>
<body>
    <form method="POST" action="create.php">
        <input type="text" name="name" id="name" placeholder="Enter Book Name">
        <input type="text" name="author_name" id="author_name"  placeholder="Enter Author Name">
        <input type="text" name="date" id="date" placeholder="Enter Date">
        <br>
        <!-- dropdown -->
         <label >Genre:</label>
         <select name="genre">
            <option value="">Select</option>
            <option value="fiction">fiction</option>
            <option value="science">science</option>
            <option value="history">history</option>
         </select>
         <br>
         <!-- checkbox -->
          <label>Available format:</label><br>
          <input type="checkbox" name="formats[]" id="Ebook" value="Ebook">Ebook<br>
          <input type="checkbox" name="formats[]" id="Paperback" value="Paperback">Paperback<br>
          <input type="checkbox" name="formats[]" id="Hardcover" value="Hardcover">Hardcover<br>

          <!-- radio -->
           <!-- <label>Available format:</label>
          <input type="radio" name="formats" id="Ebook" value="Ebook">Ebook<br>
          <input type="radio" name="formats" id="Paperback" value="Paperback">Paperback<br>
          <input type="radio" name="formats" id="Hardcover" value="Hardcover">Hardcover<br> -->
        <button type="submit">Submit</button>
    </form>
</body>
</html>