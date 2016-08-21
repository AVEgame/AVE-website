<?php
include("../intro.php");
?>
To add a game to the library, please upload it using the form below. Once you have uploaded it, we will review it then make it public.<br /><br />
<form method='post' action='/add/upload' enctype='multipart/form-data'>
<input type="file" name="avefile" accept=".ave">
<button>upload</button>
</form>

<?php
include("../outro.php");
?>
