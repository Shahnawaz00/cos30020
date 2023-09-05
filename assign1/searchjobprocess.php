<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Search Job Results</title>
</head>
<body>
     <!-- navbar  -->
     <nav>
        <ul>
            <li class="<?php echo basename($_SERVER['PHP_SELF']) == 'index.php' && 'active'; ?>">
                <a href="index.php">Home</a>
            </li>
            <li class="<?php echo basename($_SERVER['PHP_SELF']) == 'postjobform.php' && 'active'; ?>">
                <a href="postjobform.php">Post</a>
            </li>
            <li class="<?php echo basename($_SERVER['PHP_SELF']) == 'searchjobform.php' && 'active'; ?>">
                <a href="searchjobform.php">Search</a>
            </li>
            <li class="<?php echo basename($_SERVER['PHP_SELF']) == 'about.php' && 'active'; ?>">
                <a href="about.php">About</a>
            </li>
        </ul>
    </nav>

    <!-- main page div  -->
    <div class="main" >
        <h1>Job Vacancy Information</h1>
        <?php
        // get search values
        $search_title = isset($_GET["search_title"]) ? $_GET["search_title"] : "";
        $search_position = isset($_GET["search_position"]) ? $_GET["search_position"] : "";
        $search_contract = isset($_GET["search_contract"]) ? $_GET["search_contract"] : "";
        $search_application = isset($_GET["search_application"]) ? $_GET["search_application"] : "";
        $search_location = isset($_GET["search_location"]) ? $_GET["search_location"] : "";
      

        $file_path = "../../data/jobposts/jobs.txt";  

        if (empty($search_title)) {  // check if search title is empty
            echo "<p>Please provide a job title to search.</p>";
        } elseif (!file_exists($file_path)) { // check if file exists
            echo "<p>No job vacancy records found.</p>";
        } else { // if file exists, search for jobs
            $file_contents = file_get_contents($file_path);
            $lines = explode("\n", $file_contents);

            // array to store jobs found 
            $found_jobs = [];

            // check search values against each job row/line 
            foreach ($lines as $line) {
                $fields = explode("\t", $line);
                if (
                    count($fields) >= 8 && 
                    (empty($search_title) || preg_match("/\b" . preg_quote($search_title, '/') . "\b/i", $fields[1])) &&
                    (empty($search_position) || $fields[4] === $search_position) &&
                    (empty($search_contract) || $fields[5] === $search_contract) &&
                    (empty($search_application) || stripos($fields[6], $search_application) !== false) &&
                    (empty($search_location) || $fields[7] === $search_location)
                ) {
                    $found_jobs[] = $fields;
                }
            }
            
            // filter jobs by closing date 
            $current_date = date("d/m/y");
            $filtered_jobs = array_filter($found_jobs, function ($job) use ($current_date)  {
                return $job[3] >= $current_date;
            });

            // sort jobs by closing date
            function compareClosingDates($a, $b) {
                $dateA = $a[3];
                $dateB = $b[3];
            
                if ($dateA == $dateB) {
                    return 0;
                }
                return ($dateA > $dateB) ? -1 : 1;
            }
            
            usort($filtered_jobs, 'compareClosingDates');

            // display jobs
            if (empty($filtered_jobs)) { // if no jobs found
                echo "<p>No job vacancies found for your search.</p>";
            } else { // if jobs found
                foreach ($filtered_jobs as $job) {
                    echo "<div class='job' >";
                    echo "<p><b>Job Title:      </b> $job[1]</p>";
                    echo "<p><b>Description:    </b> $job[2]</p>";
                    echo "<p><b>Closing Date:   </b> $job[3]</p>";
                    echo "<p><b>Position:       </b> $job[4]</p>";
                    echo "<p><b>Contract:       </b> $job[5]</p>";
                    echo "<p><b>Application by: </b> $job[6]</p>";
                    echo "<p><b>Location:       </b> $job[7]</p>";
                    echo "</div>";

                }
            }
        }
        ?>
        <!-- links  -->
        <a href="searchjobform.php" class="link" >Search Another Job</a> |
        <a href="index.php" class="link" >Return to Home</a> 
    </div>
</body>
</html>
