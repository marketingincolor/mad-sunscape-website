<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

	//--------------------------------------------------------------------

	public function __construct() 
	{
		parent::__construct();
		
		Template::set('toolbar_title', 'Dashboard');
		
		$this->auth->restrict('Site.Dashboard.View');
	}
	
	//--------------------------------------------------------------------	

	public function index() 
	{	
//$this->input->set_cookie('msgkeeper', 'false', '');
//$this->input->set_cookie('msgkeeper1', 'false', '');

		
		$current_user_id = $this->auth->user_id();
		$current_user_roleid = $this->auth->role_id();
		$current_user_rolename = $this->auth->role_name_by_id($current_user_roleid);
		
		//$this->load->helper('cookie');
		
		//$has_msg = $this->session->userdata('msg_new');
		//$has_msg = $this->input->cookie('msgkeeper');
		
		/////////////////////////////////////////////////
		//if ($this->session->userdata('msg_new')!='false') {
		//	$this->session->set_userdata('msg_new', 'true');
		//} else {
		//	$this->session->set_userdata('msg_new', 'false');
		//}
		//
		//$this->session->unset_userdata('msg_new');
		/////////////////////////////////////////////////
		//if (empty($has_msg)) {
			//$this->session->set_userdata('msg_new', 'true');
		//	$this->input->set_cookie('msgkeeper', '0,0,0,0', '86500');
		//} else {
			////$this->session->set_userdata('msg_new', 'false');
		//}
		
		//if ($this->input->post('submit')) {
			//$this->session->set_userdata('msg_new', 'false');
			//$this->input->set_cookie('msgkeeper', '1,0,0,0', '86500');
		//}
		
		
		$this->load->model('stats_model', '', TRUE);
		$this->load->library('RSSParser', array('url' => 'http://feeds.feedburner.com/SunscapeDealerSupportCenter.xml', 'life' => 2));
		$getfeed = $this->rssparser->getFeed(8);
		
		$admin_num_users = $this->stats_model->get_usercount();
		$admin_num_entries = $this->stats_model->get_statscount();
		$admin_num_subs = $this->stats_model->get_subscount();
		$admin_num_unread = $this->stats_model->get_admin_unread_subs();
		
		$num_entries = $this->stats_model->get_stats($current_user_id);
		$all_entries = $this->stats_model->get_all_stats($current_user_id);
		
		$num_subs = $this->stats_model->get_subs($current_user_id);
		$total_num_subs = $this->stats_model->get_total_subs($current_user_id);
		$all_subs = $this->stats_model->get_all_subs($current_user_id);
		$five_subs = $this->stats_model->get_five_subs($current_user_id);
		$thispage_msgdata = 'all';
		
		Template::set('lbx_user_count', $admin_num_users);
		Template::set('lbx_stats_count', $admin_num_entries);
		Template::set('lbx_subs_count', $admin_num_subs);
		Template::set('lbx_unread_count', $admin_num_unread);
		
		Template::set('lbx_user_page_views', $num_entries);
		Template::set('lbx_user_all_page_views', $all_entries);
		
		Template::set('lbx_user_form_subs', $num_subs);
		Template::set('lbx_user_total_form_subs', $total_num_subs);
		Template::set('lbx_user_all_form_subs', $all_subs);
		Template::set('lbx_user_five_form_subs', $five_subs);
		
		Template::set('user_id', $current_user_id);
		Template::set('role_id', $current_user_roleid);
		Template::set('role_name', $current_user_rolename);
		
		Template::set('getfeed', $getfeed);
		
		Template::set('message_data', $thispage_msgdata);
		//Template::set_message('This is your message.', 'success');
		Template::set_view('admin/dashboard/index');
		Template::render();
	}
	
	//--------------------------------------------------------------------	

	public function help() 
	{	
		$this->load->library('RSSParser', array('url' => 'http://feeds.feedburner.com/SunscapeDealerSupportCenter.xml', 'life' => 2));
		$getfeed = $this->rssparser->getFeed(8);
		//Template::set_message('This is your message.', 'success');
		Template::set('getfeed', $getfeed);
		Template::set_view('admin/dashboard/help');
		Template::render();
	}
	
	//--------------------------------------------------------------------
	
	public function clear_msg()
	{
		/////////////////////////////////////////////////
		//$this->session->set_userdata('msg_new', 'false');
		//$this->session->unset_userdata('msg_new');
		/////////////////////////////////////////////////
	}
	//--------------------------------------------------------------------

}