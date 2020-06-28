<?php
include("intro.php");
?>
Welcome to the <?php echo ave();?>: Adventure! Villainy! Excitement! website. <?php echo ave();?> is a text-based game engine written by
<a href='http://mscroggs.co.uk'>Matthew Scroggs</a> and <a href='https://github.com/giannie'>Gin Grasso</a>.
<h2>Play AVE</h2>
Before reading any more, you should have a go at playing <?php echo ave();?>.
<br /><br />
<?php
include("ave/select.php");
?>
<h2>About AVE</h2>
<div class='imgr'>
<img src='/img/badge.jpg'><br />
<?php echo ave();?> running on the EMF <a href='https://badge.emfcamp.org/wiki/TiLDA_MK3' target='new'>TiLDA Mk&pi;</a> badge.
</div>
<?php echo ave();?> began life as a <a href='/docs/python.md'>Python game</a>. At <a href='https://emfcamp.org' target='new'>Electromagnetic Field 2016 (EMF)</a>
we made a version of <?php echo ave();?> that runs on the <a href='/docs/badge.md'>TiLDA Mk&pi; badge</a>
that was given to every attendee. Shortly after EMF, we began work on a javascript version of <?php echo ave();?>, this website and 
Android and iOS apps (coming soon).
<br /><br />
If you want to play AVE on a non-Linux/Mac computer, you can download our <a href='/docs/virtualbox.md'>VirtualBox image</a>.
<h2>Making Your Own Games</h2>
If you would like to write your own games for <?php echo ave();?>, have a look at
<a href='/make'>these instructions</a>. Once you have written a game, you can submit it to the game library <a href='/add'>here</a>.
You can view all user submitted games <a href='/library'>in the library</a>. Once a game has been included in the game library, it will become
playable on any version of <?php echo ave();?> (as long as the player is connected to the internet).
<h2>Contributing to AVE</h2>
If you want to edit the source code of AVE, it is available on <a href='/git'>GitHub</a>.
<?php
include("outro.php");
?>
