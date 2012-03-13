<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project_m extends MY_Model {
    
    var $table = 'project';
    
    var $fields = array(
        'name' => array('Project name', TRUE,'required|max_length[200]'),
        'description' => array( 'Project description')
    );
    
    public function _run_before_update ()
    {
        $this->db->set('user_id', $this->auth_m->data('id'));
        $this->db->set('slug', strips_text($this->input->post('name')));   
    }
    
    
    public function _run_before_insert ()
    {
        $this->db->set('user_id', $this->auth_m->data('id'));
        $this->db->set('slug', strips_text($this->input->post('name')));
    }
}