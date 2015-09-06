<?php
session_start();
session_destroy();
header('Refresh: 3; url=BasicFit.html');
echo "U bent uitgelogd !";
?>