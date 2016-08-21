<?php
include("../intro.php");

function noslash($string){
    for($i=0;$i<strlen($string);$i++){
        if(substr($string,$i,1)=="/"){return false;}
    }
    return true;
}

$current = str_replace("approve.php","../../games_for_approval/".$_GET['file'],__FILE__);
if(file_exists($current) && noslash($_GET['file']){
    unlink($current);
    echo("Success! <a href='/backend'>Back to list</a>");
} else {
    echo("Failed to delete the file, probably because the file does not exist.");
}

include("../outro.php");

?>
