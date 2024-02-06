<?php

include "../model/userModel.php";

class UserControler
{
    private $userModel;

    private $userName;
    private $userEmail;
    private $userPrefer;
    private $userAnswer;
    private $userPhoto;
    private $userPassword;
    private $userPhoto_folder;
    private $userPhoto_temp;

    public function getUserName()
    {
        return $this->userName;
    }
    public function getUserEmail()
    {
        return $this->userEmail;
    }
    public function getUserPrefer()
    {
        return $this->userPrefer;
    }
    public function getUserAnswer()
    {
        return $this->userAnswer;
    }
    public function getUserPhoto()
    {
        return $this->userPhoto;
    }
    public function getUserPassword()
    {
        return $this->userPassword;
    }

    // function __construct($userModel){
    //     $this->userModel = $userModel;
    // }

    public function createUserController()
    {

        if (isset($_POST["submit"])) {

            $this->userPhoto =  $_FILES['userPhoto']["name"];
            $this->userPhoto_temp = $_FILES['userPhoto']["tmp_name"];
            $this->userPhoto_folder = $this->userPhoto;

            move_uploaded_file($this->userPhoto_temp, $this->userPhoto_folder);
            $data = array(
                ":userEmail" => trim($_POST['userName']),
                ":userName" => trim($_POST["userEmail"]),
                ":userPrefer" => trim($_POST["userPrefer"]),
                ":userAnswer" => trim($_POST["userAnswer"]),
                ":userPhoto" => $this->userPhoto_folder,
                ":userPassword" => trim($_POST["userPassword"]),
            );
            $db = new PDO('mysql:host=localhost; dbname=ephonebook', 'root', '');
            $userModel = new UserModel($db);
            $userModel->createUserModel($data);
        }
    }

    public function getUser()
    {

        if (isset($_POST["Connect"])) {
            $data = array(
                ":userEmail" => trim($_POST["userEmail"]),
            );
            $db = new PDO("mysql:host=localhost; dbname=ephonebook", "root", "");
            $userModel = new UserModel($db);
            $userCount = $userModel->getUserConnexion($data);
            // echo "userEmail : ". $userEmailResult[0] ." ";
            if ($userCount>0) {
                // stockage de notre utilisateur dans une variable de session
                $userEmail = $_SESSION['$userEmail'];
                echo "userEmail : ". $userEmail." ";
                // header('location:../vue/welcome.php');
            } else {
                echo "userEmail : indefined";
                $_SESSION["error_message"] = "Email ou mot de passe incorrect";
                header('location:login.php');
            }
        }
    }
}
