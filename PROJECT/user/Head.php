<?php
include('SessionValidation.php');
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Plant Nursery</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="../Assets/Template/Main/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
        <link href="../Assets/Template/Main/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="../Assets/Template/Main/css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="../Assets/Template/Main/css/style.css" rel="stylesheet">
    </head>

    <body>

        <!-- Spinner Start -->
        <!-- <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div> -->
        <!-- Spinner End -->


        <!-- Navbar start -->
        <div class="container-fluid fixed-top">
            <div class="container topbar bg-primary d-none d-lg-block">
                <div class="d-flex justify-content-between">
                    <div class="top-info ps-2">
                        <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#" class="text-white">Plant Nursery, Ernakulam</a></small>
                        <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#" class="text-white">plantnursey12@gmail.com</a></small>
                    </div>
                    <div class="top-link pe-2">
                        <a href="#" class="text-white"><small class="text-white mx-2">Privacy Policy</small>/</a>
                        <a href="#" class="text-white"><small class="text-white mx-2">Terms of Use</small>/</a>
                        <a href="#" class="text-white"><small class="text-white ms-2">Sales and Refunds</small></a>
                    </div>
                </div>
            </div>
            <div class="container px-0">
                <nav class="navbar navbar-light bg-white navbar-expand-xl">
                    <a href="index.html" class="navbar-brand"><h1 class="text-primary display-6">Plant Nursery</h1></a>
                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                        <div class="navbar-nav mx-auto">
                            <a href="Homepage.php" class="nav-item nav-link active">Home</a>
                            <a href="SearchPlant.php" class="nav-item nav-link">Search</a>
                            <a href="MyCart.php" class="nav-item nav-link">Cart</a>
                            <a href="MyProfile.php" class="nav-item nav-link">Myprofile</a>
                            <a href="MyBooking.php" class="nav-item nav-link">MyBooking</a>
                            <a href="MyComplaints.php" class="nav-item nav-link">MyComplaint</a>
                            <!-- <a href="shop-detail.html" class="nav-item nav-link">Shop Detail</a> -->
                            
                            <a href="../Logout.php" class="nav-item nav-link">LogOut</a>
                        </div>
                        <!-- <div class="d-flex m-3 me-0"> -->
                            <!-- <button class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search text-primary"></i></button> -->
                            <!-- <a href="SearchPlant.php" class="position-relative me-4 my-auto">
                            <i class="fas fa-search text-primary"></i>
                                <span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1" style="top: -5px; left: 15px; height: 20px; min-width: 20px;"></span>
                            </a>
                            <a href="MyCart.php" class="position-relative me-4 my-auto">
                                <i class="fa fa-shopping-bag fa-2x"></i>
                                <span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1" style="top: -5px; left: 15px; height: 20px; min-width: 20px;"></span>
                            </a>
                            <a href="MyProfile.php" class="my-auto">
                                <i class="fas fa-user fa-2x"></i>
                            </a> -->
                        <!-- </div> -->
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar End -->
        <div class="container-fluid py-5 mb-5 hero-header">
        <div class="container py-5">