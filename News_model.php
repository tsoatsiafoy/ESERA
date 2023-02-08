<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class News_model extends CI_Model{

        public function insertUser($username,$email,$mdp){
            $sql = "insert into user values(null,%s,%s,%s,0)";
            $sql = sprintf($sql,$this->db->escape($username),$this->db->escape($email),$this->db->escape($mdp));
            $this->db->query($sql);
        }

        public function insertCategories($nom){
            $sql = "insert into categorie values(null,%s,10)";
            $sql = sprintf($sql,$this->db->escape($nom));
            $this->db->query($sql);
        }

        public function updateCategories($nom,$idCat){
            $sql = "update categorie set nom = %s where idCat = %s";
            $sql = sprintf($sql,$this->db->escape($nom),$this->db->$idCat;);
            $this->db->query($sql);
        }

        public function getAllCategories(){
            $sql = "select * from categorie where etat=10";
            $rep = $this->db->query($sql);
            $tab = array(); $cat = array();
    
            foreach($rep->result_array() as $row){
                $cat['idCat'] = $row['idCat'];
                $cat['nom'] = $row['nom'];
                $cat['etat'] = $row['etat'];
                $tab[] = $cat;
            }
            return $tab;
        }

        public function supprimerCategorie($idCat){
            $sql = "update categorie set etat = 0 where idCat = %s";
            $sql = sprintf($sql,$this->db->$idCat);
            $this->db->query($sql);
        }

        public function getMyProduit(){
            $sql = "select * from produit where idUser=%s";
            $sql = sprintf($sql,$_SESSION['user']['idUser']);
            $rep = $this->db->query($sql);
            $tab = array(); $prod = array();
    
            foreach($rep->result_array() as $row){
                $prod['idProduit'] = $row['idProduit'];
                $prod['nom'] = $row['nom'];
                $prod['descri'] = $row['descri'];
                $prod['prix'] = $row['prix'];
                $prod['idUser'] = $row['idUser'];
                $tab[] = $prod;
            }
            return $tab;
        }

        public function getAllProduit(){
            $sql = "select * from produit where idUser!=%";
            $sql = sprintf($sql,$this->session->get_userdata('user')['idUser']);
            $rep = $this->db->query($sql);
            $tab = array(); $prod = array();
    
            foreach($rep->result_array() as $row){
                $prod['idProduit'] = $row['idProduit'];
                $prod['nom'] = $row['nom'];
                $prod['descri'] = $row['descri'];
                $prod['prix'] = $row['prix'];
                $prod['idUser'] = $row['idUser'];
                $tab[] = $prod;
            }
            return $tab;
        }

        public function insertProduit($nom,$descri,$prix){
            $sql = "insert into produit values(null,%s,%s,%s)";
            $sql = sprintf($sql,$nom,$descri,$prix,$this->session->get_userdata('user')['idUser']);
            $this->db->query($sql);
        }

        public function updateProduit($nom,$descri,$prix,$idProduit){
            $sql = "update produit set nom=%s and descri=%s and prix=%s where idProduit=%s)";
            $sql = sprintf($sql, $this->escape($nom),$this->escape($descri),$prix,$idProduit);
            $this->db->query($sql);
        }

        public function getImage($idProduit){
            $sql = "select * from imageProduit where idProduit=%s";
            $sql = sprintf($sql,$idProduit);
            $rep = $this->db->query($sql);
            $tab = array(); $image = array();

            foreach($rep->result_array() as $row){
                $image['idImage'] = $row['idImage'];
                $image['nom'] = $row['nom'];
                $image['idUser'] = $row['idUser'];
                $tab[] = $image;
            }

            return $tab;
        }

        public function lastIdProduit(){
            $sql = "select count(idProduit) as ct from produit";
            $rep = $this->bd->query($sql);$tab = array();
            
            foreach($rep->result_array() as $row){
                $tab[] = $row['ct'];
            }
            return $tab[0];
        }

        public function insertProduitCat($idCat){
            $idProduit = $this->lastIdProduit();
            $sql = "insert into ProduitCat values(null,%s,%s)";
            $sql = sprintf($sql,$idProduit,$idCat);
            $this->db->query($sql);
        }

//start here

        public function insertEchange($idP1,$idP2){
            $sql = "insert into echange values(null,%s,%s,1,now())";
            $sql = sprintf($sql,$idP1,$idP2);
            $this->db->query($sql);
            $this->insertHistorique($idP1,$idP2,1);
        }
        public function insertHistorique($idP1,$idP2,$etat){
            $sql = "insert into historique values(null,%s,%s,$s,now())";
            $sql = sprintf($sql,$idP1,$idP2,$etat);
            $this->db->query($sql);
        }

        public function listProposition(){
            $sql = "select echange.idEchange, echange.idP1 ,p1.idUser,echange.idP2,p2.idUser, echange.etat, echange.jour, produit.idProduit, produit.idUser as user1, produit.idUser as user2 from echange join produit on pd1 = produit.idProduit join produit on pd2 = produit.idProduit where etat=1 and user1=%s";
            $user = array();
            $user = $this->session->get_userdata('user');
            $sql = sprintf($sql,$user['user']['idUser']);
            $rep = $this->db->query($sql);
            $tab = array();$echange = array();

            foreach($rep->result_array() as $row){
                $echange['id'] = $row['idEchange'];
                $echange['idP1'] = $row['pd1'];
                $echange['idP2'] = $row['pd2'];
                $echange['etat'] = $row['etat'];
                $echange['jour'] = $row['jour'];
                $echange['jour'] = $row['jour'];
                $tab[] = $echange;
            }
            return $tab;
        }

        public function getUserById($idUser){
            $sql = "select * from user where idUser=%s";
            $sql = sprint($sql,$idUser);
            $rep = $this->db->query($sql);
            $tab = array();

            foreach($rep->result_array() as $row){
                $tab['idUser'] = $row['idUser'];
                $tab['nom'] = $row['nom'];
            }
            return $tab;

        }

        public function getAllUser(){
            $sql = "select * from user where isAdmin!=0";
            $rep = $this->db->query($sql);
            
        }
        
        public function rechercher($toFind,$idCat){
            $sql = "select ProduitCat.idProduit from ProduitCat join produit on produit.idProduit = produitCat.idProduit join categorie on categorie.idCat = produitCat.idCat where produit.nom like %s% and produitCat.idCat = %s";
            $sql = sprintf($sql,$toFind,$idCat);
            $rep = $this->db->query($sql);
            $tab = array(); $produit = array();

            foreach($rep->result_array() as $row){
               $produit[] = $row['idProduit'];
            }
            return $produit;
        }

        
    }

?>