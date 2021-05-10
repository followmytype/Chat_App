<?php
    session_start();
    include_once "classes/DBLink.php";
    include_once "classes/Message.php";

    use Matt\DBLink as DB;
    use Matt\Message as Message;

    if ($_SESSION['user_id'] == $_POST['sender_id']) {
        $database = new DB();
        $conn = $database->connect();
        $messageOb = new Message($conn);
    
        $messages = $messageOb->getTalk($_POST['sender_id'], $_POST['receiver_id']);

        foreach ($messages as $key => $message) {
            if ($message['sender_id'] == $_SESSION['user_id']) {
                echo "<div class='chat outgoing'>
                    <div class='details'>
                        <p>$message[msg]</p>
                    </div>
                </div>";
            } else {
                echo "<div class='chat incoming'>
                    <img src='$_POST[user_img]' alt=''>
                    <div class='details'>
                        <p>$message[msg]</p>
                    </div>
                </div>";
            }
        }
    } else {
        header('../login.php');
    }