<html>
    <head>
        
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--|The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags|-->

  <!--|Favicon|-->
  <link rel="icon" href="">

  <!--|Title|-->
  <title>BASIS-DKI</title>

  <!--|Font Family (Google Fonts)|-->
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Mono:400,100,300,100italic,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
  <!--|Font Icon (Ionicons)|-->
  <link href='assets/face/public/css/ionicons.min.css' rel='stylesheet' type='text/css'>
  <!--|Animate|-->
  <link href="assets/face/public/css/animate.css" rel="stylesheet" type="text/css">
  <!--|Owl Carousel|-->
  <link href='assets/face/public/css/owl.carousel.css' rel='stylesheet' type='text/css'>
  <!--|Magnific Popup|-->
  <link href='assets/face/public/css/magnific-popup.css' rel='stylesheet' type='text/css'>
  <!--|Bootstrap|-->
  <link href="assets/face/public/css/bootstrap.min.css" rel="stylesheet" type='text/css'>

  <!--|Custom Stylesheet|-->
  <link href="assets/face/public/css/style.css" rel="stylesheet" type='text/css'> <!--|Default - Color Blue|-->
  <!--<link href="css/style_green.css" rel="stylesheet" type='text/css'>-->
  <!--<link href="css/style_orange.css" rel="stylesheet" type='text/css'>-->
  <!--<link href="css/style_pink.css" rel="stylesheet" type='text/css'>-->
  <!--<link href="css/style_purple.css" rel="stylesheet" type='text/css'>-->
  <!--<link href="css/style_red.css" rel="stylesheet" type='text/css'>-->

  <!-- Switcher Style -->
  <link href="assets/face/public/switcher/switcher.css" rel="stylesheet" type="text/css">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="js/html5shiv.min.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
<link rel='stylesheet' href='assets/maps/css/style.css' />

    </head>
    <body>
       <div class="pre-loader">
    <div class="loader"></div>
</div>

<!--|Navigation|-->
<nav class="navbar navbar-fixed-top">
    <div class="container">
        <!--|Site Brand|-->
        <div class="site-brand pull-left">
            <a class="site-logo" href="#header"><img alt="" src="assets/face/public/images/site_logo.png"></a>
        </div>
        <!--||End Site Brand|-->

        <div class="pull-right">
            <!--|Social Links|-->
            <div class="social-links">
                <a href="#"><i class="ion-social-facebook-outline"></i></a>
                <a href="#"><i class="ion-social-twitter-outline"></i></a>
                <a href="#"><i class="ion-social-pinterest-outline"></i></a>
                <a href="#"><i class="ion-social-linkedin-outline"></i></a>
            </div>
            <!--||End Social Links|-->

            <!--|Menu Trigger Btn|-->
            <a class="menu-trigger-btn" href="#"><i class="icon-nav ion-navicon"></i><i class="icon-close ion-ios-close-empty"></i></a>
            <!--||End Menu Trigger Btn|-->
        </div>
    </div>

    <!--|Menu Wrapper|-->
    <div class="menu-wrapper">
        <div class="container">
            <ul class="nav">
                <li><a href="#header">Home</a></li>
                <li><a href="#features">Features</a></li>
                <li><a href="#screenshots">Screenshots</a></li>
                <li><a href="#testimonial">Testimonial</a></li>
                <li><a href="#plan">Plans</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href="<?php echo base_url('auth/sign-in');?>" target="_blank">SignIn</a></li>
            </ul>
        </div>
    </div>
    <!--|End Menu Wrapper|-->
</nav>
<!--||End Navbar|-->

<!--|Header|-->
<header id="header" class="overlay-default header">
    <div class="overlay-inner">
        <!--|Header Content|-->
        <div class="header-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="kefim fadeInLeft" data-wow-delay=".15s" style="margin:60px;">
                            <h3 class="title kefim fadeIn" data-wow-delay=".15s">Cari lokasi untuk investasi atau jual aset di JAKARTA?</h3>
                            <p>Kini tidak akan sulit, kami menyediakan tools yang dapat memudahkan anda. Dan tidak perlu khawatir akan legalitas lokasi</p>

                            <div class="meta-content">
                                <a class="play-btn" href="https://vimeo.com/31241154"><i class="icon ion-play"></i> Watch This Video</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="kefim slideInRight" data-wow-delay=".15s">
                            <!--|Content Img|-->
                            <?php echo Modules::run('map_housing/mapshtmloader_pb');?>
                                <!--||End Content Img|-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--||End Header Content|-->
    </div>
</header>
<!--||End Header|-->

<!--|Features|-->
<div id="features" class="features">
    <section class="section">
        <div class="container">
            <!--|Section Header|-->
            <header class="section-header kefim fadeInDown" data-wow-delay=".05s">
                <h2 class="section-title">BASIS DKI</h2>
                <p>Business Analyst Spatial Information Systems DKI</p>
            </header>
            <!--|End Section Header|-->

            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="text-box kefim fadeInUp" data-wow-delay=".1s">
                        <span class="icon ion-ios-albums-outline"></span>
                        <div class="text">
                            <h4 class="title">Data Akurat</h4>
                            <p>Perekaman data langsung dilakukan di kantor PTSP saat mendaftarkan akun dengan melampirkan dokumen-dokumen ASLI.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="text-box kefim fadeInUp" data-wow-delay=".15s">
                        <span class="icon ion-code"></span>
                        <div class="text">
                            <h4 class="title">Penyimpanan Digital</h4>
                            <p>Data yang anda DAFTARKAN di kantor akan langsung dapat DITEMUKAN member lain sesuai keperluan dan kepentingan masing-masing.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="text-box kefim fadeInUp" data-wow-delay=".2s">
                        <span class="icon ion-ios-people-outline"></span>
                        <div class="text">
                            <h4 class="title">Media Interaktif</h4>
                            <p>Dengan ada nya tools kami anda dapat berinteraksi langsung antar member PEMILIK lokasi, guna mengurangi BIAYA tambahan untuk perantara perorangan.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="text-box kefim fadeInUp" data-wow-delay=".2s">
                        <span class="icon ion-ios-cog-outline"></span>
                        <div class="text">
                            <h4 class="title">Penggunaan Mudah</h4>
                            <p>Penggunaan tools mudah, layaknya anda memnggunakan aplikasi pencarian lokasi pada PETA yang berkolaborasi dengan MEDIA SOSIAL.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!--|Video|-->
    <div id="video" class="video-section overlay-default kefim slideInRight" data-wow-delay=".2s">
        <div class="overlay-inner">
            <a class="play-btn" href="https://vimeo.com/31241154"><span class="icon ion-play"></span></a>
            <span class="meta-text">Play This Video</span>
        </div>
    </div>
    <!--|End Video|-->

</div>
<!--|End Features|-->

<!--|Screenshot Wrapper|-->
<section id="screenshots" class="section section-bg-default screenshot-wrapper">
    <div class="container">
        <!--|Section Header|-->
        <header class="section-header kefim shake" data-wow-delay=".1s">
            <h2 class="section-title">Screenshots</h2>
            <p>Phasellus turpis dolor, malesuada eu enim et, tincidunt volutpat libero</p>
        </header>
        <!--|End Section Header|-->

        <!--|Screenshot|-->
        <div class="screenshot kefim fadeIn" data-wow-delay=".2s">
            <a href="assets/face/public/images/screen_shot01.png" title="Screen01"><img alt src="assets/face/public/images/screen_shot01.png"></a>
            <a href="assets/face/public/images/screen_shot02.png" title="Screen02"><img alt src="assets/face/public/images/screen_shot02.png"></a>
            <a href="assets/face/public/images/screen_shot03.png" title="Screen03"><img alt src="assets/face/public/images/screen_shot03.png"></a>
            <a href="assets/face/public/images/screen_shot04.png" title="Screen04"><img alt src="assets/face/public/images/screen_shot04.png"></a>
            <a href="assets/face/public/images/screen_shot03.png" title="Screen03"><img alt src="assets/face/public/images/screen_shot03.png"></a>
            <a href="assets/face/public/images/screen_shot04.png" title="Screen04"><img alt src="assets/face/public/images/screen_shot04.png"></a>
            <a href="assets/face/public/images/screen_shot01.png" title="Screen01"><img alt src="assets/face/public/images/screen_shot01.png"></a>
            <a href="assets/face/public/images/screen_shot02.png" title="Screen02"><img alt src="assets/face/public/images/screen_shot02.png"></a>
        </div>
        <!--|End Screenshot|-->
    </div>
</section>
<!--|End Screenshot Wrapper|-->

<!--|Clients|-->
<div id="clients">
    <div class="container">
        <!--|Clients|-->
        <div class="clients">
            <img class="client kefim fadeInUp" data-wow-delay=".05s" alt="" src="assets/face/public/images/clients/client01.png">
            <img class="client kefim fadeInUp" data-wow-delay=".1s" alt="" src="assets/face/public/images/clients/client02.png">
            <img class="client kefim fadeInUp" data-wow-delay=".15s" alt="" src="assets/face/public/images/clients/client03.png">
            <img class="client kefim fadeInUp" data-wow-delay=".2s" alt="" src="assets/face/public/images/clients/client04.png">
            <img class="client kefim fadeInUp" data-wow-delay=".25s" alt="" src="assets/face/public/images/clients/client05.png">
        </div>
        <!--|End Clients|-->
    </div>
</div>
<!--|End Clients|-->

<!--|Testimonial Wrapper|-->
<section id="testimonial" class="section overlay-default testimonial-wrapper">
    <div class="overlay-inner">
        <div class="container">
            <!--|Section Header|-->
            <header class="section-header kefim swing" data-wow-delay=".1s">
                <h2 class="section-title">What Say’s Our Clients</h2>
                <p>Phasellus turpis dolor, malesuada eu enim et, tincidunt volutpat libero</p>
            </header>
            <!--|End Section Header|-->

            <div class="row">
                <div class="col-md-8 div-center">
                    <!--|Testimonial|-->
                    <div class="testimonial kefim fadeIn" data-wow-delay=".2s">
                        <div class="testimonial-item">
                            <div class="text">
                                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            </div>

                            <div class="testimonial-meta">
                                <div class="avatar">
                                    <img alt="" src="assets/face/public/images/testimonial_avatar.png">
                                </div>
                                <h6 class="name">Jarne Martens</h6>
                                <span class="meta"><em>CEO</em> &dash; <a href="#">Google Inc</a></span>
                            </div>
                        </div>

                        <div class="testimonial-item">
                            <div class="text">
                                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            </div>

                            <div class="testimonial-meta">
                                <div class="avatar">
                                    <img alt="" src="assets/face/public/images/testimonial_avatar01.png">
                                </div>
                                <h6 class="name">Billy Hawkins</h6>
                                <span class="meta"><em>Sr. Web Developer</em> &dash; <a href="#">Company Name</a></span>
                            </div>
                        </div>

                        <div class="testimonial-item">
                            <div class="text">
                                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            </div>

                            <div class="testimonial-meta">
                                <div class="avatar">
                                    <img alt="" src="assets/face/public/images/testimonial_avatar02.png">
                                </div>
                                <h6 class="name">Olivia Cox</h6>
                                <span class="meta"><em>CEO</em> &dash; <a href="#">Company Name</a></span>
                            </div>
                        </div>
                    </div>
                    <!--|End Testimonial|-->
                </div>
            </div>
        </div>
    </div>
</section>
<!--|End Testimonial Wrapper|-->

<!--|Plans|-->
<section id="plan" class="section section-bg-default plans">
    <div class="container">
        <!--|Section Header|-->
        <header class="section-header kefim wobble" data-wow-delay=".05s">
            <h2 class="section-title">Pricing Plans</h2>
            <p>Phasellus turpis dolor, malesuada eu enim et, tincidunt volutpat libero</p>
        </header>
        <!--|End Section Header|-->

        <div class="row">
            <div class="col-md-3 col-sm-6">
                <!--|Pricing Table|-->
                <div class="pricing-table kefim fadeInUp" data-wow-delay=".1s">
                    <div class="pricing-header">
                        <p class="plan-name">Basic</p>
                        <p class="price"><span class="currency-symbol">$</span>25 <span class="duration">/month</span></p>
                    </div>
                    <div class="pricing-features">
                        <ul>
                            <li>10GB Disk Space</li>
                            <li>5GB Bandwidth</li>
                            <li class="disable">Email Account</li>
                            <li class="disable">Unlimited Subdomain</li>
                            <li class="disable">Free Customar Support</li>
                        </ul>
                    </div>
                    <div class="pricing-footer">
                        <a class="btn btn-primary" href="#"><i class="ion-ios-cart"></i>Purchase</a>
                    </div>
                </div>
                <!--|Pricing Table|-->
            </div>

            <div class="col-md-3 col-sm-6">
                <!--|Pricing Table|-->
                <div class="pricing-table kefim fadeInUp" data-wow-delay=".15s">
                    <div class="pricing-header">
                        <p class="plan-name">Standard</p>
                        <p class="price"><span class="currency-symbol">$</span>40 <span class="duration">/month</span></p>
                    </div>
                    <div class="pricing-features">
                        <ul>
                            <li>10GB Disk Space</li>
                            <li>5GB Bandwidth</li>
                            <li>100 Email</li>
                            <li class="disable">Unlimited Subdomain</li>
                            <li class="disable">Free Customar Support</li>
                        </ul>
                    </div>
                    <div class="pricing-footer">
                        <a class="btn btn-primary" href="#"><i class="ion-ios-cart"></i>Purchase</a>
                    </div>
                </div>
                <!--|Pricing Table|-->
            </div>

            <div class="col-md-3 col-sm-6 kefim fadeInUp" data-wow-delay=".2s">
                <!--|Pricing Table|-->
                <div class="pricing-table highlight">
                    <div class="pricing-header">
                        <p class="plan-name">Business</p>
                        <p class="price"><span class="currency-symbol">$</span>65 <span class="duration">/month</span></p>
                    </div>
                    <div class="pricing-features">
                        <ul>
                            <li>10GB Disk Space</li>
                            <li>5GB Bandwidth</li>
                            <li>500 Email</li>
                            <li>Unlimited Subdomain</li>
                            <li class="disable">Free Customar Support</li>
                        </ul>
                    </div>
                    <div class="pricing-footer">
                        <a class="btn btn-primary" href="#"><i class="ion-ios-cart"></i>Purchase</a>
                    </div>
                </div>
                <!--|Pricing Table|-->
            </div>

            <div class="col-md-3 col-sm-6">
                <!--|Pricing Table|-->
                <div class="pricing-table kefim fadeInUp" data-wow-delay=".25s">
                    <div class="pricing-header">
                        <p class="plan-name">Platinum</p>
                        <p class="price"><span class="currency-symbol">$</span>99 <span class="duration">/month</span></p>
                    </div>
                    <div class="pricing-features">
                        <ul>
                            <li>250GB Disk Space</li>
                            <li>Unlimited Bandwidth</li>
                            <li>Unlimited Email</li>
                            <li>Unlimited Subdomain</li>
                            <li>Free Customar Support</li>
                        </ul>
                    </div>
                    <div class="pricing-footer">
                        <a class="btn btn-primary" href="#"><i class="ion-ios-cart"></i>Purchase</a>
                    </div>
                </div>
                <!--|Pricing Table|-->
            </div>
        </div>
    </div>
</section>
<!--|End Plans|-->

<!--|Subscribe|-->
<div id="subscribe" class="section section-bg-primary subscribe-wrapper">
    <div class="container">
        <!--|Section Header|-->
        <header class="section-header kefim swing" data-wow-delay=".1s">
            <h2 class="section-title">Subscribe to Our Newsletter</h2>
            <p>Subscribe to our weekly newsletter and receive the latest update in your inbox</p>
        </header>
        <!--|End Section Header|-->

        <div class="row">
            <div class="col-md-8 div-center">
                <!--|Subscribe Form|-->
                <p class="subscribe-success"></p>
                <p class="subscribe-error"></p>

                <form id="subscribe-form" class="subscribe kefim fadeInUp" data-wow-delay=".15s" method="post" role="form">
                    <input type="email" placeholder="Enter your email..." required>
                    <button class="subscribe-btn" type="submit"><i class="ion-paper-airplane"></i> Subscribe</button>
                </form>
                <!--|End Subscribe Form|-->
            </div>
        </div>

    </div>
</div>
<!--|End Subscribe|-->

<!--|Contact Wrapper|-->
<section id="contact" class="section overlay-default contact-wrapper">
    <div class="overlay-inner">
        <div class="container">
            <!--|Section Header|-->
            <header class="section-header kefim wobble" data-wow-delay=".1s">
                <h2 class="section-title">Hubungi Kami</h2>
                <p>Setiap pertanyaan akan segera kami jawab pada 5 hari jam kerja</p>
            </header>
            <!--|End Section Header|-->

            <div class="row">
                <div class="col-md-8 div-center">
                    <!--|Action Message|-->
                    <div class="action-message">
                        <p class="alert-success contact-success">Your massage has been sent!</p>
                        <p class="alert-danger contact-error">Opps!! You dont fill all required field correctly.</p>
                    </div>
                    <!--|End Action Message|-->

                    <div class="kefim fadeIn" data-wow-delay=".2s">
                        <!--|Contact Form|-->
                        <form class="contact-form" role="form">
                            <div class="entry-field">
                                <input id="name" type="text" name="name" placeholder="Your name" required>
                            </div>
                            <div class="entry-field">
                                <input id="email" type="email" name="email" placeholder="info@example.com" required>
                            </div>
                            <div class="entry-field">
                                <textarea id="message" rows="5" name="message" placeholder="Your massage" required></textarea>
                            </div>
                            <button class="btn btn-block btn-primary" type="submit"><i class="ion-ios-paperplane"></i> Send Mail</button>
                        </form>
                        <!--|End Contact Form|-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--|End Contact Wrapper|-->

<!--|Footer|-->
<footer id="footer" class="footer">
    <div class="container">
        <a class="back-top" href="#header"><i class="ion-ios-arrow-up"></i></a>
        <div class="social-links">
            <a href="#"><i class="ion-social-facebook-outline"></i></a>
            <a href="#"><i class="ion-social-twitter-outline"></i></a>
            <a href="#"><i class="ion-social-googleplus-outline"></i></a>
            <a href="#"><i class="ion-social-pinterest-outline"></i></a>
        </div>
        <p>Customized &copy; 2017 TEAM-BLACKCOFFEEDEV™. All rights reserved.</p>
    </div>
</footer>
<!--|End Footer|-->

<!--|Jquery|-->
<script src="assets/face/public/js/jquery.min.js"></script>
<!--|Waypoints|-->
<script src="assets/face/public/js/waypoints.min.js"></script>
<!--|Classie|-->
<script src="assets/face/public/js/classie.js"></script>
<!--|Wow Js|-->
<script src="assets/face/public/js/wow.min.js"></script>
<!--|Owl Carousel|-->
<script src="assets/face/public/js/owl.carousel.min.js"></script>
<!--|Magnific Popup|-->
<script src="assets/face/public/js/jquery.magnific-popup.min.js"></script>
<!--|Form Validation|-->
<script src="assets/face/public/js/jquery.validate.min.js"></script>
<!--|Ajaxchimp|-->
<script src="assets/face/public/js/jquery.ajaxchimp.min.js"></script>
<!--|Form|-->
<script src="assets/face/public/js/jquery.form.js"></script>
<!--|Counter Up|-->
<script src="assets/face/public/js/jquery.counterup.min.js"></script>
<!--|Bootstrap|-->
<script src="assets/face/public/js/bootstrap.min.js"></script>
<!--|Int|-->
<script src="assets/face/public/js/init.js"></script>
    </body>
</html>