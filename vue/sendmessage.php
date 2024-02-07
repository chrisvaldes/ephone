<?php

session_start();

$userEmail = $_SESSION["userEmail"];

if (!isset($userEmail)) {

    header('location:login.php');
}

echo $_SESSION['userEmail'];

$message = $_GET['message'];

$db = new PDO("mysql:host=localhost; dbname=ephonebook", "root", "");
$stmt = $db->prepare('SELECT nameContact FROM contact WHERE contactNumber = :userNumber ');
$stmt->bindParam(':userNumber', $message);
$stmt->execute();
$contactResult = $stmt->fetch();
// echo $contactResult["number"] . " " . $contactResult["nameContact"];

include '../controleur/messageControler.php';

$messageControler = new messageControler();
$messageControler->messageToSend();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ePhoneBook - Envoyer un message</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

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

        .btn-primary {
            background-color: #9a087b;
            border-color: #9a087b;
            transition: background-color 0.3s, border-color 0.3s;
        }

        .btn-primary:hover, .btn-primary:focus {
            background-color: #c23da5;
            border-color: #c23da5;
            color: #fff;
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

        /* Style for the send message form */
        .send-message-form {
            margin-top: 20px;
        }
    </style>
</head>
<body class="bg-light">

<div class="container mt-5">

    <!-- New Section for ePhoneBook -->
    <div class="row justify-content-center mt-5">
        <div class="col-md-10">
            <div class="card p-4 shadow-sm rounded-lg phonebook-section">
                
                <h4 class="text-center mb-4" style="font-weight: bold;">ENVOYER UN MESSAGE A <?php echo $contactResult["nameContact"]?> ?</h4>

                <!-- Send Message Form -->
                <form class="send-message-form"  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="form-group mb-3">
                        <textarea class="form-control" placeholder="Votre message ici..." rows="5" name ="userMessage" required></textarea>
                    </div>

                    <div class="row card-action">
                        <div class="col-md-6 col-sm-6 col-xm-6" style="margin-top: 1rem;">
                            <a href="ContactList.php"  class="btn btn-secondary btn-block">Annuler</a>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xm-6" style="margin-top: 1rem;">
                            <button name="SendMessage" class="btn btn-primary btn-block">Envoyer</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

</body>
</html>
