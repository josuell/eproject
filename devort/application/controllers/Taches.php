<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Taches extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('admin');
        $this->load->model('tache');
        $this->load->model('roles');
    }

	
    public function index(){
        $data = array(
			'page' => 'contenu/creeProjet'
		);
        $this->load->view('index',$data);
    }
    public function voirMyProjet($idcategorie){
        
        if($this->session->has_userdata('user')){
            $user = $this->session->userdata('user')->IDUSER;
            $result = $this->roles->getProjetUserbycategorie($user,$idcategorie);
            $detail = $this->tache->getdetailtache();
            $data = array(
                'page' => 'contenu/tache/create',
                'projet' => $result,
                'detail' => $detail
            );
            $this->load->view('index',$data);
        }
        else redirect('Connection/ConnectionUser');
    }
    public function voirMyProjets(){
        
        if($this->session->has_userdata('user')){
            $user = $this->session->userdata('user')->IDUSER;
            $result = $this->roles->getMyProjet($user);
            $detail = $this->tache->getdetailtache();
            
            $data = array(
                'page' => 'contenu/tache/create',
                'projet' => $result,
                'detail' => $detail
            );
            $this->load->view('index',$data);
        }
        else redirect('Connection/ConnectionUser');
    }
    public function voirMyTache($idcategorie){
        
        if($this->session->has_userdata('user')){
            $user = $this->session->userdata('user')->IDUSER;
            $result = $this->roles->getProjetUserbycategorie($user,$idcategorie);
            // $detail = $this->tache->getdetailtache();
            $data = array(
                'page' => 'contenu/tache/voir',
                'projet' => $result,
            );
            $this->load->view('index',$data);
        }
        else redirect('Connection/ConnectionUser');
    }
    public function creationTache(){
        if($this->session->has_userdata('user')){
            $projet = $this->input->get('projet');
            $detail = $this->input->get('detail');
            $nomtache = $this->input->get('nom');
            $estimation = $this->input->get('estimation');
            $estimation = $this->admin->setTimeToSecond($estimation);
            $rep = $this->tache->create($detail,$projet,$nomtache,$estimation,0,0,0);
            echo $rep;
            redirect('Taches/voirMyProjets');
        }
        else redirect('Connection/ConnectionUser');
    }
    public function modif($idtache){
        if($this->session->has_userdata('user')){
            $tache = $this->tache->get($idtache);
            $Testime = $this->admin->secondtotime($tache->TEMPSESTIME);
            $passe = $this->admin->secondtotime($tache->TEMPSPASSE);
            $reste = $this->admin->secondtotime($tache->TEMPSRESTE);
            $data = array(
                'page' => 'contenu/tache/edit',
                'tache' => $tache,
                'tempsEstime' => $Testime,
                'tempspasse' => $passe,
                'resteafaire' => $reste,
            );
             $this->load->view('index',$data);
        }
        else redirect('Connection/ConnectionUser');
    }
    public function editing(){
        if($this->session->has_userdata('user')){
            $estimation = $this->input->get('estimation');
            $tempsfait = $this->input->get('tempsfait');
            $reste = $this->input->get('reste');
            $etat = $this->input->get('etat');
            $nom = $this->input->get('nom');
        $idtache = $this->input->get('id');
        $estimation = $this->admin->setTimeToSecond($estimation);
        $tempsfait = $this->admin->setTimeToSecond($tempsfait);
        $reste = $this->admin->setTimeToSecond($reste);
        $this->tache->edit($idtache,$nom,$estimation,$tempsfait,$reste,$etat);
        redirect('Taches/voirMyProjets');
    }
    else redirect('Connection/ConnectionUser');
}
    public function delete($idtache){
        if($this->session->has_userdata('user')){
            $this->tache->delete($idtache);
            redirect('Taches/voirMyProjets');
        }
        else redirect('Connection/ConnectionUser');
    }
    public function getTache($idprojet){
        $tache = $this->tache->getTache($idprojet); 
        echo json_encode($tache) ;
    }

    public function voirTache($idprojet){
        if($this->session->has_userdata('user')){
            $mytache = $this->tache->getMyTache($this->session->userdata('user')->IDUSER,$idprojet);
           
            $data = array(
                'page' => 'contenu/tache/avancement',
                'listetache' => $mytache
               
            );
             $this->load->view('index',$data);
        }
        else redirect('Connection/ConnectionUser');
    }
    public function avancement($idtache){
        if($this->session->has_userdata('user')){
            $tache = $this->tache->get($idtache);
            $Testime = $this->admin->secondtotime($tache->TEMPSESTIME);
            $passe = $this->admin->secondtotime($tache->TEMPSPASSE);
            $reste = $this->admin->secondtotime($tache->TEMPSRESTE);
            $data = array(
                'page' => 'contenu/tache/validerAvancement',
                'tache' => $tache,
                'tempsEstime' => $Testime,
                'tempspasse' => $passe,
                'resteafaire' => $reste,
            );
             $this->load->view('index',$data);
        }
        else redirect('Connection/ConnectionUser');
    }
}
