<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_m extends MY_Model {
    
    /**
     * Session key
     */
    private $key = '876w12312312kasjhdkjasd89asdasdqdkshadas18923712hbjhdsabasdq7e2q8wdw';
    
    /**
     * The constructor
     * 
     * @access public
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * Cek is login
     * 
     * @access public
     * @return void
     */
    public function is_secure ()
    {
        if ($this->session->userdata($this->key))
        {
            return TRUE;
        }
    }
    
    /**
     * Cek is login
     * 
     * @access public
     * @return void
     */
    public function is_secure_redirect ()
    {
        if ( ! $this->session->userdata($this->key))
        {
            redirect (base_url().'/account/login');
            exit;
        }
    }
    
    
    /**
     * Save login
     *
     * @param   array   data
     * @param   string  login tipe
     * return void
     */
    public function login ($login)
    {
        if ($login === 'sekolah')
        {
            $query = $this->db
                        ->from('sekolah_pass')
                        ->where('username', $this->input->post('username'))
                        ->where('password', md5($this->input->post('password')))
                        ->get();
        }
        elseif ($login === 'asesor')
        {
            $query = $this->db
                        ->from('asesor_team')
                        ->where('username', $this->input->post('username'))
                        ->where('password', md5($this->input->post('password')))
                        ->get();
        }
        elseif ($login === 'administrator')
        {
            $query = $this->db
                        ->from('uwong')
                        ->join('provinsi','id_provinsi = idx_provinsi')
                        ->where('username', $this->input->post('username'))
                        ->where('password', md5($this->input->post('password')))
                        ->get();   
        }
        
        // cek there is a record
        if ($query->num_rows() > 0)
        {
            $this->session->set_userdata($this->key, $query->row_array());
            $query->free_result();
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
    
    /**
     * Get value from session
     *
     * return array     data array session
     */
    public function data ($userdata)
    {
        $data = $this->session->userdata($this->key);
        return $data[$userdata];
        //return (object) $this->session->userdata($this->key);
    }
    
    /**
     * Destroy session
     *
     * return array     data array session
     */
    public function logout()
    {
        return $this->session->unset_userdata($this->key);
    }
}

/* End of file auth.php */
/* Location: ./application/model/auth.php */