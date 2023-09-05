<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Web application development" />
    <meta name="keywords" content="HTML, PHP" />
    <meta name="author" content="Shah" />
    <title>Lab 6</title>
</head>

<body>
    <h1>Lab 6 Task 2 - Guestbook</h1>
    <form action="guestbooksave.php" method="post">
        <h3>Enter your details to sign our guest book</h3>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <br>
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>
            <br>
            <br>
            <button type="submit" value="submit">Sign</button>
            <button type="reset" value="reset">Reset Form</button>
            <br>
            <br>
            <a href="guestbookshow.php" >Show Guest Book</a>
    </form>
</body>

</html>