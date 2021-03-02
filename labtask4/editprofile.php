<?php require_once("./inc/deps.php"); ?>
<?php header_section("Dashboard | Edit Profile"); ?>
<?php

$errors_message = [];
$success_message = "";

if (isset($_GET['success'])) {
    if ($_GET['success'] == "true") {
        // var_dump($_GET);
        $success_message = "Successfully Edited";
    }
}

if (isset($_GET['errors'])) {
    $errors_code = explode(",", $_GET['errors']);


    foreach ($errors_code as $error) {
        if ($error == "name") {
            array_push($errors_message, "Name must be larger than 2 character, alphanumeric");
        }
        if ($error == "email") {
            array_push($errors_message, "Invalid Email");
        }
        if ($error == "duplicate") {
            array_push($errors_message, "Duplicate Email address");
        }
        if ($error == "gender") {
            array_push($errors_message, "Invalid Gender");
        }
        if ($error == "dob") {
            array_push($errors_message, "Invalid Date Of Birth");
        }
    }
}
?>

<main class="clearfix">
    <?php if (count($errors_message)) : ?>

        <div class="errors-list">
            <table>
                <tbody>

                    <?php foreach ($errors_message as $err_msg) : ?>

                        <tr>
                            <td>!! <?php echo $err_msg; ?></td>
                        </tr>

                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>

    <?php endif; ?>
    <?php if (!empty($success_message)) : ?>

        <div class="success">
            <table>
                <tbody>
                    <tr>
                        <td><?php echo $success_message; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

    <?php endif; ?>
    <form action="inc/editprofile.inc.php" method="post">
        <table>
            <tbody>
                <tr>
                    <td><label for="name">Name</label></td>
                    <td><input class="inp" id="name" type="text" value="<?php echo $_SESSION['name'] ?>" name="name" required></td>
                </tr>
                <tr>
                    <td><label for="email">Email</label></td>
                    <td><input class="inp" id="email" type="email" value="<?php echo $_SESSION['email'] ?>" name="email" required></td>
                </tr>
                <tr>
                    <td><label>Gender</label></td>
                    <td>
                        <input id="male" type="radio" value="male" <?php echo isset($_SESSION['gender']) && $_SESSION['gender'] == "male" ? "checked " : ""; ?>name="gender">
                        <label for="male">Male</label>

                        <input id="female" type="radio" value="female" <?php echo isset($_SESSION['gender']) && $_SESSION['gender'] == "female" ? "checked " : ""; ?>name="gender">
                        <label for="female">Female</label>

                        <input id="others" type="radio" value="others" <?php echo isset($_SESSION['gender']) && $_SESSION['gender'] == "others" ? "checked " : ""; ?>name="gender">
                        <label for="others">Others</label>
                    </td>
                </tr>
                <tr>
                    <td><label for="dob">Date Of Birth</label></td>
                    <!-- value="2021-02-03" -->
                    <td><input class="inp" id="dob" type="date" value="<?php echo $_SESSION['dob'] ?>" name="dob" required></td>
                </tr>
                <tr>
                    <td><button class="btn" type="reset">Reset</button></td>
                    <td><button class="btn" id="edit" type="submit" name="edit">Edit</button></td>
                </tr>
            </tbody>
        </table>
    </form>
</main>
<?php footer_section(); ?>