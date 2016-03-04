<?php
    $user = User::$User;  
?>

<b><?php echo $user->FirstName ?></b>
<b><?php echo $user->LastName ?></b>
<br/>
<b>Money: <?php echo $user->Money ?></b>
<br/>
<input id="logout-button" class="button" type="submit" value="logout" />