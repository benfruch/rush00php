<?php
session_start();
$_SESSION['user_logged'] = '';
header ("Location: $_SERVER[HTTP_REFERER]" );
?>