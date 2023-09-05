<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="Web Programming :: Lab 2" />
<meta name="keywords" content="Web,programming" />
<title>Using variables, arrays and operators</title>
</head>
<body>
<h1>Web Programming - Lab 2</h1>
<?php
$num = round($_GET["num"]);

$num % 2 == 0 && is_numeric($num) ? $status = "even number" : $status = "odd number";

echo "<p>The variable is an $status<p/>"

?>
</body>
</html>