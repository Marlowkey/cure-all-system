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
            filter: drop-shadow(5px 5px 5px black);
            border-radius: 10px; /* Rounded corners for images */
        }

        .map-container h2 {
            margin-bottom: 20px;
            font-weight: bold; /* Make heading bold */
        }

        .heading-container {
            position: relative;
            margin-bottom: 40px;
        }

        #team .container {
            border: 5px solid green;
            padding: 40px 20px; 
            border-radius: 10px;
            margin-bottom: 35px;
            filter: drop-shadow(5px 5px 5px black);
            background-color: #f9f9f9; /* Light background for contrast */
        }

        .team .box {
            margin-bottom: 30px; /* Increased margin for better spacing */
            text-align: center;
            transition: transform 0.3s; /* Smooth transition effect */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); /* Shadow effect for depth */
            border-radius: 10px; /* Rounded corners */
            color: black; /* Text color for better contrast */
            padding: 20px; /* Added padding for inner spacing */
            overflow: hidden; /* Clip overflow for rounded corners */
        }

        .team .box:hover {
            transform: translateY(-5px); /* Lift effect on hover */
        }

        
        .team .box img {
            width: 150px; /* Adjusted width for uniformity */
            height: 150px; /* Ensures height matches width for a perfect circle */
            border-radius: 50%;
            margin-bottom: 15px;
            border: 5px solid #0056b3; /* Adds a circular border outline */
            padding: 5px; /* Optional padding to enhance the border */
            transition: transform 0.3s ease; /* Smooth transition for hover effect */
        }

        .team .box img:hover {
            transform: scale(1.1); /* Zoom-in effect on hover */
        }

        .team .box h3 {
            margin-top: 15px;
            font-weight: bold; /* Bold font for names */
        }

        .team .box .share a {
            margin: 0 10px;
            color: #000; /* Changed color to black */
            transition: color 0.3s; /* Transition for color on hover */
        }


        .team .box .share a:hover {
            color: #ffc107; /* Highlight color on hover */
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
            font-size: 2.5rem;
            font-weight: 700;
            font-family: 'Playfair Display', serif;
            color: #2c3e50;
            margin-bottom: 25px;
            letter-spacing: 1px;
            line-height: 1.4;
            text-transform: capitalize;
        }

        .heading {
            font-size: 4vw;
            color: black;
            text-align: center;
        }

        @media (max-width: 768px) {
            .heading {
                font-size: 6vw;
            }
        }

        @media (max-width: 576px) {
            .heading {
                font-size: 8vw;
            }
        }

        @media (max-width: 576px) {
            .custom-heading {
                font-size: 1.8rem;
            }
        }

        @media (max-width: 412px) {
            .custom-margin {
                margin-top: 60px;
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
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header bg-primary text-white text-center">
                                <h4 class="mb-0">CureAll - Your Prescription Solution</h4>
                            </div>
                            <div style="text-align: justify;">
                                <p class="text-black">
                                    We developed CureAll to help meet patient needs conveniently through modern technology without wasting effort or time. It is 100 percent user-friendly. Inspired by the innovations in food and clothes delivery services, it's now time for the dawn of medicine to keep up.
                                    <br><br>
                                    The website will serve as a Pharmacy management system with easy tracking of transactions. The overall purpose of this website is to give satisfaction to customers. Furthermore, the general objective is to improve and innovate the branch of Pharmacy.
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
            </div>
        </div>
    </section>

    <!-- Our Team Section -->
    <section class="team" id="team">
        <div class="container border-green">
        <h1 class="heading" style="margin-top: -20px;  padding: 15px; border-radius: 10px;">
            <span style="color: black;">Our Team</span>
        </h1>

            <div class="row">
                <div class="col-md-4 col-sm-12 box mb-4"> <!-- Adjusted class names -->
                    <img src="{{ asset('img/sen.jpg') }}" height="80%" alt="" loading="lazy" />
                    <h3 style="font-size: 1.6rem;">Nel Johnsen Alano</h3>
                    <span>Programmer</span>
                    <div class="share">
                        <a href="#" class="fab fa-facebook-f"></a>
                        <a href="#" class="fab fa-twitter"></a>
                        <a href="#" class="fab fa-instagram"></a>
                        <a href="#" class="fab fa-linkedin"></a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 box mb-4"> <!-- Adjusted class names -->
                    <img src="{{ asset('img/ken.jpg') }}" height="80%" alt="" loading="lazy" />
                    <h3 style="font-size: 1.6rem;">Kenny Renz A. Caputol</h3>
                    <span>UI Designer</span>
                    <div class="share">
                        <a href="#" class="fab fa-facebook-f"></a>
                        <a href="#" class="fab fa-twitter"></a>
                        <a href="#" class="fab fa-instagram"></a>
                        <a href="#" class="fab fa-linkedin"></a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 box mb-4"> <!-- Adjusted class names -->
                    <img src="{{ asset('img/kyle.jpg') }}" height="80%" alt="" loading="lazy" />
                    <h3 style="font-size: 1.6rem;">Kyle Tristan Antion</h3>
                    <span>Technical Writer</span>
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
