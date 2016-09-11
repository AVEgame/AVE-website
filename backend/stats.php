<?php

include('../intro.php');
include('intro.php');

$show=100;
if(isset($_GET['show'])){$show=$_GET['show'];}
$show2=1000;
if(isset($_GET['show2'])){$show2=$_GET['show2'];}

$pagv=file_get_contents("referers-summary");
$pagv=explode("
",$pagv);


echo("<h2>Referrers by Date</h2>
");
if($show==100){
echo(markup("<p><a href='?show=0' >Show more</a></p>"));
} else {
echo(markup("<p><a href='?show=100' >Show less</a></p>"));

}
echo("
<table>
");

$in="<thead>";
$out="</thead>
";

$totals=array("Total");

for($i=0;$i<count($pagv);$i++){
$pagv[$i]=explode(",",$pagv[$i]);
if($i>0){
for($j=1;$j<count($pagv[$i]);$j++){
while(count($totals)<=$j){$totals[count($totals)]=0;}
$totals[$j]+=$pagv[$i][$j];
}
}
}

$include=array(true);
for($i=1;$i<count($totals);$i++){
$include[$i]=false;
if($totals[$i]>$show){$include[$i]=true;}
}

foreach($pagv as $inpagv){
echo($in);
$tot=0;
$tot2=0;
for($i=0;$i<count($inpagv);$i++){
if(isset($include[$i]) && $include[$i]){
echo("<td");
if($i==0){echo(" class='hd'");}
echo(">".str_replace(".","<br />.",$inpagv[$i])."</td>");
} else  if($i>0){$tot+=$inpagv[$i];}
if($i>0){$tot2+=$inpagv[$i];}
}

$colspan=0;
for($i=count($inpagv);$i<count($include);$i++){
if($include[$i]){$colspan++;}
}

if($in=="<tr>"){if($colspan>0){echo("<td colspan='".$colspan."'></td>");}
echo("<td>".$tot."</td><td class='hd'>".$tot2."</td>");}
else{echo("<td>Other</td><td>Total</td>");}
echo($out);
$in="<tr>";$out="</tr>
";
}

$colspan=1;
foreach($include as $in){if($in){$colspan++;}}

echo("<tr><td class='hd'>Today</td><td colspan='".($colspan-1)."'>");

$today=file_get_contents("referers");
$today=explode("
",$today);



foreach($today as $ref){if($ref!=""){
$ref=explode("|",$ref);
$ref=$ref[2];
if(strlen($ref)>30){
$ref2=substr($ref,0,27)."...";
} else {$ref2=$ref;}
if($ref!="?"){echo("<a target='new' href='".$ref."'>");}
echo($ref2." ");
if($ref!="?"){echo("</a>");}
}}

echo("</td><td class='hd'>".count($today)."</td></tr>
");

echo("<tr>");
echo("<td class='hd'>Total</td>");
$tot=0;
$gtot=0;
foreach($totals as $i=>$t){if($i>0){
if($include[$i]){echo("<td class='hd'>".$t."</td>");}
else{$tot+=$t;}
$gtot+=$t;
}}
echo("<td class='hd'>".$tot."</td><td class='hd'>".$gtot."</td></tr>
");

echo("</table>");




$vtoday=file_get_contents("vtoday");
$vtoday=explode("
",$vtoday);
$vt=array();
foreach($vtoday as $view){
if(!isset($vt[$view])){$vt[$view]=0;}
$vt[$view]++;
}


$pagv=file_get_contents("pagv");
$pagv=explode("
",$pagv);
echo("<h2>Pageviews</h2>");
if($show2==1000){
echo(markup("<p><a href='?show2=50' >Show more</a></p>"));
} else {
echo(markup("<p><a href='?show2=1000' >Show less</a></p>"));
}
echo("
<table>
<thead><td>Page</td><td>Views</td><td>Today</td></thead>
");
$output="";

$pagvmap=Array();
foreach($pagv as $key=>$value){
$value=explode("|",$value);
$pagvmap[$value[0]]=$value[1];
if($value[1]>$show2){
$output.="<tr><td>".$value[0]."</td>";
if(isset($vt[$value[0]])){$output.="<td>".($value[1]+$vt[$value[0]])."</td><td>".$vt[$value[0]]."</td>";unset($vt[$value[0]]);}
else{$output.="<td>".$value[1]."</td>";}
"</tr>
";
}
}
foreach($vt as $key=>$value){
$output.="<tr><td>".$key."</td><td><span style='color:#555555'>";
if(isset($pagvmap[$key])){$output.=($pagvmap[$key]+$value);}
else {$output.=$value;}
$output.="</span></td><td>".$value."</td></tr>";
}

$pnT=array_keys($pnArr);
for($i=0;$i<count($pnT);$i++){
$output=str_replace("<td>".$pnT[$i]."</td>","<td>".$pnArr[$pnT[$i]]."</td>",$output);
}
echo($output);


echo("</table>");

include('../outro.php');


?>
