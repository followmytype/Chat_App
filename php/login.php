<?php
    session_start();
    include_once "DBLink.php";
    include_once "FormValidate.php";
    include_once "Users.php";

    use Matt\DBLink as DB;
    use Matt\FormValidate as FormValidate;
    use Matt\Users as Users;

    $formValidate = new FormValidate($_POST, 'login');
    $datas = $formValidate->validate();

    if ($datas['errors']) {
        echo json_encode($datas);
    } else {
        $inputs = $datas['inputs'];
        $database = new DB();
        $conn = $database->connect();
        $user = new Users($conn);
        $user = $user->getUser($inputs['email']);
        if ($user && password_verify($inputs['password'], $user['password'])) {
            $_SESSION['user_id'] = $user['user_id'];
            echo json_encode(['errors' => []]);
        } else {
            echo json_encode(['errors' => ['Email & password error.']]);
        }
    }