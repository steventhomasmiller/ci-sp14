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
        
        
        $this->load->view('mailing_list/view_mailing_list',$data);
        
        $this->load->view('footer',$data);         //current running object
    }
	
	public function view($id){ //This will show us the data from a single page
        $this->load->model('Mailing_list_model');
        $data['query'] = $this->Mailing_list_model->get_id($id);
        
        $data['title'] = "Here is the title tag.";
        $data['style'] = "amelia.css";
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
	}//end add()
	
	public function insert()
	{//will insert the data entered via add()
		$this->load->model('Mailing_list_model');
		$this->load->library('form_validation');
		//must have at least one validation rule to insert
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('first_name','First Name','trim|required');
		$this->form_validation->set_rules('last_name','Last Name','trim|required');
		$this->form_validation->set_rules('address','Address','trim|required');
		$this->form_validation->set_rules('state_code','State','trim|required');
		$this->form_validation->set_rules('zip_postal','Zip Code','trim|required');
		$this->form_validation->set_rules('password','Username','trim|required');
		
		if($this->form_validation->run() == FALSE)
		{//failed validation; send back to form
			//VIEW DATA ON FAILURE GOES HERE
			$this->load->helper('form');
			$data['title'] = "AHHHHHHH.";
			$data['style'] = "cerulean.css";
			$data['banner'] = "Data entry error. Sorry.";
			$data['copyright'] = "Copyright and such";
			$data['base_url'] = base_url();
			$this->load->view('header',$data);
			
			$this->load->view('mailing_list/add_mailing_list',$data);
			
			$this->load->view('footer',$data);

			
			//echo "insert failed!";
		}else{//insert data
			$post=array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'email' => $this->input->post('email'),
				'address' => $this->input->post('address'),
				'state_code' => $this->input->post('state_code'),
				'zip_postal' => $this->input->post('zip_postal'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'bio' => $this->input->post('bio'),
				'interests' => $this->input->post('interests'),
				'num_tours' => $this->input->post('num_tours')
			);
			
			$this->Mailing_list_model->insert($post);
			echo "Data inserted?";
		}
	}
	
}

 //classes extend complex code	

 /*
userid: 1
first_name: John
last_name: Doe
email: john@example.com
address: 123 Any Street
state_code: WA
zip_postal: 98111
username: johnd
password: abc123
bio: Hi! I'm John, and here's my Bio!
interests: golf,hiking,billiards
num_tours: 1
*/

 
?>