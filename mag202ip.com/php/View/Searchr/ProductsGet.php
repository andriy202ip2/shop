<?php

if (!isset($Args['Products'])) {
    
   ControllerPartial::Get('Searchr/Products/'); 
?> 
    
<center>
    <h2><b class="green">All Products Searchr: </b></h2>
    
    <div class="red"><h1>Nothing found !!!</h1></div></center>

<?php   
 
} else {



    $Products = $Args['Products'];
    $F = new F_Help();

    $PagesA = $F->NewPager($Args['Page'], $Args['Pages'], $Args['url'], $Args['GETurl']);
    ?>

    <center><h2><b class="green">All Products Searchr: </b></h2>

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

            <b class="green">Categori Name:</b> <a href="/Products/ProductsByCategori/<?php echo $val->Id_categories; ?>/"><?php echo $val->CategoriName; ?></a><br/>
            <b class="green">Sub Categori Name: </b><a href="/Products/ProductsBySubCategori/<?php echo $val->Id_sub_categories; ?>/"><?php echo $val->SubCategoriName; ?></a><br/>

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

        echo '<br/>' . $PagesA;
        ?>

    </div>

        <?php
    }
    ?>