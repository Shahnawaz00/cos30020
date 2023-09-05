<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Web application development" />
    <meta name="keywords" content="HTML, PHP" />
    <meta name="author" content="Shah" />
    <title>Lab 5</title>
</head>

<body>
    <h1>Lab 5 Task 2 - Guestbook</h1>
    <form action="guestbooksave.php" method="post">
        <h3>Enter your details to sign our guest book</h3>
            <label for="first">First Name:</label>
            <input type="text" id="first" name="first">
            <br>
            <label for="last">Last Name:</label>
            <input type="text" id="last" name="last">
            <br>
            <button type="submit" value="submit">Save</button>
            <br>
            <a href="guestbookshow.php" >Show Guest Book</a>
    </form>
</body>

</html>