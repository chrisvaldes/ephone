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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
    

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
        form {
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
        @media (max-width : 700px) {
            .card .card-image {
                display: none;
            }
        }
    </style>
</head>

<body class="bg-light">

    <div class="container "style="min-height: 100vh; align-items: center; justify-content: center; display: flex;">

        <!-- New Section for ePhoneBook -->
        <div class="row ">
            <div class="col m10 offset-m1 s12">
                <div class="card horizontal">
                    <div class="card-image ">
                        <img src="../images/addContactImage.png" alt="Picture" style="border-radius: 10px; height:100%" />
                    </div>

                    <div class="card-content">
                        <div class="card-stacked">
                            <!-- Add New Contact Form -->
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

                                <h4 class="text-center mb-4" style="font-weight: bold; letter-spacing: 2px;">NOUVEAU CONTACT</h4>

                                <!-- Circular image and hidden input for file selection -->
                                <div class="circular-image-wrapper">
                                    <img src="#" alt="Profile Image" class="circular-image d-block mx-auto" id="imagePreview">
                                    <input type="file" name="image" accept="image/*" class="hidden-input" id="imageInput" />
                                </div>

                                <div class="form-group ">
                                    <input type="text" class="form-control" id="nom" placeholder="Nom" name='contactName' required>
                                </div>

                                <div class="form-group  ">

                                    <input type="number" class="form-control" id="numero" placeholder="Numéro de téléphone" name='contactNumber' required>
                                </div>

                                <!-- Buttons for Cancel and Save -->
                                <div class=" card-action" style="display:flex; align-items: center; justify-content : space-between">
                                    <div  style="margin-right: 1rem;">
                                        <a href="ContactList.php" class="btn btn-secondary btn-block">Retour</a>
                                    </div>
                                    <div   style="margin-left: 1rem;">
                                        <button class="btn btn-primary btn-block" name='Save_contact'>Ajouter</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <script>
        // JavaScript code to preview the selected circular image
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

        // Trigger file input click when clicking on the circular image
        document.querySelector('.circular-image-wrapper').addEventListener('click', function() {
            document.getElementById('imageInput').click();
        });
    </script>

</body>

</html>