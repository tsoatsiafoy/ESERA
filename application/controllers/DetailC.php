<?php 
  defined('BASEPATH') OR exit('No direct script access allowed');
  require_once(APPPATH . 'controllers/MySession.php');
  class DetailC extends MySession{
    public function show($pseudo =' '){
        $id = $pseudo;
        $data['donne'] = $this->getById($id);
        $data['sary'] = $this->image($id);
        $this->load->view('pages/detail',$data);
    }
    public function getById($pseudo=''){
        $this->load->model('news_model');
        $id = $pseudo;
        $data = array();
        $data['byId'] = $this->news_model->getByIdProduit($id);
        return $data; 
    }
    public function getMyProduit(){
        $this->load->model('News_model');
        $list = $this->news_model->getMyProduit();
        return $list;
    }
    public function image($id){
        $liste = array();
        $liste = $this->getMyProduit();
        $this->load->model('news_model');
        $tab = array();
        // for ($i=0; $i < count($liste); $i++) { 
            $tab = $this->news_model->getImagebyId($id);
        // }
        return $tab;
    }
    public function do_upload(){
        var_dump($_FILES);
        $config['upload_path']='./assets/image/';
        $config['allowed_types'] = 'gif|gif|png|txt|jpeg|jpg';
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
    //    redirect('detail/show');
    }
  } 
?>