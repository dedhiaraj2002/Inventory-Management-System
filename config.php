<!-- Oracle Done -->
<?php

$server = "localhost/orcl.ht.home"; 
$user = "system"; 
$password = "oracle"; 

// Connect to Oracle Database
$conn = oci_connect($user, $password, $server);

if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}
