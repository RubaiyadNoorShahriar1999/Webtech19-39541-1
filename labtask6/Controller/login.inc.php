<?php
session_start();

if (isset($_POST['login'])) {
    $notFound = true;
    $type = "";
    $name = "";
    $email_store = "";
    $gender = "";
    $purl = "";
    $dob = "";
    $email = (isset($_POST['email'])) ? htmlentities(htmlspecialchars($_POST['email'])) : '';
    $password = (isset($_POST['password'])) ? htmlentities(htmlspecialchars($_POST['password'])) : '';

    $json_data = file_get_contents('../db/data.json');
    $tmp_arr = json_decode($json_data);

    foreach ($tmp_arr as $e) {
        if ($e[0]->email == $email && $e[0]->password == $password) {
            $name = $e[0]->name;
            $email_store = $e[0]->email;
            $gender = $e[0]->gender;
            $type = $e[0]->type;
            $purl = $e[0]->purl;
            $dob = $e[0]->dob;
            $notFound = false;
            break;
        }
    }

    if ($notFound) {
        session_unset();
        session_destroy();
        header("Location: ../login.php?errors=notlogin");
        exit();
    }

    $_SESSION['name'] = $name;
    $_SESSION['email'] = $email_store;
    $_SESSION['gender'] = $gender;
    $_SESSION['type'] = $type;
    $_SESSION['dob'] = $dob;
    $_SESSION['purl'] = $purl;
    $_SESSION['login'] = true;

    header("Location: ../dashboard.php");
    exit();
} else {
    session_unset();
    session_destroy();
    header("Location: ../login.php");
    exit();
}
