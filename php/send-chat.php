<?php
    session_start();
    include_once "classes/DBLink.php";
    include_once "classes/Message.php";
    include_once "classes/FormValidate.php";

    use Matt\DBLink as DB;
    use Matt\Message as Message;
    use Matt\FormValidate as FormValidate;

    if (isset($_SESSION['user_id'])) {
        $formValidate = new FormValidate($_POST, 'send');
        $datas = $formValidate->validate();
        if ($datas['errors']) {
            echo json_encode($datas);
        } else {
            $database = new DB();
            $conn = $database->connect();
            $messageOb = new Message($conn);
            $result = $messageOb->create($datas['inputs']);
            echo json_encode($result);
        }
    } else {
        header('../login.php');
    }