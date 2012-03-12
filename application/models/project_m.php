<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project_m extends DataMapper {
    
    var $model = 'project_m';
    var $table = 'project';
    var $has_many = array('project_user_m','page_m');
    
    var $validation = array(
        'name' => array('Project name', TRUE,'required|max_length[200]'),
        'description' => array( 'Project description')
    );
    // --------------------------------------------------------------------
        
    /**
     * Cek Validation 
     *
     * @access  public
     * @param   string  the field
     * @param   string  an alias
     * @return  object
     */
    public function valid ($ignoreField = FALSE)
    {
        $this->load->library('form_validation');
        
        foreach ($this->fields as $key=>$values)
        {
            if (is_array($ignoreField) && in_array($key,$ignoreField)) continue;
             
            $rules = 'trim';
             
            if (count($values) > 1)
            {
                    if ( $values[1] ) $rules .= '|required';
                    if ( isset($values[2]) ) $rules .= '|'.$values[2];
            }
                     
            $this->form_validation->set_rules($key, $values[0], $rules);
        }
        
        return $this->form_validation->run();
    }   
     
    // --------------------------------------------------------------------
     
    /**
     * Save and Edit Record 
     *
     * @access  public
     * @param   string
     * @return  object
     */
    public function save ($id = FALSE)
    {
        foreach ($this->fields as $key=>$values)
        {
                $this->db->set($key,$this->input->post($key));              
        }
         
        if ( ! empty($id))
        {
                $this->db->where($this->idx,$id);
                $this->db->update($this->tableName);
        }
         
        else
        {
                $this->db->insert($this->tableName);
        }
        return ($this->db->affected_rows() == 1);
    }
}