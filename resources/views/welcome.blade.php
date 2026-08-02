<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="ClassyAcademy,education online, education en ligne" />
    <meta name="description" content="ClassyAcademy,education online, education en ligne" />
    <meta name="author" content="Naoufel" />
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">

    <title>ClassyAcademy</title>

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css') }}" />

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,600,700&display=swap"
        rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Alexandria:wght@100..900&family=Almarai:wght@300;400;700;800&display=swap"
        rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet" />
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        <div class="hero_bg_box">
            <div class="img-box">
                <img src="{{ asset('assets/images/bg2.png') }}" alt="">
            </div>
        </div>

        <header class="header_section">
            <div class="header_top">
                <div class="container-fluid">
                    <div class="contact_link-container">
                        <a href="" class="contact_link1">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <span>
                                Elhamma Gabès,
                            </span>
                        </a>
                        <a href="" class="contact_link2">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <span>
                                Tél : 29 099 632
                            </span>
                        </a>
                        <a href="" class="contact_link3">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <span>
                                classyacademy@gmail.com
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="header_bottom">
                <div class="container-fluid">
                    <nav class="navbar navbar-expand-lg custom_nav-container">
                        <a class="navbar-brand" href="index.html">
                            <span>
                                Classy Academy
                            </span>
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class=""></span>
                        </button>

                        <div class="collapse navbar-collapse ml-auto" id="navbarSupportedContent">
                            <ul class="navbar-nav  ">
                                <li class="nav-item active">
                                    <a class="nav-link" href="index.html">الرئيسية <span
                                            class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#about"> من نحن</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#service"> خدماتنا </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="#contact">اتصل بنا</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
        <!-- end header section -->
        <!-- slider section -->
        <section class=" slider_section ">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="detail-box">
                                        <h1 class="display-2">
                                            نجاحك <br>
                                            <span>
                                                مسؤوليتنا
                                            </span>
                                        </h1>
                                        <p>
                                            كفاءة اطارنا التربوي و حرصنا على التميز وسيلتنا
                                        </p>
                                        <div class="btn-box">
                                            <a href="{{ route('register') }}" class="btn-1"> التسجيل </a>
                                            <a href="{{ route('login') }}" class="btn-2">الدخول</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item ">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="detail-box">
                                        <h1>
                                            التميز و التفوق <br>
                                            <span>
                                                غايتنا
                                            </span>
                                        </h1>
                                        <p>
                                            دروس دعم لجميع المواد و المستويات
                                        </p>
                                        <div class="btn-box">
                                            <a href="{{ route('register') }}" class="btn-1"> التسجيل </a>
                                            <a href="{{ route('login') }}" class="btn-2">الدخول</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item ">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="detail-box">
                                        <h1>
                                            كلاسي اكاديمي <br>
                                            <span>
                                                منصة التألق
                                            </span>
                                        </h1>
                                        <p>
                                            دروس تفاعلية, ملخصات, تمارين و فروض مرفقة بالإصلاح
                                        </p>
                                        <div class="btn-box">
                                            <a href="{{ route('register') }}" class="btn-1"> التسجيل </a>
                                            <a href="{{ route('login') }}" class="btn-2">الدخول</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container idicator_container">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                </div>
            </div>
            
        </section>
        <!-- end slider section -->
    </div>

    <!-- about section -->

    <section class="about_section layout_padding" id="about">
        <div class="container">
          <div class="row">
            <div id="trailer" class="section d-flex justify-content-center embed-responsive embed-responsive-4by3">
              <video class="embed-responsive-item" controls>
                <source src="{{asset('assets/images/packs/sema7c.mp4')}}" type="video/mp4">
                Your browser does not support the video tag.
              </video>
            </div>
          </div>
          <div class="row">
            <div id="trailer" class="section d-flex justify-content-center embed-responsive embed-responsive-4by3">
              <video class="embed-responsive-item" controls>
                <source src="{{asset('assets/images/packs/sema7proc.mp4')}}" type="video/mp4">
                Your browser does not support the video tag.
              </video>
            </div>
          </div>
          <div class="row">
            <div id="trailer" class="section d-flex justify-content-center embed-responsive embed-responsive-4by3">
              <video class="embed-responsive-item" controls>
                <source src="{{asset('assets/images/packs/sema7promaxc.mp4')}}" type="video/mp4">
                Your browser does not support the video tag.
              </video>
            </div>
          </div>
            <div class="row">
                <div class="col-md-6 px-0">
                    <div class="img_container">
                        <div class="img-box imgus">
                            <img src="{{ asset('assets/images/us.jpg') }}" alt="" />
                        </div>
                    </div>
                </div>
                <div class="col-md-6 px-0">
                    <div class="detail-box">
                        <div class="heading_container ">
                            <h2>
                                من نحن ؟
                            </h2>
                        </div>
                        <p>
                            أكاديمي هي منصة تعليمية تونسية لجميع المواد و المستويات تحت ادارة اكفأ اساتذة التعليم
                            الثانوي واعتمادا على دروس و تمارين تفاعلية مسجلة و مباشرة
                        </p>
                        <div class="btn-box">
                            <a href="">
                                إقرأ المزيد
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>

    <!-- end about section -->



    <!-- service section -->

    <section class="service_section layout_padding" id="service">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    خدماتنا
                </h2>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="box ">
                        <div class="img-box">
                            <svg fill="#000000" height="800px" width="800px" version="1.1" id="Capa_1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                viewBox="0 0 198 198" xml:space="preserve">
                                <path
                                    d="M192.427,44.588H151.75v-4.325c0-11.813-9.611-21.425-21.425-21.425H67.675c-11.814,0-21.425,9.611-21.425,21.425v4.325
 H5.573C2.5,44.588,0,47.088,0,50.161v18.52l40.886,34.552c0.85-1.546,2.475-2.607,4.364-2.607h13.5c2.761,0,5,2.239,5,5v3.213h70.5
 v-3.213c0-2.761,2.239-5,5-5h13.5c1.889,0,3.514,1.06,4.364,2.607L198,68.681v-18.52C198,47.088,195.5,44.588,192.427,44.588z
 M56.25,40.263c0-6.3,5.125-11.425,11.425-11.425h62.649c6.3,0,11.425,5.125,11.425,11.425v4.325h-85.5V40.263z M157.75,115.788
 l35.017-29.592v78.626c0,7.907-6.433,14.339-14.339,14.339H19.573c-7.907,0-14.339-6.433-14.339-14.339V86.196l35.017,29.592v11.213
 c0,2.761,2.239,5,5,5h13.5c2.761,0,5-2.239,5-5v-8.162h70.5v8.162c0,2.761,2.239,5,5,5h13.5c2.761,0,5-2.239,5-5V115.788z" />
                            </svg>
                        </div>
                        <div class="detail-box">
                            <h6>
                                دروس لكل المواد
                            </h6>
                            <p>
                                دروس مطابقة للبرامج الرسمية لوزارة التربية التونسية لجميع المستويات
                            </p>
                            <a href="">
                                إقرأ المزيد
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box ">
                        <div class="img-box">
                            <svg fill="#000000" width="800px" height="800px" viewBox="0 0 32 32" version="1.1"
                                xmlns="http://www.w3.org/2000/svg">
                                <title>alt-clipboard</title>
                                <path
                                    d="M2.016 30.016v-26.016q0-0.832 0.576-1.408t1.408-0.576h4v4h-1.984v21.984h20v-21.984h-2.016v-4h4q0.832 0 1.408 0.576t0.608 1.408v26.016q0 0.832-0.608 1.408t-1.408 0.576h-24q-0.832 0-1.408-0.576t-0.576-1.408zM8 26.016v-18.016h2.016q0 0.832 0.576 1.44t1.408 0.576h8q0.832 0 1.408-0.576t0.608-1.44h1.984v18.016h-16zM10.016 22.016h9.984v-2.016h-9.984v2.016zM10.016 18.016h8v-2.016h-8v2.016zM10.016 14.016h12v-2.016h-12v2.016zM10.016 6.016v-4h4v-2.016h4v2.016h4v4q0 0.832-0.608 1.408t-1.408 0.576h-8q-0.832 0-1.408-0.576t-0.576-1.408zM14.016 6.016h4v-2.016h-4v2.016z">
                                </path>
                            </svg>
                        </div>
                        <div class="detail-box">
                            <h6>
                                تمارين و فروض
                            </h6>
                            <p>
                                تمارين و فروض مرفقة بالإصلاح يمكن تنزيلها و التفاعل مع الأساتذة لمزيد التوضيح
                            </p>
                            <a href="">
                                إقرأ المزيد
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box ">
                        <div class="img-box">
                            <svg fill="#000000" width="800px" height="800px" viewBox="0 0 16 16"
                                xmlns="http://www.w3.org/2000/svg">

                                <g id="Layer_2" data-name="Layer 2">

                                    <g id="Layer_1-2" data-name="Layer 1">

                                        <path
                                            d="M11.5,11H.5a.5.5,0,0,0-.5.5v4a.5.5,0,0,0,.5.5h11a.5.5,0,0,0,.5-.5v-4A.5.5,0,0,0,11.5,11ZM1,12H8v3H1Zm10,3H9V12h2ZM1.5,8h6V9h-2a.5.5,0,0,0,0,1h5a.5.5,0,0,0,0-1h-2V8h6a.5.5,0,0,0,.5-.5V.5a.5.5,0,0,0-.5-.5H1.5A.5.5,0,0,0,1,.5v7A.5.5,0,0,0,1.5,8ZM2,1H14V7H2ZM14.5,12A1.5,1.5,0,0,0,13,13.5v1a1.5,1.5,0,0,0,3,0v-1A1.5,1.5,0,0,0,14.5,12Zm.5,2.5a.5.5,0,0,1-1,0v-1a.5.5,0,0,1,1,0Z" />

                                    </g>

                                </g>

                            </svg>
                        </div>
                        <div class="detail-box">
                            <h6>
                                دروس عن بعد
                            </h6>
                            <p>
                                دروس مباشرة عن طريق تطبيقة زوم و فيديوهات مسجلة تخص كل المواد
                            </p>
                            <a href="">
                                إقرأ المزيد
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end service section -->


    <!-- client section -->

    {{-- <section class="client_section layout_padding">
    <div class="container ">
      <div class="heading_container heading_center">
        <h2>
          What is says our clients
        </h2>
      </div>
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="box">
              <div class="img-box">
                <img src="images/client.png" alt="">
              </div>
              <div class="detail-box">
                <h4>
                  Minim Veniam
                </h4>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                  do eiusmod tempor incididunt ut labore et dolore magna
                  aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                  ullamco laboris nisi ut aliquip
                </p>
              </div>
            </div>
          </div>
          <div class="carousel-item ">
            <div class="box">
              <div class="img-box">
                <img src="images/client.png" alt="">
              </div>
              <div class="detail-box">
                <h4>
                  Minim Veniam
                </h4>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                  do eiusmod tempor incididunt ut labore et dolore magna
                  aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                  ullamco laboris nisi ut aliquip
                </p>
              </div>
            </div>
          </div>
          <div class="carousel-item ">
            <div class="box">
              <div class="img-box">
                <img src="images/client.png" alt="">
              </div>
              <div class="detail-box">
                <h4>
                  Minim Veniam
                </h4>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                  do eiusmod tempor incididunt ut labore et dolore magna
                  aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                  ullamco laboris nisi ut aliquip
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel_btn-box">
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <i class="fa fa-angle-left" aria-hidden="true"></i>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <i class="fa fa-angle-right" aria-hidden="true"></i>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </section> --}}

    <!-- end client section -->
    <!-- pricing section -->
    <section id="pricing" class="pricing-content section-padding my-4">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    عروضنا
                </h2>
                <div class="row text-center">
                    <div class="col-md-3 mt-3">
                        <div class="card bg-dark text-white o-hidden mb-4">
                            <img class="card-img" src="{{ asset('assets/images/packs/p1.jpeg') }}" alt="Card image">

                        </div>
                    </div>
                    <div class="col-md-3 mt-3">
                      <div class="card bg-dark text-white o-hidden mb-4">
                          <img class="card-img" src="{{ asset('assets/images/packs/p4.jpeg') }}" alt="Card image">

                      </div>
                  </div>
                  <div class="col-md-3 mt-3">
                    <div class="card bg-dark text-white o-hidden mb-4">
                        <img class="card-img" src="{{ asset('assets/images/packs/p3.jpeg') }}" alt="Card image">

                    </div>
                </div>
                <div class="col-md-3 mt-3">
                  <div class="card bg-dark text-white o-hidden mb-4">
                      <img class="card-img" src="{{ asset('assets/images/packs/p2.jpeg') }}" alt="Card image">

                  </div>
              </div>



                </div><!--- END ROW -->
            </div><!--- END CONTAINER -->
    </section>
    <!-- end pricing section -->

    <!-- contact section -->

    <section class="contact_section layout_padding" id="contact">
        <div class="contact_bg_box">
            <div class="img-box">
                <img src="{{ asset('assets/images/bgcontact.jpg') }}" alt="">
            </div>
        </div>
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    اتصل بنا
                </h2>
            </div>
            <div class="">
                <div class="row">
                    <div class="col-md-7 mx-auto">
                      <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                            <div class="contact_form-container">
                                <div>
                                    <div>
                                        <input type="text" placeholder="الاسم و اللقب" name="name" />
                                    </div>
                                    <div>
                                        <input type="email" placeholder="Email" name="email" />
                                    </div>
                                    <div>
                                        <input type="text" placeholder="رقم الهاتف" name="tel" />
                                    </div>
                                    <div class="">
                                        <input type="text" placeholder="الرسالة" class="message_input"
                                            name="message" />
                                    </div>
                                    <div class="btn-box ">
                                        <button type="submit">
                                            إرسال
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end contact section -->



    <!-- info section -->
    {{-- <section class="info_section ">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="info_logo">
            <a class="navbar-brand" href="index.html">
              <span>
                Guarder
              </span>
            </a>
            <p>
              dolor sit amet, consectetur magna aliqua. Ut enim ad minim veniam, quisdotempor incididunt r
            </p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_links">
            <h5>
              Useful Link
            </h5>
            <ul>
              <li>
                <a href="">
                  dolor sit amet, consectetur
                </a>
              </li>
              <li>
                <a href="">
                  magna aliqua. Ut enim ad
                </a>
              </li>
              <li>
                <a href="">
                  minim veniam,
                </a>
              </li>
              <li>
                <a href="">
                  quisdotempor incididunt r
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_info">
            <h5>
              Contact Us
            </h5>
          </div>
          <div class="info_contact">
            <a href="" class="">
              <i class="fa fa-map-marker" aria-hidden="true"></i>
              <span>
                Lorem ipsum dolor sit amet,
              </span>
            </a>
            <a href="" class="">
              <i class="fa fa-phone" aria-hidden="true"></i>
              <span>
                Call : +01 1234567890
              </span>
            </a>
            <a href="" class="">
              <i class="fa fa-envelope" aria-hidden="true"></i>
              <span>
                demo@gmail.com
              </span>
            </a>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_form ">
            <h5>
              Newsletter
            </h5>
            <form action="#">
              <input type="email" placeholder="Enter your email">
              <button>
                Subscribe
              </button>
            </form>
            <div class="social_box">
              <a href="">
                <i class="fa fa-facebook" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-twitter" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-youtube" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-instagram" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> --}}

    <!-- end info_section -->




    <!-- footer section -->
    <footer class="container-fluid footer_section">
        <p>
            &copy; <span id="currentYear"></span> Tous droits reservés. dévéloppé par:
            <a href="https://youna-it.com/">NHK Team</a> pour:
            <a href="https://classy-academy.com">ClassyAcademy</a>
        </p>
    </footer>
    <!-- footer section -->

    <script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>

</html>
