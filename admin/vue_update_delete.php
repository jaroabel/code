<?php

namespace Classes;

use \Classes\Models\Queries;

include_once("includes/admin_init.php");

function searchUser( $data ) {

    $arr = [];
    $call = new Queries;

    if( $data['action'] == "getuser") {
        $arr['user'] = $call->find_user_by_id( $data );
    }
    
    
    return $arr ;


}


$data = json_decode(file_get_contents("php://input"),true);

$msg = searchUser($data);
echo json_encode($msg);