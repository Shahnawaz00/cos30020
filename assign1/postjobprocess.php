<!-- php to handle job posts  -->
<?php
// check if form was submitted by post method before starting validation
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // function to validate the date in the correct format, d/m/y used as default
    function validateDate($date, $format = 'd/m/y') {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }

    // array to store errors
    $errors = [];

    // get form data, using ternary operators to check if data exists first before assigning it
    $position_id = isset($_POST["position_id"]) ? $_POST["position_id"] : "";
    $title = isset($_POST["title"]) ? $_POST["title"] : "";
    $description = isset($_POST["description"]) ? $_POST["description"] : "";
    $closing_date = isset($_POST["closing_date"]) ? $_POST["closing_date"] : "";
    $position = isset($_POST["position"]) ? $_POST["position"] : "";
    $contract = isset($_POST["contract"]) ? $_POST["contract"] : "";
    $accept = isset($_POST["accept"]) ? $_POST["accept"] : [];
    $location = isset($_POST["location"]) ? $_POST["location"] : "";

    // validation checks 
    if (empty($position_id) || !preg_match("/^PID\d{4}$/", $position_id)) {
        $errors[] = "Invalid Position ID. It must start with PID followed by 4 digits.";
    }
    if (empty($title) || strlen($title) > 20 || !preg_match("/^[A-Za-z0-9\s,.!]+$/", $title)) {
        $errors[] = "Invalid Title.";
    }
    if (empty($description) || strlen($description) > 250) {
        $errors[] = "Invalid Description.";
    }
    if (empty($closing_date) || !validateDate($closing_date, 'd/m/y')) {
        $errors[] = "Invalid Closing Date.";
    }
    // check if field was left empty since the form does not enforce a selection for these fields 
    if (empty($position)) {
        $errors[] = "Invalid Position.";
    }
    if (empty($contract)) {
        $errors[] = "Invalid Contract.";
    }
    if (empty($accept)) {
        $errors[] = "Add a way to Accept Application.";
    }
    if (empty($location) || $location == "---") {
        $errors[] = "Invalid Location.";
    }

    // if no errors, start logic to write to file
    if (empty($errors)) {
        $data = "$position_id\t$title\t$description\t$closing_date\t$position\t$contract\t" . implode(", ", $accept) . "\t$location\n";
        $file_path = "../../data/jobposts/jobs.txt";

        // create directory if it does not exist
        umask(0007);
        $dir = "../../data/jobposts";
        if (!file_exists($dir)) {
            mkdir($dir, 02770);
        }

        $existing_position_ids = [];

        // check if file exists to avoid overwriting existing data
        if (file_exists($file_path)) {
            $handle = fopen($file_path, "r");
            while (!feof($handle)) {
                $line = fgets($handle);
                if (!empty($line)) {
                    $fields = explode("\t", $line);
                    $existing_position_ids[] = $fields[0];
                }
            }
            fclose($handle);

            // check if position id already exists
            if (in_array($position_id, $existing_position_ids)) {
                $errors[] = "Position ID already exists.";
            } else { // if position id does not exist, write to file
                $handle = fopen($file_path, "a");
                fputs($handle, $data);
                fclose($handle);
                $confirmation_message = "Job vacancy has been successfully posted.";
            }
        } else { // if file does not exist, write to file
            $handle = fopen($file_path, "a");
            fputs($handle, $data);
            fclose($handle);
            $confirmation_message = "Job vacancy has been successfully posted.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Post Job Process</title>
</head>
<body>

    <!-- navbar  -->
    <nav>
        <ul>
            <li class="<?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>">
                <a href="index.php">Home</a>
            </li>
            <li class="<?php echo basename($_SERVER['PHP_SELF']) == 'postjobform.php' ? 'active' : ''; ?>">
                <a href="postjobform.php">Post</a>
            </li>
            <li class="<?php echo basename($_SERVER['PHP_SELF']) == 'searchjobform.php' ? 'active' : ''; ?>">
                <a href="searchjobform.php">Search</a>
            </li>
            <li class="<?php echo basename($_SERVER['PHP_SELF']) == 'about.php' ? 'active' : ''; ?>">
                <a href="about.php">About</a>
            </li>
        </ul>
    </nav>
    <div class="main">
        <?php if (!empty($errors)): ?>
            <!-- display if errors exist -->
            <h2>Error</h2>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
            <br>
            <button>
                <a href="postjobform.php">Return to Post Job Form</a>
            </button>
            <button>
                <a href="index.php">Return to Home</a> 
            </button>
        <?php elseif (isset($confirmation_message)): ?>
            <!-- display if no errors -->
            <h2>Confirmation</h2>
            <p><?php echo $confirmation_message; ?></p>
            <button>
                <a href="index.php">Return to Home</a>
            </button>
        <?php endif; ?>
    </div>
</body>
</html>
