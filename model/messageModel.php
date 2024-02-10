<?php

class messageModel
{
    private $pdo;
    function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function sendMessageModel($data)
    {
        // echo $data[':userEmail'];
        $stmt = $this->pdo->prepare("SELECT userEmail FROM userapp WHERE userEmail = :userEmailMessage");
        $stmt->bindParam(":userEmailMessage", $data[':userEmailMessage']);
        $stmt->execute();
        $select_result = $stmt->fetch(); 
        if ($select_result) {

            $stmt = $this->pdo->prepare('INSERT INTO message value (null, :userEmail, :userMessage, :userEmailMessage, :userNameMessage)');
            $resultMessage = $stmt->execute($data);
            if ($resultMessage) {
                echo 'added';
                header("location:ContactList.php");
                exit();
            } else {
                echo 'not added yet';
            }
        }
    }

    public function getMessageModel($data)
    {
        $stmt = $this->pdo->prepare('SELECT distinct userMessage FROM message  WHERE userEmail = :userEmail');
        $stmt->execute($data);
        $resultMessage = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($resultMessage) {
            return $resultMessage;
        } else {
            echo 'not message yet';
        }
    }
}
