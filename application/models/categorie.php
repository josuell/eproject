<?php
/**
 * Created by PhpStorm.
 * User: josu
 * Date: 07/05/2019
 * Time: 23:23
 */

class categorie extends CI_Model
{
    public $IDCATEGORIE;
    public $NOMCATEGORIE;
    
     

    public function getAll()
    {
        $sql = "SELECT * FROM categorie ";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function create($nom)
    {
        
        $sql = "INSERT INTO categorie (NOMCATEGORIE) VALUES (?)";
        if ($this->db->query($sql, array($nom))) {
            return 0;
        } else {
            return -1;
        }
    }

    public function delete($id)
    {
        if ($this->db->query("DELETE FROM categorie WHERE IDCATEGORIE= ?", array($id))) {
            return 0;
        } else {
            return -1;
        }
    }

    public function get($id)
    {
        $sql = "SELECT * FROM categorie WHERE IDCATEGORIE= ?";
        $query = $this->db->query($sql, array($id));
        $result = $query->result();
        if (count($result) > 0) {
            return $result[0];
        } else {
            return null;
        }
    }


    public function edit($id, $nom)
    {
        $sql = "UPDATE categorie SET NOMCATEGORIE = ? ";
        $param = null;
            $param = array($nom, $id);
        
        $sql .= "WHERE IDCATEGORIE= ?";
        if ($this->db->query($sql, $param)) {
            return 0;
        } else {
            return -1;
        }
    }
}