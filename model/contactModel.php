<?php

class contactModel{
    private $pdo;
    function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function insertContactDB($data){
        $stmt = $this->pdo->prepare('INSERT INTO contact VALUES (:contactNumber, :userEmail, :nameContact)');
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
        $stmt = $this->pdo->prepare('UPDATE contact SET contactNumber  = :contactNumber, nameContact = :nameContact WHERE userEmail = :userEmail');
        $result_updateContact = $stmt->execute($data);
        if($result_updateContact){
            echo "update";
        }else{
            echo 'unUpdate';
        }
    }
}


?>