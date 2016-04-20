<?php
class Webnet_model extends My_Model {

	protected $table		= 'users';
	protected $soft_deletes	= true;
	protected $date_format	= 'datetime';
	protected $set_modified = false;
	
    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	//--------------------------------------------------------------------
	
	/*
		Method: insert()
		
		Creates a new user in the database. 
		
		Required parameters sent in the $data array:
			- password
			- A unique email address
			
		If no _role_id_ is passed in the $data array, it
		will assign the default role from <Roles> model.
		
		Parameters:
			$data	- An array of user information.
		
		Returns:
			$id	- The ID of the new user.
	*/
	public function insert($data=array()) 
	{
		//if (!$this->_function_check(false, $data))
		//{
		//	return false;
		//}
		
		if (!isset($data['password']) || empty($data['password']))
		{
			$this->error = 'No Password present.';
			return false;
		}
		
		if (!isset($data['email']) || empty($data['email']))
		{
			$this->error = 'No Email given.';
			return false;
		}
		
		// Is this a unique email?
		if ($this->is_unique('email', $data['email']) == false)
		{
			$this->error = 'Email already exists.';
			return false;
		}
	
		if (empty($data['username'])) 
		{
		  unset($data['username']);
		}

		list($password, $salt) = $this->hash_password($data['password']);
		
		unset($data['password'], $data['pass_confirm'], $data['submit']);
		
		$data['password_hash'] = $password;
		$data['salt'] = $salt;
		
		$data['zipcode'] = !empty($data['zipcode']) ? $data['zipcode'] : null;

		// Handle the country
		if (isset($data['iso']))
		{
			$data['country_iso'] = $data['iso'];
			unset($data['iso']);
		}
		
		// What's the default role?
		if (!isset($data['role_id']))
		{
			// We better have a guardian here
			if (!class_exists('Role_model'))
			{
				$this->load->model('roles/Role_model','role_model');
			}

			$data['role_id'] = $this->role_model->default_role_id();
		}
		
		$id = parent::insert($data);
		
		return $id;
	}
	
	//--------------------------------------------------------------------
	
	//--------------------------------------------------------------------
	// !AUTH HELPER METHODS
	//--------------------------------------------------------------------
	
	/*
		Method: hash_password()
		
		Generates a new salt and password hash for the given password.
		
		Parameters:
			$old	- The password to hash.
			
		Returns:
			An array with the hashed password and new salt.
	*/
	public function hash_password($old='') 
	{
		if (!function_exists('do_hash'))
		{
			$this->load->helper('security');
		}
	
		$salt = $this->generate_salt();
		$pass = do_hash($salt . $old);
		
		return array($pass, $salt);
	}
	
	//--------------------------------------------------------------------
	
	private function generate_salt() 
	{
		if (!function_exists('random_string'))
		{
			$this->load->helper('string');
		}
		
		return random_string('alnum', 7);
	}
	
	//--------------------------------------------------------------------
	
}