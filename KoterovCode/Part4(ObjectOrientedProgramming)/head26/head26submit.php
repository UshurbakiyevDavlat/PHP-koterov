<?php
     if (@$_REQUEST['submit']) echo "Button has pressed";
 ?>
     <form action="<?=@$_SERVER[SCRIPT_NAME]; ?>">
        <input type = "submit" name = "submit" value = "GO!">
    </form>