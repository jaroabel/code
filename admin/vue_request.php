<?php

namespace Classes;

use \Classes\Models\Vuequeries;
use \Classes\Controllers\Newuser;


include_once("includes/admin_init.php");



function process_vue_request( $data ) {

    $call = new Vuequeries;
    $arr = [];

    switch ($data['action']) {

        case 'findemail':
            //$arr['users']['email'] = $data['email'];
            $arr['users'] = find_user_by_email( $data['email'], $call );
            break;

        case 'findall':
            $arr['users'] = find_all_users( $call );
            break;

        case 'getuser':
            $arr['users'] = find_user_by_id( $data['uid'], $call );
            break;

        case 'delete':
            $arr['users'] = delete_users( $data, $call );
            break;

        case 'newaccount':
            $arr['users'] = check_and_add_user( $data, $call );
            break;

        case 'update':
            $arr['users'] = update_user_info( $data, $call );
            break;

        default:
            # code...
            break;
    }
    
    return $arr;

}

// Find user by email
function find_user_by_email( $email, $call){

    $res = $call->select_user_by_email( $email );
    
    return $res ;
}

// Find user by ID
function find_user_by_id( $id, $call){

    $res = $call->select_user_by_id( $id );
    
    return $res ;
}

// Find all user in DB
function find_all_users( $call){

    $res = $call->select_all_users();
    
    return $res ;
}

// Delete user in DB
function delete_users( $data, $call){
    
    $res = $call->delete_user_by_id( $data['uid'] );
    
    switch ($data['action_two']) {
        case 'findemail':
            $res = find_user_by_email( $data['email'], $call);
            break;

        case 'findall':
            $res = find_all_users( $call);
            break;
    }
    
    return $res ;
}

/** Create new account if user doesn't user exist  */
function check_and_add_user( $data, $call ) {


    $res = $call->select_user_by_email( $data['email'] );

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

/** Update user profile  */
function update_user_info( $data, $call ) {

    $res = $call->select_user_by_email( $data['email'] );

    $message = [];

    if( $res > 0){

        $message['msg'] =  " - This email address already exist!";
        return $message;

    } else {

        //$qry_add = new Newuser;
        //$addID = $qry_add->create_new_user( $data );
        
        $message['msg'] =  " - User was updated!";
        return $message;

    } 
}



$data = json_decode(file_get_contents("php://input"),true);

$msg = process_vue_request($data);
echo json_encode($msg);