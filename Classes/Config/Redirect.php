<?php

namespace Classes\Config;


class Redirect {

    static function redirect( $url, $data = '' ){

        header('Location:' . $url );
    }
}