<?php
//news.php is a codeigniter controller

class News extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}

	/* public function index(){ //We are making data available to our header and footer
        $this->load->model('Mailing_list_model');
        $data['query'] = $this->Mailing_list_model->get_mailing_list();
        
        $data['title'] = "Here is the title tag.";
        $data['style'] = "cerulean.css";
        $data['banner'] = "Here is our website";
        $data['copyright'] = "Copyright and such";
        $data['base_url'] = base_url();
        
        $this->load->view('header',$data);
        
        
        $this->load->view('mailing_list/view_mailing_list_detail',$data);
        
        $this->load->view('footer',$data);         //current running object
    }*/
	
	public function index(){ //This will show us the data from a single page
		$request = "https://news.google.com/news/feeds?pz=1&cf=all&ned=us&hl=en&output=rss";
        $this->load->model('News_model');
        $data['xml'] = $this->News_model->get_news($request);
        
        $data['title'] = "Here is the title tag.";
        $data['style'] = "amelia.css";
        $data['banner'] = "My website";
        $data['copyright'] = "Copyright and such";
        $data['base_url'] = base_url();
        
        $this->load->view('news_view',$data);
        
        
        $this->load->view('news_view',$data);
        
        $this->load->view('footer',$data);         //current running object
    }



} //classes extend complex code	
	
?>