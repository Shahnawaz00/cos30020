<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Search Job Vacancy</title>
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
        <h1>Search Job Vacancy</h1>

        <!-- search job form  -->
        <form action="searchjobprocess.php" method="GET">
            <!-- title  -->
            <label for="search_title">Search by Job Title:</label>
            <input type="text" id="search_title" name="search_title">
            <br>
            <!-- position  -->
            <label for="search_position">Search by Position:</label>
            <select id="search_position" name="search_position">
                <option value="">Any</option>
                <option value="Full Time">Full Time</option>
                <option value="Part Time">Part Time</option>
            </select>            <br>
            <!-- contract  -->
            <label for="search_contract">Search by Contract:</label>
            <select id="search_contract" name="search_contract">
                <option value="">Any</option>
                <option value="On-going">On-going</option>
                <option value="Fixed Term">Fixed Term</option>
            </select>
            <br>
            <!-- application  -->
            <label for="search_application">Search by Application Type:</label>
            <select id="search_application" name="search_application">
                <option value="">Any</option>
                <option value="Post">Post</option>
                <option value="Email">Email</option>
            </select>
            <br>
            <!-- location  -->
            <label for="search_location">Search by Location:</label>
            <select id="search_location" name="search_location">
                <option value="">Any</option>
                <option value="ACT">ACT</option>
                <option value="NSW">NSW</option>
                <option value="NT">NT</option>
                <option value="QLD">QLD</option>
                <option value="SA">SA</option>
                <option value="TAS">TAS</option>
                <option value="VIC">VIC</option>
                <option value="WA">WA</option>
            </select>
            <br>
            <!-- buttons -->
            <button type="submit">Search</button>
            <br>
            <a href="index.php" class="link" >Return to Home</a>
        </form>
    </div>
</body>
</html>
