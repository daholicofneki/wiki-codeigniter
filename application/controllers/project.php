<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project extends MY_Controller{
    
    protected $module = 'project';
    
    public function __construct()
    {
        parent :: __construct();
        
        $this->load->model('project_m');
    }
    
    public function index ()
    {
        
        $this->params['p'] = $this->project_m->get();
        parent :: index ();
    }
    
    public function insert()
    {
        $this->load->helper(array('form','inflector'));
        
        if ($_POST)
        {
            if ($this->project_m->valid())
            {
                if ($this->project_m->save())
                {
                    setSucces('Insert');
                }
                else
                {
                    setError('Can not save');
                }
            }
        }
        
        parent :: insert();
    }
    
    public function update ($slug)
    {
        $p = $this->project_m->row('', array('slug'=> $slug));
        
        if ($p)
        {
            $this->load->helper(array('form','inflector'));
             
            if ($_POST)
            {
                if ($this->project_m->valid())
                {
                    if ($this->project_m->save($p->id))
                    {
                        setSucces('Updated');
                    }
                    else
                    {
                        setError('Can not save');
                    }
                }
            }
            
            $this->params['p'] = $p;
            parent :: update();
        }
        
    }
    
    public function delete ()
    {
        parent :: delete ();
    }
    
}