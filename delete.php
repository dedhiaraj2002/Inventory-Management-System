<!-- Oracle Done -->
<?php
include("./config.php");


    $id = $_GET['id'];

    $sql = "DELETE FROM invdb WHERE PID = $id";

    $stmt = oci_parse($conn, $sql);

    // Bind the parameter
    // oci_bind_by_name($stmt, ':PID', $PID);

    $result = oci_execute($stmt);
    
    if ($result) {
        header('Location: ./index.php?delete=success');
    } else {
        echo "$sql";
    }
// } else {
//     die("Access Denied!");
// }
?>
