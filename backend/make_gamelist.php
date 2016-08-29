<?php

$PUBLICDIR = "..";

function _clean_newlines($string){
    return str_replace("\n","",$string);
}

function _clean($string){
    $string = _clean_newlines($string);
    while(strlen($string) > 0 && substr($string,0,1) == " "){
        $string = substr($string,1);
    }
    while(strlen($string) > 0 && substr($string,-1,1) == " "){
        $string = substr($string,0,-1);
    }
    return $string;
}

function clean($string){
    $string = _clean($string);
    return $string;
}

function getDetails($game){
    $f = file_get_contents($game);
    $f = explode("\n",$f);
    $active = true;
    foreach($f as $line){if(strlen($line)>0){
        if(substr($line,0,2) == "==" && substr($line,-2) == "=="){
            $title = clean(substr($line,2,-2));
        }
        if(substr($line,0,2) == "--" && substr($line,-2) == "--"){
            $description = clean(substr($line,2,-2));
        }
        if(substr($line,0,2) == "**" && substr($line,-2) == "**"){
            $author = clean(substr($line,2,-2));
        }
        if(substr($line,0,2) == "~~" && substr($line,-2) == "~~"){
            if(clean(substr($line,2,-2))=="off"){
                $active=false;
            }
        }
    }}
    if(!isset($title) || !isset($author) || !isset($active)){
        return false;
    }
    if(substr($file,0,5)=='user/'){$user=true;}
    else {$user=false;}
    return Array("title"=>$title,"author"=>$author,"desc"=>$description,"active"=>$active,"user"=>$user);
}

$games = Array();
foreach(Array(Array($PUBLICDIR."/ave/games",""),Array($PUBLICDIR."/usergames","user/")) as $dir){
    foreach(scandir($dir[0]) as $file){
        if(substr($file,-4)==".ave"){
            $d = getDetails($dir[0]."/".$file);
            if($d){
                $games[$dir[1].$file] = getDetails($dir[0]."/".$file);
            }
        }
    }
}

file_put_contents($PUBLICDIR."/gamelist.json", json_encode($games,TRUE));
?>
