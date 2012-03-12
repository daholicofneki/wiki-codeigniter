<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller{
    
    protected $module = 'login';
    
    public function index ()
    {
        if ($_POST)
        {
            $this->form_validation->set_rules('username','Username','trim|required');
            $this->form_validation->set_rules('password','Password','trim|required');
            
            if ($this->form_validation->run())
            {   
                if ($this->auth_m->login())
                {
                    setSucces('User finded');
                }
                else
                {
                    setError('User not found');
                }
            }
        }
        parent :: index ();
    }
}