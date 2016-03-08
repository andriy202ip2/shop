<?php
if ($Args['e']) {
    ?>    

    <center>
        <h2><b class="green">Orders Searchr: </b></h2>


        <?php
        ControllerPartial::Get('Searchr/UsersAdmin/');

        foreach ($Args['e'] as $val) {
            echo '<b class="red">' . $val . '</b><br/>';
        }
        ?>    

    </center>    

    <?php
} elseif (!isset($Args['Users'])) {

    ControllerPartial::Get('Searchr/UsersAdmin/');
    ?> 

    <center>
        <h2><b class="green">Nothing found !!!</b></h2>
    </center>

    <?php
//var_dump($Args);
} else {

    //var_dump($Args);

    $Users = $Args['Users'];
    $F = new F_Help();  
    
    $PagesA = $F->NewPager($Args['Page'], $Args['Pages'], $Args['url'], $Args['GETurl']);
?>

<center><h2><b class="green">All Users: </b></h2>
    
        <?php
        ControllerPartial::Get('Searchr/UsersAdmin/');
        ?>
    
Users Count: <?php echo $Args['Count']; ?><br/>
Page: <?php echo $Args['Page']; ?> Pages: <?php echo $Args['Pages']; ?><br/>
<?php echo $PagesA; ?>
</center>

<br/>

<div align="center">
<hr/>   

<?php

foreach ($Users as $val) {
      
?>

    <b class="green">User Id:</b> <?php echo $val->Id; ?><br/>
    <b class="green">Email:</b> <?php echo $val->Email; ?><br/>
    <b class="green">RightsAccess:</b> <?php echo $val->RightsAccess; ?><br/>
    <b class="green">FirstName:</b> <?php echo $val->FirstName; ?><br/>
    <b class="green">LastName:</b> <?php echo $val->LastName; ?><br/>
    <b class="green">Money:</b> <?php echo $val->Money; ?><br/>
 
    <a href="/Admin/UserInfo/<?php echo $val->Id; ?>">Edit User</a>
    
    <button class="delete-user-button" MyId="<?php echo $val->Id; ?>">Delete User</button>

    
    <br/><br/>

        
    <hr/>
    
<?php 
} 
 
echo '<br/>'.$PagesA;

?>

</div>

<?php
}
?>