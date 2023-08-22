<?php
session_start();
session_unset();

session_destroy();
// echo "Session detruite";
header('Location:index.php');


?>