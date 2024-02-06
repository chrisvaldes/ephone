<?php
include '../controleur/userControler.php';
$userControler = new UserControler();

$userControler->createUserController();
 
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
    <style>

    </style>
</head>

<body class="bg-light">
    <div class="container" style="min-height: 100vh; align-items: center; justify-content: center; display: flex;">
        <div class="row">
            <div class="col m10 offset-m1 s12 ">
                <div class="card " style="border-radius: 10px;">
                    <div class="card-content">
                        <div class="row" style="display: flex; align-items: center; justify-content : space-around">
                            <div class="col">
                                <a href="login.php" class="fa fa-chevron-left" style="margin : 1.5rem 0 0 2rem; cursor: pointer; color: black;"></a>
                            </div>
                            <div class="card-title col md10 center">
                                <h4 class="text-center " style="font-weight: bold; margin-right: 2rem;">INSCRIPTION SUR ePhoneBook </h4>
                            </div>
                        </div>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" id="userName" class="form-control" name="userName" placeholder="Votre nom Ex : Charles Lobé" />
                            </div>
                            <div class="form-group">
                                <input type="email" id="userEmail" name="userEmail" class="form-control" placeholder="Votre email ex : JPaul@gmail.com" />
                            </div>
                            <div class="form-group">
                                <select class="browser-default" name="userPrefer">
                                    <option value="1" selected>Choisir une question...</option>
                                    <option value="2">Votre série préféré?</option>
                                    <option value="3">Votre dessin Préféré?</option>
                                    <option value="4">Votre surnom d'enfance</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" name="userAnswer" id="response" class="form-control" placeholder="Exple Reponse : Naruto" required />
                            </div>
                            <div class="form-group">
                                <input type="file" id="picture" class="form-control" name="userPhoto" style="border: 1px solid black; width: 100%; border-radius: 5px; padding: .6rem;" required />
                            </div>
                            <div class="form-group">
                                <input type="password" id="newPassword" class="form-control" name="userPassword" placeholder="Mot de passe" required>
                            </div>
                            <div class="form-group">
                                <input type="password" id="ConfPassword" class="form-control" name="userConfPassword" placeholder="Confirmer mot de passe" required>
                            </div>
                            <div class="card-action">
                                <input type="submit" name="submit" value="Creer le compte" class="btn btn-primary" style="width: 100%; margin-top: 1rem; margin-bottom: 2rem;" />
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>