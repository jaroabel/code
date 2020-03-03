<?php

namespace Classes;

use \Classes\Controllers\Finduser;


include_once("includes/admin_init.php");

function searchUser( $data ) {

    $call = new Finduser;
    $res = $call->searchFor( $data );
    
    return $res ;


}


$data = json_decode(file_get_contents("php://input"),true);

$msg = searchUser($data);
echo json_encode($msg);