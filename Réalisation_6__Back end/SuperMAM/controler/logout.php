<?php
session_start();
session_destroy(); // deconection
header("Location:/index.php");
exit();

?>