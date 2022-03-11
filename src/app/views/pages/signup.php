<?php

// $blog = new Blog();

// if (isset($_POST['submit'])) {
//     // echo $_POST['name'];
//     $username = isset($_POST['name']) ? $_POST['name'] : '';
//     $email = isset($_POST['email']) ? $_POST['email'] : '';
//     $password = isset($_POST['password']) ? $_POST['password'] : '';
//     $confirm = isset($_POST['confirm']) ? $_POST['confirm'] : '';
//     if ($password != $confirm) {
//         $conf = "Not match";
//     }
//     if ($password == $confirm && $password != '') {
//         $User = new User();

//         $check = $User->getUser($email);
//         // print_r($check);
//         if ($check['email'] == $email) {
//             $msg = 1;
//         } else {
//             $User->addUser($username, $email, $password);
//             $thanks = 1;
//         }
//     }
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css" />
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <title>Sign In</title>
</head>

<body>
    <?php echo $data['blog'] ?>
    <div class="container mt-3">


        <div class="row">
            <div class="col-3"></div>
            <form action="" class='col-6' method="POST">
                <h2>Sign In</h2>
                <br>
                <hr>
                <div class="mb-3 mt-3">
                    <label for="Name">Name:</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter Full Name" name="name">
                </div>
                <div class="mb-3 mt-3">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                </div>
                <div class="mb-3 mt-2">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
                </div>
                <div class="mb-3 mt-2">
                    <label for="conf-pwd">Confirm Password:</label>
                    <input type="password" class="form-control" id="confirm" placeholder="Confirm password" name="confirm">
                </div>
                <div class=" mb-3 small text-danger">
                    <label>
                        <?php if (isset($msg)) {
                            echo "Email exists - Please use different Email";
                        }
                        if ($conf == "Not match") {
                            echo "Password doesn't Match . Please Confirm";
                        }
                        if ($thanks) {
                            echo "Thanks for Sign Up wait for Account Approval. After Approval you can login from below link";
                            ?>

                            <div class=" mb-3 small">
                                <label>
                                    <a href="login.php">Log In</a>
                                </label>
                            </div><?php
                        }
                        ?>
                    </label>
                </div>
                <button class="w-75 btn btn-lg btn-primary" type="submit" name="submit" value="submit">Sign Up</button>
            </form>
            <div class="col-3"></div>
        </div>
    </div>
</body>

</html>