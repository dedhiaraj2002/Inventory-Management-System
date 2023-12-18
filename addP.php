<!-- Oracle Done -->
<?php
include("config.php"); 

// Check if the submit button was clicked
if (isset($_POST['addP'])) {
    // Retrieve data from the form
    $pName = $_POST['pName'];
    $PID = $_POST['PID'];
    $selectEdition = $_POST['selectEdition'];
    $qtyAvail = $_POST['qtyAvail'];
    $pType = $_POST['pType'];
    $priceUSD = $_POST['priceUSD'];

    // Prepare the SQL query
    $sql = "INSERT INTO invdb (pName, PID, selectEdition, qtyAvail, pType, priceUSD) VALUES (:pName, :PID, :selectEdition, :qtyAvail, :pType, :priceUSD)";
    $stmt = oci_parse($conn, $sql);

    // Bind parameters to the query
    oci_bind_by_name($stmt, ":pName", $pName);
    oci_bind_by_name($stmt, ":PID", $PID);
    oci_bind_by_name($stmt, ":selectEdition", $selectEdition);
    oci_bind_by_name($stmt, ":qtyAvail", $qtyAvail);
    oci_bind_by_name($stmt, ":pType", $pType);
    oci_bind_by_name($stmt, ":priceUSD", $priceUSD);
    // ... Bind other parameters similarly

    // Execute the query
    if (oci_execute($stmt)) {
        header('Location: ./index.php?status=success');
    } else {
        // If execution fails, handle the error or display an error message
        $e = oci_error($stmt); // Get the specific Oracle error
        echo "Error is: " . $e['message']; // Display the error message
    }

    // Free the statement resource
    oci_free_statement($stmt);
} else {
    die("Access Denied!");
}
