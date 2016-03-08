<?php
if ($Args['e']) {
    ?>    

    <center>
        <h2><b class="green">All Products Searchr: </b></h2>


        <?php
        ControllerPartial::Get('Searchr/ProductsAdmin/');

        foreach ($Args['e'] as $val) {
            echo '<b class="red">' . $val . '</b><br/>';
        }
        ?>    

    </center>    

    <?php
} elseif (!isset($Args['Products'])) {

    ControllerPartial::Get('Searchr/ProductsAdmin/');
    ?> 

    <center>
        <h2><b class="green">All Products Searchr: </b></h2>

        <div class="red"><h1>Nothing found !!!</h1></div></center>

    <?php
} else {
//var_dump($Args);

    $Products = $Args['Products'];
    $F = new F_Help();

    $PagesA = $F->NewPager($Args['Page'], $Args['Pages'], $Args['url'], $Args['GETurl']);
    ?>

    <center><h2><b class="green">All Products: </b></h2>

    <?php
    ControllerPartial::Get('Searchr/ProductsAdmin/');
    ?>   
        <a href="/Admin/ProductInfo/0">Add Product</a><br/>

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
            <b class="green">Product Id_categories:</b> <?php echo $val->Id_categories; ?><br/>
            <b class="green">Product Id_sub_categories:</b> <?php echo $val->Id_sub_categories; ?><br/>
            <b class="green">Product Name:</b> <?php echo $val->Name; ?><br/>
            <b class="green">Product Count:</b> <?php echo $val->Count; ?><br/>
            <b class="green">Product Description:</b> <?php echo $val->Description; ?><br/>
            <b class="green">Product Prise:</b> <?php echo $val->Prise; ?><br/>
            <b class="green">Product CategoriName:</b> <?php echo $val->CategoriName; ?><br/>
            <b class="green">Product SubCategoriName:</b> <?php echo $val->SubCategoriName; ?><br/>

            <a href="/Admin/ProductInfo/<?php echo $val->Id; ?>">Edit Product</a>

            <button class="delete-product-button" MyId="<?php echo $val->Id; ?>">Delete Product</button>


            <br/><br/>


            <hr/>

        <?php
    }

    echo '<br/>' . $PagesA;
    ?>

    </div>

    <?php
}
?>