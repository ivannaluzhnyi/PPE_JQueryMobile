<?php
	echo("<form method='post' rel='external' action='index.php' onsubmit='return checkForm();'>");
	echo "<a rel=\"external\" href=\"javascript:deleteEntry($id)\">Supprimer cette saisie</a>";
	echo "<input type='hidden' name='action' value='update'/>";
	echo "<input type='hidden' name='id' value='".$contact->getId()."'/>";
	echo "<fieldset>";
	echo "<div class='ui-field-contain'>";
	echo "<label for='nom'>Nom</label>";
	echo "<input type='text' name='nom' maxlength='100' id='nom' value='".$contact->getNom()."' />";
	echo "</div>";
        
	echo "<div class='ui-field-contain'>";
	echo "<label for='tel'>Téléphone</label>";
	echo "<input type='tel' name='tel' maxlength='30' id='tel' value='".$contact->getTel()."'pattern='^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$' />";
	echo "</div>";
        
        echo "<div data-role='fieldcontain'>";
	echo "<label for='email'>Eamil</label>";
	echo "<input type='email' name='email' maxlength='100' id='email' value='".$contact->getEmail()."' />";
	echo "</div>";
        
        echo "<div class='ui-field-contain'>";
	echo "<label for='description'>Description</label>";
	echo "<input type='text' name='description' maxlength='300' id='description' value='".$contact->getDescription()."' />";
	echo "</div>";
        
        
	echo "<div class='ui-field-contain'>";
	echo "<label for='categorie'>Categories</label>";
	echo "<select name='chooseCateg'  data-iconpos='left'>";
                foreach($categories as $info){
                    $opt="";
                    if($contact->getCategPrescripteur() == $info->getId()){
                        $opt = "selected";
                    }
                    echo "<option ".$opt." value='".$info->getId()."'>".$info->getNameCateg()."</option>";
                }
        echo "</select>";     
	echo "</div>";
        
	echo "<fieldset>";
	echo "<button type=\"submit\" value=\"Save\">Sauvegarder opportunité</button>";	
	echo("</form>");
?>
