<?php
include("intro.php");
?>
As well as a game engine, <?php echo ave();?> is also a simple language that allows
you to write your own games.
This page will contain the documentation and a guide to using this language to make a game, once we've written them.
<br /><br />
For now, here are some of the features of the language:
<br /><hr><br />
<h2>Making Your Own <?php echo ave();?> Game</h2>
To make your own game for <?php echo ave();?>, create a file with the extension <span class='source'>.ave</span> in the <span class='source'>/games</span> folder.
<br /><br />
If you use the text editor nano, the file <span class='source'>ave.nanorc</span> will enable useful syntax highlighting in <span class='source'>.ave</span> files.
<br /><br />
<h3>Game Description</h3>
At the top of your <span class='source'>.ave</span> file, you should give your game a name, description and author(s). This is done as follows:
<div class='source'>== Name ==<br />
-- Description --<br />
** Author(s) **</div>
You may also prevent a game from appearing in the menu on the main screen by adding:
<div class='source'>~~ off ~~</div>
<h3>Rooms</h3>
Rooms are started with #. There must be a space following this and then the unique ID of the room.
<br /><br />
Text that will appear describing the room for the player should be place on the following lines.
<br /><br />
Options for the user should follow the format:
<div class='source'>Description of option => room_id</div>
Where room_id is the ID of the room that the player will be sent to.
<h3>Items</h3>
Items can be added to a users inventory with the + symbol at the end of a line. This can follow either a description line (in which case the item will be added as soon as the user enters the room) or to an option line, in which case the item will be added before entering the next room. For example:
<div class='source'>Here is a bucket. + bucket</div>
will add a bucket to the players inventory. You can also remove items from a player's inventory with '~':
<div class='source'>Screw you and your bucket. It's mine. ~ bucket</div>
Options and lines of dialog can be conditionally displayed based upon items in the players inventory. For example:
<div class='source'>Hello there ? bucket</div>
will only be displayed if the user already has the bucket in their inventory. Whereas:
<div class='source'>Goodbye ?! bucket</div>
will only be displayed if the player does not have a bucket in their dictionary.
<br /><br />
The '+', '?', and '?!' symbols must have leading and trailing whitespace in order to function, so it is possible to have questions in your script.
<br /><br />
Items can be described in your game file using the '%' key. Similar to the '#' key for rooms, there must be a space following the key and then the item id. For example:
<div class='source'>% bucket<br />
Empty Bucket</div>
Will display the bucket in the user's inventory as "Empty Bucket". The '?' and '?!' can be used for items as well so:
<div class='source'>% bucket<br />
Empty Bucket !? water<br />
Full Bucket ? water</div>
Will change the display name of an item depending on the presence of water in the player's inventory. Only the first 18 characters will be displayed in the player's inventory. In the above example, it's likely that you don't want the player to have water visible in their inventory separately to the bucket. You can avoid this with the __HIDDEN__ tag:
<div class='source'>% water<br />
__HIDDEN__</div>
If you need to check whether the player has an empty or a full bucket, you will need to check both item ID's:
<div class='source'>You need water in the bucket. ? bucket ?! water</div>
<h3>Game Over</h3>
Eventually you'll want the game to end. You can do this by sending the player to the special __GAMEOVER__ room, which offers the player the chance to play again or choose another game. You should not do this immediately on failure, but rather send the player to a room with a some kind of game over text, for example:
<br />
<div class='source'># headbucket<br />
You accidentally put the bucket on your head and fall down the stairs. You die.<br />
Continue => __GAMEOVER__</div>
Alternatively, you can send the player to the __WINNER__ room, which has the same effect as the game over room, but the text says they have won the game.
<br /><br />
Have fun writing amazing games.
<?php
include("outro.php");
?>
