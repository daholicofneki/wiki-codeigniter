<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends Gas {
    
    public $table = 'user';
    
    public function _init ()
    {
        $this->_unique_fields = array('email', 'username');
    }
}