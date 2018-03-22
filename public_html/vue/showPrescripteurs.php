
<a data-rel="dialog" data-transition="pop" href="index.php?action=addnew">Ajout nouveau prescripteur</a><br/><br/>
      <?php 
        if(isset($_SESSION['visiteur'])){
            //var_dump( $_SESSION['visiteur']);die;
           // <a class="modPrescL" data-rel="dialog" data-transition="pop"  href="index.php?action=detailsLogPass&id=<?php echo $info->getId();">Modiffier Login ou mot de pass</a>
        }
    ?>
    <ul data-role="listview" class="ui-listview-outer"> 
    <?php foreach($contacts as $info){ ?>
        <li data-role="collapsible" data-iconpos="right" data-shadow="false" data-corners="false">
            <h2><?php echo $info->getNom(); ?></h2>

            <div class='ui-field-contain'>
                <label for='num'>Num. Tel: </label>
                <?php echo $info->getTel(); ?> 
            </div>
            <div class='ui-field-contain'>
                <label for='email'>Email: </label>
                <?php echo $info->getEmail();  ?>
            </div>
            <div class='ui-field-contain'>
                <label for='decription'>Decription: </label>
                <?php echo $info->getDescription(); ?>
            </div>
            <div class='ui-field-contain'>
                <label for='decription'>Categorie: </label>
                <?php $oneCateg = Passerelle::getOneCategorie($info->getCategPrescripteur());
                       echo $oneCateg->getNameCateg();
                 ?>
            </div> 

            <div>
                <input   type="button" onclick="location.href='tel:<?php echo $info->getTel();  ?>'" value="Call to <?php echo $info->getNom(); ?>" />               
                <input   type="button" onclick="location.href='sms:<?php echo $info->getTel();  ?>'" value="Send message to <?php echo $info->getNom(); ?>" />
                <a class="modPrescL" data-rel="dialog" data-transition="pop"  href="index.php?action=details&id=<?php echo $info->getId();?>">Modiffier profil</a><br>  
            </div>
        </li>
         
    <?php }?>
    </ul>
