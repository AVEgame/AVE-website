<?php
include("intro.php");
?>
Online playable versions of AVE games are coming soon.
For now, you can download AVE from
<a href='https://github.com/mscroggs/AVE'>GitHub</a>.

<script type='text/javacript' src='ave/game.js'></script>
<div class='game'>
<div class='gameend'>GAME OVER<br /></br />
<div class='menuitem'>Play again</div>
<div class='menuitem'>Play a different game</div>
</div>
<div class='roominfo'>You wake up. What do you want to do?</div>
<div class='inventory'>INVENTORY<br />Hat</div>
<div class='menu'>
<div class='menuitem' onclick='alert("up")'>Get up</div>
</div>
</div>

<?php
include("outro.php");
?>
