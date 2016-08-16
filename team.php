<?php
include("intro.php");

function person($img, $name1, $name2, $nick, $role, $twitter="", $website="", $github=""){
    $out = "<tr><td>";
    $out.= "<img src='/img/team/".$img.".png' class='team'>";
    $out.= "</td><td>";
    $out.= $name1." (\"".$nick."\") ".$name2;
    $out.= "<br />";
    $out.= $role;
    $out.= "<br />";
    if($website!=""){
        $out.="<img src='/img/icons/website.png' class='icon'>";
        $out.="<a href='http://".$website."' target='new'>".$website."</a><br />";
    }
    if($twitter!=""){
        $out.="<img src='/img/icons/twitter.png' class='icon'>";
        $out.="<a href='https://twitter.com/".$twitter."' target='new'>@".$twitter."</a><br />";
    }
    if($github!=""){
        $out.="<img src='/img/icons/github.png' class='icon'>";
        $out.="<a href='http://github.com/".$github."' target='new'>".$github."</a><br />";
    }
    $out.="</td></tr>";
    return $out;
}
?><table class='invisible'><?php
echo person("scroggs","Matthew","Scroggs","Scroggs","Lead programmer; story writer","mscroggs","mscroggs.co.uk","mscroggs");
echo person("gin","Gin","Grasso","Spinny Ginny","Programmer; story writer","","","Giannie");
echo person("bolt","Alex","Bolton","Bolt","Came up with the name ".ave()."; story writer","AlexDBolton","","");
echo person("alan","Alison","Clarke","Alan","Story writer","aaclarke4","","");
?></table><?php

include("outro.php");
?>
