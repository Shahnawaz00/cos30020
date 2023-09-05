<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8" />
 <meta name="description" content="Web application development" />
 <meta name="keywords" content="PHP" />
 <meta name="author" content="Your Name" />
 <title>Perfect Palindrome Result</title>
</head>
<body>
<h1>Perfect Palindrome Result</h1>
<?php
if (isset($_POST["inputString"])) {
    $inputString = $_POST["inputString"];

    $cleanedString = strtolower($inputString);

    $reversedString = strrev($cleanedString);

    if (strcmp($cleanedString, $reversedString) === 0) {
        echo "<p>The test you entered '$inputString' is a perfect palindrome!</p>";
    } else {
        echo "<p>The text you entered '$inputString' is not a perfect palindrome.</p>";
    }
} else {
    echo "<p>No string input</p>";
}
?>
</body>
</html>
