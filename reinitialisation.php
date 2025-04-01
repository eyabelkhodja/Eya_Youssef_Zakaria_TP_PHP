<?php
require_once "Session.php";
$Session=new Session();
$Session->destroy();
header("Location: Session.php");
?>