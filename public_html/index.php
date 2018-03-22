<?php
session_start();
require('modele/dbParametres.php');
require('modele/Prescripteur.php');
require('modele/Visiteur.php');
require('modele/Passerelle.php');
require('modele/Categorie.php');
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
            case 'addnew' 	:   $categories = Passerelle::getCategories();
                                    require('vue/addPrescripteur.php');
                                    break;
                                
            case 'insert' 	:   $nom = $_REQUEST['nom'];
                                    $tel = $_REQUEST['tel'];
                                    $description = $_REQUEST['description'];
                                    $email = $_REQUEST['email'];
                                    //$log = $_REQUEST['login'];
                                    //$pass = password_hash($_REQUEST['password'], PASSWORD_DEFAULT);
                                    //$pass = $_REQUEST['password'];
                                    $idCateg = $_REQUEST['chooseCateg'];
                                    //$errors = [];
                                    /*$contacts = Passerelle::getPrescripteurs();
                                    foreach ($contacts as $prs){
                                        if ( $prs->getEmail() == $email){
                                            $errors[] = "Prescripteur avec cet email existe deja.";
                                        }
                                        if ($prs->getlogin() == $log ){
                                            $errors[] = "Prescripteur avec cet login existe deja.";
                                        }
                                    }
                                    if(empty($errors)){
                                       

                                    }else{
                                        $action = "addnew";
//                                        echo '<div style="colore:red;'.array_shift($errors).'</div>';
                                    }*/
                                    Passerelle::addPrescripteur($nom, $tel,$email, $description,$idCateg); 
                                    $contacts = Passerelle::getPrescripteurs();
                                    require('vue/showPrescripteurs.php');
                                    break;
                                
            case 'details' 	:   $id = $_REQUEST['id'];
                                    $contact = Passerelle::getOnePrescripteur($id);
                                    $categories = Passerelle::getCategories();
                                    require('vue/showOnePrescripteur.php');
                                    break;
                               
                                    
            case 'detailsLogPass':  $id = $_REQUEST['id'];
                                    $contact = Passerelle::getOnePrescripteur($id);
                                    require('vue/changeLogPass.php');
                                    break;
                                    
            case 'updateLogPass':  $id = $_REQUEST['id'];
                                    $newPass = password_hash($_REQUEST['newPassword'], PASSWORD_DEFAULT);
                                    $log = $_REQUEST['login'];    
                                    if(password_verify($_REQUEST['oldPassword'],$_REQUEST['oldPassH'])){
                                        Passerelle::updateLoginPasswordPrescripteur($id,$log,$newPass);
                                        echo "<script>alert('Mot de pass été changé!');</script>";
                                    }else{
                                        //echo "<script>alert('Mot de pass invalide!');</script>";
                                       echo" alert($($('div[data-' + $.mobile.ns + 'role=page]').html)) ";
                                    }
                                    $contacts = Passerelle::getPrescripteurs();
                                    require('vue/showPrescripteurs.php');
                                    break;

                                
            case 'update' 	:   $id = $_REQUEST['id'];
                                    $nom = $_REQUEST['nom'];
                                    $tel = $_REQUEST['tel'];
                                    $description = $_REQUEST['description'];
                                    $email = $_REQUEST['email'];
                                    $idCateg = $_REQUEST['chooseCateg'];
                                    Passerelle::updatePrescripteur($id,$nom, $tel,$email, $description, $idCateg);
                                    $contacts = Passerelle::getPrescripteurs();
                                    require('vue/showPrescripteurs.php');
                                    break;
                                
            case 'delete'	:   $id = $_REQUEST['id'];
                                    Passerelle::deletPrescripteur($id);
                                    $contacts = Passerelle::getPrescripteurs();
                                    require('vue/showPrescripteurs.php');
                                    break;   
                
            case 'showAll'      :   $contacts = Passerelle::getPrescripteurs();                                
                                    $categories = Passerelle::getCategories();
                                    require('vue/showPrescripteurs.php');
                                    
                                    
            case 'checkAut'     :  $log = $_REQUEST['login'];
                                   $pass = $_REQUEST['password'];
                                   $visiteur = Passerelle::getVisiteurConnection($log, $pass);
                                   if($visiteur !== ""){
                                        $_SESSION['visiteur'] = $visiteur;
                                        $contacts = Passerelle::getPrescripteurs();
                                        require('vue/showPrescripteurs.php');
                                    } else {
                                        require('vue/authentification.php');
                                    }
                                    break;
                                    
                                    
                                                       
            default             :   if ($_SESSION['visiteur']){
                                        $contacts = Passerelle::getPrescripteurs();
                                        require('vue/showPrescripteurs.php');
                                    }else{
                                        require('vue/authentification.php');
                                    }
                                    break;                   
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

