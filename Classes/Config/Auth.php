<?php

namespace Classes\Config;

class Auth {

    public $sess_uid;
    public $sess_fname;
    public $sess_rank;
    public $sess_out;


    /**
     * Set the value of sess_uid
     *
     * @return  self
     */ 
    public function setSess_uid( $sess_uid )
    {
        $this->sess_uid = $sess_uid;
        return $this;
    }

    /**
     * Set the value of sess_fname
     *
     * @return  self
     */ 
    public function setSess_fname( $sess_fname)
    {
        $this->sess_fname = $sess_fname;

        return $this;
    }

    /**
     * Set the value of sess_rank
     *
     * @return  self
     */ 
    public function setSess_rank( $sess_rank )
    {
        $this->sess_rank = $sess_rank;

        return $this;
    }

    /**
     * Set the value of sess_out
     *
     * @return  self
     */ 
    public function setSess_out($sess_out)
    {
        $this->sess_out = $sess_out;

        return $this;
    }

    /**
     * Get the value of sess_uid
     */ 
    public function getSess_uid()
    {
        return $this->sess_uid;
    }

    /**
     * Get the value of sess_fname
     */ 
    public function getSess_fname()
    {
        return $this->sess_fname;
    }

    /**
     * Get the value of sess_rank
     */ 
    public function getSess_rank()
    {
        return $this->sess_rank;
    }

}