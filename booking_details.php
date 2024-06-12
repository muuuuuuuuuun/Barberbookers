<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <?php require('inc/links.php')?>
    <title><?php echo $settings_r['site_title'] ?> - Barber Details</title>

</head>
<body class="bg-light">

<?php require('inc/header.php'); ?>

<?php
    if(!isset($_GET['id'])){
        redirect('booking.php');
    }

    $data = filteration($_GET);

    $barber_res = select("SELECT * FROM `barbers` WHERE `id`=? AND `status`=? AND `removed`=?",[$data['id'],1,0],'iii');

    if(mysqli_num_rows($barber_res) ==0){
        redirect('booking.php');
    }

    $barber_data = mysqli_fetch_assoc($barber_res);
?>



<div class="container">
    <div class="row">

        <div class="col-12 my-5 mb-4 px-4">
            <h2 class="fw-bold"><?php echo $barber_data['name'] ?></h2>
            <div style="font-size: 14px;">
                <a href="index.php" class="text-secondary text-decoration-none">HOME</a>
                <span class="text-secondary"> > </span>
                <a href="booking.php" class="text-secondary text-decoration-none">BARBERS</a>
            </div>
        </div>

        <div class="col-lg-7 col-md-12 px-4">
            <div id="barberCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <?php
                        $barber_img = BARBERS_IMG_PATH."thumbnail.jpg";
                        $img_q = mysqli_query($con,"SELECT * FROM `barber_images` 
                            WHERE `barber_id`='$barber_data[id]'");

                        if(mysqli_num_rows($img_q)>0)
                        {
                            $active_class = 'active';

                            while($img_res = mysqli_fetch_assoc($img_q))
                            {
                                echo"
                                <div class='carousel-item $active_class'>
                                    <img src='".BARBERS_IMG_PATH.$img_res['image']."' class='d-block w-100 rounded'>
                                </div>
                                ";
                                $active_class='';
                            }
                        }
                        else{
                            echo"<div class='carousel-item active'>
                                <img src='$barber_img' class='d-block w-100'>
                                </div>";
                        }
                    ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#barberCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#barberCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>

            </div>
        </div>

        <div class="col-lg-5 col-md-12 px-4">
            <div class="card mb-4 border-0 shadow-sm rounded-3">
                <div class="card-body">
                    <?php
                        echo<<<price
                            <h4>Average: RM $barber_data[price]</h4>
                        price;

                        echo<<<rating
                            <div class="mb-3">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                            </div>
                        rating;

                        $fea_q = mysqli_query($con,"SELECT f.name FROM `features` f 
                        INNER JOIN `barber_features` rfea ON f.id = rfea.features_id 
                        WHERE rfea.barber_id = '$barber_data[id]'");

                        $features_data = "";
                        while($fea_row = mysqli_fetch_assoc($fea_q)){
                            $features_data.="<span class='badge rounded-pill bg-light text-dark text-wrap me-1 mb-1'>
                            $fea_row[name]
                            </span>";
                        }

                        echo<<<features
                            <div class="mb-3">
                                <h6 class="mb-1">Features</h6>
                                $features_data
                            </div>
                        features;

                        $fac_q = mysqli_query($con,"SELECT f.name FROM `services` f 
                        INNER JOIN `barber_services` rfac ON f.id = rfac.services_id 
                        WHERE rfac.barber_id = '$barber_data[id]'");

                        $services_data = "";
                        while($fac_row = mysqli_fetch_assoc($fac_q)){
                            $services_data.="<span class='badge rounded-pill bg-light text-dark text-wrap me-1 mb-1'>
                            $fac_row[name]
                            </span>";
                        }

                        echo<<<services
                            <div class="mb-3">
                                <h6 class="mb-1">Services</h6>
                                $services_data
                            </div>
                        services;

                        echo<<<area
                            <div class="mb-3">
                                <h6 class="mb-1">Mahallah</h6>
                                <span class='badge rounded-pill bg-light text-dark text-wrap me-1 mb-1'>
                                    $barber_data[area]
                                </span>
                            </div>
                        area;

                        

                        $book_btn = "";
                        if(!$settings_r['shutdown']){

                            $login = 0;
                            if(isset($_SESSION['login']) && $_SESSION['login'] == true){
                                $login = 1;
                            }
                            
                            echo<<<book
                            <button onclick='checkLoginToBook($login,$barber_data[id])' class="btn w-100 text-white custom-bg shadow-none mb-1">Book Now</button>
                            book;

                        }

                    ?>
                </div>
            </div>
        </div>

        <div class="col-12 mt-4 px-4">
            <div class="mb-5">
                <h5>Description</h5>
                <p>
                    <?php echo $barber_data['description'] ?>
                </p>
            </div>

            <div>
                <h5 class="mb-3">Reviews & Ratings</h5>
                <div>
                    <div class="d-flex align-items-center mb-2">
                        <img src="images/testimonials/3.jpg" width="30px">
                        <h6 class="m-0 ms-2">Anonymous</h6>
                    </div>
                    <p>
                    </p>
                    <div class="rating">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

<?php require('inc/footer.php')?>


    
 
</body>
</html>