<?php
include 'db-conn.php';

$sql = "SELECT * from employees";
$result = sqlsrv_query($con, $sql);
?>

<div class="main-content">
    <main>
        <div class="page-header d-flex justify-content-between align-items-center">
            <div>
                <h3 class="mt-4">Gate Pass</h3>
            </div>
            <div>
                <a href="add-new.php" class="add-new rounded-pill"><i class="fa-solid fa-user-plus"></i>Add New</a>
            </div>
        </div>
        <!-- View the Employee Table -->
        <div class="table-box">
            <table class="table table-striped align-middle">
                <thead>
                    <tr>
                        <th>Visitor ID</th>
                        <th scope="col">Image</th>
                        <th scope="col">Date</th>
                        <th scope="col">Intime</th>
                        <th scope="col">Mobile No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Details</th>
                        <th scope="col">Company Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Person to <br>meet</th>
                        <th scope="col">Time <br>officer <br> name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                        ?>
                        <tr>
                            <td><?php echo $row['visitor_id'] ?></td>
                            <td><img src='uploads/<?php echo $row['file_name'] ?>' alt="image" srcset="" class="user-image">
                            </td>
                            <td>
                                <?php echo $row['date_field']->format('d-m-Y') ?>
                            </td>
                            <td>
                                <?php echo $row['time_field']->format('H:i:s') ?>
                            </td>
                            <td>
                                <?php echo $row['mobile'] ?>
                            </td>
                            <td>
                                <?php echo $row['name'] ?>
                            </td>
                            <td>
                                <?php echo $row['details'] ?>
                            </td>
                            <td>
                                <?php echo $row['company'] ?>
                            </td>
                            <td>
                                <?php echo $row['address'] ?>
                            </td>
                            <td>
                                <?php echo $row['person'] ?>
                            </td>
                            <td>
                                <?php echo $row['officer'] ?>
                            </td>
                            <td class="action">
                                <div class="action-box d-flex">
                                    <a href="edit.php?editid=<?php echo $row['sr_no'] ?>"
                                        class="btn btn-primary rounded-pill">Edit</a>
                                    <a href="delete.php?deleteid=<?php echo $row['sr_no'] ?>"
                                        class="btn btn-danger rounded-pill"
                                        onclick="return confirm('Are you sure?')">Delete</a>
                                    <a href="#" class="btn btn-warning rounded-pill">Pdf</a>
                                </div>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </main>


</div>