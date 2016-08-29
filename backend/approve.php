<?php
include("../intro.php");
include("intro.php");

$current = str_replace("approve.php","../../games_for_approval/".$_GET['file'],__FILE__);
$target = str_replace("approve.php","../usergames/".$_GET['file'],__FILE__);
if(file_exists($current) && !file_exists($target)){
    rename($current,$target);
    include("make_gamelist.php");
    echo("Success! <a href='/backend'>Back to list</a>");
} else {
    echo("Failed to move the file, probably because the file does not exist or another file already exists at the target path.");
}

include("../outro.php");

?>
