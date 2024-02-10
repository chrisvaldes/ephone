<?php

include "../controleur/userControler.php";
$userControler = new UserControler();

$userControler->getUser();



?>



<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"> -->
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->

    <style>
        .message {
            position: sticky;
            top: 0;
            margin: 0 auto;
            max-width: 1200px;
            background-color: var(--white);
            padding: 0 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            z-index: 10000;
            gap: 1.5rem;
        }

        .message span {
            color: red;
            font-size: 1.2rem;
        }

        .message i {
            cursor: pointer;
            font-size: 1.2rem;
        }

        .message i:hover {
            color: red;
            transform: rotate(90deg);
        }

        @media (max-width : 700px) {
            .card .card-image {
                display: none;
            }
        }
    </style>
</head>

<body style="background-color: lightgray;">

    <div class="container" style="min-height: 100vh; align-items: center; justify-content: center; display: flex;">
        <div class="row">
            <div class="col md10 offset-m1">
                <div class="card horizontal " style="background-color: white; border-radius: 10px;">
                    <div class="card-image">
                        <img src="../images/background.jpg" alt="Picture" style="border-radius: 10px; height: 100%;" />
                    </div>
                    <div class="card-content">

                        <?php
                        if (isset($_SESSION['error_message'])) {
                            $message = $_SESSION['error_message'];
                            echo '
                                <div class = "message">
                                    <span>' . $message . '</span>
                                    <i class="fa fa-times" onclick="this.parentElement.remove();"></i>
                                </div>
                            ';
                        }
                        ?>
                        <div class="card-title center">
                            <h4 style="font-weight: bold; margin-bottom : 2.5rem">LOGIN</h4>

                        </div>

                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <div class="form-group row " style="display: flex; justify-content: center; align-items: center;">
                                <i class="fa fa-envelope" style="font-size: 2rem; margin: 0 1.5rem 0 .5rem; color : lightgrey"></i>

                                <input type="email" class="form-control" placeholder="Email" name="userEmail" required autofocus>
                            </div>

                            <!-- Forgot password link in red, smaller, and to the right -->
                            <div class="text-center mt-3">
                                <p style="text-align: right; padding-right: 1rem;"><a href="forgotpassword.php" style="color: red">Mot de passe oublié?</a></p>
                            </div>

                            <div class="form-group row" style="display: flex; justify-content: center; align-items: center;">
                                <i class="fa fa-lock" style="font-size: 2.3rem; margin: 0 1.5rem 0 .5rem; color: red;"></i>
                                <input type='password' id='password' name='password' placeholder='Password' required autocomplete='current-password' aria-describedby='passwordHelpBlock' pattern="[A-Za-z0-9@#$%^&+=]{8,}" title='Must contain at least 8 characters including a special character and a number' minlength=8 maxlength=50 size=50 class="form-control" />
                                <!-- Password requirements -->
                                <!-- The password doit avoir 8 characters -->
                                <!-- The password  include minuscule et majuscule letters, numbers and special characters -->
                            </div>

                            <!-- Sign up link to the extreme right -->
                            <div class="text-center" style="margin-bottom: 1.5rem;">
                                <p style="text-align: right; padding-right: 1rem;">Pas de compte ?<a href="SignUp.php"> Creez en un </a></p>
                            </div>

                            <div class="card-action " style="display: flex; align-items: center; justify-content: center; padding-top: 2rem;">
                                <!-- Submit button -->
                                <input type="submit" name="Connect" class="btn btn-primary " style=" width: 100%; border-radius: 8px;" />
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>

</body>

</html>