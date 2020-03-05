<?php

namespace Classes\Controllers;


class Newuser extends \Classes\Models\Vuequeries {


    public function create_new_user( $data ) {

       $new_id = $this->add_user( $data );
       return $new_id;

       //die();
    }
}