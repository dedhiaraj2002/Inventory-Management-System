<!-- Oracle Done -->
<?php
include("config.php");

if (isset($_POST['edit_data'])) {
    // Get data from the form
    $pName = $_POST['edit_pName'];
    $PID = $_POST['edit_PID'];
    $selectEdition = $_POST['edit_selectEdition'];
    $qtyAvail = $_POST['edit_qtyAvail'];
    $pType = $_POST['edit_pType'];
    $priceUSD = $_POST['edit_priceUSD'];

    print_r ($_POST);

    // Prepare the SQL statement
    $sql = "UPDATE invdb SET pName = :pName, PID = :PID, selectEdition = :selectEdition, qtyAvail = :qtyAvail, pType = :pType, priceUSD = :priceUSD WHERE PID = :PID";

    // Prepare the statement using OCI8
    $stmt = oci_parse($conn, $sql);

    // Bind parameters
    oci_bind_by_name($stmt, ':pName', $pName);
    oci_bind_by_name($stmt, ':PID', $PID);
    oci_bind_by_name($stmt, ':selectEdition', $selectEdition);
    oci_bind_by_name($stmt, ':qtyAvail', $qtyAvail);
    oci_bind_by_name($stmt, ':pType', $pType);
    oci_bind_by_name($stmt, ':priceUSD', $priceUSD);


    // Execute the SQL statement
    $result = oci_execute($stmt);

    // Check if the query was successful
    if ($result) {
        header('Location: ./index.php?update=success');
    } else {
        echo "Error updating record: " . oci_error($conn);
    }
} else {
    die("Access Denied");
}
?>
