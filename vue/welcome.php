<!-- <?php

    $userEmail = $_SESSION["userEmail"];

    if(!isset($userEmail)){
        header('location:login.php');
    }

?> -->


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

     
</head>
<body class="bg-light">

<div class="container " style="min-height: 100vh; align-items: center; justify-content: center; display: flex;">

    <!-- New Section for ePhoneBook -->
    <div class="row ">
        <div class="col md8 offset-m2">
            <div class="card" style="border-radius: 9px;">
                <div class="card-content">
                    <div class="card-title center">
                        <h4 style="font-weight: bold;">BIENVENUE SUR <span>ePhoneBook</span></h4>
                        <p class="text-center">Votre annuaire téléphonique électronique</p>
                    </div>
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                 <div class="card-action">
                    <a href="ContactList.php" class="btn btn-primary" style="width: 100%; border-radius: 9px;"><span>+ Ajouter nouveau contact</span></a>

                 </div>
                
            </div>
        </div>
    </div>
</div>

</body>
</html>
