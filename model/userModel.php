<?php

class UserModel{
    private $pdo;
    function __construct($pdo){
        $this->pdo = $pdo;
    }
   
    public function createUserModel($data){
        $stmt = $this->pdo->prepare("INSERT INTO USERAPP VALUES (:userEmail, :userName,
         :userPrefer, :userAnswer, :userPhoto, :userPassword)");
        $result = $stmt -> execute($data);
        if($result){
            $message[] = "Ajouter avec Success";
        } else{
            $message[] = "Quelque chose c'est mal passé";
        }
    }

    public function getUserConnexion($data){
        $stmt = $this->pdo->prepare("SELECT userEmail FROM userapp where userEmail = :userEmail");
        $stmt->execute($data);
        // recupération des données retourner
        $result = $stmt->fetch();
        // recupération du nombre d'enregistrement retouner
        $userCount = $stmt->rowCount();
        if($userCount>0){
            // stockage de notre utilisateur dans une variable de session
            $_SESSION["userApp"] = $result["userEmail"]; 
            // echo "userEmail : ". $result["userEmail"]. " et ". $_SESSION['userApp'] ." ";
            header('location:welcome.php');
        }else{ 
            $_SESSION["error_message"] = "Email ou mot de passe incorrect";
            header('location:login.php');
        }
    }
}

?>