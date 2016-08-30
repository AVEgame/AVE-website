<?php
?>
</div>
<div class='foot'>&copy; M. Scroggs & G. Grasso 2016. If you find an error on this website, please submit a bug report <a href='https://github.com/AVEgame/AVE/issues' target='new'>here</a>.</div>

<script type='text/javascript'>
l = document.links;

col = 0
cols = Array("red","green","blue")
for(var i=1; i<l.length-1; i++) {
    if(l[i].className!="invisible"){
        l[i].className = cols[col%3];
        col++
    }
}
</script>
</body>
</html>
