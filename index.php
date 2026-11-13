<?php
require_once 'php/fungsi.php';
header('Location: ' . (sudahlogin() ? 'dashboard.php' : 'login.php'));
exit;
