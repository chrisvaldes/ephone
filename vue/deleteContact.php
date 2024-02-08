<?php

    include "../controleur/contactControler.php";

    $deletContact = new contactController();
    $deletContact->deleteContact();

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">

    <title>Document</title>
    <style>
        .delete-product-form {
            min-height: 100vh;
            background-color: rgba(0, 0, 0, .7);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            overflow-y: scroll;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1200;
            width: 100%;
        }

        .delete-product-form form {
            width: 50rem;
            padding: 2rem;
            text-align: center;
            border-radius: .5rem;
            background-color: var(--white);
        }

        .delete-product-form form img {
            height: 25rem;
            margin-bottom: 1rem;
        }

        .delete-product-form form .box {
            margin: 1rem 0;
            padding: 1.2rem 1.4rem;
            border: var(--border);
            border-radius: .5rem;
            background-color: var(--light-bg);
            font-size: 1.8rem;
            color: var(--black);
            width: 100%;
        }
    </style> 
</head>

<body>
    <section class="delete-product-form">
        <?php

        if (isset($_GET['deleteContact'])) {

            $db = new PDO("mysql:host=localhost; dbname=ephonebook", "root", "");

            $stmt = $db->prepare('SELECT  * FROM contact WHERE idContact = :idContact ');
            $stmt->bindParam(':idContact', $_GET['deleteContact']);
            $stmt->execute();
            $nbrow = $stmt->rowCount();
            if ($nbrow > 0) {
                while ($fetch_delete = $stmt->fetch(PDO::FETCH_ASSOC)) {
        ?>
                    <form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <div class="row">
                            <div class="col m10 offset-m1 s12">
                                <div class="card" style="padding : 1rem 0; border-radius : 9px">
                                    <div class="card-body">
                                        <h1 class="card-title center" style="font-weight:bold; text-transform : uppercase">Supprimer <span style="font-size: 1.5rem; text-transform : capitalize"><?php echo $fetch_delete['nameContact']; ?> ?</span></h1>
                                        <div class="card-content">
                                            <input type="hidden" name="idContact" value="<?php echo $fetch_delete['idContact']; ?>">
                                            <h5 class="center">Téléphone : <?php echo $fetch_delete['contactNumber']; ?></h5>
                                        </div>
                                        <div class="card-action" style="display:flex; align-items : center; justify-content:space-around">
                                            <a href="ContactList.php">Annuler</a>
                                            <button type="submit" name="deleteProduct" class="btn">Supprimer</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>


        <?php }
            }
        }
        ?>

    </section>
</body>

</html>