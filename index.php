<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barberbookers</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <?php require('inc/links.php')?>

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
                        <label class="form-label" style="font-weight:500;">What gender are you?</label>
                        <select class="form=select shadow-none">
                            <option selected>Select one</option>
                            <option value="male-adult">Male Adult</option>
                            <option value="male-child">Male Child</option>
                            <option value="female-adult">Female Adult</option>
                            <option value="female-child">Fenale Child</option>
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

<!--Our Services -->
<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">OUR BARBERS</h2>

<div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-6 my-3">        
        <div class="card border-0 shadow" style="max-width: 350px; margin:auto;">
                <img class="card-img-top" src="images/Barbers/1.png" alt="Card image cap">
                
                <div class="card-body">
                    <h5>Simple Barber Name</h5>
                    <h6 class="mb-4">RM7 per cut</h6>
                    <div class="features mb-4">
                        <h6 class="mb-1">Features</h6>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            Note: bla bla bla bla
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            Note: bla 
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            Note: bla bla 
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            Note: bla 
                        </span>
                    </div>
                    <div class="services mb-4">
                        <h6 class="mb-1">Services</h6>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            Note: bla bla bla bla
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            Note: bla 
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            Note: bla bla 
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            Note: bla 
                        </span>
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
                        <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Book Now</a>
                        <a href="#" class="btn btn-sm btn-outline-dark shadow-none">More Details</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 my-3">        
        <div class="card border-0 shadow" style="max-width: 350px; margin:auto;">
                <img class="card-img-top" src="images/Barbers/1.png" alt="Card image cap">
                
                <div class="card-body">
                    <h5>Simple Barber Name</h5>
                    <h6 class="mb-4">RM7 per cut</h6>
                    <div class="features mb-4">
                        <h6 class="mb-1">Features</h6>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            Note: bla bla bla bla
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            Note: bla 
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            Note: bla bla 
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            Note: bla 
                        </span>
                    </div>
                    <div class="services mb-4">
                        <h6 class="mb-1">Services</h6>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            Note: bla bla bla bla
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            Note: bla 
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            Note: bla bla 
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            Note: bla 
                        </span>
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
                        <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Book Now</a>
                        <a href="#" class="btn btn-sm btn-outline-dark shadow-none">More Details</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 my-3">        
        <div class="card border-0 shadow" style="max-width: 350px; margin:auto;">
                <img class="card-img-top" src="images/Barbers/1.png" alt="Card image cap">
                
                <div class="card-body">
                    <h5>Simple Barber Name</h5>
                    <h6 class="mb-4">RM7 per cut</h6>
                    <div class="features mb-4">
                        <h6 class="mb-1">Features</h6>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            Note: bla bla bla bla
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            Note: bla 
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            Note: bla bla 
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            Note: bla 
                        </span>
                    </div>
                    <div class="services mb-4">
                        <h6 class="mb-1">Services</h6>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            Note: bla bla bla bla
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            Note: bla 
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            Note: bla bla 
                        </span>
                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                            Note: bla 
                        </span>
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
                        <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Book Now</a>
                        <a href="#" class="btn btn-sm btn-outline-dark shadow-none">More Details</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 text-center mt-5">
            <a href="#" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More Barbers >>></a>
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
                <img src="images/testimonials/1.jpeg" width="30px">
                <h6 class="m-0 ms-2">Musibat UITM</h6>
            </div>
            <p> BABI PUNYA BARBER MUSIBAT PUKIMAK ANAK HARAM
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
                <img src="images/testimonials/1.jpeg" width="30px">
                <h6 class="m-0 ms-2">Random user1</h6>
            </div>
            <p>Lorem alkgjrglar riogrgir girgiorgoirjgoiare goirhgoiregh
                eroigjrgjrjagi gaoijgrojg ijgar gorjrogija.
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
                <img src="images/testimonials/1.jpeg" width="30px">
                <h6 class="m-0 ms-2">Random user1</h6>
            </div>
            <p>Lorem alkgjrglar riogrgir girgiorgoirjgoiare goirhgoiregh
                eroigjrgjrjagi gaoijgrojg ijgar gorjrogija.
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