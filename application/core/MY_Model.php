<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * ORM Model
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package     CodeIgniter
 * @author      Purwandi <free6300@gmail.com>
 * @since       CodeIgniter Version 2.0
 * @filesource
 */
 
/**
 * ORM Class
 *
 * Loads Table
 *
 * @package     CodeIgniter
 * @subpackage  Libraries
 * @author      Purwandi <free6300@gmail.com>
 * @category    Model
 */
 
class MY_Model extends CI_Model {
     
	public $table;
	public $idx = 'id';
	public $fields = array ();
	public $has_relations = array ();
	private $query;
	private $db;
	 
	/**
	 * Sample to use this class
	 * 
	 * $tableName   = '';
	 * $idx = '';
	 * $fields = array (
	 *  'id'    => array ('deskripsi fields', TRUE, 'required|valid_emails'),
	 *  'nama'  => array ('deskripsi fields', TRUE, 'required'),
	 *  'alamat'    => array ('deskripsi fields', FALSE)
	 *  )
	 * public has_one = array ('table_name'=>'id_fk')
	 * public has_many = array ('table_name'=>'id_fk', 'table_name'=>'id_fk', 'table_name'=>'id_fk')
	 */
	  
	// set cunstructor
	public function __construct ()
	{
	    parent ::__construct();
            $CI = & get_instance ();
	    $this->db = $CI->db;
	    unset ($CI);
	}
	 
	 
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
                $this->_run_before_update ();
                $this->db->set('updated_at',time());
                $this->db->where($this->idx,$id);
                $this->db->update($this->table);
                $this->_run_after_update ();
            }
             
            else
            {
                $this->_run_before_insert ();
                $this->db->set('created_at',time());
                $this->db->insert($this->table);
                $this->_run_after_insert ();
            }
            
            return ($this->db->affected_rows() == 1);
	}
	
        public function _run_before_update (){}
        public function _run_before_insert (){}
        public function _run_after_update (){}
        public function _run_after_insert (){}
        
	// --------------------------------------------------------------------
	 
	/**
	 * Get Record from the table
	 *
	 * @access  public
	 * @param   string  the field
	 * @param   string  an alias
	 * @return  object
	 */
	public function get( $id = FALSE, $page = -1 )
	{
		if ($this->has_relations) $this->_relationship ();
                
		if ($id)
		{
		    $this->db->where($this->idx,$id);
		    return $this->row($this->table);
		}
		else
		{
                    if ($page >= 0 )
                    {
                        $this->db->limit('25', $page );
                    }
                    return $this->all($this->table);
		}
	}
	 
	// --------------------------------------------------------------------
	 
	/**
	 * Get Count Record from the table
	 *
	 * @access  public
	 * @return  object
	 */
	public function count_record()
	{
		return $this->db->count_all_results($this->table); 
	}                   
	 
	// --------------------------------------------------------------------
	 
	/**
	 * Delete Record from the table
	 *
	 * @access  public
	 * @param   string  the field
	 * @return  object
	 */
	public function delete($id = FALSE)
	{
            if ($id)
            {
                $this->db->where($this->idx,$id);
                return $this->db->delete($this->table);
            }
	}
	 
	// --------------------------------------------------------------------
	 
	/**
	 * Get the labels from array the table
	 *
	 * @access  public
	 * @return  object
	 */
	public function labels()
	{
            $labels = array();
             
            foreach ( $this->fields as $key=>$value )
            {
                $labels[$key] = $value[0];
            }
             
            return (object) $labels;
	}
	 
	// --------------------------------------------------------------------
	 
	/**
	 * Get the value from fields
	 *
	 * @access  public
	 * @param   string  the field
	 * @param   string  the field
	 * @return  string
	 */
	public function get_value($field = FALSE, $id = FALSE)
	{
		if ( ! empty($field) AND ! empty($id))
		{
			$this->db->where($field, $id);
			return $this->row($this->table);
		}
	     
	}
	 
	// --------------------------------------------------------------------
	 
	/**
	 * Print error
	 *
	 * @access  public
	 * @param   string  the field
	 * @return  string
	 */
	public function error_message($error = FALSE)
	{
            if ( ! empty($error))
            {
                return $this->errorMessage .= $error.br();
            }
	} 
	
	// ----------------------------------------------------------
	 
	/**
	 * Cek if id is exist
	 *
	 * @access  public
	 * @param   string
	 * @return  boolean
	 */
	public function cek_key ( $key, $string )
	{
            if ( ! empty($key) AND ! empty($string))
            {
                $this->db->where( $key ,$string);
                if ( $this->row($this->table))
                {
                    return TRUE;
                }
                else
                {
                    return FALSE;
                }
            }
	}
	
	// AND HE WE GO ADO FUNCTION .......................................
	// ---------------------------------------------------------------------
	 
	/**
	 * Ado Function
	 *
	 * An open source application development framework for PHP 5.1.6 or newer
	 *
	 * @package     CodeIgniter
	 * @author      Purwandi <free6300@gmail.com>
	 * @since       CodeIgniter Version 2.0
	 * @filesource
	 */
	 
	// ---------------------------------------------------------------------
	 
	 
	/**
	 * Get Row
	 * 
	 * @access     public
	 * @param      string
	 * @param      array
	 * @return     boolean
	 */
	public function row ($sql = null, $where = array())
	{
            $sql = $sql ? $sql : $this->table;
            
            if ($this->_get ($sql,$where))
            {
                return $this->query->row();
            }
            else
            {
                return FALSE;
            }
	}
	 
	/**
	 * Get All
	 * 
	 * @access     public
	 * @param      string
	 * @param      array
	 * @return     boolean
	 */
	public function all ($sql = null, $where = array())
	{
            $sql = $sql ? $sql : $this->table;
            
            if ( $this->_get($sql,$where))
            {
                $data = array();
                foreach ($this->query->result() as $row)
                {
                    $data[] = $row;
                }
                return $data;
            }
             
            else
            {
                return FALSE;
            }
	}
	 
	 
	/**
	 * Get One
	 * 
	 * @access     public
	 * @param      string
	 * @param      array
	 * @return     boolean
	 */
	public function one ($sql = null,$where = array ())
	{
            $sql = $sql ? $sql : $this->table;
            
            if ( $this->_get($sql,$where))
            {
                 
                $arr = $this->query->row_array();
                $val = "";
                 
                foreach ($arr as $a)
                {
                    $val = $a; break;
                }
                 
                return $val;
            }
            else
            {
                return FALSE;
            }
	}
     
	/**
	 * Cek num rows
	 *
	 * Cek apakah ada record di dalam query
	 * 
	 * @access     private
	 * @param      string
	 * @param      array
	 * @return     boolean
	 */
	private function _get ($sql, $where = array ())
	{
            if( (count($where) > 1) OR (!preg_match('/ /',trim($sql))))
            {
                $this->query = $this->db->get_where($sql,$where) or die(mysql_error());
            }
            else
            {
                $this->query = $this->db->query($sql) or die(mysql_error());
            } 
            
            return ($this->query->num_rows() > 0); 
	}
}