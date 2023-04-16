<?php

if (isset($_POST['submit']))
{
    session_start();
    session_destroy();
    
    echo '<style>.recommend{display: block;} .recommend-outside{display: block;}</style>';
    echo '<h2>Logged Out Successfully</h2>';
    echo '<button onclick="closePopup()" class="close">Close</button>';
}

?>