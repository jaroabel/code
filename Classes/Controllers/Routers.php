<?php

namespace Classes\Controllers;

use Classes\Controllers\Userlogin;

class Routers {

    public function action_requested( $data ){

        switch ( $data['action'] ) {

            case 'userlogin':
                
                $res = $this->userlogin( $data );
    
                break;
            
            default:
                # code...
                break;
        }
    
        return $res;
    }

    public function userlogin( $data ) {

        $u = new Userlogin;
        $res = $u->user_login( $data );
        return $res;

    }
}

$route = new Routers;
$result = $route->action_requested( $_POST );


print_r($result);
die();
header('Location: http://www.example.com/');
exit;
