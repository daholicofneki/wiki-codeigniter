<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model {
    
    public $table       = '';
    public $primary_key = '';
    public $fields = array();
    
    public function valid ($ignoreField = FALSE)
    {
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