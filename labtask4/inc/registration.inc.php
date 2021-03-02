<?php
if (isset($_POST['registration'])) {

    $errors = [];
    $name = (isset($_POST['name'])) ? htmlentities(htmlspecialchars($_POST['name'])) : '';
    $email = (isset($_POST['email'])) ? htmlentities(htmlspecialchars($_POST['email'])) : '';
    $password = (isset($_POST['password'])) ? htmlentities(htmlspecialchars($_POST['password'])) : '';
    $cpassword = (isset($_POST['cpassword'])) ? htmlentities(htmlspecialchars($_POST['cpassword'])) : '';
    $gender = (isset($_POST['gender'])) ? htmlentities(htmlspecialchars($_POST['gender'])) : '';
    $dob = (isset($_POST['dob'])) ? htmlentities(htmlspecialchars($_POST['dob'])) : '';

    $json_data = file_get_contents('../db/data.json');
    $tmp_arr = json_decode($json_data);

    if (strlen($name) < 2 || preg_match("/[a-zA-z0-9]/", $name) != 1) {
        array_push($errors, "name");
    }
    if (strlen($password) < 8 || preg_match("/[\@|\#|\$|\%]/", $password) != 1) {
        array_push($errors, "password");
    }
    if ($cpassword !== $password) {
        array_push($errors, "cpassword");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "email");
    }
    if (empty($gender) || preg_match("/male|female|others/", $gender) != 1) {
        array_push($errors, "gender");
    }
    if (empty($dob)) {
        array_push($errors, "dob");
    }

    foreach ($tmp_arr as $e) {
        // echo '<pre>';
        // var_dump($e[0]->email);
        // echo '</pre>';
        if ($e[0]->email == $email) {
            array_push($errors, "duplicate");
            break;
        }
    }

    if (count($errors)) {
        $url = "?errors=";
        for ($i = 0; $i < count($errors); ++$i) {
            $url = $url . $errors[$i] . ',';
        }
        header("Location:../registration.php$url");
        // echo '<pre>';
        // var_dump($url);
        // echo '</pre>';
        exit();
    }

    $data[] = [
        "name"      => $name,
        "email"     => $email,
        "password"  => $password,
        "gender"    => $gender,
        "purl"      => "",
        "dob"       => $dob
    ];

    // echo '<pre>';
    // var_dump($data);
    // echo '</pre>';

    // $json_data = file_get_contents('../db/data.json');
    // $tmp_arr = json_decode($json_data);
    array_push($tmp_arr, $data);

    $json_data = json_encode($tmp_arr);
    file_put_contents('../db/data.json', $json_data);

    header("Location: ../registration.php?successfull=true");
    exit();
} else {
    header("Location: ../registration.php");
    exit();
}
