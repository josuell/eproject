
create view recherche as
(SELECT vehicule.prix as prix,ville.nom as nomVille,image.nom as
 nomImage,vehicule.id as idvehicule,categorie.nom as nomCategorie,marque.nom as
  nomMarque,vehicule.puissance as puissance,vehicule.annee as annee,vehicule.nom as
   nomVehicule, 
   concat(marque.nom,' ',categorie.nom,' ',vehicule.nom,' 
   ',vehicule.carburant,' ',vehicule.puissance,' ',vehicule.annee,'
    ',ville.nom) as Colonne1 from vehicule 
join marque on vehicule.idm=marque.id
join categorie on vehicule.idc=categorie.id
join image on image.idvehicule=vehicule.id
join villevehicule on villevehicule.idvehicule=vehicule.id
join ville on ville.id=villevehicule.idville
);

create view recherche as select *,concat(nom,' ',prenom) as anarana from user;
create view recherchetache as select concat(nom,' ',prenom) as anarana from user;
