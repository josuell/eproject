<?php
/**
 * Created by PhpStorm.
 * User: josu
 * Date: 07/05/2019
 * Time: 23:23
 */

class roles extends CI_Model
{
    public $IDPROJET;
    public $idadmin;
    public $NOMPROJET;
     

    public function get_entries()
    {
        $sql = "SELECT * FROM roles ";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function create($idprojet,$user,$fonction)
    {
        
        $sql = "INSERT INTO roles (IDPROJET,IDUSER,IDCATEGORIE) VALUES (?,?,?)";
        if ($this->db->query($sql, array($idprojet,$user,$fonction))) {
            return 0;
        } else {
            return -1;
        }
    }

    public function delete($id)
    {
        if ($this->db->query("DELETE FROM roles WHERE IDPROJET= ?", array($id))) {
            return 0;
        } else {
            return -1;
        }
    }

    public function get($id)
    {
        $sql = "SELECT * FROM roles WHERE IDPROJET= ?";
        $query = $this->db->query($sql, array($id));
        $result = $query->result();
        if (count($result) > 0) {
            return $result[0];
        } else {
            return null;
        }
    }
    public function getProjetUser($idprojet,$user)
    {
        $sql = "SELECT * FROM roles WHERE IDPROJET= ? and IDUSER = ?";
        $query = $this->db->query($sql, array($idprojet,$user));
        $result = $query->result();
        
            return $result[0];
        
    }
    public function getMyProjet($user)
    {
        $sql = "SELECT * FROM roles join Projet on projet.IDPROJET=roles.IDPROJET join categorie on categorie.IDCATEGORIE=roles.IDCATEGORIE WHERE IDUSER = ? ";
        $query = $this->db->query($sql, array($user));
        $result = $query->result();
       return $result;
    }
    public function getProjetUserbycategorie($user,$idcat)
    {
        $sql = "SELECT * FROM roles join Projet on projet.IDPROJET=roles.IDPROJET WHERE  IDUSER = ".$user." and IDCATEGORIE = ".$idcat  ;
        $query = $this->db->query($sql);
        $result = $query->result();
        
            return $result;
        
    }


   
}