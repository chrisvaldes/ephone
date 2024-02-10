<?php



class UserModel
{
    private $pdo;
    function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function createUserModel($data)
    {
        $stmt = $this->pdo->prepare("INSERT INTO USERAPP VALUES (:userEmail, :userName,
         :userPrefer, :userAnswer, :userPhoto, :userPassword)");
        $resultCreateUser = $stmt->execute($data);
        if ($resultCreateUser) { 
            header('location:login.php');
        } else {
            // $_SESSION["message_success_SignUp"] = "Quelque chose c'est mal passé";
            header('location:SignUp.php');
        }
    }

    public function getUserConnexion($data)
    {
        $stmt = $this->pdo->prepare("SELECT userEmail FROM userapp WHERE userEmail = :userEmail");
        $stmt->execute($data);
        // Récupération des données retournées
        $result = $stmt->fetch();
        // Récupération du nombre d'enregistrements retournés
        $userCount = $stmt->rowCount();
        echo $result['userEmail'];
        if ($userCount > 0) {
            // Stockage de notre utilisateur dans une variable de session
            $_SESSION["userEmail"] = $result["userEmail"];
            header('Location: welcome.php');
            exit(); // Exit pour arrêter l'exécution du script après la redirection
        } else {
            $_SESSION["error_message"] = "Email ou mot de passe incorrect";
            header('Location: login.php');
            exit(); // Exit pour arrêter l'exécution du script après la redirection
        }
    }

    public function getAllUserModel()
    {
        $stmt = $this->pdo->prepare('SELECT userName, usePhone FROM userapp, contact WHERE userEmail = ' . $_SESSION["userEmail"] . ' ');
        $stmt->execute();
        $userResult = $stmt->fetch();
        return $userResult;
    }
}
