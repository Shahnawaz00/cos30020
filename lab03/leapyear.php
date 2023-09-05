<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="lab03" />
    <meta name="keywords" content="lab03" />
    <title>lab03 leap year</title>
</head>
<body>
<?php

function is_leapyear($year) {
    if (is_numeric($year)) {
        if (($year % 4 == 0 && $year % 100 != 0) || ($year % 400 == 0)) {
            return true; 
        } else {
            return false; 
        }
    } else {
        return false; 
    }
}

$yearToTest = $_GET["number"]; 

if (is_leapyear($yearToTest)) {
    echo "$yearToTest is a leap year.";
} else {
    echo "$yearToTest is not a leap year.";
}




?>
</body>
</html>
