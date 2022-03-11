<?php

use App\Blog;
use App\User;

error_reporting(0);
require_once '../vendor/autoload.php';

$blog = new Blog();

if (isset($_POST['submit'])) {
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $User = new User($email, $password);
    $check = $User->checkUser($email, $password);
    // print_r($check);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css" />
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <title>Log In</title>
</head>

<body>
    <?php echo $blog->blogheader(); ?>
    <div class="container mt-3">


        <div class="row">
            <div class="col-3"></div>
            <form action="" method="POST" class='col-6'>
                <h2>Log In</h2>
                <br>
                <hr>

                <div class="mb-3 mt-3">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                </div>
                <div class="mb-3 mt-2">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
                </div>
                <div class="mb-3 mt-2 text">
                    Don't have Acoount ? <a href="./signup.php">SignUp</a>
                </div>
                <div class=" mb-3 small text-danger">
                    <label>
                        <?php
                        if ($check['role'] == 'Editor') {
                            header('location: profile.php');
                        }
                        if ($check['role'] == 'Admin') {
                            header('location: dashboard.php');
                        } else {
                            print_r($check);
                        }

                        ?>
                    </label>
                </div>
                <button class="w-75 btn btn-lg btn-primary" type="submit" name="submit" value="submit">Log in</button>
            </form>
            <div class="col-3"></div>
        </div>
    </div>
</body>

</html>