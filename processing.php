<?php

include_once("include/init.php");


switch ($_POST['action']) {
    case 'userlogin':
            userlogin( $_POST );
        break;
    
    default:
        # code...
        break;
}

function userlogin( $data ) {

    $res = new \Classes\Controllers\Userlogin;
    
    $result = $res->user_login( $data );

    $redir = new \Classes\Config\Redirect;
    $redir::redirect( $result['url'] );
    exit;

}