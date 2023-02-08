<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(APPPATH . 'controllers/MySession.php');
    class Home extends MySession{

        public function loading(){
            $this->load->view('pages/home');
        }

        public function saveCategories(){
            $nom = $this->input->get('nom');
            $this->load->model('news_model');
            $this->news_model->insertCategories($nom);
            redirect('home/getAllcategories');
        }
        
        public function getById($pseudo = ''){
            $this->load->model('news_model');
            $id = $pseudo;
            $tab['categories'] = $this->news_model->getCategoriesById($id);
            $this->load->view('pages/home',$tab);
            return $tab;
        }

        public function modifyCategories(){
            $nom = $this->input->get('nom');
            $idCat = $this->input->get('id');
            // $categorie['categorie'] = $this->getById($idCat);
            $this->load->model('news_model');
            $this->news_model->updateCategories($nom,$idCat);
            // $this->load->view('/pages/home',$categorie);
            redirect('home/getAllCategories');
            // return $categorie;
        }

        public function getAllCategories(){
            $this->load->model('news_model');
            $this->load->model('User_model','user_model');
            $tab = array();
            $oui = $this->user_model->getCountChange();
		    $non = $this->user_model->getCountNon();
		    $all = $this->user_model->getAllUser();
            $tab['cat'] = $this->news_model->getAllCategories();
            if ($all == null) $all =0 ;
            if ($oui == null) $oui = 0;
            if ($non == null) $non = 0;     
            $tab['all'] = $all;  
            $tab['oui'] = $oui;  
            $tab['non'] = $non; 
            $this->load->view('/pages/home',$tab);
            // var_dump($tab);
        }
  
        public function deleteCategories($pseudo = ''){
            $this->load->model('news_model');
            $idcat = $pseudo;
            $this->news_model->supprimerCategorie($idcat);
            redirect('home/getAllCategories');
        }
        

    }
?>