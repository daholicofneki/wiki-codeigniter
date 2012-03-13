<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends MY_Controller{
    
    protected $module = 'page';
    
    public function __construct()
    {
        parent :: __construct();
        
        $this->load->model(array('project_m','page_m'));
        
        $this->params['tabs'] = array (
            'page/index/'.$this->uri->segment(3)  => '<i class="icon-home"></i> Home',
            'page/details/'.$this->uri->segment(3)  => '<i class="icon-book"></i> Page',
        );
    }
    
    public function index ($slug = null, $page = 'welcome')
    {
        $p = $this->project_m->row('',array('slug'=> $slug));
        
        if ($p)
        {
            $this->params['project'] = $p;
            
            // load sparks markdown
            $this->load->spark('markdown-extra/0.0.0');
            
            $this->db->where('slug',$page);
            $data = $this->page_m->row('',array('project_id' => $p->id,'status' => 1));
            
            $this->params['page'] = $data;
            parent :: index ();
        }
        
    }
    
    public function insert($slug)
    {
        $p = $this->project_m->row('',array('slug'=> $slug));
        
        if ($p)
        {
            $this->load->helper(array('form','inflector'));
            
            if ($_POST)
            {
                if ($this->page_m->valid())
                {
                    if ($this->page_m->save())
                    {
                        die ('<div id="result" class="alert alert-success">Success</div>');
                    }
                    else
                    {
                        die ('<div id="result" class="alert">Cannot save</div>');
                    }
                }
                else
                {
                    die ('<div id="result" class="alert">Cannot save</div>');
                }
            }
            else
            {
                $this->params['project'] = $p;
                parent :: insert();
            }
            
            
        }
    }
    
    public function update ($slug)
    {
        //$project = $this->project_m->row('', array('slug'=> $slug));
        $page = $this->page_m->row('',array('slug'=> $slug,'status'=> 1 ));
        if ($page)
        {
            $this->load->helper(array('form','inflector'));
             
            if ($_POST)
            {
                if ($this->page_m->valid())
                {
                    
                    // update
                    if ($this->page_m->save($this->input->post('id')))
                    {
                        redirect ('page/index/'.$this->input->post('slug').'/'.strips_text($this->input->post('name')));
                    }
                    else
                    {
                        die ('<div id="result" class="alert">Cannot save</div>');
                    }
                }
            }
            else
            {
                $this->params['project']  = $this->project_m->get($page->project_id);
                $this->params['page'] = $page;
                parent :: update('update');
            }
        }
        
    }
    
    public function details ($slug)
    {
        $p = $this->project_m->row('',array('slug'=> $slug));
        
        if ($p)
        {
            $this->params['project'] = $p;
            
            $data = $this->page_m->all('',array('project_id' => $p->id,'status' => 1));
            
            $this->params['page'] = $data;
            parent :: index('details');
        }
    }
    
    public function delete ()
    {
        parent :: delete ();
    }
}