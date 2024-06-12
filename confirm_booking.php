<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <?php require('inc/links.php')?>
    <title><?php echo $settings_r['site_title'] ?> - Confirm Booking</title>

</head>
<body class="bg-light">

<?php require('inc/header.php'); ?>

<?php

    /*
        Check barber id from url is present or not
        Shutdown mode is active or not
        User is logged in or not
    */

    if(!isset($_GET['id']) || $settings_r['shutdown'] == true){
        redirect('booking.php');
    }
    else if(!(isset($_SESSION['login']) && $_SESSION['login']==true)){
        redirect('booking.php');
    }

    //filter and get barber and user data

    if(!isset($_GET['id'])){
        redirect('booking.php');
    }

    $data = filteration($_GET);

    $barber_res = select("SELECT * FROM `barbers` WHERE `id`=? AND `status`=? AND `removed`=?",[$data['id'],1,0],'iii');

    if(mysqli_num_rows($barber_res) ==0){
        redirect('booking.php');
    }

    $barber_data = mysqli_fetch_assoc($barber_res);

    $_SESSION['barber'] = [
        "id" => $barber_data['id'],
        "name" => $barber_data['name'],
        "price" => $barber_data['price'],
        "payment" => null,
        "available" => false,
    ];
   
    $user_res = select("SELECT * FROM `user_cred` WHERE `id`=? LIMIT 1",[$_SESSION['uId']],"i");
    $user_data = mysqli_fetch_assoc($user_res);
?>



<div class="container">
    <div class="row">

        <div class="col-12 my-5 mb-4 px-4">
            <h2 class="fw-bold">CONFIRM BOOKING</h2>
            <div style="font-size: 14px;">
                <a href="index.php" class="text-secondary text-decoration-none">HOME</a>
                <span class="text-secondary"> > </span>
                <a href="booking.php" class="text-secondary text-decoration-none">BARBERS</a>
                <span class="text-secondary"> > </span>
                <a href="#" class="text-secondary text-decoration-none">CONFIRM</a>
            </div>
        </div>

        <div class="col-lg-7 col-md-12 px-4">
            <?php
                $barber_thumb = BARBERS_IMG_PATH."thumbnail.jpg";
                $thumb_q = mysqli_query($con,"SELECT * FROM `barber_images` 
                    WHERE `barber_id`='$barber_data[id]' 
                    AND `thumb`='1'");

                    if(mysqli_num_rows($thumb_q)>0){
                        $thumb_res = mysqli_fetch_assoc($thumb_q);
                        $barber_thumb = BARBERS_IMG_PATH.$thumb_res['image'];
                    }

                    echo<<<data
                        <div class="card p-3 shadow-sm rounded">
                            <img src="$barber_thumb" class="img-fluid rounded mb-3">
                            <h5>$barber_data[name]</h5>
                            <h6>Average: RM $barber_data[price]</h6>
                        </div>
                    data;
            ?>
        </div>

        <div class="col-lg-5 col-md-12 px-4">
            <div class="card mb-4 border-0 shadow-sm rounded-3">
                <div class="card-body">
                   <form action="#">
                    <h6 class="mb-3">BOOKING DETAILS</h6>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Name</label>
                            <input name="name" type="text" value="<?php echo $user_data['name'] ?>" class="form-control shadow-none">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Phone Number</label>
                            <input name="phonenum" type="number" value="<?php echo $user_data['phonenum'] ?>" class="form-control shadow-none">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Note:</label>
                            <textarea name="note" rows="1" required class="form-control shadow-none"></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Date</label>
                            <input name="date" type="date" class="form-control shadow-none" required>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Time</label>
                            <input name="time" type="time" class="form-control shadow-none" required>
                        </div>
                        <div class="col-12">
                            <div class="spinner-border text-info mb-3 d-none" id="info_loader" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <h6 class="mb-3 text-danger" id="pay_info">Provide date & time !</h6>
                            <button name="pay_now" class="btn w-100 text-white custom-bg shadow-none mb-1" disabled>Pay Now</button>
                        </div>
                    </div>
                   </form>
                </div>
            </div>
        </div>

    </div>
</div>

<?php require('inc/footer.php')?>


    
 
</body>
</html>