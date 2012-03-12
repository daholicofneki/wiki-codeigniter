<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project extends MY_Controller{
    
    protected $module = 'project';
    
    public function index ()
    {
        $p = new Project_m();
        $this->params['p'] = $p->where('user_id',$this->auth_m->data('id'))
                                ->order_by('updated_at DESC')
                                ->get();
        parent :: index ();
    }
    
    public function insert()
    {
        $this->load->helper(array('form','inflector'));
        if ($_POST)
        {
            $p = new Project_m();
            
            $p->name = $this->input->post('name');
            $p->description = $this->input->post('description');
            $p->slug = strips_text($this->input->post('name'));
            $p->user_id = $this->auth_m->data('id');
            
            if ($p->save())
            {
                setSucces('Insert');
            }
            else
            {
                setError('Can not save');
            }
        }
        
        parent :: insert();
    }
    
    public function update ()
    {
        $this->load->helper('form');
        if ($_POST)
        {
            
        }
        
        parent :: update();
    }
    
    public function delete ()
    {
        parent :: delete ();
    }
}