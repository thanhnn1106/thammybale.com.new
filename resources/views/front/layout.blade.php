<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="Site is modern design for medical hospital healthcare responsive website templates">
        <meta name="keywords" content="medical website templates, bootstrap medical templates, clinic website template,Medical Hospital Healthcare Mobile Website Templates ">
        <title>Trường thẩm mỹ Balê - Chuyên đào tạo nghề spa chuyên nghiệp | thammybale.com</title>
        <!-- Bootstrap -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <!-- Style Css -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <!-- Owl carousel style Css -->
        <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/owl.theme.default.css') }}" rel="stylesheet">
        <!-- Icon Font CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/fontello.css') }}">
        <!-- Google fonts -->
        <link href="https://fonts.googleapis.com/css?family=Quattrocento%7cQuattrocento+Sans" rel="stylesheet">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <div class="header-wide">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                        <a href="index.html"><img src="{{ asset('images/bale/logo.png') }}" alt=""></a>
                    </div>
                    <div class="col-lg-6 col-md-9 col-sm-12 col-xs-12">
                        <div class="navigation-wrapper">
                            <div id="navigation">
                                <ul>
                                    <li><a href="/trang-chu" title="Home">Trang chủ</a></li>
                                    <li><a href="/ve-chung-toi" title="About Us">Về chúng tôi</a>
                                    </li>
                                    <li><a href="/dich-vu-spa" title="Treatment">Dịch vụ</a>
                                        <ul>
                                            <li><a href="/cac-khoa-hoc" title="Treatment List">Các khoá học</a></li>
                                            <li><a href="/dich-vu-spa" title="Treatment With Sidebar">Bảng giá Spa</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="/lien-he">Liên hệ</a></li>
                                    <li><a href="/tin-tuc" title="Contact us">Thư viện</a>
                                        <ul>
                                            <!--<li><a href="/gallery">Hình ảnh</a></li>-->
                                            <li><a href="/video">Video</a></li>
                                            <li><a href="/tin-tuc">Tin tức</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
<!--                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                        <div class="header-cta">
                            <a href="appointment-form.html" class="btn btn-primary btn-block">make an enquiry</a>
                        </div>
                    </div>-->
                </div>
            </div>
        </div>
        <div class="slider">
            <!-- Set up your HTML -->
            <div class="owl-carousel ">
                <div class="item"> <img src="{{ asset('images/home/banner1.png') }}" alt=""></div>
                <div class="item"> <img src="{{ asset('images/home/banner2.png') }}" alt=""></div>
                <div class="item"> <img src="{{ asset('images/home/banner3.png') }}" alt=""></div>
                <div class="item"> <img src="{{ asset('images/home/banner4.png') }}" alt=""></div>
                <div class="item"> <img src="{{ asset('images/home/banner5.png') }}" alt=""></div>
                <div class="item"> <img src="{{ asset('images/home/banner6.png') }}" alt=""></div>
                <div class="item"> <img src="{{ asset('images/home/banner7.png') }}" alt=""></div>
                <div class="item"> <img src="{{ asset('images/home/banner8.png') }}" alt=""></div>
            </div>
        </div>
        @yield('content')
        <div class="footer">
            <div class="container">
                <div class="row">
<!--                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                        <div class="widget-footer mb30">
                            <h3 class="widget-title">What we treat</h3>
                            <ul class="listnone">
                                <li><a href="#">Gynaecology</a></li>
                                <li><a href="#">Irregular Bleeding</a></li>
                                <li><a href="#">Endometriosis</a></li>
                                <li><a href="#">Obstetrics</a></li>
                                <li><a href="#">Menopause</a></li>
                                <li><a href="#">Infertility</a></li>
                                <li><a href="#">Contraceptio</a></li>
                            </ul>
                        </div>
                    </div>-->
                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                        <div class="widget-footer mb30">
                            <h3 class="widget-title">Useful links</h3>
                            <ul class="listnone">
                                <li><a href="/">Trang chủ</a></li>
                                <li><a href="/ve-chung-toi">Về chúng tôi</a></li>
                                <li><a href="/dich-vu-spa">Dịch vụ</a></li>
                                <li><a href="/cac-khoa-hoc">Khoá học</a></li>
                                <li><a href="/lien-he">Liên hệ</a></li>
                                <li><a href="/tin-tuc">Thư viện</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                        <div class="widget-footer mb30">
                            <h3 class="widget-title">Get In Touch</h3>
                            <p>582 Điện Biên Phủ, phường 11, quận 10, Thành phố Hồ Chí Minh.</p>
                            <a href="tel:0913802626" class="link-menu-top">
                                <i class="ic i-phone"></i>
                                Hotline 1: 0913802626
                            </a>
                            <a href="tel:0937855189" class="link-menu-top">
                                <i class="ic i-phone"></i>
                                Hotline 2: 0937855189
                            </a>
                            <a href="www.thammybale.com">www.thammybale.com</a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                        <div class="widget-footer mb30">
                            <h3 class="widget-title">Time Sechdule</h3>
                            <p><span class="open-day">Monday to friday:</span>
                                <span class="open-time"><strong>9:30am to 7:00pm</strong></span></p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-8 col-xs-12">
                        <div class="widget-footer widget-newsletter">
                            <h3 class="widget-title">Sign up for Newsletter</h3>
                            <form action="newsletter.php" method="post">
                                <label class="control-label sr-only" for="newsletter">Newsletter</label>
                                <input id="newsletter" type="email" name="newsletter" class="form-control" placeholder="Write Email Address Here" required>
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tiny-footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                        <p>2017-2018 Trường thẩm mỹ Balê </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- back to top icon -->
        <a href="#0" class="cd-top" title="Go to top">Top</a>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <!-- sticky header -->
        <script type="text/javascript" src="{{ asset('js/jquery.sticky.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/sticky-header.js') }}"></script>
        <script src="{{ asset('js/menumaker.js') }}"></script>
        <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('js/slider.js') }}"></script>
        <!-- Back to top script -->
        <script src="{{ asset('js/back-to-top.js') }}" type="text/javascript"></script>
    </body>

</html>
