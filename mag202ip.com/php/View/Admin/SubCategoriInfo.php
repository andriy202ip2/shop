<?php
$SubCategori = $Args['SubCategori'];
$AllCategories = $Args['AllCategories'];

//var_dump($Args);
?>

<center> 
    <h1>
        <?php
        if ($SubCategori->Id == null) {
            echo "Add new SubCategori: ";
        } else {
            echo "SubCategori Edit:";
        }
        ?>
    </h1><br/>

    <a href="/Admin/SubCategories/">Back</a><br/>
    <table style="width:30%">
        <tr>
            <td>


                <section class="edit-subcategori-data">

                    <label for="Name">Name:<br/>
                        <input type="text" name="Name" placeholder="Name" value="<?php echo $SubCategori->Name; ?>" required>
                        <label class="E"></label>
                    </label><br/>

                    <label for="CategoriId">Categori Name:<br/>
                        <select name="CategoriId">
                            <?php 
                                    foreach ($AllCategories as $val) {
                                        
                                        $selected = "";
                                        if ($val->Id == $SubCategori->Id_categori) {
                                            $selected = " selected";
                                        }
                                        
                                        echo '<option value="'.$val->Id.'"'.$selected.'>'.$val->Name.'</option>';
                                    }
                            ?>
                            
                        </select>
                        <label class="E"></label>
                    </label><br/>


                    <button type="button" class="edit-subcategori-button">Edit</button>

                    <label for="Id" style="visibility: hidden;">Id:<br/>
                        <input type="Id" name="Id" placeholder="Id" value="<?php echo $SubCategori->Id; ?>" required>
                        <label class="E"></label>
                    </label><br/> 
                </section>


            </td>
        </tr>
    </table>          

</center>