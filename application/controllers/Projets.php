<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projets extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('projet');
        $this->load->model('user');
        $this->load->model('categorie');
        $this->load->model('roles');
    }

    public function index()
    {
        $data = array(
            'page' => 'contenu/creeProjet'
        );
        $this->load->view('index', $data);
    }

    public function creeProjet()
    {
        if ($this->session->has_userdata('admin')) {

            $nom = $this->input->get('nom');
            $debut = $this->input->get('debut');
            $fin = $this->input->get('fin');
            $data = $this->session->userdata('admin');
            $this->projet->create($nom, $data->IDADMIN, $debut, $fin);
            $this->session->set_flashdata('msg', 'projet créé avec success');
            redirect('CrudUser');
        } else redirect('Connection');
    }

    public function affecter()
    {
        if ($this->session->has_userdata('admin')) {
            $user = $this->session->userdata('admin');
            $user = $this->user->get_entries();
            $cat = $this->categorie->getAll();
            $projet = $this->projet->get_entries();
            $data = array(
                'page' => 'contenu/assignationProjet',
                'user' => $user,
                'categorie' => $cat,
                'projet' => $projet
            );
            $this->load->view('index', $data);
        } else redirect('Connection');
    }

    public function affecterProjet()
    {
        if ($this->session->has_userdata('admin')) {

            $idprojet = $this->input->POST('projet');
            $iduser = $this->input->post('user');
            $categorie = $this->input->post('categorie');

            if ($this->roles->getProjetUser($idprojet, $iduser) == null)
                $this->roles->create($idprojet, $iduser, $categorie);
            redirect('CrudUser');
        } else redirect('Connection');
    }

    public function avancement()
    {
        $avancement = $this->projet->avancementProjet();
        $data = array(
            'page' => 'contenu/projet/EtatProjet',
            'avancement' => $avancement
        );
        $this->load->view('index', $data);
    }

    public function tauxOccupationProjet($idprojet)
    {
        $taux = $this->projet->getTauxOccupationProjet($idprojet);
        $data = array(
            'page' => 'contenu/projet/tauxProjet',
            'taux' => $taux
        );
        $this->load->view('index', $data);
    }

    public function tauxOccupationAllProjet(){
        $taux = $this->projet->getTauxOccupationAllProjet();
        $data = array(
            'page' => 'contenu/projet/tauxAll',
            'taux' => $taux
        );
        $this->load->view('index', $data);
    }
    public function avancementTL(){
        $avancement = $this->projet->avancementProjetTL();
        $data = array(
            'page' => 'contenu/projet/etatParTeamlead',
            'avancement' => $avancement
        );
        $this->load->view('index',$data);
    }
}
