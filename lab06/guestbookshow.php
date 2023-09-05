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
    $filename = "../../data/lab06/guestbook.txt";
    $dir = "../../data/lab06";
    
    if (file_exists($dir) && is_readable($filename)) {
        $alldata = array();
        $namedata = array();
        $emaildata = array();
        
        $handle = fopen($filename, "r");
        while (!feof($handle)) {
            $onedata = fgets($handle);
            if ($onedata !== "") {
                $data = explode(",", $onedata);
                $alldata[] = $data;
                $namedata[] = $data[0];
                if (count($data) >= 2) {
                    $emaildata[] = $data[1];
                }
            }
        }
        fclose($handle);
        
        array_multisort($namedata, SORT_ASC, $alldata);
        if (!empty($alldata)) {
            echo "<table border='1'>";
            echo "<tr><th>Number</th><th>Name</th><th>Email</th></tr>";
            
            foreach ($alldata as $i => $data) {
                if (count($data) >= 2) {
                    echo "<tr><td>$i</td><td>$data[0]</td><td>$data[1]</td></tr>";
                }
            }
            
            echo "</table>";
        } else {
            echo "<p>No entries in the Guestbook.</p>";
        }
    } else {
        echo "<p>File is unreadable or does not exist.</p>";
    }
    ?>
    <br>
    <a href="guestbookform.php">Add Another Visitor</a>
</body>

</html>
