
	<form method='post' rel='external' action='index.php' onsubmit='return checkForm();'>
            <input type='hidden' name='action' value='insert'/>
            <input type='hidden' name='id' value='-1'/>
            <fieldset>
                <div class='ui-field-contain'>
                    <label for='nom'>Nom</label>
                    <input type='text' name='nom' maxlength='100' id='nom' value='' />
                </div>
                <div class='ui-field-contain'>
                    <label for='tel'>Téléphone</label>
                    <input type='tel' name='tel' maxlength='30' id='tel' value='' pattern='^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$'/>
                </div>

                <div class='ui-field-contain'>
                    <label for='email'>Email</label>
                    <input type='email' name='email' maxlength='40' id='email' value='' />
                </div>

                <div class='ui-field-contain'>
                    <label for='description'>Commentaires</label>
                    <input type='text' name='description' maxlength='200' id='description' value='' />
                </div>
<!--                <div data-role='fieldcontain'>
                    <label for='login'>Login</label>
                    <input type='text' name='login' maxlength='200' id='login' value='' />
                </div>
                <div data-role='fieldcontain'>
                    <label for='password'>Password</label>
                    <input type='password' name='password' maxlength='200' id='password' value='' />
                </div>-->

                
                <div class='ui-field-contain'>
                    <label for="categorie">Categories</label>
                    <select name="chooseCateg"  data-iconpos="left">
                        <?php foreach($categories as $info){
                                 echo "<option value='".$info->getId()."'>".$info->getNameCateg()."</option>";
                            }?>
                    </select>
                </div>
                
            <fieldset>
            <button type="submit" value="Save">Sauvegarder le prescripteur</button>
        </form>
