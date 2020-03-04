<?php

namespace Classes;

use \Classes\Models\Queries;
use \Classes\Controllers\Finduser;

include_once("includes/admin_init.php");

function searchUser( $data ) {

    $dt = [];
    $call = new Queries;
    $callUs = new Finduser;

    switch ($data['action']) {
        case 'getuser':
                $arr = [];
                $arr['user'] = $call->find_user_by_id( $data['uid'] );
            break;

        case 'delete':

            $dt['action'] = $data['action_two'];
            $dt['email'] = $data['email'];

            $call->delete_user( $data['uid'] );

            if( $data['action_two'] == "findemail") {
                $arr = $callUs->searchFor( $dt );
            } else {
                $arr = $callUs->searchFor( $dt );
            }

            break; 
    }
    
    
    return $arr ;


}


$data = json_decode(file_get_contents("php://input"),true);

$msg = searchUser($data);
echo json_encode($msg);