<?php
/**
 * Created by PhpStorm.
 * User: josu
 * Date: 07/05/2019
 * Time: 23:23
 */

class projet extends CI_Model
{
    public $IDPROJET;
    public $idadmin;
    public $NOMPROJET;
     

    public function get_entries()
    {
        $sql = "SELECT * FROM projet ";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function create($nom,$admin,$debut,$fin)
    {
        
        $sql = "INSERT INTO projet (NOMPROJET,IDADMIN,datedebut,datefin) VALUES (?,?,?,?)";
        if ($this->db->query($sql, array($nom,$admin,$debut,$fin))) {
            return 0;
        } else {
            return -1;
        }
    }

    public function delete($id)
    {
        if ($this->db->query("DELETE FROM projet WHERE IDPROJET= ?", array($id))) {
            return 0;
        } else {
            return -1;
        }
    }

    public function get($id)
    {
        $sql = "SELECT * FROM projet WHERE IDPROJET= ?";
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
        $sql = "UPDATE projet SET NOMPROJET = ? ";
        $param = null;
            $param = array($nom, $id);
        
        $sql .= "WHERE IDPROJET= ?";
        if ($this->db->query($sql, $param)) {
            return 0;
        } else {
            return -1;
        }
    }
    public function avancementProjet(){
        $sql = "select tache.idprojet, projet.nomprojet, 
        (sum(tempspasse)/sum(tempsestime))*100 as avancement 
        from tache join projet on projet.IDPROJET=tache.IDPROJET  group by tache.idprojet";
         $query = $this->db->query($sql);
         $result = $query->result();
         return $result;
    }
    public function avancementProjetTL(){
        $sql = "select t.IDPROJET,nomprojet, iddesigneur,
        (sum(tempspasse)/sum(tempsestime))*100 as avancement
         from tache t join association_2 tu on t.idtache = tu.idtache 
           join projet on projet.idprojet = t.idprojet
          group by t.IDPROJET, iddesigneur";
          $query = $this->db->query($sql, array($idprojet,$user));
          $result = $query->result();
          return $result;
    }



    public function getDeveloppeurs($idprojet)
    {
        $sql = "select u.* from user u join roles r on r.IDUSER = u.IDUSER where idprojet = ? and IDCATEGORIE = ?";
        $query = $this->db->query($sql, array($idprojet, 3));
        return $query->result();
    }

    public function getTauxOccupationProjet($idprojet){
        $sql = "select ttp.IDPROJET, IDDESIGNE, ((tmpspasse*100)/tmpsestime) tauxoccup  from (SELECT a.IDDESIGNE, t.IDPROJET, sum(TEMPSPASSE) tmpspasse FROM tache t 
join association_2 a on a.IDTACHE = t.IDTACHE 
GROUP BY a.IDDESIGNE, t.IDPROJET) tempspasse join tempstotalprojet ttp on tempspasse.IDPROJET = ttp.IDPROJET where IDPROJET = ?";

        return $this->db->query($sql, array($idprojet))->result();
    }

    public function getTauxOccupationAllProjet(){
        $sql = "select ttp.IDPROJET, IDDESIGNE, ((tmpspasse*100)/tmpsestime) tauxoccup  from (SELECT a.IDDESIGNE, t.IDPROJET, sum(TEMPSPASSE) tmpspasse FROM tache t 
join association_2 a on a.IDTACHE = t.IDTACHE 
GROUP BY a.IDDESIGNE, t.IDPROJET) tempspasse join tempstotalprojet ttp on tempspasse.IDPROJET = ttp.IDPROJET";

        return $this->db->query($sql)->result();
    }
    
}