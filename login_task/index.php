<?php
include 'dbcon.php';

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Register The User</title>
</head>

<body>
    <div>
        <section class="vh-100" style="background-color: #eee;">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-lg-12 col-xl-11">
                        <div class="card text-black" style="border-radius: 25px;">
                            <div class="card-body sign-up-form">
                                <div class="row justify-content-center">
                                    <div class="col-md-8 col-lg-7 col-xl-7 order-2 order-lg-1">
                                        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
                                        <form class="mx-1 mx-md-4" method="post" action="insert.php">
                                            <div class="row">
                                                <div class="col-md-6 mb-1">
                                                    <div class="form-outline">

                                                        <input type="text" id="emp_id" name="emp_id"
                                                            class="form-control" placeholder="Employee ID" required />
                                                        <p class="text-danger" id="alertMsg">

                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-1">

                                                    <input type="text" id="emp_name" name="emp_name"
                                                        class="form-control" placeholder="Name" required />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mb-1">
                                                    <div class="form-outline">

                                                        <input type="email" id="emp_email" name="emp_email"
                                                            id="emp_email" class="form-control" placeholder="Email"
                                                            required />

                                                        <p class="text-danger" id="emailalertMsg">

                                                        </p>

                                                    </div>

                                                </div>
                                                <div class="col-md-6 mb-1">

                                                    <div class="form-outline">

                                                        <input type="password" id="password" name="password"
                                                            class="form-control" placeholder="Password" required />
                                                    </div>

                                                </div>
                                            </div>
                                            <!-- <div class="row mb-2">
                                                <div class="col-md-6 mb-1">
                                                    <label for="" class="mt-1"><b>Select Preferred Technology</b></label>
                                                    <div class="form-check ms-2">
                                                        <input class="form-check-input" type="radio"
                                                            name="flexRadioDefault" id="web">
                                                        <label class="form-check-label" for="web">
                                                            Web Development
                                                        </label>
                                                    </div>
                                                    <div class="form-check ms-2">
                                                        <input class="form-check-input" type="radio"
                                                            name="flexRadioDefault" id="datascience" checked>
                                                        <label class="form-check-label" for="datascience">
                                                            Data Science
                                                        </label>
                                                    </div>
                                                    <div class="form-check ms-2">
                                                        <input class="form-check-input" type="radio"
                                                            name="flexRadioDefault" id="ai" checked>
                                                        <label class="form-check-label" for="ai">
                                                            Artificial Intelligence
                                                        </label>
                                                    </div>

                                                </div>
                                                <div class="col-md-6 mb-1">
                                                    <label for="" class="my-1"><b>Scripting languages you
                                                        know</b></label>
                                                           
                                                    <div class="form-check ms-2">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="checkbox-one">
                                                        <label class="form-check-label" for="checkbox-one">
                                                            JavaScript
                                                        </label>
                                                    </div>
                                                    <div class="form-check ms-2">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="checkbox-two" checked>
                                                        <label class="form-check-label" for="checkbox-two">
                                                            PHP
                                                        </label>
                                                    </div>
                                                    <div class="form-check ms-2">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="checkbox-three">
                                                        <label class="form-check-label" for="checkbox-three">
                                                            Perl
                                                        </label>
                                                    </div>


                                                </div>
                                            </div> -->

                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <div class="form-outline flex-fill mb-0">
                                                    <label class="form-label" for="dob">Birth Date</label>
                                                    <input type="date" id="dob" name="dob" class="form-control"
                                                        placeholder="Date of Birth" required />

                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                                <button type="submit" class="btn btn-primary btn-lg"
                                                    name="submit">Register</button>
                                            </div>

                                        </form>
                                        <p class="link text-center">Already have an account? <a href="login.php">Click
                                                to Login</a>
                                        </p>
                                    </div>
                                    <div
                                        class="col-md-5 col-lg-5 col-xl-5 d-flex align-items-center order-1 order-lg-2">

                                        <img src="./assets/register.jpg" class="img-fluid" alt="Sample image">

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
    <script src="assets/js/custom.js"></script>

</body>

</html>
<script>
    $(document).on('focusout', '#emp_id', function () {
        var empid = $(this).val();
        $.ajax({
            url: 'validation.php',
            type: 'post',
            data: { empid: empid },
            success: function (data) {
                // alert(data);
                if (data == 'Yes') {
                    $('#alertMsg').html('The Employee Id is already exist');
                    $('#emp_id').val('');
                    $('#emp_id').focus();
                } else {
                    $('#alertMsg').html('');
                }
            }
        });
    });
    $(document).on('focusout', '#emp_email', function () {
        var empemail = $(this).val();
        $.ajax({
            url: 'validation.php',
            type: 'post',
            data: { empemail: empemail },
            success: function (data) {
                // alert(data);
                if (data == '') {
                    $('#emailalertMsg').html('Email is required');
                    $('#emp_email').val('');
                    $('#emp_email').focus('');
                }
                else {
                    if (data == 'exist') {
                        $('#emailalertMsg').html('Email already exist');
                        $('#emp_email').val('');
                        $('#emp_email').focus('');
                    } else {
                        $('#emailalertMsg').html('');
                    }
                }

            }
        });
    });
</script>