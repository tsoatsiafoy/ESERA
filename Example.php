<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Example extends CI_Controller{
        public function getProduit(){
            $data = array();
            $data['all'] = $this->getAllProduit();
            $data['list'] = $this->getMyProduit();
            $this->load->view('pages/',$data);
        }

        public function getMyProduit(){
            $this->load->model('News_model');
            $list = $this->news_model->getMyProduit();
            return $list;
        }

        public function getAllProduit(){
            $this->load->model('News_model');
            $list = $this->news_model->getAllProduit();
            return $list;
        }
//start here
        public function echanger($pseudo = ''){
            $idProduit = $pseudo;
            $this->load->model;
            $data['produit1'] = $this->getById($idProduit);
            $data['allProduit'] = $this->getMyProduit();
            $this->load->view('pages/liste',$data);
        }

        public function valider($pseudo1= '',$pseudo2=''){
            $idP1 = $pseudo1; $idP2 = $pseudo2;
            $this->load->model('News_model');
            $this->news_model->insertEchange($idP1,$idP2);
            redirect('');
        }

        public function listProposition(){
            $this->load->model('News_model');
            $data = array();
            $data = $this->news_model->listProposition();
            $prod = array();$prod1 = array();$user = array();$listUser = array();
            for ($i=0; $i < count($data); $i++) { 
                $prod[] = $this->getById($data[$i]['idP1']);
                $prod1[] = $this->getById($data[$i]['idP2']);
                $user[] = $this->news_model->getUserById($prod1[$i]['idUser']);
                $listUser[] = $user;
            }
            $data1['prod'] = $prod;$data1['prod2']; $data['listUser'] = $listUser;

        }

        public function rechercher(){
            $this->load->model('news_model');
            $mot = $this->input->post('mot');
            $cat = $this->input->post('idCat');
            $data = $this->news_model->rechercher($mot,$cat);
            $listProduit = array(); $temp = array();
            for ($i=0; $i < count($data); $i++) { 
               $temp = $this->news_model->getByIdProduit($data[$i]);
               $listProduit[] = $temp;
            }
            $data1 = array();
            $data1['listProduit'] = $listProduit;
            $this->load->view('',$data1);
        }
    }
?>