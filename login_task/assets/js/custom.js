$(document).ready(function () {

    $('#sidebarToggle').on('click', event => {
        event.preventDefault();
        document.body.classList.toggle('sb-sidenav-toggled');
    });
    
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
})