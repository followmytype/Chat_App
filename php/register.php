<?php
    include_once "DBLink.php";
    include_once "FormValidate.php";

    use Matt\DBLink as DB;
    use Matt\FormValidate as FormValidate;

    $formValidate = new FormValidate($_POST, 'register');
    $datas = $formValidate->validate();

    if ($datas['errors']) {
        echo json_encode($datas);
    } else {
        echo json_encode($datas);
    }