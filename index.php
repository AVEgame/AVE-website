<?php
include("intro.php");
?>
Online playable versions of AVE games are coming soon.
For now, you can download AVE from
<a href='https://github.com/mscroggs/AVE'>GitHub</a>.

<script type='text/javascript' src='ave/game.js'></script>
<div class='game'>
<div style='width:100%;text-align:right;margin-bottom:3px'><span style='color:red'>A</span><span style='color:green'>V</span><span style='color:blue'>E</span></div>
<div id='gameend'>
<div id='gameendtext'>GAME OVER</div>
<div class='menuitem' onclick='gameRestart()'>Play again</div>
<div class='menuitem' onclick='gameList()'>Play a different game</div>
</div>
<div id='roominfo'>You wake up. What do you want to do?</div>
<div id='inventory'>INVENTORY<br />Hat</div>
<div id='menu'>
<div class='menuitem' onclick='loadRoom("up")'>Get up</div>
</div>
</div>

<?php
include("outro.php");
?>
