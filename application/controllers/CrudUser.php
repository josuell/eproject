<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CrudUser extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('categorie');
        $this->load->model('user');
        $this->load->model('roles');
        $this->load->model('projet');
        $this->load->model('admin');
    }

    public function index()
    {
        $msg = "";
        if ($this->session->flashdata('msg') != null)
            $msg = $this->session->flashdata('msg');
        if ($this->session->has_userdata('admin')) {
            $user = $this->session->userdata('admin');
        } else if ($this->session->has_userdata('user')) {
            $user = $this->session->userdata('user');
        } else redirect('Connection');

        $data = array(
            'page' => 'contenu/accueil',
            'msg' => $msg,
            'user' => $user
        );
        $this->load->view('index', $data);
    }

    public function ajout()
    {
        if ($this->session->has_userdata('admin')) {
            $user = $this->session->userdata('admin');
        } else if ($this->session->has_userdata('user')) {
            $user = $this->session->userdata('user');
        } else redirect('Connection');
        $categorie = $this->categorie->getAll();
        $msg = "";
        if ($this->session->flashdata('msg') != null)
            $msg = $this->session->flashdata('msg');
        $data = array(
            'page' => 'contenu/ajout',
            'categorie' => $categorie,
            'msg' => $msg
        );
        $this->load->view('index', $data);
    }

    public function validerAjout()
    {
        if ($this->session->has_userdata('admin')) {
            $user = $this->session->userdata('admin');
        } else if ($this->session->has_userdata('user')) {
            $user = $this->session->userdata('user');
        } else redirect('Connection');
        $nom = $this->input->post('nom');
        $prenom = $this->input->post('prenom');
        $email = $this->input->post('email');
        $mdp = $this->input->post('mdp');
        $nameimage = "";
        $config['upload_path'] = './assets/img/profil/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 0;
        $config['max_width'] = 0;
        $config['max_height'] = 0;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('image')) {
            $uploaded = $this->upload->data();
            $nameimage = $uploaded['file_name'];
        }
        echo $nameimage;
        $this->user->create($nom, $prenom, $email, $mdp, $nameimage);
        $this->session->set_flashdata('msg', 'Utilisateur ajouter avec success');
        redirect('CrudUser/ajout');
    }

    public function profil()
    {
        if ($this->session->has_userdata('user')) {
            $utilisateur = $this->session->userdata('user');
            $user = $this->session->userdata('user')->IDUSER;
            $projet = $this->roles->getMyProjet($user);
            $data = array(
                'projet' => $projet,
                'page' => 'contenu/profilUser',
                'user' => $utilisateur
            );
            $this->load->view('index', $data);
        } else redirect('Connection/connectionUser');
    }

    public function profilseul($iduser)
    {
        if ($this->session->has_userdata('admin')) {
            $user = $this->session->userdata('admin');
        } else {
            redirect('Connection');
        }
        $utilisateur = $this->user->get($iduser);
        $projet = $this->roles->getMyProjet($iduser);
        $data = array(
            'projet' => $projet,
            'page' => 'contenu/profil',
            'user' => $utilisateur
        );
        $this->load->view('index', $data);
    }

    public function listUser()
    {
        if ($this->session->has_userdata('admin')) {
            $user = $this->session->userdata('admin');
        } else redirect('Connection');
        $alluser = $this->user->get_entries();
        $data = array(
            'alluser' => $alluser,
            'page' => 'contenu/list'
        );
        $this->load->view('index', $data);
    }

    public function creerAdmin()
    {
        $this->admin->create("RAKOTO", "Arisoa", "arisoa@yahoo.com", "arisoa");
    }

    public function gantt()
    {
        $projets = $this->projet->get_entries();
        $data = array(
            'page' => 'contenu/gantt',
            'projets' => $projets
        );
        $this->load->view('index', $data);
    }
}
