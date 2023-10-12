<?php
if(exsension_loaded('gd')&& function_exists('gd_info')){
    echo "Gd instalado";
    
}else {
    echo "GD no instalado";
}
//echo phpinfo();
?>