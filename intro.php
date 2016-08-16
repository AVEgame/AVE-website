<?php
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
<link rel='stylesheet' href='/sty.css'>
<link rel='stylesheet' href='/ave/sty.css'>
</head>
<body>
<div class='top'><a href='/'><img src='/top.png'></a></div>
<div class='sidebar'>
<a class='red' href='/'>home</a>
<a class='green' href='/play'>play</a>
<a class='blue' href='/make'>write</a>
<a class='red' href='/library'>library</a>
<?php echo tildas();?>
<a class='red' href='/versions/python'>python</a>
<a class='green' href='/versions/badge'>bagde</a>
<?php echo tildas();?>
<a class='red' href='/team'>team</a>
</div>
