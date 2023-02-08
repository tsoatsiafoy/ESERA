<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    require_once(APPPATH . 'controllers/MySession.php');

    class Example extends MySession{
        public function __construct(){
            parent::__construct();
            $this->load->helper(array('form','url'));
        }

        public function deconexion(){
            $this->session->unset_userdata('user');
            redirect('welcome/login');
        } 
        public function do_upload(){
            var_dump($_FILES);
            $config['upload_path']='./assets/image/';
            $config['allowed_types'] = 'gif|gif|png|txt|jpeg';
            $config['max_size'] = 100000000;
            $config['max_width'] = 5000000;
            $config['max_height'] = 2000000;
            $this->load->library('upload',$config);
            if (!$this->upload->do_upload('up')) {
                print_r($this->upload->display_errors());
            }
            $this->upload->data();
            $id = $this->input->post('objet');
            $nom = $_FILES['up']['name'];
            $this->load->model('news_model');
            $this->news_model->insertImage($nom,$id);
           redirect('example/show');
        }

        public function show(){
            $this->load->model('news_model');
            $data = array();
            $data['all'] = $this->getAllProduit();
            $data['list'] = $this->getMyProduit();
            $data['cat'] = $this->news_model->getAllCategories(); 
            $data['image'] = $this->image();
            $this->load->view('pages/homeUser',$data);
        }
        public function getAllCategories(){
            $this->load->model('news_model');
            $tab = array();
            $tab['cat'] = $this->news_model->getAllCategories();
            // $this->load->view('pages/homeUser',$tab);
            return $tab;
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
        public function image(){
            $liste = array();
            $liste = $this->getMyProduit();
            $this->load->model('news_model');
            $id = array();
            $tab = array();
            for ($i=0; $i < count($liste); $i++) { 
                $id = $liste[$i]['idProduit'];
                $tab[] = $this->news_model->getImage($id);
            }
            return $tab;
        }
        public function save(){
            $nom = $this->input->get('nom');
            $desc = $this-> input->get('desc');
            $prix = $this->input->get('prix');
            $categories = $this->input->get('categories');
            $this->load->model('News_model');
            $this->news_model->insertProduitCat($categories);
            $this->news_model->insertProduit($nom,$desc,$prix);
            redirect('example/show');
        }
        public function delete($pseudo =''){
            $this->load->model('news_model');
            $id = $pseudo;
            $this->news_model->deleteProduit($id);
            redirect('example/show');
        }
        public function getById($pseudo=''){
            $this->load->model('news_model');
            $id = $pseudo;
            $data = array();
            $data['byId'] = $this->news_model->getByIdProduit($id);
            $this->load->view('pages/modify',$data); 
        }
        public function modifyProduit(){
            $this->load->model('news_model');
            $nom = $this->input->get('nom');
            $desc = $this->input->get('desc');
            $prix = $this->input->get('prix');
            $id = $this->input->get('id');
            $this->news_model->updateProduit($nom,$desc,$prix,$id);
            redirect('example/show');
        }
        public function echanger($pseudo = ''){
            $this->load->model('news_model');
            $idProduit = $pseudo;
            $data['produit1'] = $this->news_model->getByIdProduit($idProduit);
            $data['allProduit']= $this->getMyProduit();
            $this->load->view('pages/liste',$data);
        }

        public function valider($pseudo1= '',$pseudo2=''){
            $idP1 = $pseudo1; $idP2 = $pseudo2;
            $this->load->model('news_model');
            $this->news_model->insertEchange($idP1,$idP2);
            redirect('example/show');
        }

        public function listProposition(){
            $this->load->model('news_model');
            $data = array();
            $data = $this->news_model->listProposition();
            $prod = array();
            $prod1 = array();
            $user = array();
            $idEchange = array();
            for ($i=0; $i < count($data); $i++) { 
                if(isset($data[$i]['id'])){
                $idEchange[] = $data[$i]['id'];
            }
                $prod[] = $this->news_model->getByIdProduit($data[$i]['idP1']);
                $prod1[] = $this->news_model->getByIdProduit($data[$i]['idP2']);
                $user[] = $this->news_model->getUserById($prod1[$i]['idUser']);
            }
            $data1 = array();
            $data1['prod'] = $prod;
            $data1['prod2'] = $prod1;
            $data1['listUser'] = $user;
            $data1['idEchange'] = $idEchange;

            $this->load->view('pages/proposition',$data1);
        }

        public function transaction($idEchange='',$idP1='',$idP2='',$desc=''){
            $this->load->model('news_model');
            $id = $idEchange; $decision = $desc; 
            if ($desc == 10 ) {
                $this->news_model->validation($decision,$id);
                $this->news_model->insertHistoriques($idP1,$idP2,$decision);
            }else if ($desc == 0) {
                $this->news_model->validation($decision,$id);
                $this->news_model->insertHistoriques($idP1,$idP2,$decision);
            }
            redirect("example/show");
        } 

        public function transactionValid($idEchange='',$idP1='',$idP2='',$idUser = ''){
            $this->load->model('news_model');
            $sess = $this->session->get_userdata("user");
            $id = $idEchange; 
                $this->news_model->validation(10,$id);
                $this->news_model->updateUser($idP2,$sess['user']['idUser']);
                $this->news_model->updateUser($idP1,$idUser);
                $this->news_model->insertHistoriques($idP1,$idP2,10);
            redirect("example/show");
        } 

        public function transactionRefuse($idEchange='',$idP1='',$idP2=''){
            $this->load->model('news_model');
            $id = $idEchange; 
                $this->news_model->validation(0,$id);
                $this->news_model->insertHistoriques($idP1,$idP2,0);
            redirect("example/show");
        } 
        public function rechercher(){
            $this->load->model('news_model');
            $mot = $this->input->post('name');
            $cat = $this->input->post('idCat');
            $data = $this->news_model->rechercher($mot,$cat);
            $listProduit = array(); $temp = array();
            for ($i=0; $i < count($data); $i++) { 
               $temp = $this->news_model->getByIdProduit($data[$i]);
               $listProduit[] = $temp;
            }
            $data1 = array();
            $data1['listProduit'] = $listProduit;
            $this->load->view('pages/result',$data1);
        }
    }
?>