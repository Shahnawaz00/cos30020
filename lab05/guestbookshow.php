<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8" />
 <meta name="description" content="Guestbook Entries" />
 <meta name="keywords" content="HTML, PHP" />
 <meta name="author" content="Shah" />
 <title>Guestbook Entries</title>
</head>
<body>
<h1>Guestbook Entries</h1>
<?php
$guestbookFile = "../../data/lab05/guestbook.txt";

if (is_readable($guestbookFile)) {
    $entries = file_get_contents($guestbookFile);
    $entries = stripslashes($entries); 
    
    echo "<pre>", $entries, "</pre>";
} else {
    echo "Guestbook is empty or not accessible.";
}
?>
</body>
</html>
