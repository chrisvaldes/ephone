<?php

include '../model/contactModel.php';

class contactController{
    private $number;
    private $userEmail;
    private $nameContact;
    private $photo;

    public function insertContact(){
        $db = new PDO('mysql:host=localhost; dbname=ephonebook', 'root', '');
        if(isset($_POST['Save_contact'])){
            $data = array(
                ':contactNumber' => trim($_POST['contactNumber']),
                ':userEmail' => trim($_SESSION['userEmail']),
                ':nameContact' => trim($_POST['contactName']),
            );
            $contactModel = new contactModel($db);
            $contactModel->insertContactDB($data);
        }
    }

    public function updateContact(){
        $db = new PDO('mysql:host=localhost; dbname=ephonebook', 'root', '');
        if(isset($_POST['updateContact'])){
            $data = array(
                ':contactNumber' => trim($_POST['contactNumber']),
                ':userEmail' => trim($_SESSION['userEmail']),
                ':nameContact' => trim($_POST['contactName']),
            );
            $contactModel = new contactModel($db);
            $contactModel->updateContactDB($data);
        }
    }


}

?>