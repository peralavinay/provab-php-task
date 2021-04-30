


<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Home extends CI_Controller {

	function  __construct() {
        parent::__construct();
        $this->load->model('Hotel_model');
		
    }

	public function index()
	{
		if(isset($_SESSION['user_logged'])) { 
			redirect(base_url('user'),"refresh");
		}
		$data = array() ;
		$this->load->view('index');
	}

	public function login()
	{
		$data = array() ;
		$this->load->view('login');
	}

	public function json()
	{
		$data = array() ;
		$this->load->view('json_file');
	}

	public function hotel()
	{
		$hotel = $this->Hotel_model->fetch_hotels();
		$data = array() ;          
		$this->data['hotel'] = $hotel;
		$this->load->view('hotels',$this->data);
	}

	public function book()
	{
		$id = $_POST['id'];
		$json = file_get_contents('./images/hotelAvailability_Response (2).json');
        $obj  = json_decode($json, true);
        $data = $obj['result'];
		foreach ($data as $a) {
            if($a['hotel_id']==$id)
            {
                $hotel = $a;
            }
        }
    	// $hotel = $this->Hotel_model->get_hotel($id);
		$data = array() ;
		$data['hotel'] = $hotel;
		$this->load->view('book_hotel',$data);
	}

	public function user()
	{
		if(isset($_SESSION['user_id'])) {
            //check user database
            $this->db->select('*');
            $this->db->from('users');
            $this->db->where(array('id'=>$_SESSION['user_id']));
            $query = $this->db->get();
            $user = $query->row();
			$data = array() ;
			$this->data['user'] = $user;
			$this->load->view('user',$this->data);
		}
		else{
			redirect(base_url('login'));
		}
		
	}
		
}
