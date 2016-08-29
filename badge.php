<?php
include("intro.php");
?>
<div class='imgl'>
<img src='/img/badge.jpg'><br />
<?php echo ave();?> running on the EMF <a href='https://badge.emfcamp.org/wiki/TiLDA_MK3' target='new'>TiLDA Mk&pi;</a> badge.
</div>
At <a href='https://www.emfcamp.org' target='new'>Elecromagetic Field (EMF) 2016</a>, all attendees were given
a <a href='https://badge.emfcamp.org/wiki/TiLDA_MK3' target='new'>TiLDA Mk&pi;</a> badge. We have
made a version of <?php echo ave(); ?> that runs on this badge.
<br /><br />
You can download the most recent stable version of <?php echo ave();?> 
from the app library on your badge, or from <a href='http://api.badge.emfcamp.org/app/mscroggs/ave' target='new'>here</a>.
Alternatively you can build the badge version of <?php echo ave();?> by <a href='/github'>downloading the source from GitHub</a>,
then building with <span class='source'>./build.py emf</span>.

<?php
include("outro.php");
?>
