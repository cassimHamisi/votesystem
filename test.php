<?php
echo "This is the first statement that must execute";
$errorVariable = trigger_error("value Error", E_USER_WARNING);
echo PHP_INT_MAX;
echo "$errorVariable This will not execute if the error is critical";
die('fatal error');
