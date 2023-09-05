<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8" />
 <meta name="description" content="Web application development" />
 <meta name="keywords" content="PHP" />
 <meta name="author" content="Shah" />
 <title>Shopping Form</title>
</head>
<body>
<h1>Web Programming Form - Lab06</h1>
<form action="shoppingsave.php" method="post">
    <label for="item">Item:</label>
    <input type="text" name="item" id="item" ><br><br>
    <label for="qty">Quantity:</label>
    <input type="number" name="qty" id="qty" ><br><br>
    <input type="submit" value="Submit">
</form>
</body>
</html>
