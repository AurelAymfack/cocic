<?php

$sessionId = $_COOKIE['session'];

setcookie('session', '', time() - 1);

header('location:/')

?>