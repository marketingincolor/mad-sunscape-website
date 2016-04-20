<?php
class Content_model extends My_Model {

    //var $id = '';
	protected $table        = 'sitecontent_core';
	//protected $key          = 'id';
	//protected $soft_deletes = false;
	//protected $date_format  = 'datetime';
	protected $set_created	= false;
	protected $set_modified = false;
	
	
	/*
		Method: find_all_by()
		
		A convenience method that combines a where() and find_all()
		call into a single call.
		
		Paremeters:
			$field	- The table field to search in.
			$value	- The value that field should be.
			
		Return:
			An array of objects representing the results, or FALSE on failure or empty set.
	*/
	public function find_all_by($field=null, $value=null) 
	{		
		if (empty($field)) return false;

		// Setup our field/value check
		$this->db->where($field, $value);
		
		$results = $this->find_all();
		
		$return_array = array();
		
		if (is_array($results) && count($results))
		{
			foreach ($results as $record)
			{
				$return_array[$record->name] = $record->value;
			}
		}
		
		return $return_array;
	}

}