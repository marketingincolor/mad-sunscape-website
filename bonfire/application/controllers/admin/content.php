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

class Content extends Admin_Controller {

	//--------------------------------------------------------------------

	public function __construct() 
	{
		parent::__construct();
		
		Template::set('toolbar_title', 'Content');
		
		$this->auth->restrict('Site.Content.View');
	}
	
	//--------------------------------------------------------------------	

	public function index() 
	{	
		$this->load->model('content_model', '', TRUE);
		if ($this->input->post('submit'))
		{
			if ($this->save_settings())
			{
				Template::set_message('Your settings were successfully saved.', 'success');
				redirect(SITE_AREA .'/content');
			} else 
			{
				Template::set_message('There was an error saving your settings.', 'error');
			}
			
			
			
		}
		// Read our current settings
		$info = $this->find_all();
		
		Template::set('info', $info);

		Template::set_view('admin/content/index');
		Template::render();
	}
	
	//--------------------------------------------------------------------
	
	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------
	
	private function save_settings() 
	{
		
		$data = array(
			array('name' => 'content_footer_one', 'value' => $this->input->post('content_footer_one')),
			array('name' => 'content_footer_two', 'value' => $this->input->post('content_footer_two')),
			array('name' => 'fb_footer', 'value' => $this->input->post('fb_footer')),
			array('name' => 'tw_footer', 'value' => $this->input->post('tw_footer')),
			array('name' => 'google_analytics', 'value' => $this->input->post('google_analytics')),

		);
		
		// Log the activity
		//$this->activity_model->log_activity($this->auth->user_id(), lang('bf_act_settings_saved').': ' . $this->input->ip_address(), 'core');

		// save the settings to the DB
		$updated = $this->content_model->update_batch($data, 'name');
		
		return $updated;
	}
	
	public function find_all()
	{
		$results = $this->content_model->find_all();
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
	//--------------------------------------------------------------------

}