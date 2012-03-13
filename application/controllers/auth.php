<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends MY_Controller{
    
    protected $module = 'login';
    
    public function index ()
    {
        $this->load->helper('form');
        
        if ($_POST)
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('username','Username','trim|required');
            $this->form_validation->set_rules('password','Password','trim|required');
            
            if ($this->form_validation->run())
            {   
                if ($this->auth_m->login())
                {
                    redirect('welcome');
                }
                else
                {
                    setError('User not found');
                }
            }
        }
        parent :: index ();
    }
    public function logout()
    {
        $this->auth_m->logout();
        redirect ('welcome');
    }
}