<?php
/**
 * Created by PhpStorm.
 * User: josu
 * Date: 07/05/2019
 * Time: 23:23
 */

class detailtache extends CI_Model
{
    public $IDdetailtacheTACHE;
    public $TYPETACHE;
    
     

    public function get_entries($page, $nombre)
    {
        $sql = "SELECT * FROM detailtache  LIMIT ? OFFSET ?";
        $query = $this->db->query($sql, array($nombre, (($page - 1) * $nombre)));
        return $query->result();
    }

    public function create($nom)
    {
        
        $sql = "INSERT INTO detailtache  (TYPETACHE) VALUES (?)";
        if ($this->db->query($sql, array($nom))) {
            return 0;
        } else {
            return -1;
        }
    }

    public function delete($id)
    {
        if ($this->db->query("DELETE FROM detailtache  WHERE IDdetailtache= ?", array($id))) {
            return 0;
        } else {
            return -1;
        }
    }

    public function get($id)
    {
        $sql = "SELECT * FROM detailtache  WHERE IDdetailtache= ?";
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
        $sql = "UPDATE detailtache  SET TYPETACHE = ? ";
        $param = null;
            $param = array($nom, $id);
        
        $sql .= "WHERE IDdetailtache= ?";
        if ($this->db->query($sql, $param)) {
            return 0;
        } else {
            return -1;
        }
    }
}