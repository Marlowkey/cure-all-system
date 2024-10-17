@extends('layouts.guest')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Include Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">

    <style>
        .social-container {
            margin-bottom: 50px;
        }

        .social-container img {
            filter: drop-shadow(5px 5px 5px black)
        }

        .map-container h2 {
            margin-bottom: 20px;
        }

        .heading-container {
            position: relative;
            margin-bottom: 40px;
            /* Add some space below the heading */
        }

        

        #team .container {
            border: 5px solid green;
            /* Green border color */
            padding: 40px 20px 20px;
            /* Add padding to make room for the heading */
            border-radius: 10px;
            /* Optional: adds rounded corners */
            position: relative;
            margin-bottom: 35px;
            filter: drop-shadow(5px 5px 5px black)
        }

        .team .box {
            margin-bottom: 20px;
            text-align: center;

        }

        .team .box img {
            width: 250px;  /* Adjust width */
            height: auto;  /* Maintain aspect ratio */
            border-radius: 50%;  /* Optional: Make it circular */
            margin-bottom: 15px;  /* Space below the image */
        }

        .team .box h3 {
            margin-top: 15px;
        }

        .team .box .share a {
            margin: 0 10px;
            color: #333;
        }

        .team .box .share a:hover {
            color: #007bff;
        }

        .team .heading {
            text-align: center;
            margin-bottom: 40px;
        }

        .team .heading span {
            font-size: 2.5rem;
            font-weight: bold;
        }

        .custom-heading {
        font-size: 2.5rem; /* Larger base size for more impact */
        font-weight: 700; /* Bold for a strong statement */
        font-family: 'Playfair Display', serif; /* Stylish serif font */
        color: #2c3e50; /* Dark gray for a sophisticated look */
        margin-bottom: 25px; /* Adds space below the heading */
        letter-spacing: 1px; /* More spacing for elegance */
        line-height: 1.4; /* Better readability */
        text-transform: capitalize; /* Ensures proper text casing */
    }
    

    .heading {
        font-size: 4vw; /* Responsive font size based on viewport width */
        color: black;
        text-align: center; /* Center-align the text */
    }

    /* Optional: Smaller screens (e.g., phones) */
    @media (max-width: 768px) {
        .heading {
            font-size: 6vw; /* Adjust the size for medium devices */
        }
    }

    /* Optional: Extra small screens (e.g., very small phones) */
    @media (max-width: 576px) {
        .heading {
            font-size: 8vw; /* Further reduce size for smaller screens */
        }
    }

    /* Media query for smaller screens */
    @media (max-width: 576px) {
        .custom-heading {
            font-size: 1.8rem; /* Adjusted size for mobile */
        }
    }

    /* Media query for small screens (max-width: 576px) */
    @media (max-width: 412px) {
        .custom-margin {
            margin-top: 60px; /* Reduced margin for smaller screens */
        }
    }
    </style>

    <section id="page-header" class="about-header">
        <h2>Know About Us!</h2>
        <div id="para">
            <p>Your go-to for online shopping excellence!</p>
        </div>
    </section>
    <section class="social-map">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12 social-container">
                    <br>
                    <img src="{{ asset('img/about-img.svg') }}" alt="none" class="img-fluid mb-3">
                </div>
                <div class="col-md-8 col-sm-12 map-container">
                    <br>
                    <br>
                    <h2 class="text-center text-black custom-heading">
                        "The best way to get your prescription"
                    </h2>
                    <div style="text-align: justify;">
                        <p class="text-black">
                            We developed CureAll to help meet patient needs conveniently through modern technology without
                            wasting effort or time. It is 100 percent user-friendly. Inspired by the innovations in food and
                            clothes delivery services, it's now time for the dawn of medicine to keep up.
                            <br><br>
                            The website will serve as a Pharmacy management system with easy tracking of transactions. The
                            overall purpose of this website is to give satisfaction to customers. Furthermore, the general
                            objective is to improve and innovate the branch of Pharmacy.
                            <br><br>
                            This is not an ambitious job but an acceptance of what most people need.
                        </p>

                        <div class="col-12">
                            <marquee bgcolor="#ccc" loop="-1" scrollamount="5" width="100%">
                                Customer satisfaction is our business
                            </marquee>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Our Team Section -->
    <section class="team" id="team">
        <div class="container border-green">
            <h1 class="heading"><span style="color: black;">Our Team</span></h1>
            <div class="row custom-margin" style="margin-top: 25px;">
                <div class="col-md-4 col-sm-12 box">
                    <!-- Using asset() for image path -->
                    <img src="{{ asset('img/cdhi-logo.png') }}" height="100%" alt="" loading="lazy" />
                    <h3 style="font-size: 1.6rem;">Nel Johnsen Alano</h3>
                    <span>Programmer</span>
                    <div class="share">
                        <a href="#" class="fab fa-facebook-f"></a>
                        <a href="#" class="fab fa-twitter"></a>
                        <a href="#" class="fab fa-instagram"></a>
                        <a href="#" class="fab fa-linkedin"></a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 box">
                    <img src="{{ asset('img/cdhi-logo.png') }}" height="100%" alt="" loading="lazy" />
                    <h3 style="font-size: 1.6rem;">Kenny Renz A. Caputol</h3>
                    <span>Designer</span>
                    <div class="share">
                        <a href="#" class="fab fa-facebook-f"></a>
                        <a href="#" class="fab fa-twitter"></a>
                        <a href="#" class="fab fa-instagram"></a>
                        <a href="#" class="fab fa-linkedin"></a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 box">
                    <img src="{{ asset('img/cdhi-logo.png') }}" height="100%" alt="" loading="lazy" />
                    <h3 style="font-size: 1.6rem;">Kyle Tristan Antion</h3>
                    <span>Paper</span>
                    <div class="share">
                        <a href="#" class="fab fa-facebook-f"></a>
                        <a href="#" class="fab fa-twitter"></a>
                        <a href="#" class="fab fa-instagram"></a>
                        <a href="#" class="fab fa-linkedin"></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
