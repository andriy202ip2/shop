<?php

//var_dump($Args);

//Categori
//

?>

<center><h1><b>Categori Products: <?php echo $Args['Categori']->Name; ?></b></h1></center>

<br/><center><h2><b>Sub Categories:</b></h2></center>

<div align="center">
   
<?php
foreach ($Args['SubCategories'] as $val) {
?>

    <a href="/Products/ProductsBySubCategori/<?php echo $val->Id;?>"><?php echo $val->Name; ?></a><br/>
    
    
<?php 
} 
?>

</div>