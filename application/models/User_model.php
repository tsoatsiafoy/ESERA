<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_model extends CI_Model{

    public function verifyLogin($mail,$mdp){
        $request = 'select * from user where mail=%s and password=%s';
        $request = sprintf($request,$this->db->escape($mail),$this->db->escape($mdp));
        $tab = $this->db->query($request);
        $test = array();
        foreach($tab -> result_array() as $row){
            $test['idUser'] = $row['idUser'];
            $test['username'] = $row['username'];
            if(isset($row['isAdmin'])){
            $test['isAdmin'] = $row['isAdmin'];
            }
        }
        return $test;
    }

    public function getAllUser(){
        $sql = "select count(idUser) as count from user where isAdmin=0" ; 
        $tab = $this->db->query($sql);
    
        foreach($tab -> result_array() as $row){
            $count = $row['count'];
        }
        return $count;
    }

    public function getCountChange(){
        $array=array();
        $sql = "select count(idEchange) as count from echange where  etat=10" ; 
        $tab = $this->db->query($sql);
    
        $count = array();
        $count = $tab -> result_array() ;
        $array['valiny'] = $count[0]['count'];
        return $array;
    }
    public function getCountNon(){
        $sql = "select count(idEchange) as count from echange where  etat!=10" ; 
        $tab = $this->db->query($sql);
    
        foreach($tab -> result_array() as $row){
            $count = $row['count'];
        }
        return $count;
    }

}
?>