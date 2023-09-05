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
    <hr>
    <?php
    umask(0007);
    $dir = "../../data/lab05";
    
    if (!is_dir($dir)) {
        mkdir($dir, 02770); 
    }
    
    $guestbookFile = "../../data/lab05/guestbook.txt";
    
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $firstName = $_POST["first"];
        $lastName = $_POST["last"];
    
        if (!empty($firstName) && !empty($lastName)) {
            $fullName = $firstName . " " . $lastName;
            $fullName = addslashes($fullName); 
            $file = fopen($guestbookFile, "a");
            if ($file) {
                if (fwrite($file, $fullName . PHP_EOL)) {
                    echo "Thank you for signing the Guestbook!";
                } else {
                    echo "Cannot add your name to the Guestbook.";
                }
                fclose($file);
            } else {
                echo "Error opening the Guestbook file.";
            }
        } else {
            echo "Please enter your first and last name. Use the browser back button to go back to the form.";
        }
    } else {
        echo "Invalid request method.";
    }
    ?>
    <br>
    <a href="guestbookshow.php"> Show Guest Book</a>
</body>

</html>