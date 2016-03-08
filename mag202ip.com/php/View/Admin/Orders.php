<?php
if ($Args['e']) {
    ?>    

    <center>
        <h2><b class="green">Orders Searchr: </b></h2>


        <?php
        ControllerPartial::Get('Searchr/OrdersAdmin/');

        foreach ($Args['e'] as $val) {
            echo '<b class="red">' . $val . '</b><br/>';
        }
        ?>    

    </center>    

    <?php
} elseif (!isset($Args['Orders'])) {

    ControllerPartial::Get('Searchr/OrdersAdmin/');
    ?> 

    <center>
        <h2><b class="green">Nothing found !!!</b></h2>
    </center>

    <?php
//var_dump($Args);
} else {

    //var_dump($Args);

    $Orders = $Args['Orders'];
    $F = new F_Help();

    $PagesA = $F->NewPager($Args['Page'], $Args['Pages'], $Args['url'], $Args['GETurl']);
    ?>

    <center><h2><b class="green">All Orders: </b></h2>

        <?php
        ControllerPartial::Get('Searchr/OrdersAdmin/');
        ?>

        Orders Count: <?php echo $Args['Count']; ?><br/>
        Page: <?php echo $Args['Page']; ?> Pages: <?php echo $Args['Pages']; ?><br/>
        <?php echo $PagesA; ?>
    </center>

    <br/>

    <div align="center">
        <hr/>   

        <?php
        foreach ($Orders as $val) {
            ?>

            <b class="green">Order Id:</b> <?php echo $val->Id; ?><br/>
            <b class="green">Product Name:</b> <?php echo $val->Name; ?><br/>
            <b class="green">Count:</b> <?php echo $val->Count; ?><br/>
            <b class="green">Product Description:</b> <?php echo $val->Description; ?><br/>
            <b class="green">Categori Name:</b> <?php echo $val->CategoriName; ?><br/>
            <b class="green">SubCategori Name:</b> <?php echo $val->SubCategoriName; ?><br/>
            <b class="green">PriseAll:</b> <?php echo $val->PriseAll; ?><br/>
            <b class="green">Id_user:</b> <?php echo $val->Id_user; ?><br/>
            <b class="green">Id_product:</b> <?php echo $val->Id_product; ?><br/>

            <button class="delete-order-button" MyId="<?php echo $val->Id; ?>">Delete Order</button>

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