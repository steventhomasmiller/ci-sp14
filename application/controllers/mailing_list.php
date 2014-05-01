<?php
//mailing_list.php is a codeigniter controller

class Mailing_list extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}

	public function index(){ //We are making data available to our header and footer
        $this->load->model('Mailing_list_model');
        $data['query'] = $this->Mailing_list_model->get_mailing_list();
        
        $data['title'] = "Here is the title tag.";
        $data['style'] = "amelia.css";
        $data['banner'] = "Here is our website";
        $data['copyright'] = "Copyright and such";
        $data['base_url'] = base_url();
        
        $this->load->view('header',$data);
        
        
        $this->load->view('mailing_list/view_mailing_list_detail',$data);
        
        $this->load->view('footer',$data);         //current running object
    }
	
	public function view($id){ //This will show us the data from a single page
        $this->load->model('Mailing_list_model');
        $data['query'] = $this->Mailing_list_model->get_id($id);
        
        $data['title'] = "Here is the title tag.";
        $data['style'] = "cerulean.css";
        $data['banner'] = $id;
        $data['copyright'] = "Copyright and such";
        $data['base_url'] = base_url();
        
        $this->load->view('header',$data);
        
        
        $this->load->view('mailing_list/view_mailing_list_detail',$data);
        
        $this->load->view('footer',$data);         //current running object
    } //end view()

	public function add()
	{//is a form to add a new record
		$this->load->helper('form');
        $data['title'] = "Here is the title tag.";
        $data['style'] = "cerulean.css";
        $data['banner'] = "Add a record, NOW!";
        $data['copyright'] = "Copyright and such";
        $data['base_url'] = base_url();
		$this->load->view('header',$data);
        
        $this->load->view('mailing_list/add_mailing_list',$data);
        
        $this->load->view('footer',$data);         //current running object
	}
	
	public function insert()
	{//will insert the data entered via add()
	
	}
	

} //classes extend complex code	
	
?>