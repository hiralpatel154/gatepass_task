<?php
include 'db-conn.php';
if (isset($_POST['date'])) {
    $date = $_POST['date'];
    $sql = "SELECT * FROM employees where date_field = '$date'";
    $result = sqlsrv_query($con, $sql);
    ?>
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
            </tr>
        </thead>
        <tbody>
            <?php while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) { ?>
                <tr>
                    <td>
                        <?php echo $row['visitor_id'] ?>
                    </td>
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
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php
}
?>