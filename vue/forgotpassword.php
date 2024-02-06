<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"> -->
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
     <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->

    <style>

    </style>

</head>

<body class="bg-light">

    <div class="container" style="min-height: 100vh; align-items: center; justify-content: center; display: flex;">
        <div class="row">
            <div class="col m10 offset-m1 ">
                <div class="card " style="border-radius: 10px;">

                    <div class="card-content">
                        <div class="row" style="display: flex; align-items: center; justify-content : space-around">
                            <div class="col">
                                <a href="login.php" class="fa fa-chevron-left"
                                    style="margin : 1.5rem 0 0 2rem; cursor: pointer; color: black;"></a>
                            </div>
                            <div class="card-title col md10 center">
                                <h4 class="text-center " style="font-weight: bold; margin-right: 2rem;">MOT DE PASSE
                                    OUBLIÉ ?</h4>
                            </div>
                        </div>
                        <form action="#" method="post">
                            <div class="form-group">
                                <select class="browser-default">
                                    <option value="1" selected>Choisir une question...</option>
                                    <option value="2">Votre série préféré?</option>
                                    <option value="3">Votre dessin Préféré?</option>
                                    <option value="4">Votre surnom d'enfance</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="response"><span class="required-field"></span></label>
                                <input id="response" class="form-control" placeholder="Exple Reponse : Naruto"
                                    required />
                            </div>

                            <div class="form-group">
                                <label for="newPassword"><span class="required-field"></span></label>
                                <input type="password" id="newPassword" class="form-control"
                                    placeholder="Nouveau mot de passe" required>
                            </div>
                        </form>
                    </div>
                    <div class="card-action">
                        <button type="submit" class="btn btn-primary"
                            style="width: 100%; margin-top: 1rem; margin-bottom: 2rem;">Réinitialiser le mot de
                            passe</button>
                    </div>

                </div>
            </div>
        </div>
    </div>

</body>

</html>