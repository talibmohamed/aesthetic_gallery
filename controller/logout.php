<?php
// log out file
session_start();
session_destroy();
header("Location: /aesthetic_gallery");
exit;
?>