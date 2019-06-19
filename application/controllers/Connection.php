<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Connection extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('user');
        $this->load->model('admin');
    }

	public function index()
	{
		$this->load->view('Connection');
    }
	public function connectionUser()
	{
		$this->load->view('Connexion');
    }
	
    public function verifier($user){
        $email = $this->input->post('email');
        $mdp = $this->input->post('password');
        if($user!=0){
            $result = $this->user->verify($email,$mdp);
            if($result!=null) {
                $this->session->set_userdata('admin',null);
                $this->session->set_userdata('user',$result);
            }
        }
        else{
            $result = $this->admin->verify($email,$mdp);
            if($result!=null) {
                $this->session->set_userdata('admin',null);
                $this->session->set_userdata('admin',$result);
                
        }
        }
        redirect('CrudUser');
    }
    public function deco(){
        $this->session->sess_destroy();
        redirect('Connection');
    }
    
}

