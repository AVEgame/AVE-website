<?php

if(!isset($_SERVER['HTTP_REFERER']) || (isset($_SERVER['HTTP_REFERER']) && !preg_match("/^http:\/\/(www\.)?avegame\.co\.uk/i",$_SERVER['HTTP_REFERER']))){

if(isset($_SERVER['HTTP_REFERER'])){$ref=$_SERVER['HTTP_REFERER'];} else {$ref="?";}
$f=fopen(str_replace("intro.php","backend/referers",__FILE__),'a');
fwrite($f,date("Y-m-d H:i:s")."|".$_SERVER['REMOTE_ADDR']."|".$ref."
");
fclose($f);
}

$thispage=strtolower($_SERVER['REQUEST_URI']);
$thispage=preg_replace('/\/$/','',$thispage)."
";
$ff=fopen(str_replace("intro.php","backend/vtoday",__FILE__),"a");
fwrite($ff,$thispage);
fclose($ff);

$version=file_get_contents(str_replace("intro.php","ave/VERSION",__FILE__));
$til=0;
function ave(){
    return "<span style='color:#CC0000'>A</span><span style='color:#4d9906'>V</span><span style='color:#32619e'>E</span>";
}
function tildas($title=false){
    global $til;
    $out="<span style='color:#cc0000'";
    if($til%3!=0 && $title){$out.=" class='optional'";}
    $out.=">~</span> <span style='color:#4d9906'";
    if($til%3!=1 && $title){$out.=" class='optional'";}
    $out.=">~</span> <span style='color:#32619e'";
    if($til%3!=2 && $title){$out.=" class='optional'";}
    $out.=">~</span> ";
    $til += 1;
    return $out;
}

?>
<html>
<head>
<title>AVE: Adventure! Villainy! Excitement!</title>
<link rel='stylesheet' href='/sty.css'>
<link rel='stylesheet' href='/ave/sty.css'>
</head>
<body>
<div class='top'><a href='/'><img src='/top.png'></a><div class='version'>v<?php echo $version;?></div></div>
<div class='sidebar'>
<a href='/'>home</a>
<a href='/play'>play</a>
<a href='/make'>write</a>
<a href='/library'>library</a>
<?php echo tildas(true);?>
<a href='/versions/python'>python</a>
<a href='/versions/badge'>badge</a>
<a href='/versions/apps'>apps</a>
<a href='/git'>GitHub</a>
<?php echo tildas(true);?>
<a href='/team'>team</a>
</div>
<div class='maintext'>
