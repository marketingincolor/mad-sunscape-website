<?php
class Contact_model extends My_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function write_data($data=array())
    {
		$this->db->insert('lbx_submits', $data); 
    }
}