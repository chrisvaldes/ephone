<?php
include '../controleur/contactControler.php';
session_start();

$userEmail = $_SESSION["userEmail"];

if (!isset($userEmail)) {

    header('location:login.php');
}
echo $_SESSION['userEmail'];

$contactController = new contactController();
$contactController->insertContact();


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ePhoneBook - Ajouter un nouveau contact</title>
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

        .btn-secondary:hover, .btn-secondary:focus {
            background-color: #495057;
            border-color: #495057;
        }

        .btn-primary {
            background-color: #9a087b;
            border-color: #9a087b;
            transition: background-color 0.3s, border-color 0.3s;
        }

        .btn-primary:hover, .btn-primary:focus {
            background-color: #c23da5;
            border-color: #c23da5;
        }

        /* Additional styles for the ePhoneBook section */
        .phonebook-section {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
        }

        .phonebook-section h3 {
            color: #9a087b;
        }

        .phonebook-section p {
            color: #000000;
            font-size: larger;
        }

        /* Style for the add new contact form */
        form{
            margin-top: 20px;
            text-align: center;
        }

        /* Style for the circular image and the hidden input */
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
    </style>
</head>
<body class="bg-light">

<div class="container mt-5">

    <!-- New Section for ePhoneBook -->
    <div class="row justify-content-center mt-5">
        <div class="col-md-10">
            <div class="card p-4 shadow-sm rounded-lg phonebook-section">
                <h4 class="text-center mb-4" style="font-weight: bold; letter-spacing: 2px;">NOUVEAU CONTACT</h4>

                <!-- Add New Contact Form -->
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <!-- Circular image and hidden input for file selection -->
                    <div class="circular-image-wrapper">
                        <img src="#" alt="Profile Image" class="circular-image d-block mx-auto" id="imagePreview">
                        <input type="file" name="image" accept="image/*" class="hidden-input" id="imageInput" />
                    </div>

                    <div class="form-group mb-3">
                        <input type="text" class="form-control" id="nom" placeholder="Nom" name='contactName' required>
                    </div>

                    <div class="form-group mb-3">
                       
                        <input type="number" class="form-control" id="numero" placeholder="Numéro de téléphone" name='contactNumber' required>
                    </div>

                    <!-- Buttons for Cancel and Save -->
                    <div class="row card-action">
                        <div class="col-md-6 col-sm-6 col-xm-6" style="margin-top: 1rem;">
                            <a href="ContactList.php"  class="btn btn-secondary btn-block">Retour</a>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xm-6" style="margin-top: 1rem;">
                            <button class="btn btn-primary btn-block" name='Save_contact'>Enregistrer</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<script>
    // JavaScript code to preview the selected circular image
    document.getElementById('imageInput').addEventListener('input', function (event) {
        var imagePreview = document.getElementById('imagePreview');
        var file = event.target.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function (e) {
                imagePreview.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });

    // Trigger file input click when clicking on the circular image
    document.querySelector('.circular-image-wrapper').addEventListener('click', function () {
        document.getElementById('imageInput').click();
    });
</script>

</body>
</html>