<?php

    //var_dump($Args);

    $SubCategories = $Args['SubCategories'];
    $F = new F_Help();  
    
    $PagesA = $F->NewPager($Args['Page'], $Args['Pages'], $Args['url']);
?>

<center><h2><b class="green">All SubCategories: </b></h2>
<a href="/Admin/SubCategoriInfo/0">Add SubCategories</a><br/>

Categories Count: <?php echo $Args['Count']; ?><br/>
Page: <?php echo $Args['Page']; ?> Pages: <?php echo $Args['Pages']; ?><br/>
<?php echo $PagesA; ?>
</center>

<br/>

<div align="center">
<hr/>   

<?php

foreach ($SubCategories as $val) {
      
?>

    <b class="green">SubCategorie Id:</b> <?php echo $val->Id; ?><br/>    
    <b class="green">Categori Name:</b> <?php echo $val->CategoriName; ?><br/>
    <b class="green">SubCategorie Name:</b> <?php echo $val->Name; ?><br/>
       
    <a href="/Admin/SubCategoriInfo/<?php echo $val->Id; ?>">Edit SubCategori</a>
    
    <button class="delete-subcategori-button" MyId="<?php echo $val->Id; ?>">Delete SubCategori</button>

    
    <br/><br/>

        
    <hr/>
    
<?php 
} 
 
echo '<br/>'.$PagesA;

?>

</div>