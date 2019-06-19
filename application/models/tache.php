<?php
/**
 * Created by PhpStorm.
 * User: josu
 * Date: 07/05/2019
 * Time: 23:23
 */

class tache extends CI_Model
{     

    public function get_entries($page, $nombre)
    {
        $sql = "SELECT * FROM TACHE LIMIT ? OFFSET ?";
        $query = $this->db->query($sql, array($nombre, (($page - 1) * $nombre)));
        return $query->result();
    }

    public function create($idetailtache,$idprojet,$NOMTACHE,$estimation,$tempspasse,$TEMPSRESTE,$etat)
    {
        $sql = "INSERT INTO TACHE ( IDPROJET,IDDETAILTACHE ,NOMTACHE, TEMPSESTIME, TEMPSRESTE, TEMPSPASSE, ETAT) VALUES (?,?,?,?,?,?,?)";
        if ($this->db->query($sql, array($idprojet,$idetailtache,$NOMTACHE,$estimation,$TEMPSRESTE,$tempspasse,$etat))) {
            return 0;
        } else {
            return -1;
        }
    }

    public function delete($id)
    {
        if ($this->db->query("DELETE FROM TACHE WHERE IDTACHE= ? ", array($id))) {
            return 0;
        } else {
            return -1;
        }
    }

    public function get($id)
    {
        $sql = "SELECT * FROM TACHE WHERE IDTACHE= ?";
        $query = $this->db->query($sql, array($id));
        $result = $query->result();
        if (count($result) > 0) {
            return $result[0];
        } else {
            return null;
        }
    }


    public function edit($id,$nom,$estimation,$tempestime,$TEMPSRESTE,$etat)
    {
        $sql = "UPDATE TACHE SET NOMTACHE = ? ,TEMPSESTIME = ? ,TEMPSPASSE = ?, TEMPSRESTE = ?, ETAT = ? ";
        $param = null;
        
            $param = array($nom,$estimation,$tempestime,$TEMPSRESTE,$etat, $id);
         
        $sql .= "WHERE IDTACHE= ?";
        if ($this->db->query($sql, $param)) {
            return 0;
        } else {
            return -1;
        }
    }
    public function getMyTache($iduser,$idprojet){
        $sql = "select * from tache join association_2 on association_2.IDTACHE=tache.IDTACHE where IDDESIGNE = ? and IDPROJET = ? ";
        $query = $this->db->query($sql,$iduser,$idprojet);
        $result = $query->result();
        return $result;
    }
    public function getTache($idProjet){
        $sql = "select * from tache where IDPROJET = ? ";
        $query = $this->db->query($sql,$idProjet);
        $result = $query->result();
        return $result; 
    }
    public function getDetailTache(){
        $sql= "select * from detailtache ";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result; 
    }
    public function getRetard($idprojet){
        $sql = "select * from tache where tempspasse>tempsestime and idprojet= ? ";
        $query = $this->db->query($sql,array($idprojet));
        $result = $query->result();
        return $result; 
    }

    public function getTacheUser($idprojet, $iduser)
    {
        $sql = "select * from tache t join association_2 a on t.IDTACHE = a.IDTACHE where IDPROJET = ? and IDDESIGNE = ?";
        $query = $this->db->query($sql, array($idprojet, $iduser));
        return $query->result();
    }

    public function getTachesNonAssignees($idprojet)
    {
        $sql = "select * from tache t where IDTACHE not in (select idtache from association_2) and IDPROJET = ?";
        $query = $this->db->query($sql, array( $idprojet));
        return $query->result();
    }

    public function assigner($idtache, $iduser, $idteamlead)
    {
        $sql = "insert into association_2 values (?,?,?)";
        if($this->db->query($sql, array($idteamlead, $idtache, $iduser))){
            return 0;
        } else {
            return -1;
        }
    }
}