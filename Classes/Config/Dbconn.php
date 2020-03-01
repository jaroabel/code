<?php

namespace Classes\Config;

class Dbconn {


    private $host = 'mysql';
    private $user = 'jmabel';
    private $pass = 'jmabel';
    private $dbname = 'jaro_db';
 
    public function connection( $db_name = ""){

        if( $db_name == "") {
            $db_name = $this->dbname;
        }

        $mysqli = new \mysqli( $this->host, $this->user, $this->pass, $db_name);

        // Check connection
        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
            exit();
        }

        return $mysqli;
    }

}
