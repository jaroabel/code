<?php

namespace Classes\Controllers;


class Finduser extends \Classes\Models\Queries {

    public function searchFor( $data ) {

        $arr = [];
        
        switch ($data['action']) {
            case 'findemail':
                $arr['users'] = $this->find_user( $data['email'] );
                break;          
            case 'findall':
                $arr['users']  = $this->get_all_user();
                break;
        }
        
        return $arr ;
    }
}