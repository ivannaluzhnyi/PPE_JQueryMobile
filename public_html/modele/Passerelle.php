<?php
class Passerelle{
        static private $mysql_link;
        
	static function connexion($mysql_hote,$mysql_db,$mysql_user,$mysql_pass){
		Passerelle::$mysql_link = new PDO("mysql:host=$mysql_hote;dbname=$mysql_db", "$mysql_user", "$mysql_pass");
	}
        
        static function getVisiteurs(){
            $visiteurs = array();
            $sql ="select * from visiteur order by pres_id DESC";
            $result = Passerelle::$mysql_link->query($sql);
            while ($row = $result->fetch()) {
                            $id = $row['id'];
                            $nom = $row['nom'];
                            $prenom = $row['prenom'];
                            $adress = $row['adresse'];
                            $log = $row['login'];
                            $pass = $row['password'];
                            $visiteur = new Visiteur($id,$nom,$prenom,$adress,$log,$pass);
                            $visiteurs[] = $visiteur;
            }		
            return $visiteurs;
        }
        
        static function getVisiteurConnection($log,$pass){
            $visiteur = "";
            $sql ="select * from visiteur where password='$pass' AND login='$log'";
            $result = Passerelle::$mysql_link->query($sql);
            if($result->rowCount()==1){
                 while ($row = $result->fetch()) {
                            $id = $row['id'];
                            $nom = $row['nom'];
                            $prenom = $row['prenom'];
                            $adress = $row['adresse'];
                            $log = $row['login'];
                            $pass = $row['password'];
                            $visiteur = new Visiteur($id,$nom,$prenom,$adress,$log,$pass);
                }		
            }
            return $visiteur;
        }
	static function addPrescripteur($nom,$tel,$email,$description, $categ){
            $description = addslashes($description);
            $sql = "insert prescripteurs(pres_id, pres_nom, pres_tel,pres_email, pres_description, idCateg) values (NULL,'$nom','$tel','$email','$description','$categ')";
            $result = Passerelle::$mysql_link->exec($sql);           
            if ($result == 1){
                    return "SUCCESS";
            }
            else{
                    return "ERREUR";
            }
        }
        
        static function deletPrescripteur($id){
            $query = "delete from prescripteurs where pres_id = $id";
            $result = Passerelle::$mysql_link->exec($query);           
            if ($result == 1){
                    return "SUCCESS";
            }
            else{
                    return "ERREUR";
            }
        }
        
        static function updatePrescripteur($id,$nom, $tel,$email, $description, $categ){
            $sql = "UPDATE `prescripteurs` SET `pres_nom` = '".$nom."', `pres_tel` = '".$tel."', `pres_email` = '".$email."', `pres_description` = '".$description."',`idCateg` = '".$categ."' WHERE `prescripteurs`.`pres_id` =".$id.";";
            $result = Passerelle::$mysql_link->exec($sql);           
            if ($result == 1){
                    return "SUCCESS";
            }
            else{
                    return "ERREUR";
            }
        }
        
        static function updateLoginPasswordVisiteur($id,$log,$pass){
            $sql = "UPDATE `prescripteurs` SET `login` = '".$log."', `password` = '".$pass."' WHERE `prescripteurs`.`pres_id` = $id";
            $result = Passerelle::$mysql_link->exec($sql);           
            if ($result == 1){
                    return "SUCCESS";
            }
            else{
                    return "ERREUR";
            }
        }
        
        static function getCategories(){
            $sql ="SELECT * FROM `categorie`";
            $result = Passerelle::$mysql_link->query($sql);
            while ($row = $result->fetch()) {
                            $idCateg = $row['idCateg'];
                            $nameCateg = $row['nameCateg'];
                            $categorie = new Categorie($idCateg, $nameCateg);
                            $categories[] = $categorie;
            }		
            return $categories;
        }
        
        static function getOneCategorie($id){
            if ($id != -1) {
                    $sql ="select * from categorie where idCateg=".$id;
                    $result = Passerelle::$mysql_link->query($sql);
                    if ($result){
                            $row = $result->fetch();
                            $id = $row['idCateg'];
                            $nameCateg = $row['nameCateg'];
                            $categorie = new Categorie($id, $nameCateg);			
                    }
            }
            return $categorie;
        }


        static function getPrescripteurs(){
            $prescripteurs = array();
            $sql ="select * from prescripteurs order by pres_id DESC";
            $result = Passerelle::$mysql_link->query($sql);
            while ($row = $result->fetch()) {
                            $id = $row['pres_id'];
                            $nom = $row['pres_nom'];
                            $tel = $row['pres_tel'];
                            $email = $row['pres_email'];
                            $description = $row['pres_description'];
                            $categ = $row['idCateg'];
                            $prescripteur = new Prescripteur($id,$nom,$tel,$email,$description,$categ);
                            $prescripteurs[] = $prescripteur;
            }		
            return $prescripteurs;
        }
        
        static function getLogPassByOnPrescripteur($id){
            $sql ="select pres_id ,login, password from prescripteurs where pres_id=".$id;
            $result = Passerelle::$mysql_link->query($sql);
            $row = $result->fetch();
            return $row;
        }

        static function getOnePrescripteur($id){
            $prescripteur = null;
            if ($id != -1) {
                    $sql ="select * from prescripteurs where pres_id=".$id;
                    $result = Passerelle::$mysql_link->query($sql);
                    if ($result){
                            $row = $result->fetch();
                            $nom = $row['pres_nom'];
                            $tel = $row['pres_tel'];
                            $email = $row['pres_email'];                            
                            $description = $row['pres_description'];
                            $categ = $row['idCateg'];
                            $prescripteur = new Prescripteur($id,$nom,$tel,$email,$description, $categ);			
                    }
            }
            return $prescripteur;
        }
        static function getOnePrescripteurByLogin($login){
                    $sql ="SELECT login, password FROM `prescripteurs` WHERE login = ".$login;
                    $result = Passerelle::$mysql_link->query($sql);
                    $row = $result->fetch();
            return $row;
        }
        
}
?>
