<?php

namespace Classes\Controllers;


class Finduser extends \Classes\Models\Queries {

    public function searchFor( $data ) {

        $arr = [];

        $arr['users']  = $this->get_all_user();
        /*
        if( isset( $data['email'] ) ) {

            $arr['users'] = $this->find_user( $data['email'] );

        } elseif ( isset( $data['findall'] ) ){

            $arr['users']  = $this->get_all_user();

        }
        */
        return $arr ;
    }
}