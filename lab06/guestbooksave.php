<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Web application development" />
    <meta name="keywords" content="PHP" />
    <meta name="author" content="Shah" />
    <title>Lab 6</title>
</head>

<body>
    <h1>Lab 6 Task 2 - Guestbook</h1>
    <hr>
    <?php 
    if ( isset($_POST["name"]) && isset($_POST["email"]) ) { // check if both form data exists
        $name = $_POST["name"]; // obtain the form first data
        $email = $_POST["email"]; // obtain the form last data
        $filename = "../../data/lab06/guestbook.txt"; // assumes php file is inside lab05
        umask(0007);
        $dir = "../../data/lab06";
        if (!file_exists($dir)) {
            mkdir($dir, 02770);
        }
        $handle = fopen($filename, "a"); // open the file in append mode
        $alldata = array();
        if (is_writable($filename)) {
            $namedata = array();
            $emaildata = array();
            $handle = fopen($filename, "r"); // open the file in append mode
            while (! feof($handle)) {
                $onedata = fgets($handle);
                if ($onedata !== "") {
                    $data = explode("," , $onedata);
                    $alldata[] = $data;
                    $namedata[] = $data[0];
                    if (count($data) >= 2) {
                        $emaildata[] = $data[1];
                    }
                }
            }
            fclose($handle);
            if (in_array($name, $namedata) || in_array($email, $emaildata) ) {
                $newdata = false;
            } else {
                $newdata = true;
            }
        } else {
            $newdata = true;
        }
        if ($newdata) {
            $handle = fopen($filename, "a");
            $data = $name . "," . $email . "\n"; // concatenate first and last delimited by comma and end of line character
            fputs($handle, $data);
            echo"<p>Thanks for signing<p>";
            echo "<p>Name: $name</p>";
            echo "<p>E-mail: $email</p>";
            fclose($handle); // close the text file
        } else {
            echo"<p>You have already signed the guest book!</p>";

        }
    } else { // no input
        echo "<p>Please use the back button in your browser and fill out the form.</p>";
    }
    ?>
    <a href="guestbookform.php">Add Another Visitor</a>
    <br>
    <a href="guestbookshow.php">Show Guest Book</a>
</body>

</html>