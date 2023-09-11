<?php
include("auth_session.php");
include('dbcon.php');
if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
}
unset($_SESSION['msg']);

$sql = "SELECT * FROM employees where emp_id='" . $_SESSION['emp_id'] . "' ;";
$result = sqlsrv_query($con, $sql);
$row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="assets/css/style.css">

    <title>Dashboard</title>
</head>

<body>

    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="border-end bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading border-bottom bg-light">
                <h1 class="m-2">Dashboard</h1>
            </div>
            <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action list-group-item-light p-3"
                    href="index.php">Register</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="login.php">Login</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" data-bs-toggle="modal"
                    data-bs-target="#exampleModal" href="#">Edit Profile</a>
            </div>
        </div>

        <!-- Page Content -->
        <div id="page-content-wrapper" class="page_css">
            <!-- Top navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid main-css">
                    <button class="btn btn-primary" id="sidebarToggle"><i class="fa-solid fa-bars"></i></button>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 p-3">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Link</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Dropdown
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </li>
                            <li class="nav-item logout">
                                <a class="nav-link btn btn-danger text-light logout-text" href="logout.php">Logout</a>
                            </li>

                        </ul>

                    </div>
                </div>
            </nav>

            <!-- Page content-->
            <div class="container-fluid mt-5 d-flex justify-content-center">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo "Employee ID: " . $row["emp_id"] ?>
                        </h5>
                        <hr>
                        <p class="card-text">
                            <?php echo "Name: " . $row["emp_name"] ?><br>
                        </p>
                        <p class="card-text">
                            <?php echo "Email: " . $row["emp_email"] ?><br>
                        </p>
                        <p class="card-text">
                            <?php echo "DOB: " . $row["DOB"]->format('H:i:s'); ?><br>
                        </p>
                        <p class="card-text">
                            <?php echo "Password: " . $row["password"] ?><br>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="mx-1 mx-md-4" method="post" action="update.php" id="updateForm">
                        <input type="hidden" name="sr_no" value="<?php echo $row['sr_no'] ?>">
                        <div class="row">
                            <div class="col-md-6 mb-1">
                                <div class="form-outline">
                                    <input type="text" id="empid" name="empid" class="form-control"
                                        value="<?php echo $row['emp_id'] ?>" readonly />
                                    <p class="text-danger" id="alertMsg"></p>
                                </div>
                            </div>
                            <div class="col-md-6 mb-1">
                                <input type="text" id="emp_name" value="<?php echo $row['emp_name'] ?>" name="emp_name"
                                    class="form-control" placeholder="Name" required />
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-4">
                            <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="dob">Birth Date</label>
                                <input type="date" id="dob" name="dob" class="form-control"
                                    value="<?php echo $row['DOB']->format('Y-m-d') ?>" required />
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center mb-4">
                            <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="password">Password</label>
                                <input type="password" id="password" name="password"value="<?php echo $row['password'] ?>"
                                                            class="form-control"required />
                            </div>
                        </div>
                        
                        
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-primary" form="updateForm">Update</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="assets/js/custom.js"></script>


</body>

</html>