<?php
session_start();
require('modele/dbParametres.php');
require('modele/Prescripteur.php');
require('modele/Passerelle.php');
require('vue/header.php');

?>
<div data-role="page">
    <div data-role="header">
        <h1>Répertoire des prescripteurs</h1>
    </div>
    <div data-role="content">
    <?php 

    
    Passerelle::connexion($MYSQL_HOTE,$MYSQL_DB,$MYSQL_USER,$MYSQL_PASS);
    if (isset ($_REQUEST['action'])){
            $action = $_REQUEST['action'];
    }
    else {
            $action = "";            
    }
    switch ($action) {
            case 'addnew' 	:   require('vue/addPrescripteur.php');
                                    break;
                                
            case 'insert' 	:   $nom = $_REQUEST['nom'];
                                    $tel = $_REQUEST['tel'];
                                    $description = $_REQUEST['description'];
                                    $email = $_REQUEST['email'];
                                    Passerelle::addPrescripteur($nom, $tel,$email, $description); 
                                    $contacts = Passerelle::getPrescripteurs();
                                    require('vue/showPrescripteurs.php');
                                    break;
                                
            case 'details' 	:   $id = $_REQUEST['id'];
                                    $contact = Passerelle::getOnePrescripteur($id);
                                    require('vue/showOnePrescripteur.php');
                                    break;
                                
            case 'update' 	:   $id = $_REQUEST['id'];
                                    $nom = $_REQUEST['nom'];
                                    $tel = $_REQUEST['tel'];
                                    $description = $_REQUEST['description'];
                                    $email = $_REQUEST['email'];
                                    Passerelle::updatePrescripteur($id,$nom, $tel,$email, $description);
                                    $contacts = Passerelle::getPrescripteurs();
                                    require('vue/showPrescripteurs.php');
                                    break;
                                
            case 'delete'	:   $id = $_REQUEST['id'];
                                    Passerelle::deletPrescripteur($id);
                                    $contacts = Passerelle::getPrescripteurs();
                                    require('vue/showPrescripteurs.php');
                                    break;   
                
            case 'showAll'      :   $contacts = Passerelle::getPrescripteurs();
                                    require('vue/showPrescripteurs.php');
                                    
                                    
            case 'checkAut'     :  $log = $_REQUEST['login'];
                                   $pass = $_REQUEST['password'];
                                    if($log=="log" &&$pass=="pass"){  
                                        $_SESSION['login']=$log;
                                        $_SESSION['password']=$pass;
                                        $contacts = Passerelle::getPrescripteurs();
                                        require('vue/showPrescripteurs.php');
                                    } else {
                                        require('vue/authentification.php');
                                    }
                                    break;
                                                       
            default             :   require('vue/authentification.php');                 
    }
    ?>
    </div>
    <div data-role="footer">
    Galaxy Swiss Bourdin 
    </div>
</div>
<?php 
 require('vue/footer.php'); 
?>
</body>
</html>

