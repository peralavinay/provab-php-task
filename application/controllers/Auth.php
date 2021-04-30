<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

    public function logout()
	{
		unset($_SESSION);
		session_destroy();
		redirect(base_url('login'),"refresh");
	}

    public function register(){

		if (isset($_POST['register'])) 
		{
            $config=[
				'upload_path' => './images',
	        	'allowed_types' => 'jpg|png|jpeg',
				];
	        $this->load->library('upload', $config);
            
            if ($this->upload->do_upload('profile'))
		    {
				$formArray = array();
			    $formArray['fname'] = $this->input->post('fname');
			    $formArray['lname'] = $this->input->post('lname');
			    $formArray['designation'] = $this->input->post('design');
			    $formArray['dob'] = $this->input->post('dob');
			    $formArray['email'] = $this->input->post('email');
			    $formArray['mobile'] = $this->input->post('mobile');
			    $formArray['password'] = $this->input->post('pass');
			    $formArray['dt'] = date('Y-m-d');
			    $formArray['tm'] = date('H:i:s');
                $formArray['profile_img'] = $this->upload->data('file_name');

			    $this->db->insert('users',$formArray);
		    	$this->session->set_flashdata('success','Registration Successfull');
		    	redirect(base_url('login'));
		    }
		    else
		    {
		    	$this->session->set_flashdata('error','Registration Failed');
		    	redirect(base_url('register'));
		    	
		    }
			
		}
    }

    public function login()
	{
		if(isset($_SESSION['user_logged']))
		{
			redirect(base_url('user'));
		}
		if (isset($_POST['email']) && isset($_POST['password'])) 
		{
            // print_r($_POST);
            // die();
			$this->form_validation->set_rules("email","Email ID","required|valid_email");
			$this->form_validation->set_rules("password","Password","required");
			if ($this->form_validation->run() == TRUE)
		    {
		    	$email = $_POST['email'];
		    	$password = $_POST['password'];

		    	//check user database
		    	$this->db->select('*');
		    	$this->db->from('users');
		    	$this->db->where(array('email'=>$email,'password'=>$password));
		    	$query = $this->db->get();
		    	$user = $query->row();
		    	//if user exists
		    	if ($user->email) 
		    	{
		    		//temporary message
		    		$this->session->set_flashdata("success","You are logged in.");

		    		//set session variables
		    		$_SESSION['user_logged'] = TRUE;
		    		$_SESSION['email'] = $user->email;
                    $_SESSION['user_id'] = $user->id;

		    		//regiresct to profile page

		    		redirect(base_url('user'),"refresh");
		    	}
		    	else
		    	{
		    		$this->session->set_flashdata("error","No Account Found");
		    		redirect(base_url('login'),"refresh");

		    	}
		    }
		}

		// $this->load->view('login');
	}

    public function update() {
        

        if (isset($_POST['update'])) 
        {
            $config=[
                'upload_path' => './images',
                'allowed_types' => 'jpg|png|jpeg',
                ];
            $this->load->library('upload', $config);
            
            if ($this->upload->do_upload('profile'))
            {
                $formArray = array();
                $formArray['fname'] = $this->input->post('fname');
                $formArray['lname'] = $this->input->post('lname');
                $formArray['designation'] = $this->input->post('design');
                $formArray['dob'] = $this->input->post('dob');
                $formArray['email'] = $this->input->post('email');
                $formArray['mobile'] = $this->input->post('mobile');
                $formArray['password'] = $this->input->post('pass');
                $formArray['dt'] = date('Y-m-d');
                $formArray['tm'] = date('H:i:s');
                $formArray['profile_img'] = $this->upload->data('file_name');

                $this->db->where('id',$_SESSION['user_id'])->update('users',$formArray);
                $this->session->set_flashdata('success','Updated Successfully');
                redirect(base_url('user'));
            }
            else
            {
                $this->session->set_flashdata('error','Updation Failed');
                redirectbase_url(('user'));
                
            }
        }
    }

    public function json() {
        $json = file_get_contents('./images/hotelAvailability_Response (2).json');
        $obj  = json_decode($json, true);
        $data = $obj['result'];

        foreach($data as $a) {
            $formArray = array();
            $formArray['hotel_name'] = $a['hotel_name'];
            $formArray['address'] = $a['address'];
            $formArray['stars'] = $a['stars'];
            $formArray['photo'] = $a['photo'];
            $formArray['price'] = $a['price'];
            $formArray['hotel_currency_code'] = $a['hotel_currency_code'];
            $formArray['hotel_id'] = $a['hotel_id'];

            $this->db->insert('hotel',$formArray);
            
        }
        
    }



}