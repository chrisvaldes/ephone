<?php

// include '../controleur/messageControler.php';

session_start();

$userEmail = $_SESSION["userEmail"];


if (!isset($userEmail)) {

    header('location:login.php');
}
echo $_SESSION['userEmail'];

// $messageControler = new messageControler();
// $allMessge = $messageControler->getUserMessages();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col m10 offset-m1 s12">
                <div class="card">
                <a href="ContactList.php" class="fa fa-chevron-left" style="cursor: pointer; color: black; margin : 2rem"></a>
                    <div class='card-content'>

                        <h4 class=" card-title center " style="font-weight: bold; margin-bottom: 2rem; ">Message Reçu </h4>


                        <div class="card-stacked">
                            <?php
                            $db = new PDO("mysql:host=localhost; dbname=ephonebook", "root", "");
                            $stmt = $db->prepare('SELECT userMessage, userNameMessage FROM message WHERE  userEmailMessage = :userEmailCurrentUser');
                            $stmt->bindParam(':userEmailCurrentUser', $_SESSION['userEmail']);
                            $stmt->execute();
                            while ($userMessage = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                                <ul>
                                    <li><?php echo $userMessage['userNameMessage'] . " : " . $userMessage['userMessage'] ?> </li>
                                </ul>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>