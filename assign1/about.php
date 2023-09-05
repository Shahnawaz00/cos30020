<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Job Vacancy</title>
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

    <!-- main page div  -->
    <div class="main" >
        <!-- title  -->
        <h1>About</h1>

        <ul>
            <li>
                <?php
                    $phpVersion = phpversion();
                    echo "PHP Version: $phpVersion";
                ?>
            </li>
            <li>
                Completed all tasks
            </li>
            <li>
                Special features: Ensured website is responsive
            </li>
            <li>
                Did not participate in discussion board because I used stackoverflow instead.
            </li>
        </ul>
        <br>
        <a href="index.php" class="link" >Return to home</a>
    </div>
    
    
</body>
</html>