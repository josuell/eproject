<?php
/**
 * Created by PhpStorm.
 * User: josu
 * Date: 07/05/2019
 * Time: 23:23
 */

class user extends CI_Model
{
    public $IDUSER;
    public $NOM;
    public $PRENOM;
    public $EMAIL;
    public $mdp;
    public $image;
     

    public function get_entries()
    {
        $sql = "SELECT * FROM USER ";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function create($NOM,$PRENOM,$EMAIL,$MDP,$IMAGE)
    {
        $MDP = sha1($MDP);
        $sql = "INSERT INTO USER (NOM, PRENOM, EMAIL, MDP, IMAGE) VALUES (?,?,?,?,?)";
        if ($this->db->query($sql, array($NOM,$PRENOM,$EMAIL,$MDP,$IMAGE))) {
            return 0;
        } else {
            return -1;
        }
    }

    public function delete($id)
    {
        if ($this->db->query("DELETE FROM USER WHERE IDUSER= ?", array($id))) {
            return 0;
        } else {
            return -1;
        }
    }

    public function get($id)
    {
        $sql = "SELECT * FROM USER WHERE IDUSER= ?";
        $query = $this->db->query($sql, array($id));
        $result = $query->result();
        if (count($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }
    public function verify($email,$mdp)
    {
//        $mdp = sha1($mdp);
        $sql = "SELECT * FROM USER WHERE EMAIL= ? and MDP= ? ";
        $query = $this->db->query($sql, array($email,$mdp));
        $result = $query->result();
        if (count($result) > 0) {
            return $result[0];
        } else {
            return null;
        }
    }


    public function edit($id, $NOM,$PRENOM,$EMAIL,$MDP,$image)
    {
        $sql = "UPDATE user SET NOM = ?, PRENOM = ?, EMAIL = ?, MDP = ?, IMAGE= ? ";
        $param = null;
        $MDP = sha1($MDP);
            $param = array($NOM,$PRENOM,$EMAIL,$MDP,$image, $id);
        
        $sql .= "WHERE IDUSER= ?";
        if ($this->db->query($sql, $param)) {
            return 0;
        } else {
            return -1;
        }
    }

    
}