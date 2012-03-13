<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page_m extends MY_Model {
    
    var $table = 'page';
    
    var $fields = array(
        'name' => array('Page name', TRUE,'required|max_length[200]'),
        'body' => array('Body')
    );
    
    public function _run_before_update ()
    {
        $this->db->set('project_id', $project);
        $this->db->set('user_id', $this->auth_m->data('id'));
        $this->db->set('slug', strips_text($this->input->post('name')));
    }
    
    
    public function _run_before_insert ()
    {
        $this->db->set('project_id', $this->input->post('project_id'));
        $this->db->set('user_id', $this->auth_m->data('id'));
        $this->db->set('slug', strips_text($this->input->post('name')));
    }
}