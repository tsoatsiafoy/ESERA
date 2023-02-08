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
            $sql = "update categorie set nom = '%s' where idCat = %u";
            $sql = sprintf($sql,$nom,$idCat);
            echo $sql;
            $this->db->query($sql);
        }
    
        public function getAllCategories(){
            $sql = "select * from categorie where  etat=10";
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
        public function getCategoriesById($id){
            $sql = "select * from categorie where idcat=%u and etat=10";
            $sql = sprintf($sql,$id);
            echo $sql;
            $rep = $this->db->query($sql);
            $tab = array(); $cat = array();
    
            foreach($rep->result_array() as $row){
                $cat['idCat'] = $row['idCat'];
                $cat['nom'] = $row['nom'];
                $cat['etat'] = $row['etat'];
                $tab[] = $cat;
            }
            echo $tab[0]['idCat'];
            return $tab;
        }
        public function getByIdProduit($id){
        $sql = "select * from produit where idProduit = %u";
        $sql = sprintf($sql,$id);
       // echo $sql;
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
        return $tab[0];
        
    }
    public function supprimerCategorie($idCat){
        $sql = "update categorie set etat = 0 where idCat = %u";
        $sql = sprintf($sql,$idCat);
        $this->db->query($sql);
        }
        public function getMyProduit(){
        $sql = "select * from produit where idUser=%u and etat != 0";
            $user = array();
            $user = $this->session->get_userdata('user');
            $sql = sprintf($sql,$user['user']['idUser']);
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
            $sql = "select * from produit where idUser !=%u and etat != 0";
            $user = array();
            $user = $this->session->get_userdata('user');
            $sql = sprintf($sql,$user['user']['idUser']);
            // echo $sql;
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
            $sql = "insert into produit values(null,'%s','%s',%s,%s,1)";
            $user = array();
            $user = $this->session->get_userdata('user');
            $sql = sprintf($sql,$nom,$descri,$prix,$user['user']['idUser']);
            $this->db->query($sql);
        }
        public function updateProduit($nom,$descri,$prix,$idProduit){
            $sql = "update produit set nom='%s' , descri='%s' , prix=%s where idProduit=%s";
            $sql = sprintf($sql, $nom,$descri,$prix,$idProduit);
            echo $sql;
            $this->db->query($sql);
        }

        public function getImage($idProduit){
            $sql = "select * from imageProduit where idProduit=%s limit 1";
            $sql = sprintf($sql,$idProduit);
            $rep = $this->db->query($sql);
            $tab = array(); $image = array();

            foreach($rep->result_array() as $row){
                $image['idImage'] = $row['idImage'];
                $image['nom'] = $row['nom'];
                $image['idProduit'] = $row['idProduit'];
                $tab[] = $image;
            }
            return $tab;
        }
        public function getImagebyId($idProduit){
            $sql = "select * from imageProduit where idProduit=%u ";
            $sql = sprintf($sql,$idProduit);
            echo $sql;
            $rep = $this->db->query($sql);
            $tab = array(); $image = array();

            foreach($rep->result_array() as $row){
                $image['idImage'] = $row['idImage'];
                $image['nom'] = $row['nom'];
                $image['idProduit'] = $row['idProduit'];
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
    
    
        public function deleteProduit($idProduit){
            $sql = "update produit set etat = 0 where idProduit = %u";
            $sql = sprintf($sql,$idProduit);
            $this->db->query($sql);
        } 

        // public function insertProduitCat($idCat){
        //     $idProduit = $this->lastIdProduit();
        //     $sql = "insert into ProduitCat values(null,%s,%s)";
        //     $sql = sprintf($sql,$idProduit,$idCat);
        //     $this->db->query($sql);
        // }

        public function insertImage($nom,$idproduit){
            $sql = "insert into imageproduit values(null,'%s',%u)";
            $sql = sprintf($sql,$nom,$idproduit);
            echo $sql;
            $this->db->query($sql);
        }
        public function insertEchange($idP1,$idP2){
            $sql = "insert into echange values(null,%s,%s,1,now())";
            $sql = sprintf($sql,$idP1,$idP2);
            echo $sql;
            $this->db->query($sql);
            $this->insertHistorique($idP1,$idP2,1);
        }
        public function insertHistorique($idP1,$idP2,$etat){
            $sql = "insert into historique values(null,%s,%s,%s,now())";
            $sql = sprintf($sql,$idP1,$idP2,$etat);
            $this->db->query($sql);
        }

        public function listProposition(){
            $sql = "select echange.idEchange, p1.idProduit as idP1, p1.idUser , p2.idProduit as idP2, p2.idUser,echange.etat, echange.jour from echange join produit p1 on echange.idP1 = p1.idProduit join produit p2 on echange.idP2 = p2.idProduit where echange.etat = 1 and p1.idUser = %s ";
            $user = array();
            $user = $this->session->get_userdata('user');
            $sql = sprintf($sql,$user['user']['idUser']);
            $rep = $this->db->query($sql);
            $tab = array();
            $echange = array();

            foreach($rep->result_array() as $row){
                $echange['id'] = $row['idEchange'];
                $echange['idP1'] = $row['idP1'];
                $echange['idP2'] = $row['idP2'];
                $echange['etat'] = $row['etat'];
                $echange['jour'] = $row['jour'];
                $tab[] = $echange;
            }
            return $tab;
        }

        public function getUserById($idUser){
            $sql = "select * from user where idUser=%s";
            $sql = sprintf($sql,$idUser);
            $rep = $this->db->query($sql);
            $tab = array();

            foreach($rep->result_array() as $row){
                $tab['idUser'] = $row['idUser'];
                $tab['nom'] = $row['username'];
            }
            return $tab;

        }
        public function validation($decision,$idEchange){
            $sql = "update echange set etat = %u where idEchange = %u";
            $sql = sprintf($sql,$decision,$idEchange);
            $sql = $this->db->query($sql);
        }
        public function insertHistoriques($idP1,$idP2,$decision){
            $sql = "insert into historique value (null,%u,%u,%u,now())";
            $sql = sprintf($sql,$idP1,$idP2,$decision);
            $sql = $this->db->query($sql);
        }
        public function updateUser($idProduit,$iduser){
            $sql = 'update produit set idUser = %u where idProduit = %u';
            $sql = sprintf($sql,$iduser,$idProduit);
            echo $sql;
            $this->db->query($sql);
        }

        public function rechercher($toFind,$idCat){
            $sql = "select ProduitCat.idProduit from ProduitCat join produit on produit.idProduit = produitCat.idProduit join categorie on categorie.idCat = produitCat.idCat where produit.nom like '%$toFind%' and produitCat.idCat =$idCat";
            $rep = $this->db->query($sql);
            $tab = array(); $produit = array();

            foreach($rep->result_array() as $row){
               $produit[] = $row['idProduit'];
            }
            return $produit;
        }

    }
?>