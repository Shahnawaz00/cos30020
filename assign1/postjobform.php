<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Post Job Form</title>
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
    
    <div class="main" >
    <h1>Post Job</h1>
    
    <!-- post job form  -->
    <form action="postjobprocess.php" method="POST">
        <!-- pid  -->
        <label for="position_id">Position ID:</label>
        <input type="text" id="position_id" name="position_id" required pattern="PID\d{4}" title="Position ID must start with PID followed by 4 digits e.g. PID0001">
        <br>
        
        <!-- title  -->
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required maxlength="20" pattern="[A-Za-z0-9\s,.!]+" 
            title="Only alphanumeric characters including spaces, comma, period (full stop), and exclamation point. Other characters or symbols are not allowed.">
        <br>
        
        <!-- desc  -->
        <label for="description">Description:</label>
        <textarea id="description" name="description" required maxlength="250"></textarea>
        <br>
        
        <!-- date  -->
        <label for="closing_date">Closing Date:</label>
        <input type="text" id="closing_date" name="closing_date" value="<?= date('d/m/y'); ?>" required>
        <br>
        
        <!-- position  -->
        <label for="position">Position:</label>
        <input type="radio" id="full_time" name="position" value="Full Time"> Full Time
        <input type="radio" id="part_time" name="position" value="Part Time"> Part Time
        <br>
        
        <!-- contract  -->
        <label for="contract">Contract:</label>
        <input type="radio" id="ongoing" name="contract" value="On-going"> On-going
        <input type="radio" id="fixed_term" name="contract" value="Fixed term"> Fixed term
        <br>
        
        <!-- application  -->
        <label>Accept Application by:</label>
        <input type="checkbox" id="accept_post" name="accept[]" value="Post"> Post
        <input type="checkbox" id="accept_email" name="accept[]" value="Email"> Email
        <br>
        
        <!-- location  -->
        <label for="location">Location:</label>
        <select id="location" name="location">
            <option value="---" selected>---</option>
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
        
        <!-- buttons  -->
        <button type="submit">Submit</button>
        <button type="reset" >Reset</button>
        <br>
        
        <span>All fields are required.</span>
        <a href="index.php" class="link" >Return to Home</a>
    </form>

    </div>
</body>
</html>
