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
        echo "Info PDO : ".$stmt->errorInfo()[2];
        echo $data[':contactNumber']. ' '. $data[':nameContact'];
        echo 'valeur de result '. $insertContact_result;
        if($insertContact_result){
            header('location:ContactList.php');
            exit();
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

    public function deleteModelDB($data){
        $stmt = $this->pdo->prepare("DELETE FROM contact WHERE idContact = :idContact");
        $deleteResult = $stmt->execute($data);
        if($deleteResult){
            echo 'supprimer';
            header('location:ContactList.php');
            exit();
        }else{
            echo 'echec de suppression';
        }
    }

    public function shareModelDB($data){

        // echo $data[':userEmail'];
        $stmt = $this->pdo->prepare("SELECT DISTINCT userEmail FROM contact WHERE userEmail = :userEmail");
        $stmt->bindParam( ":userEmail", $data[':userEmail']);
        $stmt->execute();
        $select_result = $stmt->fetch();
        // echo "resultat : ";
        // echo $select_result['userEmail'];
        if($select_result){
            $stmt = $this->pdo->prepare("INSERT INTO contact VALUE (null, :contactNumber, :nameContact, :userEmail)");
            $resultShare = $stmt->execute($data);
            if($resultShare){ 
                header('location:ContactList.php');
                exit();
            }else{
                $_SESSION['shareMessage'] = 'erreur de partage';
            }
        }else{
            $_SESSION['shareMessage'] = 'impossible de partager l\'utilisateur n\'existe pas!';
            header('location:ContactList.php');
        }


       
    }


       
}


?>