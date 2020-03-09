<?php

include_once("includes/admin_init.php");


switch ($_POST['action']) {

    case 'newaccount':
            createuser( $_POST );
        break;
    case 'userlogout':
            logout_user( $_POST );
        break;
    
    default:
        # code...
        break;
}

function createuser( $data ) {

    $res = new \Classes\Controllers\Newuser;
    
    $result = $res->create_new_user( $data );

    echo $result;
    die();
    $redir = new \Classes\Config\Redirect;
    $redir::redirect( $result['url'] );
    exit;

}

function logout_user() {

    unset($_SESSION['uid']);
    unset($_SESSION['fname']);
    unset($_SESSION['rank']);
    session_destroy();

    $url = "../index.php";
    $redir = new \Classes\Config\Redirect;
    $redir::redirect( $url );
    exit;
}