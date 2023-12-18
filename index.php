<?php include("config.php"); 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle the form submission (e.g., add new item)
    if (isset($_GET['action']) && $_GET['action'] == 'add') {
        // Process the form data and update the inventory array
        // ...

        // Redirect to avoid form resubmission on refresh
        header('Location: login.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Illinois Tech Inventory Management">
    <title>Inventory Management</title>

    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- material icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="./css/style.css">
</head>

<body class="bg">
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom" style="position: sticky !important;
    top: 0 !important; z-index : 99999 !important;">
        <div class="container-fluid container">
            <img class="headerLogo" src="iitlogo.png" alt="">
            <a class="navbar-brand" href="#">INVENTORY MANAGEMENT</a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto ">
                    <li class="nav-item">
                        <a class="nav-link active text-sm-start text-center" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn ms-md-4 text-white" href="login.php?action=logput" style="background-color: red !important">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5" style="padding: 25px;">
        
        <div class="card mb-5" style="padding: 25px;">
            
                <?php 
                if (isset($_GET['status'])) : ?>
                    <?php
                    if ($_GET['status'] == 'success')
                        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Product Successfully Added!</strong>  
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
                    else
                        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Ups!</strong> Data not saved!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
                    ?>
                <?php endif; ?>


                <form class="row g-3" action="addP.php" method="POST">
                    <div class="col-12">
                        <label for="pName" class="form-label">Product Name</label>
                        <input type="text" name="pName" class="form-control" placeholder="Yugen Chokshi" required>
                    </div>
                    <div class="col-md-4">
                        <label for="PID" class="form-label">Product ID</label>
                        <input type="text" name="PID" class="form-control" placeholder="IIT-12345" required>
                    </div>

                    <div class="col-md-4">
                        <label for="pType" class="form-label">Type</label>
                        <select class="form-select" name="pType" aria-label="Default select example">
                            <option value="Cap">Cap</option>
                            <option value="TShirt">T-Shirt</option>
                            <option value="Hoodie">Hoodie</option>
                            <!-- <option value="SHoodie">Scarlet Hoodie</option>
                            <option value="CMug">Coffee Mug</option> -->
                            <option value="Notepad">Notepad</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="selectEdition" class="form-label">Edition</label>
                        <div class="col-md-12">
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="selectEdition">Regular</label>
                                <input class="form-check-input" type="radio" name="selectEdition" value="Regular">
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="selectEdition">Limited Edition</label>
                                <input class="form-check-input" type="radio" name="selectEdition" value="Limited Edition">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="qtyAvail" class="form-label">Qty Available</label>
                        <input type="text" name="qtyAvail" class="form-control" placeholder="Ex: 100" required>
                    </div>

                    <div class="col-md-6">
                        <label for="priceUSD" class="form-label">Price (USD)</label>
                        <input type="number" step=0.01 name="priceUSD" class=" form-control" placeholder="25" required>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary" value="submit" name="addP" action="addP.php"><i class="fa fa-plus"></i><span class="ms-2">Add Product</span></button>
                    </div>
                </form>
            </div>
        </div>

        <style>

.snowflake {
  color: #fff;
  font-size: 1em;
  font-family: Arial, sans-serif;
  text-shadow: 0 0 5px #000;
}

.snowflake,.snowflake .inner{animation-iteration-count:infinite;animation-play-state:running}@keyframes snowflakes-fall{0%{transform:translateY(0)}100%{transform:translateY(110vh)}}@keyframes snowflakes-shake{0%,100%{transform:translateX(0)}50%{transform:translateX(80px)}}.snowflake{position:fixed;top:-10%;z-index:9999;-webkit-user-select:none;user-select:none;cursor:default;animation-name:snowflakes-shake;animation-duration:3s;animation-timing-function:ease-in-out}.snowflake .inner{animation-duration:10s;animation-name:snowflakes-fall;animation-timing-function:linear}.snowflake:nth-of-type(0){left:1%;animation-delay:0s}.snowflake:nth-of-type(0) .inner{animation-delay:0s}.snowflake:first-of-type{left:10%;animation-delay:1s}.snowflake:first-of-type .inner,.snowflake:nth-of-type(8) .inner{animation-delay:1s}.snowflake:nth-of-type(2){left:20%;animation-delay:.5s}.snowflake:nth-of-type(2) .inner,.snowflake:nth-of-type(6) .inner{animation-delay:6s}.snowflake:nth-of-type(3){left:30%;animation-delay:2s}.snowflake:nth-of-type(11) .inner,.snowflake:nth-of-type(3) .inner{animation-delay:4s}.snowflake:nth-of-type(4){left:40%;animation-delay:2s}.snowflake:nth-of-type(10) .inner,.snowflake:nth-of-type(4) .inner{animation-delay:2s}.snowflake:nth-of-type(5){left:50%;animation-delay:3s}.snowflake:nth-of-type(5) .inner{animation-delay:8s}.snowflake:nth-of-type(6){left:60%;animation-delay:2s}.snowflake:nth-of-type(7){left:70%;animation-delay:1s}.snowflake:nth-of-type(7) .inner{animation-delay:2.5s}.snowflake:nth-of-type(8){left:80%;animation-delay:0s}.snowflake:nth-of-type(9){left:90%;animation-delay:1.5s}.snowflake:nth-of-type(9) .inner{animation-delay:3s}.snowflake:nth-of-type(10){left:25%;animation-delay:0s}.snowflake:nth-of-type(11){left:65%;animation-delay:2.5s}
</style>
<div class="snowflakes" aria-hidden="true">
  <div class="snowflake">
    <div class="inner">❅</div>
  </div>
  <div class="snowflake">
    <div class="inner">❅</div>
  </div>
  <div class="snowflake">
    <div class="inner">❅</div>
  </div>
  <div class="snowflake">
    <div class="inner">❅</div>
  </div>
  <div class="snowflake">
    <div class="inner">❅</div>
  </div>
  <div class="snowflake">
    <div class="inner">❅</div>
  </div>
  <div class="snowflake">
    <div class="inner">❅</div>
  </div>
  <div class="snowflake">
    <div class="inner">❅</div>
  </div>
  <div class="snowflake">
    <div class="inner">❅</div>
  </div>
  <div class="snowflake">
    <div class="inner">❅</div>
  </div>
  <div class="snowflake">
    <div class="inner">❅</div>
  </div>
  <div class="snowflake">
    <div class="inner">❅</div>
  </div>
</div>


        <?php if (isset($_GET['actionB'])) : ?>
            <?php
            if ($_GET['actionB'] == 'success')
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Product Deleted!</strong>
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            else
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Ups!</strong> Product Not Deleted!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            ?>
        <?php endif; ?>

        
        <?php if (isset($_GET['update'])) : ?>
            <?php
            if ($_GET['update'] == 'success')
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Product Updated!</strong>
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            else
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Ups!</strong> Product Not updated !
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            ?>
        <?php endif; ?>

        <!-- Table -->
        <div class="table-responsive mb-5 card" style="margin-right: 75px; margin-left: 75px;">
            <?php
            echo "<div class='card-body'>";

            echo "<table class='table table-hover align-middle bg-white'>";
            echo "<thead>";
            echo "<tr>";
            // echo "<th scope='col' class='text-center'>No</th>";
            echo "<th scope='col'>Product Name</th>";
            echo "<th scope='col'>Product ID</th>";
            echo "<th scope='col'>Type</th>";
            echo "<th scope='col'>Edition</th>";
            echo "<th scope='col'>Qty Available</th>";
            echo "<th scope='col'>Price</th>";
            echo "<th scope='col' class='text-center'>Actions</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            $conn = oci_connect('system', 'oracle', 'localhost/orcl.ht.home');
                if (!$conn) {
                    $e = oci_error();
                    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
                }

                // $page_last = 10;
                // $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                // $page_first = ($page > 1) ? ($page * $page_last) - $page_last : 0;

                // $previous = $page - 1;
                // $next = $page + 1;
                $sql = "SELECT * FROM invdb";
                $stmt = oci_parse($conn, $sql);
                oci_execute($stmt);
                // $s = oci_parse($conn, "SELECT * FROM invdb");
                // oci_bind_by_name($s, ":page_last", $page_last);
                // oci_bind_by_name($s, ":page_first", $page_first);
                // oci_execute($s);

                // $no = $page_first + 1;

                while ($row = oci_fetch_assoc($stmt)) {
                    echo "<tr>";
                    // echo "<td>" . $row['ID'] . "</td>";
                    echo "<td>" . $row['PNAME'] . "</td>";
                    echo "<td>" . $row['PID'] . "</td>";
                    echo "<td>" . $row['PTYPE'] . "</td>";
                    echo "<td>" . $row['SELECTEDITION'] . "</td>";
                    echo "<td>" . $row['QTYAVAIL'] . "</td>";
                    echo "<td>" . $row['PRICEUSD'] . "</td>";
                    
                    echo "<td class='text-center'>";
                    echo "<button type='button' class='btn btn-primary editButton pad m-1'><span class='material-icons align-middle'>edit</span></button>";
                    echo "<a href='./delete.php?id=".$row['PID']."'><button type='button' class='btn btn-danger deleteButton pad m-1'><span class='material-icons align-middle'>delete</span></button></a>";
                    echo "</td>";

                    echo "</tr>";
                }

              


            echo "</tbody>";
            echo "</table>";
            // if ($total_data == 0) {
            //     echo "<p class='text-center'>There are no products available!</p>";
            // } else {
            //     echo "<p>Total Products : $total_data</p>";
            // }

            echo "</div>";
            oci_free_statement($stmt);
            oci_close($conn); // Close connection outside the loop
            ?>
        </div>
            
        <!-- Modal Edit-->
        <div class="modal fade" id="editModal" style="top:58px !important;" tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog' style="margin-bottom:100px !important;">
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Edit Product Data</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>

                    <form action='edit.php' method='POST'>
                        <div class='modal-body text-start'>
                            <!-- <input type='hidden' name='edit_id' id='edit_id'> -->

                            <div class="col-12 mb-3">
                                <label for="edit_pName" class="form-label">Product Name</label>
                                <input type="text" name="edit_pName" id="edit_pName" class="form-control" placeholder="Yugen Chokshi" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="edit_PID" class="form-label">Product ID</label>
                                <input type="text" name="edit_PID" id="edit_PID" class="form-control" placeholder="G64190021" required>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="edit_pType" class="form-label">Type</label>
                                <select class="form-select" name="edit_pType" id="edit_pType">
                                <option value="Cap">Cap</option>
                                <option value="TShirt">T-Shirt</option>
                                <option value="Hoodie">Hoodie</option>
                                <!-- <option value="SHoodie">Scarlet Hoodie</option>
                                <option value="CMug">Coffee Mug</option> -->
                                <option value="Notepad">Notepad</option>
                                </select>
                            </div>


                            <div class="col-12 mb-3">
                                <label for="edit_selectEdition" class="form-label">Edition</label>
                                <div class="col-md-12" id="edit_selectEdition">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="edit_selectEdition">
                                            <input class="form-check-input" type="radio" name="edit_selectEdition" value="Regular" id="rEdition">Regular</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="edit_selectEdtion">
                                            <input class="form-check-input" type="radio" name="edit_selectEdition" value="Limited Edition" id="lEdition">Limited Edition</label>
                                    </div>
                                </div>
                            </div>



                            <div class="col-12 mb-3">
                                <label for="edit_qtyAvail" class="form-label">Oty Available</label>
                                <input type="text" name="edit_qtyAvail" class="form-control" id="edit_qtyAvail" placeholder="Ex: 100" required>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="edit_priceUSD" class="form-label">Price (USD)</label>
                                <input type="number" name="edit_priceUSD" id="edit_priceUSD" class=" form-control" placeholder="25" required>
                            </div>

                        </div>

                        <div class='modal-footer'>
                            <button type='submit' name='edit_data' action="edit.php" class='btn btn-primary'>Update</button>
                        </div>

                    </form>


                </div>
            </div>
        </div>
                

        <!-- Modal Delete-->
        <div class='modal fade' style="top:58px !important;" id='deleteModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Delete Product</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>


                    <form action='./delete.php' method='POST'>

                        <div class='modal-body text-start'>
                            <input type='hidden' name='delete_id' id='delete_id'>
                            <p>Are you sure you want to delete?</p>
                        </div>

                        <div class='modal-footer'>
                            <button type='submit' name='deletedata' class='btn btn-primary'>YES, DELETE IT!</button>
                        </div>

                    </form>


                </div>
            </div>
        </div>
    </div>


    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Javascript bule with popper bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- edit function -->
    
    <script>
        $(document).ready(function() {
                $('.editButton').on('click', function() {
                $('#editModal').modal('show');

                var $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);

                // $('#edit_id').val(data[0]);
                $('#edit_pName').val(data[0]);
                $('#edit_PID').val(data[1]);
                $('#edit_selectEdition').val(data[4]);
                // checked
                if (data[3] == "Regular") {
                    $("#rEdition").prop("checked", true);
                } else {
                    $("#lEdition").prop("checked", true);
                }

                $('#edit_qtyAvail').val(data[4]);
                $('#edit_pType').val(data[2]);
                $('#edit_priceUSD').val(data[5]);
            });
        });
    </script>

    

    <!-- delete function -->
    <!-- <script>
        $(document).ready(function() {
            $('.deleteButton').on('click', function() {
                $('#deleteModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_id').val(data[0]);
            });
        });
    </script> -->

    <script>
        function clicking() {
            window.location.href = './index.php';
        }
    </script>
</body>

</html>