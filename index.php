<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <?php require('inc/links.php')?>
    <title><?php echo $settings_r['site_title'] ?> - Home</title>

    <style>
        
        .availability-form{
            margin-top:-50px;
            z-index:2;
            position:relative;
        }

        @media screen and (max-width:575px){
            .availability-form{
                margin-top:25px;
                padding: 0 35px;
            }
        }
    </style>
</head>
<body class="bg-light">

<?php require('inc/header.php'); ?>

<!--Carousel -->
<div class="container-fluid px-lg-4 mt-4">
    <div class="swiper swiper-container">
        <div class="swiper-wrapper">
            <?php
                $res = selectAll('carousel');
                while($row = mysqli_fetch_assoc($res))
                {
                    $path = CAROUSEL_IMG_PATH;
                    echo <<<data
                        <div class="swiper-slide">
                            <img src="$path$row[image]" class="w-100 d-block"/>
                        </div>                    
                    data;
                }
            ?>
          
        </div>
    </div>
</div>

<!-- Check Availability form -->
<div class="container availability-form">
    <div class="row">
        <div class="col-lg-12 bg-white shadow p-4 rounded">
            <h5 class="mb-4">Check Booking Availability</h5>
            <form>
                <div class="row align-items-end">
                    <div class="col-lg-3 mb-3">
                        <label class="form-label" style="font-weight:500;">Date</label>
                        <input type="date" class="form-control shadow-none">
                    </div>
                    <div class="col-lg-3 mb-3">
                        <label class="form-label" style="font-weight:500;">Time</label>
                        <input type="time" class="form-control shadow-none">
                    </div>
                    <div class="col-lg-3 mb-3">
                        <label class="form-label" style="font-weight:500;">Mahallah(Available)</label>
                        <select class="form=select shadow-none">
                            <option selected>Select one</option>
                            <option value="ali">Ali</option>
                            <option value="siddiq">Siddiq</option>
                            <option value="faruq">Faruq</option>
                            <option value="uthman">Uthman</option>
                            <option value="bilal">Bilal</option>
                        </select>
                    </div>
                    <div class="col-lg-1 mb-lg-3 mt-2">
                        <button type="submit" class="btn text-white shadow-none custom-bg">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!--Our Barbers -->
<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">OUR BARBERS</h2>

<div class="container">
    <div class="row">

        <?php
            $barber_res = select("SELECT * FROM `barbers` WHERE `status`=? AND `removed`=? ORDER BY `id` DESC LIMIT 3",[1,0],'ii');

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
                    $book_btn = "<button onclick='checkLoginToBook($login,$barber_data[id])' class='btn btn-sm text-white custom-bg shadow-none'>Book Now</button>";
                }


                //print room card
                echo<<<data
                    <div class="col-lg-4 col-md-6 my-3">        
                        <div class="card border-0 shadow" style="max-width: 350px; margin:auto;">
                            <img class="card-img-top" src="$barber_thumb" alt="Card image cap">
                            
                            <div class="card-body">
                                <h5>$barber_data[name]</h5>
                                <h6 class="mb-4">Average: RM $barber_data[price]</h6>
                                <div class="features mb-4">
                                    <h6 class="mb-1">Features</h6>
                                    $features_data
                                </div>
                                <div class="services mb-4">
                                    <h6 class="mb-1">Services</h6>
                                    $services_data
                                </div>
                                <div class="rating mb-4">
                                    <h6 class="mb-1">Rating</h6>
                                    <span class="badge rounded-pill bg-light">
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                    </span>
                                </div>
                                <div class="d-flex justify-content-evenly mb-2">
                                    $book_btn
                                    <a href="booking_details.php?id=$barber_data[id]" class="btn btn-sm btn-outline-dark shadow-none">More Details</a>
                                </div>
                            </div>
                        </div>
                    </div>

                data;

            }
        ?>

        <div class="col-lg-12 text-center mt-5">
            <a href="booking.php" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More Barbers >>></a>
        </div>
    </div>
</div>

<!--Testimonials -->
<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">TESTIMONIALS</h2>
<div class="container mt-5">
<div class="swiper swiper-testimonials">
    <div class="swiper-wrapper mb-5">

        <div class="swiper-slide bg-white p-4">
            <div class="profile d-flex align-items-center mb-3">
                <img src="images/testimonials/1.jpg" width="30px">
                <h6 class="m-0 ms-2">StyleMaven22</h6>
            </div>
            <p> John is amazing! I’ve been going to him for years and he never disappoints. 
                He knows exactly what I want and always nails it. The attention to detail is incredible, 
                and I always leave feeling like a million bucks. Highly recommend!
            </p>
            <div class="rating">
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            </div>
        </div>
        <div class="swiper-slide bg-white p-4">
            <div class="profile d-flex align-items-center mb-3">
                <img src="images/testimonials/2.png" width="30px">
                <h6 class="m-0 ms-2">TrendyTina</h6>
            </div>
            <p>John is a true artist! He transformed my hair and gave me a look that suits my personality perfectly. 
                The whole experience was fantastic, from the warm welcome to the final reveal. If you want a barber who 
                listens and delivers, John is your guy.
            </p>
            <div class="rating">
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            </div>
        </div>
        <div class="swiper-slide bg-white p-4">
            <div class="profile d-flex align-items-center mb-3">
                <img src="images/testimonials/3.jpg" width="30px">
                <h6 class="m-0 ms-2">ThatDude242</h6>
            </div>
            <p>Yo, Hazami is the real deal, fam! I walked in lookin’ raggedy, 
                and he hooked me up with the freshest fade I ever had. Dude’s got skills for days, 
                and he’s mad chill too. If you need a cut that’s gonna have you lookin’ fly, Hazami’s your guy. 
                Don’t sleep on him!
            </p>
            <div class="rating">
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            </div>
        </div>
        <div class="swiper-slide bg-white p-4">
            <div class="profile d-flex align-items-center mb-3">
                <img src="images/testimonials/4.png" width="30px">
                <h6 class="m-0 ms-2">AnonymousJo</h6>
            </div>
            <p>Aye, Hazami’s the truth. He’s got that barber game on lock. Came in with a mop, 
                left with a top-notch cut. Plus, he’s cool people. Good vibes all around. 
                Hazami’s the plug for them sharp cuts. Trust, you won’t regret it.
            </p>
            <div class="rating">
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            </div>
        </div>
        
    
    </div>

    <div class="swiper-pagination"></div>
  </div>
  <div class="col-lg-12 text-center mt-5">
    <a href="about.php" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">Know More </a>
  </div>
</div>

<!--Reach us -->


<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">CONTACT US</h2>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
        <iframe class="w-100 rounded" width="600" height="320px" src="<?php echo $contact_r['iframe'] ?>" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="bg-white p-4 rounded mb-4">
                <h5>Call us if you have any problem!</h5>
                <a href="#" class="d-inline-block mb-2 text-decoration-none text-dark">
                    <i class="bi bi-telephone-fill"></i><?php echo $contact_r['pn1'] ?>
                </a>
                <br>
                <?php
                    if($contact_r['pn2']!=''){
                        echo<<<data
                            <a href="#" class="d-inline-block mb-2 text-decoration-none text-dark">
                                <i class="bi bi-telephone-fill"></i> +$contact_r[pn2]
                            </a>
                        data;
                    }
                ?>
            </div>
            <div class="bg-white p-4 rounded mb-4">
                <h5>Follow us!</h5>
                <?php
                    if($contact_r['tw']!=''){
                        echo<<<data
                            <a href="$contact_r[tw]" class="d-inline-block mb-3">
                                <span class="badge bg-light text-dark fs-6 p-2">
                                <i class="bi bi-twitter me-1"></i> Twitter
                                </span>
                            </a>
                            <br>
                        data;
                    }
                ?>
                <a href="<?php echo $contact_r['fb'] ?>" class="d-inline-block mb-3">
                   <span class="badge bg-light text-dark fs-6 p-2">
                    <i class="bi bi-facebook me-1"></i> Facebook
                   </span>
                </a>
                <br>
                <a href="<?php echo $contact_r['insta'] ?>" class="d-inline-block">
                   <span class="badge bg-light text-dark fs-6 p-2">
                    <i class="bi bi-instagram me-1"></i> Instagram
                   </span>
                </a>

            </div>
        </div>
    </div>
</div>

<?php require('inc/footer.php')?>

    
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        var swiper = new Swiper(".swiper-container", {
        spaceBetween: 30,
        effect: "fade",
        loop:true,
        autoplay: {
            delay:3500,
            disableOnInteraction: false,
        }
        });

        var swiper = new Swiper(".swiper-testimonials", {
      effect: "coverflow",
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: "auto",
      slidesPerView:"3",
      loop:true,
      coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: false,
      },
      pagination: {
        el: ".swiper-pagination",
      },
      breakpoints: {
        320:{
            slidesPerView:1,
        },
        640:{
            slidesPerView:1,
        },
        768:{
            slidesPerView:2,
        },
        1924:{
            slidesPerView:3,
        },

      }
    });
  </script>
</body>
</html>