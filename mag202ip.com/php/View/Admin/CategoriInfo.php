<?php
$Categori = $Args;

//var_dump(User::$User);
?>

<center> 
    <h1>
        <?php
        if ($Categori->Id == null) {
            echo "Add new Categori: ";
        } else {
            echo "Categori Edit:";
        }
        ?>
    </h1><br/>

<a href="/Admin/Categories/">Back</a><br/>
    <table style="width:30%">
        <tr>
            <td>


                <section class="edit-categori-data">

                    <label for="Name">Name:<br/>
                        <input type="text" name="Name" placeholder="Name" value="<?php echo $Categori->Name; ?>" required>
                        <label class="E"></label>
                    </label><br/>

                    <button type="button" class="edit-categori-button">Edit</button>

                    <label for="Id" style="visibility: hidden;">Id:<br/>
                        <input type="Id" name="Id" placeholder="Id" value="<?php echo $Categori->Id; ?>" required>
                        <label class="E"></label>
                    </label><br/> 
                </section>


            </td>
        </tr>
    </table>          

</center>