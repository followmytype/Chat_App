<?php
    session_start();
    include_once "classes/DBLink.php";
    include_once "classes/FormValidate.php";
    include_once "classes/Users.php";

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
        $userOb = new Users($conn);
        $user = $userOb->getUser($inputs['email']);
        if ($user && password_verify($inputs['password'], $user['password'])) {
            $_SESSION['user_id'] = $user['user_id'];
            $userOb->loginout($user['user_id'], true);
            echo json_encode(['errors' => []]);
        } else {
            echo json_encode(['errors' => ['信箱或密碼錯誤']]);
        }
    }