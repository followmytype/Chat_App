<?php
    session_start();
    include_once "classes/DBLink.php";
    include_once "classes/Users.php";

    use Matt\DBLink as DB;
    use Matt\Users as Users;

    if (isset($_SESSION['user_id']) && $_GET['user_id'] == $_SESSION['user_id']) {
        $database = new DB();
        $conn = $database->connect();
        $user = new Users($conn);
        $result = $user->loginout($_SESSION['user_id'], false);
        if ($result) {
            session_unset();
            session_destroy();
            header("location: ../login.php");
        }
    } else {
        header("location: ../login.php");
    }