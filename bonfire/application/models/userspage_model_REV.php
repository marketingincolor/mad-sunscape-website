<?php
class Userspage_model extends My_Model {

    var $name = '';
	protected $table        = 'lbx_user_pages';
	protected $key          = 'id';
	protected $set_created	= false;
	protected $set_modified = false;
	
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_page($name)
    {
    	$query = $this->db->query('SELECT * FROM lbx_user_pages WHERE uri = "'.$name.'"');       
		$row = $query->row();
		return $row;
    }
    
    function get_pages()
    {
    	$query = $this->db->query('SELECT * FROM lbx_user_pages');      
		return $query->result(); 
    }
    
    function get_page_id($id)
    {
    	$query = $this->db->query('SELECT * FROM lbx_user_pages WHERE users_id = "'.$id.'"');       
		$row = $query->row();
		return $row;
    }
    
    function get_page_actual($id)
    {
    	$query = $this->db->query('SELECT * FROM lbx_user_pages WHERE id = "'.$id.'"');       
		$row = $query->row();
		return $row;
    }
    
    function get_user($name)
    {
    	$query = $this->db->query('SELECT * FROM lbx_user_pages WHERE uri = "'.$name.'"');     
		$row = $query->row();
		
		if ($row) {
		$client = $this->db->query('SELECT * FROM users WHERE id ="' .$row->users_id. '"');
		$row2 = $client->row();
		}
		return $row2;
    }
		
	/*function get_usercount()
    {
    	$query = $this->db->query('SELECT * FROM users WHERE id != "1"');      
		return $query->num_rows(); 
    }
	function get_statscount()
    {
    	$query = $this->db->query('SELECT * FROM lbx_stats WHERE user_id != "1"');      
		return $query->num_rows(); 
    }
	function get_subscount()
    {
    	$query = $this->db->query('SELECT * FROM lbx_submits WHERE user_id != "1"');      
		return $query->num_rows(); 
    }

    function get_stats($id)
    {
    	$query = $this->db->query('SELECT * FROM lbx_stats WHERE user_id = "'.$id.'"');      
		return $query->num_rows(); 
    }
    
    function get_all_stats($id)
    {
    	$query = $this->db->query('SELECT * FROM lbx_stats WHERE user_id = "'.$id.'"');      
		return $query->result(); 
    }
    
    function get_admin_stats()
    {
    	$query = $this->db->query('SELECT * FROM lbx_stats');      
		return $query->result(); 
    }*/
    
    function write_stats($data=array())
    {
		$this->db->insert('lbx_stats', $data); 
    }

    /*function get_subs($id)
    {
    	$query = $this->db->query('SELECT * FROM lbx_submits WHERE user_id = "'.$id.'"');      
		return $query->num_rows(); 
    }
    
    function get_all_subs($id)
    {
    	$query = $this->db->query('SELECT * FROM lbx_submits WHERE user_id = "'.$id.'"');      
		return $query->result(); 
    }
    
    function get_select_sub($id)
    {
    	$query = $this->db->query('SELECT * FROM lbx_submits WHERE id = "'.$id.'"');      
		return $query->result(); 
    }
    
    function get_admin_subs()
    {
    	$query = $this->db->query('SELECT * FROM lbx_submits');      
		return $query->result(); 
    }*/
    
}