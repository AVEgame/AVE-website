<?php
include("intro.php");
?>
Welcome to the <?php echo ave(); ?> game library. You can download games below, or submit your own games for approval <a href='/add'>here</a>.
<br /><br />
<?php
$games = Array(
    "test"=>Array("title"=>"Test","author"=>"Matthew Scroggs","desc"=>"testing this now"),
    "tea"=>Array("title"=>"Tea","author"=>"Matthew Scroggs & Gin Grasso","desc"=>"The Tea Game"),
    "user/test"=>Array("title"=>"User game","author"=>"Matthew Scroggs & Gin Grasso","desc"=>"The Tea Game")
);
foreach($games as $key=>$value){
    echo tildas();
    echo("<br />");
    echo("<b>".$value["title"]."</b> by ".$value["author"]);
    echo("<br />");
    echo($value["desc"]);
    echo("<br />");
    if(substr($key,0,5)!="user/"){echo("<img src='/img/icons/tick.png' class='icon big' title='This game is included in the default library'> ");}
    echo("<a class='invisible' href='/play/".$key.".ave'><img src='/img/icons/play.png' class='icon big' title='Play this game online'></a> ");
    echo("<a class='invisible' href='/download/".$key.".ave'><img src='/img/icons/download.png' class='icon big' title='Download this game'></a> ");
    echo("<br />");
}
</script>
<?php
echo tildas();
include("outro.php");
?>
