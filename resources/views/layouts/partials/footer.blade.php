<style>
    /* General styling for the footer */
footer {
    padding-top: 20px;
}

footer h4 {
    font-weight: bold;
    text-transform: uppercase;
}

/* Media Query for 412px width */
@media (max-width: 412px) {
    footer .col-md-6 {
        flex: 0 0 100%;
        max-width: 100%;
    }

    footer .col-lg-4, footer .col-lg-3 {
        text-align: center;
    }

    footer .row {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    footer .col-lg-4, footer .col-lg-3 {
        margin-bottom: 20px;
    }

    footer .list-unstyled {
        text-align: center;
    }

    footer .d-flex {
        justify-content: center;
    }
}


</style>


<footer class="bg-dark text-white pt-5">
    <!-- Grid container -->
    <div class="container">
        <!--Grid row-->
        <div class="row text-center text-lg-start justify-content-center justify-content-lg-between">
            <!--Grid column: Logo and Description-->
            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0 d-flex flex-column align-items-center align-items-lg-start">
                <div class="rounded-circle bg-white shadow-1-strong d-flex align-items-center justify-content-center mb-4"
                    style="width: 150px; height: 150px;">
                    <img src="{{ asset('img/cdhi-logo.png') }}" class="img-fluid" alt="CURE ALL Logo" loading="lazy" />
                </div>
                <h4 class="font-weight-bold">CURE ALL</h4>
                <p>CATANDUANES DOCTORS HOSPITAL INC.</p>
                <!-- Social Media Links -->
                <ul class="list-unstyled d-flex justify-content-center">
                    <li><a class="text-white me-3" href="https://www.facebook.com/cdhicatanduanes"><i class="fab fa-facebook-square fa-lg"></i></a></li>
                    <li><a class="text-white me-3" href="https://www.messenger.com/t/CatanduanesDHI"><i class="fab fa-facebook-messenger fa-lg"></i></a></li>
                    <li><a class="text-white me-3" href="https://www.instagram.com/explore/locations/1257306844386458/catanduanes-doctors-hospital-inc"><i class="fab fa-instagram fa-lg"></i></a></li>
                    <li><a class="text-white me-3" href="https://twitter.com/catanduanesdhi"><i class="fab fa-twitter fa-lg"></i></a></li>
                </ul>
            </div>
            <!--Grid column: About Links-->
            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0 text-center text-lg-start">
                <h4 class="text-uppercase mb-4">About Us</h4>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <a href="{{ route('history.index') }}" class="text-white text-decoration-none">
                            <i class="fas fa-info-circle"></i> History
                        </a>
                    </li>
                    <li class="mb-2"><a href="#!" class="text-white text-decoration-none"><i class="fas fa-info-circle"></i> Vision and Mission</a></li>
                    <li class="mb-2"><a href="#!" class="text-white text-decoration-none"><i class="fas fa-info-circle"></i> Objectives and Core Values</a></li>
                    <li class="mb-2"><a href="#!" class="text-white text-decoration-none"><i class="fas fa-info-circle"></i> Directors and Unit Managers</a></li>
                    
                </ul>
            </div>
            <!--Grid column: Contact Information-->
            <div class="col-lg-4 col-md-6 text-center text-lg-start mb-4 mb-lg-0">
                <h4 class="text-uppercase mb-4">Contact</h4>
                <ul class="list-unstyled">
                    <li><p><i class="fas fa-map-marker-alt pe-2"></i>Surtida ST., Valencia, Virac, Catanduanes, Philippines 4800</p></li>
                    <li><p><i class="fas fa-phone pe-2"></i>+63 977 038 0379</p></li>
                    <li><p><i class="fas fa-envelope pe-2"></i>cdhiappointment@gmail.com</p></li>
                </ul>
            </div>
        </div>
        <!--Grid row-->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center text-white py-3" style="background-color: rgba(0, 0, 0, 0.2)">
        <p class="mb-0">© 2024, All Rights Reserved</p>
    </div>
    <!-- Copyright -->
</footer>

