<?php

include_once("includes/admin_init.php");


switch ($_POST['action']) {

    case 'newaccount':
            createuser( $_POST );
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