<?php
if(!isset($_SESSION['username']))
{session_start();}
unset($_SESSION['posthour']);
unset($_SESSION['postmin']);
unset($_SESSION['postsec']);
?>