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
$days = array ("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"); // declare and initialise array
echo "<p>The days of the week in english are:</p>";
foreach($days as $day) {
	if (end($days) == $day) {
  		echo "$day.";

	} else {
		echo "$day, ";
	}
}

$days[0] = "Dimanche";
$days[1] = "Lundi";
$days[2] = "Mardi";
$days[3] = "Mecredi";
$days[4] = "Jeudi";
$days[5] = "Vendredi";
$days[6] = "Samedi";

echo "<p>The days of the week in french are: </p>";
foreach($days as $day) {
	if (end($days) == $day) {
  		echo "$day.";

	} else {
		echo "$day, ";
	}
}


?>
</body>
</html>
