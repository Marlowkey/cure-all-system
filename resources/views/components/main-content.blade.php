<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<style>
    .container-fluid {
        margin: 0 auto;
        padding: 20px;
    }

    .landing-container {
        background-color: #155724;
        padding: 50px;
        height: 100%;
        width: 75%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #ffffff;
        border-radius: 15px;
    }

    .welcome-box {
        width: 100%;
        max-width: 400px;
        margin: 0 auto;
        background-color: #ffffff;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    
/* line 531, styles/_homepage.scss */
.social-map .container h4.title {
  letter-spacing: .6px;
  color: #4a4a4a;
  font-family: 'BarlowMedium', sans-serif;
  font-size: 18px;
  text-transform: uppercase;
  margin-bottom: 20px;
}
/* line 539, styles/_homepage.scss */
.social-map .container .social-container {
  margin-bottom: 30px;
}
/* line 541, styles/_homepage.scss */
.social-map .container .social-container .social-fb {
  width: 100%;
  height: 500px;
}
/* line 544, styles/_homepage.scss */
.social-map .container .social-container .social-fb iframe {
  border: none;
  overflow: hidden;
  width: 100%;
  height: 500px;
}
/* line 549, styles/_homepage.scss */
.social-map .container .social-container .social-fb iframe div {
  min-width: 100%;
}

.social-map .container .map-container {
  margin-bottom: 30px;
}

.social-map .container .map-container #map {
  width: 100%;
  height: 440px;
  border: solid 5px #358500;
  position: relative;
}

.social-map .container .map-container #map iframe {
  width: 100%;
  height: 400px;
}

.social-map .container .map-container .map-address {
  padding: 5px 10px;
  background: #358500;
  display: flex;
  align-items: center;
  position: absolute;
  bottom: -1px;
  left: 0;
  width: 100%;
  box-sizing: border-box;
}

.social-map .container .map-container .map-address .map-svg {
  fill: #fff;
  margin-right: 10px;
  width: 24px;
  height: 24px;
}

.social-map .container .map-container .map-address p {
  margin: 0;
  color: #fff;
  font-family: 'BarlowMedium', sans-serif;
  font-size: 12px;
}
</style>

<section class="hero">
    <div class="row justify-content-center align-items-center">
        <!-- Left side: Description -->
        <div class="col-md-7 d-flex justify-content-center align-items-center">
            <div class="landing-container" id="para">
                <p class="text-white">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sit amet feugiat lorem, in faucibus
                    justo. Donec sodales non nisi sit amet maximus. Quisque convallis dolor eget justo tristique, a
                    feugiat sapien volutpat.
                </p>
            </div>
        </div>
        <!-- Right side: Hero Image -->
        <div class="col-md-4 ms-md-2">
            <div id="hero">
            </div>
        </div>
</section>


<section id="page-header" class="about-header">
    <h2>Medicine Section</h2>
    <div id="para">
        <p>Your go-to for online shopping excellence!</p>
    </div>
</section>

<section id="product" class="section-p1">
    <h2>Featured Medicine</h2>
    <p>Available</p>
    <div class="pro-container">

        <div class="pro">
            <a href="{{ asset('WEB/assets2/sproduct.php?productId=16') }}">
                <img src="{{ asset('img/losartan.jpg') }}" alt="none">
            </a>
            <div class="des">
                <span>Brand Name</span>
                <h4>Medicine Name</h4>
                <h4 id="productPrice">₱160</h4>
            </div>
            <div class="cart">
                <i class="fa-solid fa-cart-shopping"
                    onclick="addToCart('16', 'Fuel Pumps', 160,1, 160, '{{ asset('img/image1.jpg') }}');"></i>
            </div>
        </div>

        <div class="pro">
            <a href="{{ asset('/product.php?productId=16') }}">
                <img src="{{ asset('img/losartan.jpg') }}" alt="none">
            </a>
            <div class="des">
                <span>Brand Name</span>
                <h4>Medicine Name</h4>
                <h4 id="productPrice">₱160</h4>
            </div>
            <div class="cart">
                <i class="fa-solid fa-cart-shopping"></i>
            </div>
        </div>
    </div>
</section>

<section class="social-map">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12 social-container">
                    <div class="details">
                        <h4 class="title">Our Social Media</h4>
                        <div class="social-fb">
                            <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fweb.facebook.com%2FCatanduanesDHI%2F&amp;tabs=timeline&amp;height=500&amp;small_header=false&amp;adapt_container_width=true&amp;hide_cover=false&amp;show_facepile=true&amp;appId=140580083432415" scrolling="no" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
                        </div>
                    </div>
                </div>

                <div class="col-md-8 col-sm-12 map-container">
                    <h4 class="title">We are located here</h4>
                    <div id="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7756.373699428288!2d124.18691031322803!3d13.58539357562342!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a0165a2096d1cf%3A0xf3aff9759a348bec!2sValencia%2C%20Virac%2C%20Catanduanes!5e0!3m2!1sen!2sph!4v1708240105951!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        <div class="map-address">
                            <svg role="img" title="map" class="map-svg" width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5 14.5 7.62 14.5 9 13.38 11.5 12 11.5z"/>
                            </svg>
                            <p>SURTIDA ST., VALENCIA, VIRAC, CATANDUANES PHILIPPINES 4800</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
