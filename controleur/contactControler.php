<?php

include '../model/contactModel.php';

class contactController{  

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
            echo $_POST['idContact'];
            $data = array(
                ':idContact' => trim($_POST['idContact']),
                ':contactNumber' => trim($_POST['contactNumber']),
                ':nameContact' => trim($_POST['nameContact']),
            );
            $contactModel = new contactModel($db);
            $contactModel->updateContactDB($data);
        }
    }

    public function deleteContact(){
        $db = new PDO('mysql:host=localhost; dbname=ephonebook', 'root', '');
        
        if(isset($_POST['deleteContact'])){ 
            echo $_POST['idContact'];
            $data = array(
                ':idContact' => trim($_POST['idContact']),
                 
            );
            $contactModel = new contactModel($db);
            $contactModel->deleteModelDB($data);
        }
    }
    public function shareContact(){
        $db = new PDO('mysql:host=localhost; dbname=ephonebook', 'root', '');
        
        if(isset($_POST['shareNumber'])){ 
            $data = array(
                ':contactNumber' => trim($_POST['contactNumber']),
                ':nameContact' => trim($_POST['nameContact']),
                ':userEmail' => trim($_POST['userEmail']),
            );
            $contactModel = new contactModel($db);
            $contactModel->shareModelDB($data);
        }
    }

}

?>