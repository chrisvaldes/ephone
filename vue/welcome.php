<?php

include '../composant/contactComponent.php';

session_start();

$userEmail = $_SESSION["userEmail"];


if (!isset($userEmail)) {

    header('location:login.php');
}
echo $_SESSION['userEmail'];

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ePhoneBook</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"> -->
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->

    <style>
        .card {
            background: url('');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }
        @media (max-width : 700px) {
            .card .card-image {
                display: none;
            }
        }
    </style>
</head>

<body class="bg-light">

    <div class="container " style="min-height: 100vh; align-items: center; justify-content: center; display: flex;">

        <!-- New Section for ePhoneBook -->
        <div class="row ">
            <div class="col md8 offset-m2">
                <div class="card horizontal" style=" border-radius: 9px;">
                    <div class="card-image">
                        <img src="../images/backgroundWelcom.jpeg" alt="Picture" style="border-radius: 10px; height: 100%;" />
                    </div>
                    <div class="card-content">
                        <div class="card-title center">
                            <h4 style="font-weight: bold;">BIENVENUE SUR <span style=" color:greenyellow">ePhoneBook</span></h4>
                            <p class="text-center" style="font-weight: bold; ">Votre annuaire téléphonique électronique</p>
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>

                        <div class="card-action">
                            <a href="addcontact.php" class="btn btn-primary" style="width: 100%; border-radius: 9px;"><span>+ Ajouter nouveau contact</span></a>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

</body>

</html>