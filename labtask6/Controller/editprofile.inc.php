<?php
session_start();
if (!$_SESSION['login']) {
    header("Location: ../login.php");
    exit();
}

if (isset($_POST['edit'])) {
    $errors = [];

    $name = (isset($_POST['name'])) ? htmlentities(htmlspecialchars($_POST['name'])) : '';
    $email = (isset($_POST['email'])) ? htmlentities(htmlspecialchars($_POST['email'])) : '';
    $gender = (isset($_POST['gender'])) ? htmlentities(htmlspecialchars($_POST['gender'])) : '';
    $type = (isset($_POST['type'])) ? htmlentities(htmlspecialchars($_POST['type'])) : '';
    $dob = (isset($_POST['dob'])) ? htmlentities(htmlspecialchars($_POST['dob'])) : '';

    $json_data = file_get_contents('../db/data.json');
    $tmp_arr = json_decode($json_data);

    if (strlen($name) < 2 || preg_match("/[a-zA-z0-9]/", $name) != 1) {
        array_push($errors, "name");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "email");
    }
    if (empty($gender) || preg_match("/male|female|others/", $gender) != 1) {
        array_push($errors, "gender");
    }
    if (empty($type) || preg_match("/restaurantadmin|management|user/", $type) != 1) {
        array_push($errors, "type");
    }
    if (empty($dob)) {
        array_push($errors, "dob");
    }

    foreach ($tmp_arr as $e) {
        if ($e[0]->email == $email && $_SESSION['email'] != $email) {
            array_push($errors, "duplicate");
            break;
        }
    }

    if (count($errors)) {
        $url = "?errors=";
        for ($i = 0; $i < count($errors); ++$i) {
            $url = $url . $errors[$i] . ',';
        }
        header("Location:../editprofile.php$url");
        // echo '<pre>';
        // var_dump($_POST);
        // echo '</pre>';
        exit();
    }

    for ($i = 0; $i < count($tmp_arr); $i++) {
        // echo '<pre>';
        // echo ($tmp_arr[$i][0]->email);
        // echo '</pre>';
        if ($tmp_arr[$i][0]->email == $_SESSION['email']) {
            $tmp_arr[$i][0]->name = $name;
            $_SESSION['name'] = $name;
            $tmp_arr[$i][0]->email = $email;
            $_SESSION['email'] = $email;
            $tmp_arr[$i][0]->gender = $gender;
            $_SESSION['gender'] = $gender;
            $tmp_arr[$i][0]->type = $type;
            $_SESSION['type'] = $type;
            $tmp_arr[$i][0]->dob = $dob;
            $_SESSION['dob'] = $dob;
            break;
        }
    }

    // echo '<hr><pre>';
    // var_dump($tmp_arr);
    // echo '</pre>';

    $json_new_data = json_encode($tmp_arr);
    file_put_contents('../db/data.json', $json_new_data);

    header("Location: ../editprofile.php?success=true");
    exit();
} else {
    header("Location: ../editprofile.php");
    exit();
}
