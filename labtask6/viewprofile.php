<?php require_once("./inc/deps.php"); ?>
<?php header_section("Dashboard | View Profile"); ?>
<?php

$time = "";
$new_date = "";
$time = strtotime(isset($_SESSION['dob']) ? $_SESSION['dob'] : "");
$new_date = date("d/m/Y", $time);

?>

<main class="clearfix">
    <div class="profile-info">
        <table>
            <tbody>
                <tr>
                    <td>Name:</td>
                    <td><?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ""; ?></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ""; ?></td>
                </tr>
                <tr>
                    <td>Gender:</td>
                    <td><?php echo isset($_SESSION['gender']) ? ucwords($_SESSION['gender']) : ""; ?></td>
                </tr>
                <tr>
                    <td>Type:</td>
                    <td><?php echo isset($_SESSION['type']) ? ucwords($_SESSION['type']) : ""; ?></td>
                </tr>
                <tr>
                    <td>Death Of Birth:</td>
                    <td><?php echo $new_date; ?></td>
                </tr>
                <tr>
                    <td><a href="./editprofile.php">Edit Profile</a></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="profile-pic">
        <table>
            <tbody>
                <tr>
                    <td><img src="<?php echo isset($_SESSION['purl']) && !empty($_SESSION['purl']) ? $_SESSION['purl'] : "./images/defaultprofile.png" ?>" alt="Profile Picture"></td>
                </tr>
                <tr>
                    <td><a href="./changepp.php">Change Profile Picture</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</main>
<?php footer_section(); ?>