<?php
include("intro.php");
?>
Welcome to the <?php echo ave(); ?> game library.
You can download or play games below, or submit your own games for approval <a href='/add'>here</a>.
To find out more about writing your own game for <?php echo ave(); ?> see the <a href='/write'>make page</a>.
<br /><br />
<?php
$games = json_decode(file_get_contents("gamelist.json"),TRUE);

foreach($games as $key=>$value){
    echo tildas();
    echo("<br />");
    echo("<b>".$value["title"]."</b> by ".$value["author"]);
    echo("<br />");
    echo($value["desc"]);
    echo("<br />");
    if(substr($key,0,5)!="user/" && $value["active"]){echo("<img src='/img/icons/tick.png' class='icon big' title='This game is included in the default library'> ");}
    echo("<a class='invisible' href='/play/".$key."'><img src='/img/icons/play.png' class='icon big' title='Play this game online'></a> ");
    echo("<a class='invisible' href='/download/".$key."'><img src='/img/icons/download.png' class='icon big' title='Download this game'></a> ");
    echo("<br />");
}
</script>
<?php
echo tildas();
include("outro.php");
?>
