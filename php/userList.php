<?php
    session_start();

    include_once "classes/DBLink.php";
    include_once "classes/Users.php";

    use Matt\DBLink as DB;
    use Matt\Users as Users;

    $database = new DB();
    $conn = $database->connect();
    $userOb = new Users($conn);

    $users = $userOb->getAll();

    include_once "dealUserList.php";