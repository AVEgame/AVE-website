<?php

$version=file_get_contents("ave/VERSION");

function ave(){
    return "<span style='color:red'>A</span><span style='color:green'>V</span><span style='color:blue'>E</span>";
}
function tildas(){
    return "<span style='color:red'>~</span> <span style='color:green'>~</span> <span style='color:blue'>~</span> ";
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
<?php echo tildas();?>
<a href='/versions/python'>python</a>
<a href='/versions/badge'>bagde</a>
<a href='/git'>GitHub</a>
<?php echo tildas();?>
<a href='/team'>team</a>
</div>
<div class='maintext'>
