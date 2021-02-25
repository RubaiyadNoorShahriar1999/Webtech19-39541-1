<?php
session_start();

$_SESSION['login'] = 'off';
$_SESSION['Credentia'] = '';
$_SESSION['msg'] = '';

$data = array(
    'username' => 'ruba_noor',
    'password' => '1234567@'
);


if (isset($_POST)) {

    $exp = "/[\!|\@|\#|\$|\%|\^|\&|\*|\(|\)|\-|\+|\=|\{|\[|\}|\]|\||\\\|\'|\"|\;|\:|\/|\?|\>|\<|\,]/i";
    $username = (!empty($_POST['username'])) ? htmlentities(htmlspecialchars(preg_replace($exp, "", $_POST['username']))) : '';
    $password = (!empty($_POST['password'])) ? htmlentities(htmlspecialchars($_POST['password'])) : '';
    $remember = (!empty($_POST['remember'])) ? htmlentities(htmlspecialchars($_POST['remember'])) : '';

    if (
        strlen($username) >= 2 &&
        strlen($password) >= 8 &&
        preg_match("/[^abc]|[0-9]|-|_|\.]/i", $username) == 1 &&
        preg_match("/[\@|\#|\$|\%]/", $password) == 1
    ) {
        if ($data['username'] == $username && $data['password'] == $password) {
            $_SESSION['login'] = 'on';
            $_SESSION['Credentia'] = 'off';
            $_SESSION['msg'] = "<h4 style=\"text-align:center;color:green;\">you are logged in<br>Welcome $username</h4>";
        } else {
            $_SESSION['login'] = 'off';
            $_SESSION['Credentia'] = 'on';
            $_SESSION['msg'] = "<h4 style=\"text-align:center;color:red;\">your credential is incorrect!!</h4>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <style>
        *,
        *::after,
        *::before {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        a {
            display: inline-block;
            text-decoration: none;
            color: #d35400;
        }

        header,
        footer {
            width: 70%;
            margin: 0 auto;
            background-color: #34495e;
            padding: 20px;
            text-align: center;
            color: white;
        }

        main {
            width: 70%;
            margin: 10px auto;
            min-height: 300px;
            border: 1px solid black;
            padding: 5px;
        }

        table {
            width: 80%;
            margin: 20px auto 0 auto;
            text-align: center;
        }

        table tr td {
            padding: 10px 10px;
        }

        table tr td:first-child {
            text-align: right;
        }

        table tr td:last-child {
            text-align: left;
        }

        button {
            padding: 10px 20px;
            background-color: green;
            border: none;
            border-radius: 3px;
            color: white;
            font-size: medium;
        }
    </style>
</head>

<body>

    <header>
        <h1>Login Page</h1>
    </header>

    <main>
        <?php echo ($_SESSION['Credentia'] == 'on' || $_SESSION['login'] == 'on') ? $_SESSION['msg'] : ''; ?>
        <form action="index.php" method="post">
            <table>
                <tbody>
                    <tr>
                        <td><label for="username">Username</label></td>
                        <td><input id="username" type="text" name="username" required></td>
                    </tr>
                    <tr>
                        <td><label for="password">Password</label></td>
                        <td><input id="password" type="passwrod" name="password" required></td>
                    </tr>
                    <tr>
                        <td><input id="remember" type="checkbox" name="remember"></td>
                        <td><label for="remember">Remember me</label></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><button id="submit" type="submit" name="submit">Submit</button></td>
                    </tr>
                </tbody>
            </table>
        </form>
    </main>

    <footer>
        <h2>&copy; Copyright by <a href="https://github.com/RubaiyadNoorShahriar1999">Rubaiyad Noor Shahriar</a></h2>
    </footer>
</body>

</html>