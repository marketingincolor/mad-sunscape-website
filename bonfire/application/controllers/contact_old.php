<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends Front_Controller {

	function Contact()
	{
		parent::__construct();	
	}
	
	function index()
	{
		Template::render('contact_us');
	}
	
	function form($id=0)
	{
		$this->load->model('content_model', '', TRUE);
		$default_footer_one = $this->content_model->find_all_by('name','content_footer_one');
		$default_footer_two = $this->content_model->find_all_by('name','content_footer_two');
		$google_analytics = $this->content_model->find_all_by('name','google_analytics');
		Template::set('default_footer_one', $default_footer_one['content_footer_one']);
		Template::set('default_footer_two', $default_footer_two['content_footer_two']);
		Template::set('google_analytics', $google_analytics['google_analytics']); 
		//$id = (int)$this->uri->segment(4);
		if ($id != 0)
		{
			Template::set('name', $id);
		} else {
			Template::set('name', 'NO ID');
		}
		Template::set('page_title', 'Find A Dealer');
		Template::render('contact_us');
	}
	
	function submit()
	{
		//steps to write input from ajax to db
		$this->load->model('contact_model', '', TRUE);
		$jsondata = array(
			'first_name' => $_POST['first_name'],
			'last_name' => $_POST['last_name'],
			'address_1' => $_POST['address_1'],
			'address_2' => $_POST['address_2'],
			'city' => $_POST['city'],
			'state' => $_POST['state'],
			'zip' => $_POST['zip'],
			'email' => $_POST['email'],
			'phone' => $_POST['phone'],
			'comments' => $_POST['comments']
		);
		$data = array(
			'type' => $_POST['type'],
			'user_id' => $_POST['user_id'],
			'status'=> '0',
			'deleted'=> '0',
			'data' => json_encode($jsondata)
		);
		
		$this->load->library('email');

		$this->email->from('no_reply@sunscape.com', 'Sunscape Admin');
		$this->email->to('etwilbeck@marketingincolor.com, jparrish@marketingincolor.com');
		$this->email->subject('Sunscape Dealer Inquiry');
		$emailmsg = 'You have received an inquiry from someone interested in becoming a Sunscape dealer on '.date("F j, Y, g:i a").'. Please follow up as soon as possible:';
		$emailmsg .= 'Name: '.$_POST['first_name'].' '.$_POST['last_name'].'';
		$emailmsg .= 'Phone: '.$_POST['phone'].'';
		$emailmsg .= 'Email: '.$_POST['email'].'';
		$emailmsg .= ' ';
		$emailmsg .= 'Comments: '.$_POST['comments'].'';
		$this->email->message($emailmsg);
		$this->email->send();
		
		$this->contact_model->write_data($data);
		//return json_encode($jsondata);
		return true;
	}
	
	
}