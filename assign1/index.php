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
        <h1>Job Vacancy Posting System</h1>

        <!-- author details  -->
        <p>
            Name: Shah Nawaz Chowdhury<br>
            Student ID: 103830682<br>
            Email: <a href="mailto:103830682@student.swin.edu.au " class="link" >103830682@student.swin.edu.au</a>
        </p>

        <!-- declaration  -->
        <p>
            I declare that this assignment is my individual work. I have not worked 
            collaboratively, nor have I copied from any other student’s work or from any other source.
        </p>

        <!-- links  -->
        <div class="links" >
            <!-- left side  -->
            <div class="left-links" >
                <button>
                    <a href="postjobform.php">Post a job vacancy</a>
                </button>
                <button>
                    <a href="searchjobform.php">Search for a job vacancy</a>
                </button>
            </div>
            <!-- right side  -->
            <button>
                <a href="about.php">About this assignment</a>
            </button>
        </div>
    </div>
    
    
</body>
</html>