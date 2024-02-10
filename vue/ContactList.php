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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts List</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.collapsible');
            var instances = M.Collapsible.init(elems);
        });
    </script>

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col m10 offset-m1 s12">

                <div class="card">
                    <div class="card-title" style="display: flex; align-items: center; justify-content: space-between; padding: 0 2rem;">
                        <h4>Contacts</h4>
                        <div class="card-icon">
                            <a href="addcontact.php" style="cursor:pointer; margin-left: 1rem;"><i class="fa fa-plus"></i></a>
                            <a style="cursor:pointer; margin-left: 1rem;"><i class="fa fa-search"></i></a>
                            <a href="getMessages.php" class="btn btn-primary position-relative">
                                Inbox
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    <?php
                                    // get username contact
                                    $db = new PDO("mysql:host=localhost; dbname=ephonebook", "root", "");
                                    $stmt = $db->prepare('SELECT nameContact FROM contact  WHERE userEmail = :userEmail');
                                    $stmt->bindParam(':userEmail', $_SESSION['userEmail']);
                                    $stmt->execute(); 
                                    $result_nameContact = $stmt->fetch();
                                    // echo $result_nameContact['nameContact']; 


                                    // get all messages
                                    $db = new PDO("mysql:host=localhost; dbname=ephonebook", "root", "");
                                    $stmt = $db->prepare('SELECT * FROM message  WHERE userEmailMessage = :userEmailMessage');
                                    $stmt->bindParam(':userEmailMessage', $_SESSION['userEmail']); 
                                    $stmt->execute();
                                    $totalMessage = $stmt->rowCount();
                                    echo $totalMessage;
                                    ?>

                                    <span class="visually-hidden">unread messages</span>
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="card-content" style="max-height: 85vh; overflow-y: auto;">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <ul class="collapsible">
                                <?php
                                $composant = new Composant();

                                $db = new PDO("mysql:host=localhost; dbname=ephonebook", "root", "");
                                $stmt = $db->prepare('SELECT distinct contact.idContact, contact.nameContact, contact.contactNumber, contact.userEmail FROM userapp, contact WHERE contact.userEmail = :userEmail ');
                                $stmt->bindParam(':userEmail', $_SESSION["userEmail"]);
                                $stmt->execute();
                                while ($userResult = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    $composant->contactComponent($userResult['nameContact'], $userResult['contactNumber'], $userResult['idContact']);
                                }

                                ?>
                            </ul>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>



</body>

</html>