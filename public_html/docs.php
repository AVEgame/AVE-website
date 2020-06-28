<?php
include("intro.php");

$text = "\n".file_get_contents("docs_files/".$_GET['file'])."\n";

$text = preg_replace("/\n=+\n+/","</h2>\n",$text);
$text = preg_replace("/\n-+\n+/","</h3>\n",$text);
$text = preg_replace("/\n+([^\n]*)<\/h2>\n+/","\n<h2>$1</h2>\n",$text);
$text = preg_replace("/\n+([^\n]*)<\/h3>\n+/","\n<h3>$1</h3>\n",$text);
while(preg_match("/\n+    ([^\n]*)\n+    ([^\n]*)\n+/",$text)){
    $text = preg_replace("/\n+    ([^\n]*)\n+    ([^\n]*)\n+/","\n    $1<br>$2\n",$text);
}
function spacing($matches){
    return "\n<div class='source'>".str_replace(" ","&nbsp;",$matches[1])."</div>\n";
}
$text = preg_replace_callback("/\n+    ([^\n]*)\n+/","spacing",$text);
$text = preg_replace("/`([^\n`]*)`/","<span class='source'>$1</span>",$text);
$text = preg_replace("/\[([^\]]*)\]\((https?:\/\/[^\)]*)\)/","<a href='$2' target='new'>$1</a>",$text);
$text = preg_replace("/\[([^\]]*)\]\(([^\)]*)\)/","<a href='$2'>$1</a>",$text);
while(preg_match("/\n+\* ([^\n]*)\n+/",$text)){
    $text = preg_replace("/\n+\* ([^\n]*)\n+/","\n<li>$1</li>\n",$text);
}
$text = preg_replace("/<\/li>\n+<li>/","</li><li>",$text);
while(preg_match("/<\/li>\n+\*\* ([^\n]*)\n+/",$text)){
    $text = preg_replace("/<\/li>\n+\*\* ([^\n]*)\n+/","<ul><li>$1</li></ul></li>\n",$text);
}
$text = preg_replace("/<li>([^\n]*)<\/li>/","<ul><li>$1</li></ul>",$text);
$text = preg_replace("/<\/ul>\n*<ul>/","",$text);
$text = preg_replace("/\%\%([^\%]*)\%\%/","<span style='color:#4d9906'>&lt;<i>$1</i>&gt;</span>",$text);

// table
function strip_spaces($txt){

}
function table($matches){
    $out = "\n\n<table>";
    $rows = "";
    foreach(explode("\n", $matches[1]) as $row){
        if(preg_match("/^[\| -]+$/", $row)){
            $out = str_replace("<table>", "<table>\n<thead>", $out) . "</thead>";
        } else {
            $row = preg_replace("/^\|/","<tr><td>", $row);
            $row = preg_replace("/\|$/","</td></tr>", $row);
            $out.= str_replace("|","</td><td>", $row) . "\n";
        }
    }
    $out.= "</table>\n\n";
    return $out;
}
$text = preg_replace_callback("/((?:\|[^\n]*\|(\n|$))+)/","table",$text);


//$text = preg_replace("/\n\n+/","\n<br /><br />\n",$text);
$text = str_replace(" AVE"," ".ave(),$text);

echo $text;


include("outro.php");
?>
