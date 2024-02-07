<?php

class contactModel{
    private $pdo;
    function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function insertContactDB($data){
        $stmt = $this->pdo->prepare('INSERT INTO contact VALUES (null, :contactNumber, :nameContact, :userEmail)');
        $insertContact_result = $stmt->execute($data);
        echo "Erreur PDO : ".$stmt->errorInfo()[2];
        echo $data[':contactNumber']. ' '. $data[':nameContact'];
        echo 'valeur de result '. $insertContact_result;
        if($insertContact_result){
            echo 'Ajouter avec success';
        }else{
            echo 'Une erreur c\'est produite';
        }
    }

    public function updateContactDB($data){
        $stmt = $this->pdo->prepare('UPDATE contact SET contactNumber  = :contactNumber, nameContact = :nameContact WHERE idContact = :idContact');
        $result_updateContact = $stmt->execute($data);
        echo $data[':contactNumber']. " ". $data[":nameContact"]. " ". $data[":idContact"];
        // echo 'Erreur : '. $stmt->errorInfo()[2];q
        if($result_updateContact){
            echo "update";
            header('location:ContactList.php');
            exit();
        }else{

            echo 'unUpdate';
        }
    }
}


?>