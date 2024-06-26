<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <?php require('inc/links.php')?>
    <title><?php echo $settings_r['site_title'] ?> - Barbers</title>

</head>
<body class="bg-light">

<?php require('inc/header.php'); ?>

<div class="my-5 px-4">
    <h2 class="fw-bold h-font text-center">MEET THE BARBERS</h2>
    <div class="h-line bg-dark"></div>
</div>

<div class="container-fluid">
    <div class="row">

        <div class="col-lg-3 col-md-12 mb-lg-0 mb-4 ps-4">
            <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow">
                <div class="container-fluid flex-lg-column align-items-stretch">
                    <h4 class="mt-2">FILTERS</h4>
                    <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#filterDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="filterDropdown">
                        <div class="border bg-light p-3 rounded mb-3">
                            <h5 class="mb-3" style="font-size:18px;">CHECK AVAILABILITY</h5>
                            <label class="form-label">Date</label>
                            <input type="date" class="form-control shadow-none mb-3">
                            <label class="form-label">Time</label>
                            <input type="time" class="form-control shadow-none">
                        </div>

                        <div class="border bg-light p-3 rounded mb-3">
                            <h5 class="mb-3" style="font-size:18px;">FEATURES</h5>
                            <div class="mb-2">
                                <input type="checkbox" id="f1" class="form-check-input shadow-none me-1">
                                <label for="f1" class="form-check-label">Payment: Cash</label>
                            </div>
                            <div class="mb-2">
                                <input type="checkbox" id="f2" class="form-check-input shadow-none me-1">
                                <label for="f2" class="form-check-label">Payment: QR</label>
                            </div>
                            <div class="mb-2">
                                <input type="checkbox" id="f3" class="form-check-input shadow-none me-1">
                                <label for="f3" class="form-check-label">Speak: Malay</label>
                            </div>
                            <div class="mb-2">
                                <input type="checkbox" id="f3" class="form-check-input shadow-none me-1">
                                <label for="f3" class="form-check-label">Speak: English</label>
                            </div>
                            <div class="mb-2">
                                <input type="checkbox" id="f3" class="form-check-input shadow-none me-1">
                                <label for="f3" class="form-check-label">Morning</label>
                            </div>
                            <div class="mb-2">
                                <input type="checkbox" id="f3" class="form-check-input shadow-none me-1">
                                <label for="f3" class="form-check-label">Evening</label>
                            </div>
                            <div class="mb-2">
                                <input type="checkbox" id="f3" class="form-check-input shadow-none me-1">
                                <label for="f3" class="form-check-label">Night</label>
                            </div>
                        </div>

                        <div class="border bg-light p-3 rounded mb-3">
                            <h5 class="mb-3" style="font-size:18px;">SERVICES</h5>
                            <div class="mb-2">
                                <input type="checkbox" id="g1" class="form-check-input shadow-none me-1">
                                <label for="g1" class="form-check-label">Buzz Cut</label>
                            </div>
                            <div class="mb-2">
                                <input type="checkbox" id="g2" class="form-check-input shadow-none me-1">
                                <label for="g2" class="form-check-label">Fade</label>
                            </div>
                            <div class="mb-2">
                                <input type="checkbox" id="g3" class="form-check-input shadow-none me-1">
                                <label for="g3" class="form-check-label">French Crop</label>
                            </div>
                            <div class="mb-2">
                                <input type="checkbox" id="g4" class="form-check-input shadow-none me-1">
                                <label for="g4" class="form-check-label">Beard Trimming</label>
                            </div>
                            <div class="mb-2">
                                <input type="checkbox" id="g4" class="form-check-input shadow-none me-1">
                                <label for="g4" class="form-check-label">Massage</label>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>

        <div class="col-lg-9 col-md-12 px-4">

            <?php
                $barber_res = select("SELECT * FROM `barbers` WHERE `status`=? AND `removed`=?",[1,0],'ii');

                while($barber_data = mysqli_fetch_assoc($barber_res))
                {
                    //get features of barber

                    $fea_q = mysqli_query($con,"SELECT f.name FROM `features` f 
                        INNER JOIN `barber_features` rfea ON f.id = rfea.features_id 
                        WHERE rfea.barber_id = '$barber_data[id]'");

                    $features_data = "";
                    while($fea_row = mysqli_fetch_assoc($fea_q)){
                        $features_data.="<span class='badge rounded-pill bg-light text-dark text-wrap me-1 mb-1'>
                        $fea_row[name]
                        </span>";
                    }

                    //get services of barber
                    $fac_q = mysqli_query($con,"SELECT f.name FROM `services` f 
                        INNER JOIN `barber_services` rfac ON f.id = rfac.services_id 
                        WHERE rfac.barber_id = '$barber_data[id]'");

                    $services_data = "";
                    while($fac_row = mysqli_fetch_assoc($fac_q)){
                        $services_data.="<span class='badge rounded-pill bg-light text-dark text-wrap me-1 mb-1'>
                        $fac_row[name]
                        </span>";
                    }

                    //get thumbnail of image

                    $barber_thumb = BARBERS_IMG_PATH."thumbnail.jpg";
                    $thumb_q = mysqli_query($con,"SELECT * FROM `barber_images` 
                        WHERE `barber_id`='$barber_data[id]' 
                        AND `thumb`='1'");

                    if(mysqli_num_rows($thumb_q)>0){
                        $thumb_res = mysqli_fetch_assoc($thumb_q);
                        $barber_thumb = BARBERS_IMG_PATH.$thumb_res['image'];
                    }


                    $book_btn = "";
                    if(!$settings_r['shutdown']){

                        $login = 0;
                        if(isset($_SESSION['login']) && $_SESSION['login'] == true){
                            $login = 1;
                        }

                        $book_btn = "<button onclick='checkLoginToBook($login,$barber_data[id])' class='btn btn-sm w-100 text-white custom-bg shadow-none mb-2'>Book Now</button>";
                    }

                    //print room card
                    echo<<<data
                        <div class="card mb-4 border-0 shadow">
                            <div class="row g-0 p-3 align-items-center">
                                <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                                    <img src="$barber_thumb" class="img-fluid rounded">
                                </div>
                                <div class="col-md-5 px-lg-3 px-md-3 px-0">
                                    <h5 class="mb-3">$barber_data[name]</h5>
                                    <div class="features mb-3">
                                        <h6 class="mb-1">Features</h6>
                                        $features_data
                                    </div>
                                    <div class="services mb-3">
                                        <h6 class="mb-1">Services</h6>
                                        $services_data
                                    </div>
                                    <div class="rating">
                                        <h6 class="mb-1">Rating</h6>
                                        <span class="badge rounded-pill bg-light">
                                            <i class="bi bi-star-fill text-warning"></i>
                                            <i class="bi bi-star-fill text-warning"></i>
                                            <i class="bi bi-star-fill text-warning"></i>
                                            <i class="bi bi-star-fill text-warning"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center">
                                    <h6 class="mb-4">Average: RM $barber_data[price]</h6>
                                    $book_btn
                                    <a href="booking_details.php?id=$barber_data[id]" class="btn btn-sm w-100 btn-outline-dark shadow-none">More Details</a>
                                </div>
                            </div>
                        </div>
                    data;

                }
            ?>


        </div>

    </div>
</div>

<?php require('inc/footer.php')?>


    
 
</body>
</html>