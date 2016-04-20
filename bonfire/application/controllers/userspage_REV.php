<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Userspage extends Front_Controller {

	function Userspage()
	{
		parent::__construct();	
	}
	
	function index()
	{
		Template::render();
	}
	
	function user($name)
	{

		$this->load->model('userspage_model', '', TRUE);
		$pagedata = $this->userspage_model->get_page($name);
		$userdata = $this->userspage_model->get_user($name);
		
		$this->load->model('content_model', '', TRUE);
		$default_footer_one = $this->content_model->find_all_by('name','content_footer_one');
		$default_footer_two = $this->content_model->find_all_by('name','content_footer_two');
		//$google_analytics = $this->content_model->find_all_by('name','google_analytics');
		$fb_footer = $this->content_model->find_all_by('name','fb_footer');
		$tw_footer = $this->content_model->find_all_by('name','tw_footer');
		Template::set('default_footer_one', $default_footer_one['content_footer_one']);
		Template::set('default_footer_two', $default_footer_two['content_footer_two']);
		//Template::set('google_analytics', $google_analytics['google_analytics']);
		Template::set('fb_footer', $fb_footer['fb_footer']);
		Template::set('tw_footer', $tw_footer['tw_footer']);
		
		if ($pagedata->active != 'yes')
		{
			redirect('/');
		}
		
		if (is_object($pagedata)) {
			Template::set_theme('linkbox');
			Template::set_message('This is an ALERT type message.', 'success');

			//set data from userpage table for content
			Template::set('user_busname', $pagedata->bus_name);
			Template::set('user_image', $pagedata->image);
			Template::set('user_id', $pagedata->users_id);
			Template::set('user_content', $pagedata->content);
			Template::set_block('address', 'userspage/address');
			Template::set('user_address', $pagedata->bus_street_1 .' '.$pagedata->bus_street_2);
			Template::set('user_city', $pagedata->bus_city);
			Template::set('user_state', $pagedata->bus_state_code);
			Template::set('user_zip', $pagedata->bus_zip);
			Template::set('user_phone', $pagedata->bus_phone);
			Template::set('user_email', $userdata->email);
			Template::set('get_vcard', $name);
			Template::set_view('userspage/user');
		} else {
			Template::set_view('userspage/index');
		}

		Template::render();
	}
	
	function locator()
	{
		Template::render('no_column');
	}
	
	/*function contact($name)
	{
		$this->load->model('userspage_model', '', TRUE);
		$pagedata = $this->userspage_model->get_page($name);
		if (is_object($pagedata)) {
			Template::set_theme('linkbox');
			Template::set_block('address', 'userspage/contact_form');
		}
		Template::render();
	}*/

	function write_stats()
	{
		//steps to write input from ajax to db
		$this->load->model('userspage_model', '', TRUE);
		$data = array(
			'user_id' => $_POST['user_id'],
			'ip_address' => $_POST['ip_address'],
			'ref' => $_POST['ref'],
			'agent' => $_POST['agent']
		);
		$this->userspage_model->write_stats($data);
		return;
	}
	
	function myvcard($name)
	{
		$this->load->model('userspage_model', '', TRUE);
		$pagedata = $this->userspage_model->get_page($name);
		$userdata = $this->userspage_model->get_user($name);
		/*
		Initialize an array to store the various vCard data
		*/
		$card_data = array();

		/*
		If you leave this blank, the current timestamp will be used.
		*/
		//$card_data['revision_date'] = "";

		/*
		Possible values are PUBLIC, PRIVATE, and CONFIDENTIAL. If you leave class
		blank, it will default to PUBLIC.
		*/
		//$card_data['class'] = "PUBLIC";

		/*
		Contact's name data.
		If you leave display_name blank, it will be built using the first and last name.
		*/
		//$card_data['display_name'] = "";
		$card_data['first_name'] = "".$userdata->first_name."";
		$card_data['last_name'] = "".$userdata->last_name."";
		//$card_data['additional_name'] = ""; //Middle name
		//$card_data['name_prefix'] = "";  //Mr. Mrs. Dr.
		//$card_data['name_suffix'] = ""; //DDS, MD, III, other designations.
		//$card_data['nickname'] = "";

		/*
		Contact's company, department, title, profession
		*/
		$card_data['company'] = "".$pagedata->bus_name."";
		//$card_data['department'] = "";
		//$card_data['title'] = "";
		//$card_data['role'] = "";

		/*
		Contact's work address
		*/
		//$card_data['work_po_box'] = "";
		//$card_data['work_extended_address'] = "";
		$card_data['work_address'] = "".$pagedata->bus_street_1."";
		$card_data['work_city'] = "".$pagedata->bus_city."";
		$card_data['work_state'] = "".$pagedata->bus_state_code."";
		$card_data['work_postal_code'] = "".$pagedata->bus_zip."";
		//$card_data['work_country'] = "United States of America";

		/*
		Contact's home address
		*/
		//$card_data['home_po_box'] = "";
		//$card_data['home_extended_address'] = "";
		//$card_data['home_address'] = "";
		//$card_data['home_city'] = "";
		//$card_data['home_state'] = "";
		//$card_data['home_postal_code'] = "";
		//$card_data['home_country'] = "United States of America";

		/*
		Contact's telephone numbers.
		*/
		$card_data['office_tel'] = "".$pagedata->bus_phone."";
		//$card_data['home_tel'] = "";
		//$card_data['cell_tel'] = "";
		//$card_data['fax_tel'] = "";
		//$card_data['pager_tel'] = "";

		/*
		Contact's email addresses
		*/
		$card_data['email1'] = "".$userdata->email."";
		//$card_data['email2'] = "";

		/*
		Contact's website
		*/
		//$card_data['url'] = "";

		/*
		Some other contact data.
		*/
		//$card_data['photo'] = "";  //Enter a URL.
		//$card_data['birthday'] = "";
		//$card_data['timezone'] = "";

		/*
		If you leave this blank, the class will default to using last_name or company.
		*/
		//$card_data['sort_string'] = "";

		/*
		Notes about this contact.
		*/
		$card_data['note'] = "";
		
		
		/*
		Now we load up the library.
		*/
		$this->load->library('vcard');
		
		/*
		Load the $card_data array into the library
		*/
		$this->vcard->load($card_data);
		
		/*
		Now we can generate a vCard in a variety of ways.
		*/
		
		// Generate a file on a server, providing a path and filename.
		// Path and filename are returned
		//$path_and_filename = $this->vcard->generate_file('/path/to/filename.vcf');
		
		// Generate a file on a server, providing only a path. Filename is generated.
		// Path and filename are returned
		//$path_and_filename = $this->vcard->generate_file('/path/to/');
		
		// Generate a vCard data string (to write to file yourself, etc.)
		//$this->vcard->generate_string();

		// Generate a vCard and force download to the browser, providing a filename
		//$this->vcard->generate_download('filename.vcf');
		
		// Generate a vCard and force download to the browser, generate a filename automatically
		$this->vcard->generate_download();
		
		//Template::set('vcard', $vstring);
	}
	
}

