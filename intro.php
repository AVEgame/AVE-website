<?php

$version=file_get_contents(str_replace("intro.php","ave/VERSION",__FILE__));
$til=0;
function ave(){
    return "<span style='color:red'>A</span><span style='color:green'>V</span><span style='color:blue'>E</span>";
}
function tildas($title=false){
    global $til;
    $out="<span style='color:red'";
    if($til%3!=0 && $title){$out.=" class='optional'";}
    $out.=">~</span> <span style='color:green'";
    if($til%3!=1 && $title){$out.=" class='optional'";}
    $out.=">~</span> <span style='color:blue'";
    if($til%3!=2 && $title){$out.=" class='optional'";}
    $out.=">~</span> ";
    $til += 1;
    return $out;
}

?>
<html>
<head>
<title>AVE: Adventure! Villainy! Excitement!</title>
<link rel='stylesheet' href='/sty.css?new2'>
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
<a href='/git'>GitHub</a>
<?php echo tildas(true);?>
<a href='/team'>team</a>
</div>
<div class='maintext'>
