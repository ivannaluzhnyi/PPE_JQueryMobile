<?php //
//	echo("<a data-rel=\"dialog\" data-transition=\"pop\" href=\"index.php?action=addnew\">Ajout nouveau prescripteur</a><br/><br/>");
//	echo("<ul data-role=\"listview\" data-filter=\"true\">"); 
//	foreach($contacts as $info){
//                echo("<li>");
//		echo("<a data-rel=\"dialog\" data-transition=\"pop\" href=\"index.php?action=details&id=".$info->getId()."\">");
//		echo("Personne :&nbsp;".$info->getNom()."<br/>");
//		echo("Contact :&nbsp;".$info->getTel()."<br/>");
//                echo("Email :&nbsp;".$info->getEmail()."<br/>");
//		echo("Description :&nbsp;".$info->getDescription());
//		echo("</a>");		
//		echo("</li>\n");
//	}
//	echo("</ul>");
?>
<a data-rel="dialog" data-transition="pop" href="index.php?action=addnew">Ajout nouveau prescripteur</a><br/><br/>
    <ul data-role="listview" class="ui-listview-outer"> 
    <?php foreach($contacts as $info){ ?>
        <li data-role="collapsible" data-iconpos="right" data-shadow="false" data-corners="false">
            <h2><?php echo $info->getNom(); ?></h2>

            <div data-role='fieldcontain'>
                <label for='num'>Num. Tel: </label>
                <?php echo $info->getTel(); ?> 
            </div>
            <div data-role='fieldcontain'>
                <label for='email'>Email: </label>
                <?php echo $info->getEmail();  ?>
            </div>
            <div data-role='fieldcontain'>
                <label for='decription'>Decription: </label>
                <?php echo $info->getDescription(); ?>
            </div>      
            <div>
                <input   type="button" onclick="location.href='tel:<?php echo $info->getTel();  ?>'" value="Call to <?php echo $info->getNom(); ?>" />               
                <input   type="button" onclick="location.href='sms:<?php echo $info->getTel();  ?>'" value="Send message to <?php echo $info->getNom(); ?>" />
            </div>
        </li>
         <a class="modPrescL" data-rel="dialog" data-transition="pop"  href="index.php?action=details&id=<?php echo $info->getId();?>">Modiffier profil de <?php echo $info->getNom(); ?> </a>
    <?php }?>
    </ul>
