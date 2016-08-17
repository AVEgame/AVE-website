<?php
include("intro.php");
?>
Welcome to the <?php echo ave(); ?> game library. You can download games below, or submit your own games for approval <a href='/add'>here</a>.
<br /><br />
<?php
$games = Array("a"=>Array("title"=>"test","author"=>"Matthew Scroggs","desc"=>"testing this now"));
foreach($games as $key=>$value){
    echo tildas();
    echo("<br />");
    echo("<b>".$value["title"]."</b> by ".$value["author"]);
    echo("<br />");
    echo($value["desc"]);
    echo("<br />");
    echo("<img src='/img/icons/tick.png' class='icon' title='This game is included in the default library'> ");
    echo("<img src='/img/icons/play.png' class='icon' title='Play this game online'> ");
    echo("<img src='/img/icons/download.png' class='icon' title='Download this game'> ");
    echo("<br />");
}
?>
<script type='text/javascript' src='/ave/gamelist.js'></script>
<script type='text/javascript'>
for(var game in gameList){
    document.write("<?php echo tildas();?><br />")
    document.write("<b>"+gameList[game]["title"]+"</b> by "+gameList[game]["author"])
    document.write("<br />")
    document.write(gameList[game]["desc"])
    document.write("<br />")
    document.write("<img src='/img/icons/tick.png' class='icon' label='This game is included in the default library'> ")
    document.write("<img src='/img/icons/play.png' class='icon'> ")
    document.write("<img src='/img/icons/download.png' class='icon'> ")
    document.write("<br />")
}
</script>
<?php
echo tildas();
include("outro.php");
?>
