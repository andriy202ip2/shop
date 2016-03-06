<?php

foreach ($Args as $val) {

    $selected = "";

    echo '<option value="' . $val->Id . '">' . $val->Name . '</option>';
}
?>