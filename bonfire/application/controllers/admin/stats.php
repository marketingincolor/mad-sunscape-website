<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Stats extends Admin_Controller {

	//--------------------------------------------------------------------

	public function __construct() 
	{
		parent::__construct();
		
		Template::set('toolbar_title', 'Stats');
		$this->load->model('stats_model', null, TRUE);
		$this->auth->restrict('Site.Stats.View');
		Assets::add_js('jquery.dataTables.min.js');
		Assets::add_js('TableTools.min.js');
		Assets::add_css('datatable.css', 'screen');	
		Assets::add_css('TableTools.css', 'screen');	
	}
	
	//--------------------------------------------------------------------	

	public function index() 
	{	
		$current_user_id = $this->auth->user_id();
		$current_user_roleid = $this->auth->role_id();
		$current_user_rolename = $this->auth->role_name_by_id($current_user_roleid);
		/////////////////////////////////
		Assets::add_js($this->load->view('admin/stats/fdatatable_js', null, true), 'inline');
		////////////////////////////////
		
		if ($this->input->post('submit'))
		{
			$type = $_POST['selections'];
			if ($this->checkbox_change($type))
			{
				Template::set_message('Information has been successfully updated' , 'success');
				//Template::redirect(SITE_AREA .'/stats');
			} else 
			{
				Template::set_message('There was an error saving your settings.', 'error');
			}
		}
		
		$num_subs = $this->stats_model->get_subs($current_user_id);
		//if ($current_user_roleid == '1') { //determine if user is Admin to show all form submits
		//	$all_subs = $this->stats_model->get_admin_subs();
		//} else {
			$all_subs = $this->stats_model->get_all_subs($current_user_id);
		//}
		
		Template::set('lbx_user_form_subs', $num_subs);
		Template::set('lbx_user_all_form_subs', $all_subs);
		Template::set('user_id', $current_user_id);
		Template::set('role_id', $current_user_roleid);
		Template::set('role_name', $current_user_rolename);
		Template::set('type', 'forms');
		//Template::render();
		
		Template::set_view('admin/stats/index');
		Template::render();
	}
	
	//--------------------------------------------------------------------
	
	public function details_original($id=null) 
	{	
		$current_user_id = $this->auth->user_id();
		$current_user_roleid = $this->auth->role_id();
		$current_user_rolename = $this->auth->role_name_by_id($current_user_roleid);
		
		$get_select_sub = $this->stats_model->get_select_sub($id);
		
		if ($this->input->post('submit'))
		{
			if ($this->save_submission('update', $id))
			{

			}
		}
		
		Template::set('lbx_user_select_form_sub', $get_select_sub);
		
		Template::set('number', $id);
		Template::set_view('admin/stats/details');
		Template::render();
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
		} else
		{
			$this->stats_model->read($id);
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
		Method: save_submission()
		
		Does the actual validation and saving of form data.
		
		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.
		
		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_submission($type='update', $id=0) 
	{	
		
		//$this->form_validation->set_rules('status', 'status', 'trim|strip_tags|xss_clean');
		//if ($this->form_validation->run() === FALSE)
		//{
		//	return FALSE;
		//}
		
		// cleanup default break tag from editor
		$notestring = $_POST['note'] == '<br>' ? NULL : $_POST['note'];
		$data = array(
			//'status'		=> $_POST['status'],
			'note'		=> $notestring
		
		);
		
		if ($type == 'insert')
		{
			$id = $this->stats_model->insert_sub($data);
			
			if (is_numeric($id))
			{
				$return = $id;
			} else
			{
				$return = FALSE;
			}
		}
		else if ($type == 'update')
		{
			$return = $this->stats_model->update_sub($id, $data);
		}
		return $return;
	}
	
	//--------------------------------------------------------------------
	/*
		Method: checkbox_change()
		Processes checkbox-based inputs.
	*/

	private function checkbox_change($type) 
	{
		if ($type == 'delete')
		{
			//$id = $this->stats_model->insert_sub($data);
			$id_to_edit = $_POST['entrynum'];
					foreach ($id_to_edit as $idtoedit)
			{
				$this->stats_model->delete($idtoedit['id']);
			}
			//$this->stats_model->delete($id_to_edit);
			$return = 'delete';
		}
		else if ($type == 'read')
		{
			//set value of 'status' in DB to '1'
			$id_to_edit = $_POST['entrynum'];
			foreach ($id_to_edit as $idtoedit)
			{
				$this->stats_model->read($idtoedit['id']);
			}
			//$this->stats_model->read($id_to_edit['id']);
			$return = 'read';
		}
		else if ($type == 'unread')
		{
			//set value of 'status' in DB to '0'
			$id_to_edit = $_POST['entrynum'];
			foreach ($id_to_edit as $idtoedit)
			{
				$this->stats_model->unread($idtoedit['id']);
			}
			//$this->stats_model->unread($id_to_edit['id']);
			$return = 'unread';
		}
		return $return;
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
	
}