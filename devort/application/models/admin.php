<?php
/**
 * Created by PhpStorm.
 * ADMIN: josu
 * Date: 07/05/2019
 * Time: 23:23
 */

class admin extends CI_Model
{
    public function setTimeToSecond($time){
        list($heure, $minute, $second) = explode(':', $time);
        $seconds = $heure * 3600 + $minute * 60 + $second;
        return $seconds;
    }
    public function secondtotime($time){
        return gmdate("H:i:s",$time%8400);
    }

    public function get_entries($page, $NOMbre)
    {
        $sql = "SELECT * FROM ADMIN LIMIT ? OFFSET ?";
        $query = $this->db->query($sql, array($NOMbre, (($page - 1) * $NOMbre)));
        return $query->result();
    }

    public function create($NOM,$PRENOM,$EMAIL,$MDP)
    {
        $MDP = sha1($MDP);
        $sql = "INSERT INTO ADMIN (NOM, PRENOM, EMAIL, MDP) VALUES (?,?,?,?)";
        
        if ($this->db->query($sql, array($NOM,$PRENOM,$EMAIL,$MDP))) {
            
            return 0;
        } else {
            return -1;
        }
    }

    public function delete($id)
    {
        if ($this->db->query("DELETE FROM ADMIN WHERE IDADMIN= ?", array($id))) {
            return 0;
        } else {
            return -1;
        }
    }

    public function get($id)
    {
        $sql = "SELECT * FROM ADMIN WHERE IDADMIN= ?";
        $query = $this->db->query($sql, array($id));
        $result = $query->result();
        if (count($result) > 0) {
            return $result[0];
        } else {
            return null;
        }
    }
    public function verify($email,$mdp)
    {
        $mdp = sha1($mdp);
        $sql = "SELECT * FROM ADMIN WHERE EMAIL= ? and MDP= ? ";
        $query = $this->db->query($sql, array($email,$mdp));
        $result = $query->result();
        if (count($result) > 0) {
            return $result[0];
        } else {
            return null;
        }
    }


    public function edit($id, $NOM,$PRENOM,$EMAIL,$MDP)
    {
        $sql = "UPDATE ADMIN SET NOM = ?, PRENOM = ?, EMAIL = ?, MDP = ? ";
        $param = null;
        $MDP = sha1($MDP);
            $param = array($NOM,$PRENOM,$EMAIL,$MDP, $id);
        
        $sql .= "WHERE IDADMIN= ?";
        if ($this->db->query($sql, $param)) {
            return 0;
        } else {
            return -1;
        }
    }
}