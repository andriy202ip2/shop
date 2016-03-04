<?php
$U = $Args;

//var_dump(User::$User);
?>

<center> 
    <h1>User Profile Edit</h1><br/>

    <table style="width:30%">
        <tr>
            <td>


                <section class="edit-user-data">

                    <label for="Email">Email:<br/>
                        <input type="email" name="Email" placeholder="yourname@email.com" value="<?php echo $U->Email; ?>" required>
                        <label class="E"></label>
                    </label><br/>

                    <label for="Pass">Password:<br/>
                        <input type="password" name="Pass" placeholder="password" required>
                        <label class="E"></label>
                    </label><br/>      

                    <label for="Pass2">Re enter Password:<br/>
                        <input type="password" name="Pass2" placeholder="password" required>
                        <label class="E"></label>
                    </label><br/>    

                    <label for="FirstName">First Name:<br/>
                        <input type="text" name="FirstName" placeholder="First Name" value="<?php echo $U->FirstName; ?>" required>
                        <label class="E"></label>
                    </label><br/>  

                    <label for="LastName">Last Name:<br/>
                        <input type="text" name="LastName" placeholder="Last Name" value="<?php echo $U->LastName; ?>" required>
                        <label class="E"></label>
                    </label><br/>

                    <label for="Money">Money:<br/>
                        <input type="text" name="Money" placeholder="Money" value="<?php echo $U->Money; ?>" required>
                        <label class="E"></label>
                    </label><br/>

                    <label for="RightsAccess">RightsAccess:<br/>
                        <input type="text" name="RightsAccess" placeholder="RightsAccess" value="<?php echo $U->RightsAccess; ?>" required>
                        <label class="E"></label>
                    </label><br/>

                    <button type="button" class="edit-user-button">Edit</button>

                    <label for="Id" style="visibility: hidden;">Id:<br/>
                        <input type="Id" name="Id" placeholder="Id" value="<?php echo $U->Id; ?>" required>
                        <label class="E"></label>
                    </label><br/> 
                </section>


            </td>
        </tr>
    </table>          

</center>