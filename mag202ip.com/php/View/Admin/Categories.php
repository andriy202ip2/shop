<?php

    //var_dump($Args);

    $Categories = $Args['Categories'];
    $F = new F_Help();  
    
    $PagesA = $F->NewPager($Args['Page'], $Args['Pages'], $Args['url']);
?>

<center><h2><b class="green">All Categories: </b></h2>
<a href="/Admin/CategoriInfo/0">Add Categori</a><br/>

Categories Count: <?php echo $Args['Count']; ?><br/>
Page: <?php echo $Args['Page']; ?> Pages: <?php echo $Args['Pages']; ?><br/>
<?php echo $PagesA; ?>
</center>

<br/>

<div align="center">
<hr/>   

<?php

foreach ($Categories as $val) {
      
?>

    <b class="green">Categorie Id:</b> <?php echo $val->Id; ?><br/>
    <b class="green">Categorie Name:</b> <?php echo $val->Name; ?><br/>

    <a href="/Admin/CategoriInfo/<?php echo $val->Id; ?>">Edit Categori</a>
    
    <button class="delete-categori-button" MyId="<?php echo $val->Id; ?>">Delete Categori</button>

    
    <br/><br/>

        
    <hr/>
    
<?php 
} 
 
echo '<br/>'.$PagesA;

?>

</div>