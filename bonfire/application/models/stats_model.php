<?php
class Stats_model extends My_Model {

    var $id = '';
	protected $table        = 'lbx_stats';
	protected $key          = 'id';
	protected $soft_deletes = true;
	protected $date_format  = 'datetime';
	
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function get_usercount()
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
    	$query = $this->db->query('SELECT * FROM lbx_submits WHERE user_id != "1" AND deleted != "1"');      
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
    }
    
    function write_stats($data=array())
    {
		$this->db->insert('lbx_stats', $data); 
    }

    function get_subs($id)
    {
    	$query = $this->db->query('SELECT * FROM lbx_submits WHERE user_id = "'.$id.'" AND status = "0" AND deleted != "1"');      
		return $query->num_rows(); 
    }
    function get_total_subs($id)
    {
    	$query = $this->db->query('SELECT * FROM lbx_submits WHERE user_id = "'.$id.'" AND deleted != "1"');
    	return $query->num_rows();
    }
    function get_all_subs($id)
    {
    	$query = $this->db->query('SELECT * FROM lbx_submits WHERE user_id = "'.$id.'" AND deleted != "1"');      
		return $query->result(); 
    }
    function get_five_subs($id)
    {
    	$query = $this->db->query('SELECT * FROM lbx_submits WHERE user_id = "'.$id.'" AND deleted != "1" ORDER BY datetime DESC LIMIT 5 ');      
		return $query->result(); 
    }
    function get_select_sub($id)
    {
    	$query = $this->db->query('SELECT * FROM lbx_submits WHERE id = "'.$id.'"');      
    	if ($query->num_rows())
		{
			return $query->row();
		}
    }
    
    function get_admin_subs()
    {   
   
    	//$query = $this->db->query('SELECT * FROM lbx_submits INNER JOIN users on lbx_submits.user_id = users.id');   
    	$query = $this->db->query('SELECT lbx_submits.id, lbx_submits.user_id, lbx_submits.datetime, lbx_submits.type, lbx_submits.status, lbx_submits.note, lbx_submits.data, lbx_submits.deleted, lbx_user_pages.bus_name FROM lbx_submits LEFT JOIN lbx_user_pages on lbx_submits.user_id = lbx_user_pages.users_id');   
		return $query->result(); 
    }
    function get_admin_unread_subs()
    {
    	$query = $this->db->query('SELECT * FROM lbx_submits WHERE status = "0"');      
		return $query->num_rows(); 
    }
    
	public function update_sub($id=null, $data=null)
	{

		$this->db->where($this->key, $id);
		if ($this->db->update('lbx_submits', $data))
		{
			return true;
		}
	
		return false;
	}
	
	public function delete($id=null)
	{
		//if ($this->_function_check($id) === FALSE)
		//{
		//	return FALSE;
		//}
	
		if ($this->soft_deletes === TRUE)
		{	
			$this->db->where('id', $id);
			$result = $this->db->update('lbx_submits', array('deleted' => 1));
		} 
		else 
		{
			$result = $this->db->delete('lbx_submits', array($this->key => $id));
		}

		if ($result)
		{
			return true;
		} 
		
		$this->error = 'DB Error: ' . mysql_error();
	
		return false;
	}
	public function read($id=null)
	{
		$this->db->where('id', $id);
		$result = $this->db->update('lbx_submits', array('status' => 1));
				if ($result)
		{
			return true;
		} 
		$this->error = 'DB Error: ' . mysql_error();
	
		return false;
	}
	public function unread($id=null)
	{
		$this->db->where('id', $id);
		$result = $this->db->update('lbx_submits', array('status' => 0));
				if ($result)
		{
			return true;
		} 
		$this->error = 'DB Error: ' . mysql_error();
	
		return false;
	}
}