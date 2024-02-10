<?php
include '../model/messageModel.php';
class messageControler
{
    private $userMessage;

    public function messageToSend()
    {
        if (isset($_POST['SendMessage'])) { 
            $data = array(
                ":userEmail" => trim($_SESSION['userEmail']),
                ":userMessage" => trim($_POST['userMessage']),
                ':userEmailMessage' => trim($_POST['userEmailMessage']),
                ':userNameMessage' => trim($_POST["userNameMessage"]),
            );

            $db = new PDO("mysql:host=localhost; dbname=ephonebook", "root", "");
            $messageModel = new messageModel($db);
            $messageModel->sendMessageModel($data);
        }
    }

    // get all user Message

    public function getUserMessages()
    {

        $data = array(
            ":userEmail" => trim($_SESSION['userEmail']),
        );

        $db = new PDO("mysql:host=localhost; dbname=ephonebook", "root", "");
        $messageModel = new messageModel($db);
        $resultMessages = $messageModel->getMessageModel($data);
        
        return $resultMessages;
    }
}
