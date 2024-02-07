<?php

session_start();

$userEmail = $_SESSION["userEmail"];
$modify = $_GET['modifyContact']; 
if (!isset($userEmail)) {

    header('location:login.php');
}
echo $_SESSION['userEmail'];

include '../controleur/contactControler.php';
$contactController = new contactController();
$contactController->updateContact();




$db = new PDO("mysql:host=localhost; dbname=ephonebook", "root", "");
$stmt = $db->prepare('SELECT contactNumber, nameContact FROM contact WHERE contactNumber = :userNumber ');
$stmt->bindParam(':userNumber', $modify);
$stmt->execute();
$contactResult = $stmt->fetch();
// echo $contactResult["number"] . " " . $contactResult["nameContact"];

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ePhoneBook - Modifier un contact</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"> -->
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->

    <style>
        .form-control {
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .form-control:focus {
            border-color: #c23da5;
            box-shadow: none;
        }

        .form-control:hover {
            border-color: #c23da5;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            color: #fff;
        }

        .btn-secondary:hover,
        .btn-secondary:focus {
            background-color: #495057;
            border-color: #495057;
        }

        .btn-primary {
            background-color: #9a087b;
            border-color: #9a087b;
            transition: background-color 0.3s, border-color 0.3s;
        }

        .btn-primary:hover,
        .btn-primary:focus {
            background-color: #c23da5;
            border-color: #c23da5;
        }

        .form-group {
            width: 100%;
        }

        .phonebook-section {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
        }

        .phonebook-section h3 {
            color: #9a087b;
        }

        /* Additional styles for the Modify contact form */
        .modify-contact-form {
            margin-top: 20px;
            text-align: center;
        }

        /* Circular image and hidden input for file selection */
        .circular-image-wrapper {
            position: relative;
            display: inline-block;
            cursor: pointer;
        }

        .circular-image {
            border-radius: 50%;
            max-width: 100px;
            margin-top: 20px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .hidden-input {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }

        .container {
            min-height: 100vh;
        }
    </style>
</head>

<body class="bg-light">

    <div class="container mt-5">

        <!-- Nouvelle section pour Modifier un contact -->
        <div class="row justify-content-center mt-5">
            <div class="col-md-10">
                <div class="card p-4 shadow-sm rounded-lg phonebook-section">
                    <h4 class="text-center mb-10 " style="font-weight: bold; letter-spacing: 2px;">MODIFIER LE CONTACT</h4>

                    <!-- Formulaire de modification de contact -->
                    <form class="modify-contact-form"  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <!-- Circular image and hidden input for file selection -->
                        <div class="circular-image-wrapper">
                            <img src="#" alt="Profile Image" class="circular-image d-block mx-auto" id="imagePreview">
                            <input type="file" name="image" accept="image/*" class="hidden-input" id="imageInput" />
                        </div>

                        <div class="form-group mb-3 mt-4">
                            <input value="<?php echo $contactResult['nameContact']?>" type="text" class="form-control" name="nameContact" placeholder="Nom du contact" required>
                        </div>

                        <div class="form-group mb-3">
                            <input type="tel" value="<?php echo $contactResult['contactNumber']?>"  class="form-control" name="contactNumber" placeholder="Numéro de téléphone" required>
                        </div>

                        <!-- Ajoutez d'autres champs de formulaire au besoin -->

                        <!-- Boutons pour Annuler et Enregistrer -->

                        <div class="row card-action">
                            <div class="col-md-6 col-sm-6 col-xm-6" style="margin-top: 1rem;">
                                <a href="ContactList.php" class="btn btn-secondary btn-block">Annuler</a>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xm-6" style="margin-top: 1rem;">
                                <button name="updateContact" class="btn btn-primary btn-block">Modifier</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>
        // Code JavaScript pour prévisualiser l'image circulaire sélectionnée
        document.getElementById('imageInput').addEventListener('input', function(event) {
            var imagePreview = document.getElementById('imagePreview');
            var file = event.target.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });

        // Déclenche le clic sur le champ de fichier lorsqu'on clique sur l'image circulaire
        document.querySelector('.circular-image-wrapper').addEventListener('click', function() {
            document.getElementById('imageInput').click();
        });
    </script>

</body>

</html>