<?php

	echo("<form method='post' rel='external' action='index.php'>");
	echo "<input type='hidden' name='action' value='updateLogPass'/>";
	echo "<input type='hidden' name='id' value='".$contact->getId()."'/>";
        echo "<input type='hidden' name='oldPassH' value='".$contact->getPassword()."'/>";
        
        echo "<div class='ui-field-contain'>";
        echo "<label for='description'>Login</label>";
        echo "<input type='text' name='login' maxlength='300' id='login' value='".$contact->getLogin()."' />";
        echo "</div>";

        echo "<div class='ui-field-contain'>";
        echo "<label for='description'>Old Password</label>";
        echo "<input type='password' name='oldPassword' maxlength='300' id='oldPassword' />";
        echo "</div>";

        echo "<div class='ui-field-contain'>";
        echo "<label for='description'>New Password</label>";
        echo "<input type='password' name='newPassword' maxlength='300' id='newPassword' />";
        echo "</div>";
        
        echo "<button type=\"submit\" value=\"Save\">Sauvegarder</button>";	
	echo("</form>");