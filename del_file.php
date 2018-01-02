<?php
unlink($_GET['path']);
header("Location:".$_SERVER['HTTP_REFERER']);

?>