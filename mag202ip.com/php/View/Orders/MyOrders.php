<?php
if ($Args['e']) {
    ?>    

    <center>
        <h2><b class="green">My Orders Searchr: </b></h2>


        <?php
        ControllerPartial::Get('Searchr/Orders/');

        foreach ($Args['e'] as $val) {
            echo '<b class="red">' . $val . '</b><br/>';
        }
        ?>    

    </center>    

    <?php
} elseif (!isset($Args['Orders'])) {

    ControllerPartial::Get('Searchr/Orders/');
    ?> 

    <center>
        <h2><b class="green">You do not have any Orders !!!</b></h2>
    </center>

    <?php
//var_dump($Args);
} else {

    $Orders = $Args['Orders'];

    $F = new F_Help();

    $PagesA = $F->NewPager($Args['Page'], $Args['Pages'], $Args['url'], $Args['GETurl']);
    ?>

    <center><h2><b class="green">My Orders: </b></h2>

        <?php
        ControllerPartial::Get('Searchr/Orders/');
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
            <b class="green">Product Id:</b> <?php echo $val->Id_product; ?><br/>
            <b class="green">Product Name:</b> <?php echo $val->Name; ?><br/>
            <b class="green">Product Description:</b> <?php echo $val->Description; ?><br/>
            <b class="green">Products buy:</b> <?php echo $val->Count; ?><br/>
            <b class="green">Product Prise:</b> <?php echo $val->Prise; ?><br/>

            <b class="green">Categori Name: </b><?php echo $val->CategoriName; ?><br/>
            <b class="green">Sub Categori Name: </b><?php echo $val->SubCategoriName; ?><br/>

            <b class="green">All Prise: </b><?php echo $val->PriseAll; ?><br/>

            <hr/>

            <?php
        }

        echo '<br/>' . $PagesA;
        ?>

    </div>

    <?php
} 
?>