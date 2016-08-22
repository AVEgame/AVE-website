<?php
include("../intro.php");
?>

<script type='text/javascript'>
function showme(id){
    document.getElementById("div_"+id).style.display = "block"
    document.getElementById("a_s_"+id).style.display = "none"
    document.getElementById("a_h_"+id).style.display = "inline"
}
function hideme(id){
    document.getElementById("div_"+id).style.display = "none"
    document.getElementById("a_s_"+id).style.display = "inline"
    document.getElementById("a_h_"+id).style.display = "none"
}
</script>
<?php
$nxt="The following games need approval:";
foreach(scandir("../../games_for_approval") as $file){
    if(substr($file,-4)==".ave"){
        echo($nxt);$nxt="";
        echo("<br />");
        echo("<b>".$file."</b> ");
        echo("<a href='/backend/approve/".$file."' style='color:#4d9906'>Approve</a> ");
        echo("<a href='/backend/deny/".$file."' style='color:#cc0000'>Deny</a> ");
        echo("<a href='javascript:showme(\"".$file."\")' id='a_s_".$file."' style='color:#32619e'>Show file contents</a> ");
        echo("<a href='javascript:hideme(\"".$file."\")' id='a_h_".$file."' style='display:none;color:#32619e'>Hide file contents</a> ");
        $cont = file_get_contents("../../games_for_approval/".$file);
        $cont = htmlspecialchars($cont);
        $cont = str_replace("\n","<br />",$cont);
        echo("<div class='source' id='div_".$file."' style='display:none'>".$cont."</div>");
    }
}
if($nxt=="The following games need approval:"){
    echo("No games awaiting approval");
}
?>

<?php
include("../outro.php");
?>
