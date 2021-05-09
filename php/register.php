<?php
    session_start();
    include_once "DBLink.php";
    include_once "FormValidate.php";
    include_once "Users.php";

    use Matt\DBLink as DB;
    use Matt\FormValidate as FormValidate;
    use Matt\Users as Users;

    $formValidate = new FormValidate($_POST, 'register');
    $datas = $formValidate->validate();

    if ($datas['errors']) {
        echo json_encode($datas);
    } else {
        $database = new DB();
        $conn = $database->connect();
        $user = new Users($conn);
        $result = $user->create($datas['inputs']);
        $_SESSION['user_id'] = $result['data']['user_id'];
        echo json_encode($result);
    }