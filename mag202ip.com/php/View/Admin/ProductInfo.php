<?php

$Product = $Args['Product'];
$AllCategories = $Args['AllCategories'];
$SubCategoris = $Args['SubCategories'];

//var_dump($AllCategories);

?>

<center> 
    <h1>
        <?php
        if ($Product->Id == null) {
            echo "Add new Product: ";
        } else {
            echo "Product Edit:";
        }
        ?>
    </h1><br/>

    <a href="/Admin/Products/">Back</a><br/>
    <table style="width:30%">
        <tr>
            <td>


                <section class="edit-product-data">

                    <label for="Name">Name:<br/>
                        <input type="text" name="Name" placeholder="Name" value="<?php echo $Product->Name; ?>" required>
                        <label class="E"></label>
                    </label><br/>

                    <label for="Id_categories">Categori Name:<br/>
                        <select name="Id_categories">
                            <?php 
                                    foreach ($AllCategories as $val) {
                                        
                                        $selected = "";
                                        if ($val->Id == $Product->Id_categories) {
                                            $selected = " selected";
                                        }
                                        
                                        echo '<option value="'.$val->Id.'"'.$selected.'>'.$val->Name.'</option>';
                                    }
                            ?>
                            
                        </select>
                        <label class="E"></label>
                    </label><br/>

                    <label for="Id_sub_categories">SubCategori Name:<br/>
                        <select name="Id_sub_categories">
                            <?php 
                                    foreach ($SubCategoris as $val) {
                                        
                                        $selected = "";
                                        if ($val->Id == $Product->Id_sub_categories) {
                                            $selected = " selected";
                                        }
                                        
                                        echo '<option value="'.$val->Id.'"'.$selected.'>'.$val->Name.'</option>';
                                    }
                            ?>
                            
                        </select>
                        <label class="E"></label>
                    </label><br/>
                    
                    <label for="Count">Count Product:<br/>
                        <input type="text" name="Count" placeholder="Count" value="<?php echo $Product->Count; ?>" required>
                        <label class="E"></label>
                    </label><br/>
                    
                    <label for="Prise">Prise:<br/>
                        <input type="text" name="Prise" placeholder="Prise" value="<?php echo $Product->Prise; ?>" required>
                        <label class="E"></label>
                    </label><br/>
                    
                    <label for="Description">Description:<br/>
                        <textarea rows="10" cols="45" name="Description"><?php echo $Product->Description; ?></textarea>
                        <label class="E"></label>
                    </label><br/>

                    <button type="button" class="edit-product-button">Edit</button>

                    <label for="Id" style="visibility: hidden;">Id:<br/>
                        <input type="Id" name="Id" placeholder="Id" value="<?php echo $Product->Id; ?>" required>
                        <label class="E"></label>
                    </label><br/> 
                </section>


            </td>
        </tr>
    </table>          

</center>