<?php
$connection = mysqli_connect("localhost", "root", "", "coin_flip");
session_start();

if (isset($_POST["signup"])) {
    $username = $_POST["username"];
    $mo_no = $_POST["mo_no"];
    $all_qry = "select * from users where username = '$username' or mo_no = '$mo_no'";
    $res = mysqli_num_rows(mysqli_query($connection, $all_qry));
    if ($res == 0) {
        $password = $_POST["password"];
        $mo_no = $_POST["mo_no"];
        $ins_qry = "insert into users(username ,mo_no, `password`) values('$username' , '$mo_no','$password')";
        mysqli_query($connection, $ins_qry);
        // header("location: login.php");
    } else {
        echo '<script> alert("User already exits...") </script>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Here </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <div class="container">
        <div style="padding:5% 30% ;">
            <h2 style="text-align: center; ">Register</h2>
            <form class="form-horizontal" method="POST" enctype="multipart/form-data" id="login_form">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="username">Username:</label>
                    <div class="col-sm-10">
                        <input type="username" class="form-control" id="username" placeholder="Enter username"
                            name="username">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="mo_no">Mobile No:</label>
                    <div class="col-sm-10">
                        <input type="mo_no" class="form-control" id="mo_no" placeholder="Enter mo_no" name="mo_no">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="password">Password:</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" placeholder="Enter password"
                            name="password">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="refferal">refferal Code:</label>
                    <div class="col-sm-10">
                        <input type="refferal" class="form-control" id="refferal" placeholder="Enter refferal Code"
                            name="refferal">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10" style="display: flex; justify-content: space-between;">
                        <button type="submit" name="signup" class="btn btn-primary">SignUp</button>
                        <a href="login.php" name="login" class="btn btn-primary">login Here</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script>
        $("#login_form").validate({
            rules: {
                username: {
                    required: true,
                },
                mo_no: {
                    required: true,
                    number: true,
                    min: 1111111111,
                    max: 9999999999
                },
                password: {
                    required: true,
                }
            },

            messages: {
                mo_no: {
                    min: "please enter vaild mobile number",
                    max: "please enter vaild mobile number",
                }

            },

            submitHandler: function (form) {


                $("#login_form").submit();

            }
        });
    </script>
</body>

</html>