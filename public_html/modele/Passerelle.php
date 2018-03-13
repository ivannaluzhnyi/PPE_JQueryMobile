<?php
class Passerelle{
        static private $mysql_link;
        
	static function connexion($mysql_hote,$mysql_db,$mysql_user,$mysql_pass){
		Passerelle::$mysql_link = new PDO("mysql:host=$mysql_hote;dbname=$mysql_db", "$mysql_user", "$mysql_pass");
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
                            $prescripteur = new Prescripteur($id,$nom,$tel,$email,$description);			
                    }
            }
            return $prescripteur;
        }
        
}
?>
