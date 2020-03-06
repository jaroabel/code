<?php

namespace Classes\Controllers;


class Userlogin extends \Classes\Models\Queries {

    public $message = [];
    
    public function user_login( $data ) {

        $result = $this->validate_user( $data['email'] );



        if( $result !== 0 ) {
            if (password_verify($data['password'], $result['password'])) {
                
                $sess = new \Classes\Config\Auth;
                $sess->setSession( $result['id'], $result['fname'], $result['rank']);

                $this->message['err'] = 0;
                $this->message['url'] = "admin/index.php";

            } else {

                $this->message['err'] = 1;
                $this->message['url'] = "index.php";
            }            
        } else {
            $this->message['err'] = 1;
            $this->message['msg'] = "You are NOT allowed in";
            $this->message['url'] = "index.php";            
        }

        return $this->message;
    }
}
