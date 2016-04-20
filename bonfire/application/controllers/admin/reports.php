<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
	Copyright (c) 2011 Lonnie Ezell

	Permission is hereby granted, free of charge, to any person obtaining a copy
	of this software and associated documentation files (the "Software"), to deal
	in the Software without restriction, including without limitation the rights
	to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
	copies of the Software, and to permit persons to whom the Software is
	furnished to do so, subject to the following conditions:
	
	The above copyright notice and this permission notice shall be included in
	all copies or substantial portions of the Software.
	
	THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
	IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
	FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
	AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
	LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
	OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
	THE SOFTWARE.
*/

class Reports extends Admin_Controller {

	//--------------------------------------------------------------------

	public function __construct() 
	{
		parent::__construct();
		
		Template::set('toolbar_title', 'Reports');
		
		$this->auth->restrict('Site.Reports.View');
		Assets::add_module_js('details', 'jquery.dataTables.min.js');
		Assets::add_module_css('details', 'datatable.css');	
	}
	
	//--------------------------------------------------------------------	

	public function index() 
	{	
		//$all_entries = array();
		//$all_subs = array();
		
		$current_user_id = $this->auth->user_id();
		$current_user_roleid = $this->auth->role_id();
		$current_user_rolename = $this->auth->role_name_by_id($current_user_roleid);
		
		switch ($current_user_roleid) {
	    //case 1: //admin
	    //case 4: //user
	    case 7: //client
			redirect(SITE_AREA .'/reports/details/forms');
	        break;
	    default:
			$this->load->model('stats_model', '', TRUE);
			$this->load->library('RSSParser', array('url' => 'http://feeds.feedburner.com/SunscapeDealerSupportCenter.xml', 'life' => 2));
			$getfeed = $this->rssparser->getFeed(8);
			
			$admin_num_users = $this->stats_model->get_usercount();
			$admin_num_entries = $this->stats_model->get_statscount();
			$admin_num_subs = $this->stats_model->get_subscount();
			
			$num_entries = $this->stats_model->get_stats($current_user_id);
			//$all_entries['entries'] = $this->userspage_model->get_all_stats($current_user_id);
			$all_entries = $this->stats_model->get_all_stats($current_user_id);
			
			$num_subs = $this->stats_model->get_subs($current_user_id);
			//$all_subs['submits'] = $this->userspage_model->get_all_subs($current_user_id);
			$all_subs = $this->stats_model->get_all_subs($current_user_id);
			
			Template::set('lbx_user_count', $admin_num_users);
			Template::set('lbx_stats_count', $admin_num_entries);
			Template::set('lbx_subs_count', $admin_num_subs);
			
			Template::set('lbx_user_page_views', $num_entries);
			Template::set('lbx_user_all_page_views', $all_entries);
			
			Template::set('lbx_user_form_subs', $num_subs);
			Template::set('lbx_user_all_form_subs', $all_subs);
			
			Template::set('user_id', $current_user_id);
			Template::set('role_id', $current_user_roleid);
			Template::set('role_name', $current_user_rolename);
			
			Template::set('getfeed', $getfeed);
	
			
			Template::set_view('admin/reports/index');
			Template::render();
		
		}
	}
	
	//--------------------------------------------------------------------
	
	public function details($name=null) 
	{	
		//$all_entries = array();
		//$all_subs = array();
		
		$current_user_id = $this->auth->user_id();
		$current_user_roleid = $this->auth->role_id();
		$current_user_rolename = $this->auth->role_name_by_id($current_user_roleid);
		
		$this->load->model('stats_model', '', TRUE);
		
		$admin_num_users = $this->stats_model->get_usercount();
		$admin_num_entries = $this->stats_model->get_statscount();
		$admin_num_subs = $this->stats_model->get_subscount();
		
		$num_entries = $this->stats_model->get_stats($current_user_id);
		//$all_entries['entries'] = $this->userspage_model->get_all_stats($current_user_id);
		$all_entries = $this->stats_model->get_all_stats($current_user_id);
		
		$num_subs = $this->stats_model->get_subs($current_user_id);
		//$all_subs['submits'] = $this->userspage_model->get_all_subs($current_user_id);
		$all_subs = $this->stats_model->get_all_subs($current_user_id);
		
		Template::set('lbx_user_count', $admin_num_users);
		Template::set('lbx_stats_count', $admin_num_entries);
		Template::set('lbx_subs_count', $admin_num_subs);
		
		Template::set('lbx_user_page_views', $num_entries);
		Template::set('lbx_user_all_page_views', $all_entries);
		
		Template::set('lbx_user_form_subs', $num_subs);
		Template::set('lbx_user_all_form_subs', $all_subs);
		
		Template::set('user_id', $current_user_id);
		Template::set('role_id', $current_user_roleid);
		Template::set('role_name', $current_user_rolename);
		Template::set('type', $name);
		Template::set_view('admin/reports/details');
		Template::render();
	}
	
	//--------------------------------------------------------------------
	
}