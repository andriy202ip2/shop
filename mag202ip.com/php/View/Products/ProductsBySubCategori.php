<?php

    //var_dump($Args);

    $Products = $Args['Products'];
    $F = new F_Help();  
    
    $PagesA = $F->NewPager($Args['Page'], $Args['Pages'], $Args['url']);
?>

<center><h2>Categori Product: <b class="green"><?php echo $Products[0]->CategoriName; ?></b>
<b>=></b>
Sub Categori: <b class="green"><?php echo $Products[0]->SubCategoriName; ?></b></h2>

<?php
    ControllerPartial::Get('Searchr/Products/');
?>     
    
Products Count: <?php echo $Args['Count']; ?><br/>
Page: <?php echo $Args['Page']; ?> Pages: <?php echo $Args['Pages']; ?><br/>
<?php echo $PagesA; ?>
</center>

<br/>

<div align="center">
<hr/>   

<?php

foreach ($Products as $val) {
      
?>

    <div><img src="/images/shop/<?php echo $val->Id; ?>.jpg" width="300px" class="img-shop" /></div>
    
    <b class="green">Product Id:</b> <?php echo $val->Id; ?><br/>
    <b class="green">Name:</b> <?php echo $val->Name; ?><br/>
    <b class="green">Description:</b> <?php echo $val->Description; ?><br/>
    <b class="green">Products is:</b> <?php echo $val->Count; ?><br/>
    <b class="green">Prise:</b> <?php echo $val->Prise; ?><br/>
    
    <?php 
        if (isset($_SESSION['Id'])) {
            if ($val->Count > 0) {
    ?>
    <button class="BuyProduct-button" ProductId="<?php echo $val->Id; ?>">BUY NOW</button>
    
    <?php
            } else {
    ?>
                <b class="red">no Product</b>
    
    <?php            
            }

        } else {
    ?>   
        <button class="login-button">Login</button>
    
    <?php
        }
    ?>
        
    <hr/>
    
<?php 
} 
 
echo '<br/>'.$PagesA;

?>

</div>