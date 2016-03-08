<?php

$css = $Args['css'];

if (isset($_GET['so'])) {

?>    

<script>

$(document).ready(function () {
    
    $('.<?php echo $css; ?>').find('[name=option]').filter('[value=<?php echo $_GET['so']; ?>]').prop('checked', true);
    
    
});

</script>

<?php  
}


?>

<div class="<?php echo $css; ?>" align="right">
    <table>
        <tr>
            <td>Search:</td>
            <td><input type="text" name="search" value="<?php echo isset($_GET['s']) ? $_GET['s'] : ''; ?>">
                <label class="E"></label></td>
            <td>   
                <input type="radio" name="option" value="Id" checked> User Id<br>
                <input type="radio" name="option" value="Email"> User Email<br>             
            </td>    
            <td> <input type="submit" name="button" value="search"></td>
        </tr>
    </table> 
</div>
