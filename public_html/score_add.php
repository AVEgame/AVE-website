<?php

$scores = json_decode(file_get_contents("scores.json"),true);

$NN=15;

$s = $_POST['score'];
$n = $_POST['name'];

$max = 0;
$pos = 100;

foreach($scores as $key=>$value){
    $max = max($max,$key);
    if($s>$value['score']){
        $pos = min($pos,$key);
    }
}

if($pos==100 && $max<$NN){
    $pos=$max+1;
}


if($pos!=100){
    for($i=min($NN-1,$max);$i>=$pos;$i--){
        $scores[$i+1] = $scores[$i];
    }
    $scores[$pos] = Array("name"=>$n,"score"=>$s);
}


$fp = fopen('scores.json', 'w');
fwrite($fp, json_encode($scores));
fclose($fp);

function esc($st){
    if($st=="null"){return "(anonymous)";}
    $st = str_replace("<","&lt;",$st);
    $st = str_replace(">","&gt;",$st);
    return $st;
}

echo("High Scores<br />
<table class='white'>
<thead><td>#</td><td>Name</td><td>Score</td></thead>");
foreach($scores as $key=>$value){
    echo("<tr><td align='center'>".$key."</td><td>".esc($value['name'])."</td><td align='center'>".esc($value['score'])."</td></tr>");
}
echo("</table>");

?>
