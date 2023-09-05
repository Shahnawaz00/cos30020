<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="lab03" />
    <meta name="keywords" content="lab03" />
    <title>Prime Number lab03</title>
</head>
<body>
<?php
function isPrime($number) {
   if ($number == 1) {
	return false;
	}
    for ($i = 2; $i <= $number/2; $i++){
        if ($number % $i == 0) {
            return false; 
		}
    }
    return true;
}

$num = $_GET["number"];
    if (isPrime($num)) {
        echo "$num is a prime number.<br>";
    } else {
        echo "$num is not a prime number.<br>";
    }

?>
</body>
</html>
