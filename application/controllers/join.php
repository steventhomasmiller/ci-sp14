<?php
//join.php is a codeigniter controller

class Join extends CI_Controller {

	public function index(){ //We are making data available to our header and footer
		$this->load->model('MailList_model');
		$data['mail_list'] = $this->MailList_model->get_maillist();
		
		$data['title'] = "Here is our title tag.";
		$this->load->view('header',$data);
		//var_dump($data['mail_list']);
		$this->load->view('footer',$data); 		//current running object
	} 

} //classes extend complex code	
	
?>