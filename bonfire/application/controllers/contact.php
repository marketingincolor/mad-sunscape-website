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

    function dealer()
    {
        $this->load->model('content_model', '', TRUE);
        $default_footer_one = $this->content_model->find_all_by('name','content_footer_one');
        $default_footer_two = $this->content_model->find_all_by('name','content_footer_two');
        $google_analytics = $this->content_model->find_all_by('name','google_analytics');
        $fb_footer = $this->content_model->find_all_by('name','fb_footer');
        $tw_footer = $this->content_model->find_all_by('name','tw_footer');
        Template::set('default_footer_one', $default_footer_one['content_footer_one']);
        Template::set('default_footer_two', $default_footer_two['content_footer_two']);
        Template::set('google_analytics', $google_analytics['google_analytics']);
        Template::set('fb_footer', $fb_footer['fb_footer']);
        Template::set('tw_footer', $tw_footer['tw_footer']);

        Template::set('name', 'NO ID');

        $this->load->config('address');
        $this->load->model('userspage/userspage_model', '', TRUE);
        $data = array();
        $data['records'] = $this->userspage_model->get_active_pages();
        $us_data = array();
        $us_data['records'] = $this->userspage_model->get_active_us_pages();
        $ca_data = array();
        $ca_data['records'] = $this->userspage_model->get_active_ca_pages();

        Template::set('data_list', $data);
        Template::set('us_data_list', $us_data);
        Template::set('ca_data_list', $ca_data);

        Template::set('page_title', 'Find A Dealer');
        Template::render('dealer');
    }

	function join($id=0)
	{
		$this->load->model('content_model', '', TRUE);
		$default_footer_one = $this->content_model->find_all_by('name','content_footer_one');
		$default_footer_two = $this->content_model->find_all_by('name','content_footer_two');
		$google_analytics = $this->content_model->find_all_by('name','google_analytics');
		$fb_footer = $this->content_model->find_all_by('name','fb_footer');
		$tw_footer = $this->content_model->find_all_by('name','tw_footer');
		Template::set('default_footer_one', $default_footer_one['content_footer_one']);
		Template::set('default_footer_two', $default_footer_two['content_footer_two']);
		Template::set('google_analytics', $google_analytics['google_analytics']);
		Template::set('fb_footer', $fb_footer['fb_footer']);
		Template::set('tw_footer', $tw_footer['tw_footer']);

		//$id = (int)$this->uri->segment(4);
		if ($id != 0)
		{
			Template::set('name', $id);
		} else {
			Template::set('name', 'NO ID');
		}
		$this->load->config('address');
		$this->load->model('userspage/userspage_model', '', TRUE);
		$data = array();
		$data['records'] = $this->userspage_model->get_active_pages();
		$us_data = array();
		$us_data['records'] = $this->userspage_model->get_active_us_pages();
		$ca_data = array();
		$ca_data['records'] = $this->userspage_model->get_active_ca_pages();
		Template::set('data_list', $data);
		Template::set('us_data_list', $us_data);
		Template::set('ca_data_list', $ca_data);
		Template::set('page_title', 'Become A Dealer');
		Template::render('join_us');
	}

	function form($id=0)
	{
		$this->load->model('content_model', '', TRUE);
		$default_footer_one = $this->content_model->find_all_by('name','content_footer_one');
		$default_footer_two = $this->content_model->find_all_by('name','content_footer_two');
		$google_analytics = $this->content_model->find_all_by('name','google_analytics');
		$fb_footer = $this->content_model->find_all_by('name','fb_footer');
		$tw_footer = $this->content_model->find_all_by('name','tw_footer');
		Template::set('default_footer_one', $default_footer_one['content_footer_one']);
		Template::set('default_footer_two', $default_footer_two['content_footer_two']);
		Template::set('google_analytics', $google_analytics['google_analytics']);
		Template::set('fb_footer', $fb_footer['fb_footer']);
		Template::set('tw_footer', $tw_footer['tw_footer']);
		
		//$id = (int)$this->uri->segment(4);
		if ($id != 0)
		{
			Template::set('name', $id);
		} else {
			Template::set('name', 'NO ID');
		}
		$this->load->config('address');
		$this->load->model('userspage/userspage_model', '', TRUE);
	    $data = array();
		$data['records'] = $this->userspage_model->get_active_pages();
        $us_data = array();
        $us_data['records'] = $this->userspage_model->get_active_us_pages();
        $ca_data = array();
        $ca_data['records'] = $this->userspage_model->get_active_ca_pages();

	    Template::set('data_list', $data);
        Template::set('us_data_list', $us_data);
        Template::set('ca_data_list', $ca_data);

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
			'type' => $_POST['msg_type'],
			'user_id' => $_POST['user_id'],
			//'user_sms' => $_POST['user_sms'],
			'status'=> '0',
			'deleted'=> '0',
			'data' => json_encode($jsondata)
		);
		
		$this->load->library('email');
		// use IF or SWITCH statement to determine what mail to send based on value of TYPE and/or USER_ID
		switch ($_POST['msg_type']) {
			
	    case 'contact': //email sent due to the User's page form being submitted
			$this->email->from('no_reply@sunscape.com', 'Sunscape Admin');
			$this->email->to(''.$_POST['to_email'].'');
			$this->email->subject('Sunscape Customer Inquiry');
			$emailmsg = 'You have received an inquiry from someone interested in learning more about Sunscape window film on '.date("F j, Y, g:i a").' (ET). Please follow up as soon as possible:
 
Name: '.$_POST['first_name'].' '.$_POST['last_name'].'
Phone: '.$_POST['phone'].'
Email: '.$_POST['email'].'
 
Comments: '.$_POST['comments'].'
 
You can keep track of all your WebNet activity at www.sunscapefilms.com/login (login required)

';
			$this->email->message($emailmsg);
			$this->email->send();

			if ($_POST['user_sms']) {
				mail(''.$_POST['user_sms'].'', 'Sunscape Customer Inquiry', 'Your WebNet Site has just captured a contact request. Please check your email to respond as soon as possible.', 'FROM: Webnet');
			}
			break;
			
	    case 'info': //email sent due to the Contact Us form on the main site being submitted
			$this->email->from('no_reply@sunscape.com', 'Sunscape Admin');
			//$this->email->to('lmessing@madico.com');
		    $this->email->to('windowfilm@madico.com');
			$this->email->subject('Sunscape Dealer Inquiry');
			$emailmsg = 'You have received an inquiry from someone interested in becoming a Sunscape dealer on '.date("F j, Y, g:i a").' (ET). Please follow up as soon as possible:
 
Name: '.$_POST['first_name'].' '.$_POST['last_name'].'
Phone: '.$_POST['phone'].'

Company: '. $_POST['address_1'].'
City: '.$_POST['city'].'
State: '.$_POST['state'].'
ZIP: '.$_POST['zip'].'

Email: '.$_POST['email'].'
 
Comments: '.$_POST['comments'].'

';
			$this->email->message($emailmsg);
			$this->email->send();
			
			//if ($_POST['user_sms']) {
			//	mail(''.$_POST['user_sms'].'', 'Sunscape Customer Inquiry', 'Your WebNet Site has just captured a contact request. Please check your email to respond as soon as possible.', 'FROM: Webnet');
			//}
			break;
			
	    default:
	
			break;
		}

		$this->contact_model->write_data($data);
		//return json_encode($jsondata);
		return true;
	}
	
}