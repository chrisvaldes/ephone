<?php
include '../model/messageModel.php';
class messageControler{
    private $userMessage;

    public function messageToSend(){
        if(isset($_POST['SendMessage'])){
            $data = array(
                ":userEmail" => trim($_SESSION['userEmail']),
                ":userMessage" => trim($_POST['userMessage']),
            );
    
            $db = new PDO("mysql:host=localhost; dbname=ephonebook", "root", "");
            $messageModel = new messageModel($db);
            $messageModel->sendMessageModel($data);
        }
    }
}

?>