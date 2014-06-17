<?php
session_start();
session_destroy();

header('Location: index.php?l=1');
die();
?>