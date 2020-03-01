<?php

namespace Classes\Controllers;


class Userlogin extends \Classes\Models\Queries {

    public $message = [];
    
    public function user_login( $data ) {

        $result = $this->validate_user( $data['email'] );

        if( $result['password'] == $data['password']){
            $this->message['err'] = 0;
            $this->message['msg'] = "You are allowed in";
            $this->message['data'] = $result;
            $this->message['url'] = "admin/index.php";
        } else {
            $this->message['err'] = 1;
            $this->message['msg'] = "You are NOT allowed in";
            $this->message['url'] = "index.php";
            
        }

        return $this->message;
    }
}
