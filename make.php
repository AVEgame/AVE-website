<?php
include("intro.php");
?>
As well as a game engine, <?php echo ave();?> is also a simple language that allows
you to write your own games.
This page will contain the documentation and a guide to using this language to make a game, once we've written them.
<br /><br />
For now, here are some of the features of the language:
<br /><hr><br />
<h2>Making Your Own AVE Game</h2>
To make your own game for AVE, create a file with the extension <span class='source'>.ave</span> in this folder.
<br /><br />
If you use the text editor nano, the file <span class='source'>ave.nanorc</span> will enable useful syntax highlighting in <span class='source'>.ave</span> files.
<br /><br />
<h3>Game Description</h3>
At the top of your <span class='source'>.ave</span> file, you should give your game a name, description and author(s). This is done as follows:
<br />
<span class='source line'>== Name ==</span><br />
<span class='source line'>-- Description --</span><br />
<span class='source line'>** Author(s) **</span><br />
You may also prevent a game from appearing in the menu on the main screen by adding:
<br />
<span class='source line'>~~ off ~~</span><br />
<h3>Rooms</h3>
Rooms are started with #. There must be a space following this and then the unique ID of the room.
<br /><br />
Text that will appear describing the room for the player should be place on the following lines.
<br /><br />
Options for the user should follow the format:
<br />
<span class='source line'>Description of option => room_id</span><br />
Where room_id is the ID of the room that the player will be sent to.
<h3>Items</h3>
Items can be added to a users inventory with the + symbol at the end of a line. This can follow either a description line (in which case the item will be added as soon as the user enters the room) or to an option line, in which case the item will be added before entering the next room. For example:
<br />
<span class='source line'>Here is a bucket. + bucket</span><br />
will add a bucket to the players inventory. You can also remove items from a player's inventory with '~':
<br />
<span class='source line'>Screw you and your bucket. It's mine. ~ bucket</span><br />
Options and lines of dialog can be conditionally displayed based upon items in the players inventory. For example:
<br />
<span class='source line'>Hello there ? bucket</span><br />
will only be displayed if the user already has the bucket in their inventory. Whereas:
<br />
<span class='source line'>Goodbye ?! bucket</span><br />
will only be displayed if the player does not have a bucket in their dictionary.
<br /><br />
The '+', '?', and '?!' symbols must have leading and trailing whitespace in order to function, so it is possible to have questions in your script.
<br /><br />
Items can be described in your game file using the '%' key. Similar to the '#' key for rooms, there must be a space following the key and then the item id. For example:
<br />
<span class='source line'>% bucket</span><br />
<span class='source line'>Empty Bucket</span><br />
Will display the bucket in the user's inventory as "Empty Bucket". The '?' and '?!' can be used for items as well so:
<br />
<span class='source line'>% bucket</span><br />
<span class='source line'>Empty Bucket !? water</span><br />
<span class='source line'>Full Bucket ? water</span><br />
Will change the display name of an item depending on the presence of water in the player's inventory. Only the first 18 characters will be displayed in the player's inventory. In the above example, it's likely that you don't want the player to have water visible in their inventory separately to the bucket. You can avoid this with the __HIDDEN__ tag:
<br />
<span class='source line'>% water</span><br />
<span class='source line'>__HIDDEN__</span><br />
If you need to check whether the player has an empty or a full bucket, you will need to check both item ID's:
<br />
<span class='source line'>You need water in the bucket. ? bucket ?! water</span><br />
<h3>Game Over</h3>
Eventually you'll want the game to end. You can do this by sending the player to the special __GAMEOVER__ room, which offers the player the chance to play again or choose another game. You should not do this immediately on failure, but rather send the player to a room with a some kind of game over text, for example:
<br />
<span class='source line'># headbucket</span><br />
<span class='source line'>You accidentally put the bucket on your head and fall down the stairs. You die.</span><br />
<span class='source line'>Continue => __GAMEOVER__</span><br />
Alternatively, you can send the player to the __WINNER__ room, which has the same effect as the game over room, but the text says they have won the game.
<br /><br />
Have fun writing amazing games.
<?php
include("outro.php");
?>
