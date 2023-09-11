<?php
include('dbcon.php');
session_start();
if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
}
unset($_SESSION['msg']);

if (isset($_SESSION['success'])) {
    echo $_SESSION['success'];
}
unset($_SESSION['success']);

if (isset($_POST['submit'])) {
    $password = $_POST['password'];
    $email = $_POST['emp_email'];

    $sql = "SELECT * FROM employees where emp_email = '$email'";
    $run = sqlsrv_query($con, $sql);
    $row = sqlsrv_fetch_array($run, SQLSRV_FETCH_ASSOC);
        if ($row['password'] == $password) {
            $_SESSION["emp_id"] = $row['emp_id'];
            $_SESSION['msg'] = "<div class='alert alert-warning alert-dismissible fade show'>Login Successful <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
            header('location:dashboard.php');
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger alert-dismissible fade show'>Invalid Username or Password <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
            header('location:login.php');
        }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css
    ">

    <title>Login Page</title>
</head>

<body>
    <div>
        <section class="vh-100" style="background-color: #eee;">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-lg-12 col-xl-11">
                        <div class="card text-black" style="border-radius: 25px;">
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Login</p>

                                        <form method="post">
                                            <!-- Email input -->
                                            <div class="form-outline mb-4">
                                                <input type="email" id="email" name="emp_email" class="form-control"
                                                    placeholder="Email Address" required />
                                            </div>

                                            <!-- Password input -->
                                            <div class="form-outline mb-4">
                                                <input type="password" id="password" name="password"
                                                    class="form-control" placeholder="Password" required />
                                            </div>

                                            <!-- Submit button -->
                                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                                <button type="submit" value="Login" name="submit"
                                                    class="btn btn-primary btn-block mb-4">Login</button>
                                            </div>


                                            <!-- Register buttons -->
                                            <div class="text-center">
                                                <p>Not a member? <a href="index.php">Register</a></p>

                                            </div>
                                        </form>

                                    </div>
                                    <div
                                        class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                        <img src="./assets/login.jpg" class="img-fluid" alt="Sample image">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>


</body>

</html>