<?php

class messageModel{
    private $pdo;
    function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function sendMessageModel($data){
        $stmt = $this->pdo->prepare('INSERT INTO message value (null, :userEmail, :userMessage)');
        $resultMessage = $stmt->execute($data);
        if($resultMessage){
            echo 'added';
            header("location:ContactList.php");
            exit();
        }else{
            echo 'not added yet';
        }
    }

}