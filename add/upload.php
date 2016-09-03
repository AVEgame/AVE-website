<?php
function kill($text){include("../intro.php");echo $text."<br /><br /><a href='/add'>Back to upload form</a>";include("../outro.php");die();}

$fname = $_FILES["avefile"]["name"];

if(substr($fname,-4) != ".ave"){
kill("Your file muse have the file extension <span class='source'>.ave</span>.");
}
//$check = file_get_contents($_FILES['avefile']['tmp_name']);
// to do: Run some checks on the text in $check. Eg. If it have no title, throw error.
//print_r($check);

$upto = str_replace("upload.php","../games/".$fname,__FILE__);
$main = str_replace("upload.php","../ave/games/".$fname,__FILE__);
$tempupto = str_replace("upload.php","../../games_for_approval/".$fname,__FILE__);
if(file_exists($main)){
    kill("A game with this filename already exists in the default library. You cannot propose overwriting it...");
}
if(file_exists($upto)){
    kill("A game with this filename already exists. You cannot yet propose overwriting it...");
}
if(file_exists($tempupto)){
    kill("A game with this filename already exists and it awaiting approval. You cannot yet propose overwriting it...");
}


rename($_FILES["avefile"]["tmp_name"],$tempupto);
chmod($tempupto,0755);
include("../intro.php");
mail("matthew.w.scroggs@gmail.com","Game Added","A game has been submitted to the AVE library. Go to http://avegame.co.uk/backend to approve it.");
echo("Thank you for submitting you game. You will be able to play it at <a href='http://avegame.co.uk/play/user/".$fname."'>avegame.co.uk/play/user/".$fname."</a> once we have approved it. Please be patient, we'll approve it as soon as we can.");
include("../outro.php");

?>

