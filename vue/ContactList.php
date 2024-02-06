<?php

include '../composant/contactComponent.php';

$userEmail = $_SESSION["userEmail"];

if (!isset($userEmail)) {
    header('location:login.php');
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts List</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">

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
                            <a style="cursor:pointer; margin-left: 1rem;"><i class="fa fa-plus"></i></a>
                            <a style="cursor:pointer; margin-left: 1rem;"><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="card-content" style="max-height: 85vh; overflow-y: auto;">

                        <ul class="collapsible">
                            <?php
                            $composant = new Composant();
                            $i = 0;
                            while ($i < 8) {
                                $composant->contactComponent("userPhoto", "userName$i", "userContact");
                                $i += 1;
                            }

                            ?>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>


</body>

</html>