<?php
// var_dump($_SESSION);
function header_section($title)
{
    if (preg_match("/Dashboard/", $title))
        if (!$_SESSION['login'])
            header("Location: login.php");
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo ($title) ? $title : "Document"; ?></title>

        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <header>
            <div class="header-info clearfix">
                <?php if (preg_match("/Dashboard/", $title) && isset($_SESSION['login'])) : ?>

                    <h1 style="float:left;"><?php echo ($title) ? $title : "Document"; ?></h1>
                    <h3 style="float:right;">Logged in as <?php echo $_SESSION['name']; ?></h3>
                <?php else : ?>

                    <h1><?php echo ($title) ? $title : "Document"; ?><?php echo " Page"; ?></h1>
                <?php endif; ?>
            </div>
            <nav class="menu">
                <ul>
                    <?php if (preg_match("/Dashboard/", $title) && isset($_SESSION['login'])) : ?>

                        <li><a href="dashboard.php">Home</a></li>
                        <li><a href="viewprofile.php">View Profile</a></li>
                        <li><a href="editprofile.php">Edit Profile</a></li>
                        <li><a href="changepp.php">Change Profiel Picture</a></li>
                        <li><a href="changepassword.php">Change Password</a></li>
                        <li><a href="inc/logout.php">Logout</a></li>
                    <?php else : ?>

                        <li><a href="index.php">Home</a></li>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="registration.php">Registration</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </header><?php } ?>