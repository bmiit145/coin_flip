<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "coin_flip");


if (!isset($_SESSION['id'])) {
    header("location: ../../auth/login.php");
}
$id = $_SESSION['id'];
$qry = "select * from users  join user_balance on users.id = user_balance.user_id where users.id = '$id'";
$run = mysqli_query($connection , $qry);
$data  = mysqli_fetch_assoc($run);
$bal = $data['balance'];

if (!strpos($bal , '.')) {
    $bal = $bal.'.00';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coin Flip</title>
    <link rel="stylesheet" href="../../asset/bootstrap/bootstrap.min.css">
    <!-- <script src="../../asset/bootstrap/bootstrap.min.js"></script> -->
    <script src="../../asset/jquery/jquery.min.js"></script>
    <script src="../../asset/bootstrap/bootstrap.bundle.min.js"></script>

    <!-- font awesome -->

    <link rel="stylesheet" href="../../asset/font-awesome/all.min.css">
    <script src="../../asset/font-awesome/all.min.js"></script>

    <!-- countdown -->
    <link rel="stylesheet" href="../../asset/css/custom.css">


</head>

<body>

    <section class="header-wrap">

        <div class="card bg-dark text-light m-2">
            <div class="card-body" style="padding: 15px;">
                <div class="d-flex justify-content-between pb-2">
                    <div class="reward ">
                        <h5>Dear,</h5>
                        <h5><?php echo  $data['username']?></h5>
                    </div>
                    <div class="balance text-right">
                        <h5>Available balance</h5>
                        <h5>₹ <?php echo  $bal?></h5>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center pt-2" style="padding: 0px">
                    <a href="/recharge" class="btn btn-success">Recharge</a>
                    <div class="v-dialog__container"><!-- --></div>
                    <button type="button" class="ml-3 btn btn-primary">
                        <span>Read Rules</span>
                    </button>
                </div>
            </div>
        </div>
    </section>
    <section class="coin-flip-section">
        <div class="container mt-2 mb-2" style="background-color: whitesmoke; max-width: 70%;">
            <div class="row">
                <div class="col">
                    <div class="d-flex justify-content-between mt-1">
                        <div>
                            <div class="d-flex align-items-center mb-2">
                                <i class="fa-solid fa-trophy mr-1" style="color: #777777;"></i>
                                <span style="color: rgb(119, 119, 119);">Period</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <h5>202306100110145</h5>
                            </div>
                        </div>
                        <div>

                            <div class="d-flex align-items-center mb-2">
                                <!-- icon -->
                                <i class="fa-solid fa-stopwatch mr-2" style="color: #777777;"></i>
                                <div style="color: rgb(119, 119, 119);">Count Down</div>
                            </div>

                            <div class="d-flex align-items-center">
                                <!-- icon -->
                                <div id="clockdiv">
                                    <div>
                                        <span class="minutes"></span>
                                        <div class="smalltext">Minutes</div>
                                    </div>
                                    <div>
                                        <span class="seconds"></span>
                                        <div class="smalltext">Seconds</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="coin-game-main-block">
                <?php include_once("../../layout/coin.php") ?>
            </div>
            <div class="d-flex flex-row justify-content-around pt-3 pb-4" style="position: relative;">
                <button type="button" class="btn btn-primary btn-md align-items-center p-0"
                    style="border-radius: 50%; width: 60px; height: 60px;">HEAD</button>
                <button type="button" class="btn btn-danger btn-md align-items-center p-0"
                    style="border-radius: 50%; width: 60px; height: 60px;">TAIL</button>
            </div>
        </div>

    </section>

    <?php
    include_once('../../layout/footer.php');
    ?>

    <script src="../../asset/js/cusom.js"></script>
</body>

</html>