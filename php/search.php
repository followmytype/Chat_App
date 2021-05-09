<?php
    session_start();
    
    include_once "DBLink.php";
    include_once "Users.php";

    use Matt\DBLink as DB;
    use Matt\Users as Users;

    $database = new DB();
    $conn = $database->connect();
    $userOb = new Users($conn);

    $users = $userOb->search(trim($_POST['search']));

    include_once "dealUserList.php";