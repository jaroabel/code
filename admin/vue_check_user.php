<?php

namespace Classes;

use \Classes\Models\Queries;
use \Classes\Controllers\Newuser;

include_once("includes/admin_init.php");

function checkuname( $data ) {

    $qry = new Queries;
    $res = $qry->find_user( $data['email'] );

    $message = '';

    if( $res > 0){

        $message =  " - This email address already exist!";
        return $message;

    } else {

        $qry_add = new Newuser;
        $addID = $qry_add->create_new_user( $data );
        
        $message =  " - New user was added with ID: " . $addID . "!";
        return $message;

    } 
}

$data = json_decode(file_get_contents("php://input"),true);

$msg = checkuname($data);
echo $msg;