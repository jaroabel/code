<?php

namespace Classes\Controllers;


class Userlogin extends \Classes\Models\Queries {

    public $message = [];
    
    public function user_login( $data ) {

        $result = $this->validate_user( $data['email'] );



        if( $result !== 0 ) {
            if (password_verify($data['password'], $result['password'])) {
                
                session_start();

                $_SESSION['uid'] = $result['id'];
                $_SESSION['fname'] = $result['fname'];
                $_SESSION['rank'] = $result['rank'];

                $sess = new \Classes\Config\Auth();
                $sess->setSess_uid( $_SESSION['uid'] ) ;
                $sess->setSess_fname( $_SESSION['fname'] );
                $sess->setSess_rank( $_SESSION['rank'] );

                //print_r($result);
                //die();
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
