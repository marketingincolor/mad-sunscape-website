<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Webnet extends Admin_Controller {

	//--------------------------------------------------------------------

	public function __construct() 
	{
		parent::__construct();
		
		Template::set('toolbar_title', 'Webnet');
		$this->load->model('userspage/userspage_model', null, TRUE);
		$this->auth->restrict('Site.Webnet.View');
		Assets::add_js('jquery.dataTables.min.js');
		Assets::add_css('datatable.css', 'screen');	
	}
	
	//--------------------------------------------------------------------	

	public function index() 
	{	
		$current_user_id = $this->auth->user_id();
		$current_user_roleid = $this->auth->role_id();
		$current_user_rolename = $this->auth->role_name_by_id($current_user_roleid);
		
		if (($current_user_roleid == '1') || ($current_user_roleid == '7'))
		{
			
			$info = $this->userspage_model->get_pages();
			$actualpage = NULL;
		} else
		{
			$info = $this->userspage_model->get_page_id($current_user_id);
			$actualpage = $info->id;
			
		}
		
		
		if ($this->input->post('submit'))
		{
			if ($this->save_settings($actualpage))
			{
				Template::set_message('Your settings were successfully saved.', 'success');
				redirect(SITE_AREA .'/webnet');
			} else 
			{
				Template::set_message('There was an error saving your settings.', 'error');
			}
		}
		// Read our current settings
		
		
		Template::set('info', $info);
		Template::set('current_user_roleid', $current_user_roleid);
		
		Template::set_view('admin/webnet/index');
		Template::render();
	}
	
	//--------------------------------------------------------------------	

	public function editpage() 
	{	
		$val = (int)$this->uri->segment(4);
		$current_user_id = $this->auth->user_id();
		$current_user_roleid = $this->auth->role_id();
		$current_user_rolename = $this->auth->role_name_by_id($current_user_roleid);

		$info = $this->userspage_model->get_page_actual($val);
		$actualpage = $val;
		//$this->load->library('form_validation');
		if ($this->input->post('submit'))
		{

			if ($this->save_settings($actualpage))
			{
				Template::set_message('Your settings were successfully saved.', 'success');
				redirect(SITE_AREA .'/webnet');
			} else 
			{
				Template::set_message('There was an error saving your settings.', 'error');
			}
		}
		// Read our current settings

		Template::set('info', $info);
		Template::set('current_user_roleid', $current_user_roleid);
		Template::set_view('admin/webnet/edit');
		Template::render();
	}
	
	//--------------------------------------------------------------------	

	public function newuser() 
	{

		$current_user_id = $this->auth->user_id();
		$current_user_roleid = $this->auth->role_id();
		$current_user_rolename = $this->auth->role_name_by_id($current_user_roleid);
		//$info = $this->userspage_model->get_page_actual($val);
		//$actualpage = $val;
		
		$this->load->library('form_validation');
		
		if ($this->input->post('submit'))
		{
			if ($this->save_new_user())
			{
				Template::set_message('Users Page settings were successfully saved.', 'success');
				redirect(SITE_AREA .'/webnet');
			} else 
			{
				Template::set_message('There was an error saving Users Page settings.', 'error');
			}
		}
		// Read our current settings
		$this->load->config('address');
		$this->load->helper('address');
		
		Template::set('info', true);
		Template::set('current_user_roleid', $current_user_roleid);
		Template::set_view('admin/webnet/newuser');
		Template::render();
		//redirect(SITE_AREA .'/webnet');
	}
	//--------------------------------------------------------------------
	
	public function details() 
	{
		$current_user_id = $this->auth->user_id();
		$current_user_roleid = $this->auth->role_id();
		$current_user_rolename = $this->auth->role_name_by_id($current_user_roleid);
		
		$id = (int)$this->uri->segment(4);
		
		if (empty($id))
		{
			Template::set_message('There was a problem display the details', 'error');
			redirect(SITE_AREA .'/stats');
		}
	
			if ($this->input->post('submit'))
		{
			if ($this->save_submission('update', $id))
			{
				Template::set_message('Information has been successfully updated', 'success');
				Template::redirect(SITE_AREA .'/stats');
			}
		}
		
		Template::set('details', $this->stats_model->get_select_sub($id));
	
		Template::set('toolbar_title', 'Stats Details');
		Template::set('number', $id);
		Template::set_view('admin/stats/details');
		Template::render();	
	}
	
	//--------------------------------------------------------------------
	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------
	
	/*
		Method: save_settings()
		
		Does the actual saving of form data.
		
		Returns:
			Returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_settings($id=0) 
	{
		$config['upload_path'] = './uploads';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '40960';//limit file size to 40mb max
		$this->load->library('upload', $config);
		
		$this->upload->do_upload();
		$upload_data = $this->upload->data(); 
		if ($upload_data['file_name']) {
			$filename = 'uploads/'.$upload_data['file_name'].'';
		} else {
			$filename = $_POST['image'] ? $_POST['image'] : NULL ;
		}
		
		$data = array(
			'uri'		=> $_POST['uri'],
			'image'		=> $filename,
			'bus_name'		=> $_POST['bus_name'],
			'bus_street_1'		=> $_POST['bus_street_1'] ? $_POST['bus_street_1'] : NULL ,
			'bus_street_2'		=> $_POST['bus_street_2'] ? $_POST['bus_street_2'] : NULL ,
			'bus_city'		=> $_POST['bus_city'] ? $_POST['bus_city'] : NULL ,
			'bus_state_code'		=> $_POST['bus_state_code'],
			'bus_zip'		=> $_POST['bus_zip'],
			'bus_phone'		=> $_POST['bus_phone'],
			'bus_cellphone'		=> $_POST['bus_cellphone'] ? $_POST['bus_cellphone'] : NULL ,
			'bus_carrier'		=> $_POST['bus_carrier'] ? $_POST['bus_carrier'] : NULL ,
			'active'		=> $_POST['active']
		);

		$updated = $this->userspage_model->update($id, $data);
		return $updated;
	}
	
	//--------------------------------------------------------------------
	
	/*
		Method: save_new_user()
		
		Does the actual saving of form data in two places - users and lbx_user_pages.
		
		Returns:
			Returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_new_user() 
	{
		$config['upload_path'] = './uploads';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '40960';//limit file size to 40mb max
		$this->load->library('upload', $config);
		
		$this->upload->do_upload();
		$upload_data = $this->upload->data(); 
		if ($upload_data['file_name']) {
			$filename = 'uploads/'.$upload_data['file_name'].'';
		} else {
			$filename = NULL;
		}
		
		$this->load->model('webnet_model', null, TRUE);
		$datauser = array(
			'first_name'		=> $_POST['first_name'],
			'last_name'		=> $_POST['last_name'],
			'street_1'		=> $_POST['bus_street_1'] ? $_POST['bus_street_1'] : NULL ,
			'street_2'		=> $_POST['bus_street_2'] ? $_POST['bus_street_2'] : NULL ,
			'city'		=> $_POST['bus_city'],
			'state_code'		=> $_POST['bus_state_code'],
			'country_iso'		=> $_POST['bus_country_code'],
			'zipcode'		=> $_POST['bus_zip'],
			'email'		=> $_POST['email'],
			'username'		=> $_POST['username'],
			'password'		=> $_POST['password'],
			'role_id'		=> $_POST['role_id']
		);
		$users_id = $this->webnet_model->insert($datauser);
		
		$datapage = array(
			'users_id'		=> $users_id,
			'uri'		=> $_POST['uri'],
			'image'		=> $filename,
			'bus_name'		=> $_POST['bus_name'],
			'bus_street_1'		=> $_POST['bus_street_1'] ? $_POST['bus_street_1'] : NULL ,
			'bus_street_2'		=> $_POST['bus_street_2'] ? $_POST['bus_street_2'] : NULL ,
			'bus_city'		=> $_POST['bus_city'],
			'bus_state_code'		=> $_POST['bus_state_code'],
			'bus_zip'		=> $_POST['bus_zip'],
			'bus_phone'		=> $_POST['bus_phone'],
			'bus_cellphone'		=> $_POST['bus_cellphone'] ? $_POST['bus_cellphone'] : NULL ,
			'bus_carrier'		=> $_POST['bus_carrier'] ? $_POST['bus_carrier'] : NULL ,
			'active'		=> $_POST['active']
		);
		
		$this->form_validation->set_rules('uri', 'URI', 'required|callback_unique_uri');
		if ($this->form_validation->run() === false)
		{
			return false;
		}

		$updated = $this->userspage_model->insert($datapage);
		return $updated;
	}
	
	//--------------------------------------------------------------------
	
	/*
		Method: delete()
		
		Allows deleting of pages data.
	*/
	public function delete() 
	{	
		$id = $this->uri->segment(4);
		if (!empty($id))
		{	
			if ($this->stats_model->delete($id))
			{
				// Log the activity
				//$this->activity_model->log_activity($this->auth->user_id(), lang('pages_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'pages');
				Template::set_message('Entry has been deleted', 'success');
			} else
			{
				Template::set_message('Entry could not be deleted', 'error');
			}
		}
		redirect(SITE_AREA .'/stats');
	}
	
	//--------------------------------------------------------------------
	
	public function unique_uri($str) 
	{	
		if ($this->userspage_model->is_unique('uri', $str))
		{
			return true;
		}
		else
		{
			$this->form_validation->set_message('unique_uri', 'That URI is already in use - please choose something else.');
			return false;
		}
	}
	
	//--------------------------------------------------------------------
	
}