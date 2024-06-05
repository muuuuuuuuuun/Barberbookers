<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barberbookers - Barbers</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <?php require('inc/links.php')?>

</head>
<body class="bg-light">

<?php require('inc/header.php'); ?>

<div class="my-5 px-4">
    <h2 class="fw-bold h-font text-center">MEET THE BARBERS</h2>
    <div class="h-line bg-dark"></div>
</div>

<div class="container">
    <div class="row">

        <div class="col-lg-3 col-md-12 mb-lg-0 mb-4 px-lg-0">
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
                            <h5 class="mb-3" style="font-size:18px;">SERVICES</h5>
                            <div class="mb-2">
                                <input type="checkbox" id="f1" class="form-check-input shadow-none me-1">
                                <label for="f1" class="form-check-label">Service one</label>
                            </div>
                            <div class="mb-2">
                                <input type="checkbox" id="f2" class="form-check-input shadow-none me-1">
                                <label for="f2" class="form-check-label">Service two</label>
                            </div>
                            <div class="mb-2">
                                <input type="checkbox" id="f3" class="form-check-input shadow-none me-1">
                                <label for="f3" class="form-check-label">Service three</label>
                            </div>
                        </div>

                        <div class="border bg-light p-3 rounded mb-3">
                            <h5 class="mb-3" style="font-size:18px;">Gender</h5>
                            <div class="mb-2">
                                <input type="checkbox" id="g1" class="form-check-input shadow-none me-1">
                                <label for="g1" class="form-check-label">Male Adult</label>
                            </div>
                            <div class="mb-2">
                                <input type="checkbox" id="g2" class="form-check-input shadow-none me-1">
                                <label for="g2" class="form-check-label">Male Child</label>
                            </div>
                            <div class="mb-2">
                                <input type="checkbox" id="g3" class="form-check-input shadow-none me-1">
                                <label for="g3" class="form-check-label">Female Adult</label>
                            </div>
                            <div class="mb-2">
                                <input type="checkbox" id="g4" class="form-check-input shadow-none me-1">
                                <label for="g4" class="form-check-label">Female Child</label>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>

        <div class="col-lg-9 col-md-12 px-4">
            <div class="card mb-4 border-0 shadow">
                <div class="row g-0 p-3 align-items-center">
                    <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                        <img src="images/Barbers/1.png" class="img-fluid rounded">
                    </div>
                    <div class="col-md-5 px-lg-3 px-md-3 px-0">
                        <h5 class="mb-3">Simple Barber Name</h5>
                        <div class="features mb-3">
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
                        <div class="services mb-3">
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
                        <h6 class="mb-4">RM7 average</h6>
                        <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Book Now</a>
                        <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none">More Details</a>
                    </div>
                </div>
            </div>

            <div class="card mb-4 border-0 shadow">
                <div class="row g-0 p-3 align-items-center">
                    <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                        <img src="images/Barbers/1.png" class="img-fluid rounded">
                    </div>
                    <div class="col-md-5 px-lg-3 px-md-3 px-0">
                        <h5 class="mb-3">Simple Barber Name</h5>
                        <div class="features mb-3">
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
                        <div class="services mb-3">
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
                        <h6 class="mb-4">RM7 average</h6>
                        <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Book Now</a>
                        <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none">More Details</a>
                    </div>
                </div>
            </div>

            <div class="card mb-4 border-0 shadow">
                <div class="row g-0 p-3 align-items-center">
                    <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                        <img src="images/Barbers/1.png" class="img-fluid rounded">
                    </div>
                    <div class="col-md-5 px-lg-3 px-md-3 px-0">
                        <h5 class="mb-3">Simple Barber Name</h5>
                        <div class="features mb-3">
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
                        <div class="services mb-3">
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
                        <h6 class="mb-4">RM7 average</h6>
                        <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Book Now</a>
                        <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none">More Details</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php require('inc/footer.php')?>


    
 
</body>
</html>