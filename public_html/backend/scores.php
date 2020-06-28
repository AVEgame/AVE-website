<?php
include("../intro.php");
include("intro.php");

$scores = json_decode(file_get_contents("../scores.json"),true);

function esc($st){
    if($st=="null"){return "(anonymous)";}
    $st = str_replace("<","&lt;",$st);
    $st = str_replace(">","&gt;",$st);
    return $st;
}

echo("
<table>
<thead><td>#</td><td>Name</td><td>Score</td></thead>");
foreach($scores as $key=>$value){
    echo("<tr><td align='center'>".$key."</td><td>".esc($value['name'])."</td><td align='center'>".esc($value['score'])."</td></tr>");
}
echo("</table>");

include("../outro.php");
?>
