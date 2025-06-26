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
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.css')}}" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,600,700&display=swap" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Alexandria:wght@100..900&family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{asset('assets/css/responsive.css')}}" rel="stylesheet" />
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    <div class="hero_bg_box">
      <div class="img-box">
        <img src="{{asset('assets/images/bg2.png')}}" alt="">
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
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class=""></span>
            </button>

            <div class="collapse navbar-collapse ml-auto" id="navbarSupportedContent">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href="index.html">الرئيسية <span class="sr-only">(current)</span></a>
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
        <div class="col-md-6 px-0">
          <div class="img_container">
            <div class="img-box imgus">
              <img src="{{asset('assets/images/us.jpg')}}" alt="" />
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
              أكاديمي هي منصة تعليمية تونسية لجميع المواد و المستويات تحت ادارة اكفأ اساتذة التعليم الثانوي واعتمادا على دروس و تمارين تفاعلية مسجلة و مباشرة 
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
              <svg fill="#000000" height="800px" width="800px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
	 viewBox="0 0 198 198" xml:space="preserve">
<path d="M192.427,44.588H151.75v-4.325c0-11.813-9.611-21.425-21.425-21.425H67.675c-11.814,0-21.425,9.611-21.425,21.425v4.325
	H5.573C2.5,44.588,0,47.088,0,50.161v18.52l40.886,34.552c0.85-1.546,2.475-2.607,4.364-2.607h13.5c2.761,0,5,2.239,5,5v3.213h70.5
	v-3.213c0-2.761,2.239-5,5-5h13.5c1.889,0,3.514,1.06,4.364,2.607L198,68.681v-18.52C198,47.088,195.5,44.588,192.427,44.588z
	 M56.25,40.263c0-6.3,5.125-11.425,11.425-11.425h62.649c6.3,0,11.425,5.125,11.425,11.425v4.325h-85.5V40.263z M157.75,115.788
	l35.017-29.592v78.626c0,7.907-6.433,14.339-14.339,14.339H19.573c-7.907,0-14.339-6.433-14.339-14.339V86.196l35.017,29.592v11.213
	c0,2.761,2.239,5,5,5h13.5c2.761,0,5-2.239,5-5v-8.162h70.5v8.162c0,2.761,2.239,5,5,5h13.5c2.761,0,5-2.239,5-5V115.788z"/>
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
              <svg fill="#000000" width="800px" height="800px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <title>alt-clipboard</title>
                <path d="M2.016 30.016v-26.016q0-0.832 0.576-1.408t1.408-0.576h4v4h-1.984v21.984h20v-21.984h-2.016v-4h4q0.832 0 1.408 0.576t0.608 1.408v26.016q0 0.832-0.608 1.408t-1.408 0.576h-24q-0.832 0-1.408-0.576t-0.576-1.408zM8 26.016v-18.016h2.016q0 0.832 0.576 1.44t1.408 0.576h8q0.832 0 1.408-0.576t0.608-1.44h1.984v18.016h-16zM10.016 22.016h9.984v-2.016h-9.984v2.016zM10.016 18.016h8v-2.016h-8v2.016zM10.016 14.016h12v-2.016h-12v2.016zM10.016 6.016v-4h4v-2.016h4v2.016h4v4q0 0.832-0.608 1.408t-1.408 0.576h-8q-0.832 0-1.408-0.576t-0.576-1.408zM14.016 6.016h4v-2.016h-4v2.016z"></path>
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
              <svg fill="#000000" width="800px" height="800px" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">

                <g id="Layer_2" data-name="Layer 2">
                
                <g id="Layer_1-2" data-name="Layer 1">
                
                <path d="M11.5,11H.5a.5.5,0,0,0-.5.5v4a.5.5,0,0,0,.5.5h11a.5.5,0,0,0,.5-.5v-4A.5.5,0,0,0,11.5,11ZM1,12H8v3H1Zm10,3H9V12h2ZM1.5,8h6V9h-2a.5.5,0,0,0,0,1h5a.5.5,0,0,0,0-1h-2V8h6a.5.5,0,0,0,.5-.5V.5a.5.5,0,0,0-.5-.5H1.5A.5.5,0,0,0,1,.5v7A.5.5,0,0,0,1.5,8ZM2,1H14V7H2ZM14.5,12A1.5,1.5,0,0,0,13,13.5v1a1.5,1.5,0,0,0,3,0v-1A1.5,1.5,0,0,0,14.5,12Zm.5,2.5a.5.5,0,0,1-1,0v-1a.5.5,0,0,1,1,0Z"/>
                
                </g>
                
                </g>
                
                </svg>
            </div>
            <div class="detail-box">
              <h6>
                دروس  عن بعد
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
        <div class="col-lg-3 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s" data-wow-offset="0" style="visibility: visible; animation-duration: 1s; animation-delay: 0.1s; animation-name: fadeInUp;">
          <div class="pricing_design">
            <div class="single-pricing">
              
              <div class="price-head">	
                <div class="p-2">
                  <svg fill="#f1db25" height="100px" width="100px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"  	 viewBox="0 0 512 512" xml:space="preserve"><g>	<g>		<path d="M489.739,100.174H363.885c5.702-9.832,8.984-21.231,8.984-33.391C372.87,29.959,342.911,0,306.087,0
			C286.155,0,268.247,8.789,256,22.68C243.753,8.789,225.845,0,205.913,0c-36.824,0-66.783,29.959-66.783,66.783
			c0,12.16,3.282,23.56,8.984,33.391H22.261c-9.22,0-16.696,7.475-16.696,16.696v100.174c0,9.22,7.475,16.696,16.696,16.696h16.696
			v261.565c0,9.22,7.475,16.696,16.696,16.696h166.957h66.783h166.957c9.22,0,16.696-7.475,16.696-16.696V233.739h16.696
			c9.22,0,16.696-7.475,16.696-16.696V116.87C506.435,107.649,498.96,100.174,489.739,100.174z M205.913,478.609H72.348v-244.87
			h133.565V478.609z M205.913,200.348H55.652H38.957v-66.783h166.956V200.348z M205.913,100.174
			c-18.412,0-33.391-14.979-33.391-33.391c0-18.412,14.979-33.391,33.391-33.391c18.412,0,33.391,14.979,33.391,33.391v33.391
			h-16.696H205.913z M272.696,478.609h-33.391v-244.87h33.391V478.609z M272.696,200.348h-33.391v-66.783H256h16.696V200.348z
			 M272.696,100.174V66.783c0-18.412,14.979-33.391,33.391-33.391c18.412,0,33.391,14.979,33.391,33.391
			c0,18.412-14.979,33.391-33.391,33.391h-16.696H272.696z M439.652,478.609H306.087v-244.87h133.565V478.609z M473.043,200.348
			h-16.696H306.087v-66.783h166.956V200.348z"/>
	</g>
</g>
</svg>
                </div>                
                <h2>Free</h2>
                <h1>DT 0</h1>
                <span>/Monthly</span>
              </div>
              <ul>
                <li><b>15</b> website</li>
                <li><b>50GB</b> Disk Space</li>
                <li><b>50</b> Email</li>
                <li><b>50GB</b> Bandwidth</li>
                <li><b>10</b> Subdomains</li>
                <li><b>Unlimited</b> Support</li>
              </ul>
              <div class="pricing-price">
                
              </div>
              <a href="#" class="price_btn">Order Now</a>
            </div>
          </div>
        </div><!--- END COL -->	
        <div class="col-lg-3 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s" data-wow-offset="0" style="visibility: visible; animation-duration: 1s; animation-delay: 0.2s; animation-name: fadeInUp;">
          <div class="pricing_design">
            <div class="single-pricing">
              <div class="price-head">	
                <div class="p-2">
                  <svg fill="#f1db25" height="100px" width="100px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                  viewBox="0 0 491.351 491.351" xml:space="preserve">
               <path id="XMLID_188_" d="M381.559,182.007c-0.895,0-1.755,0.115-2.632,0.138l-14.934-87.322c-0.809-4.71-3.613-8.842-7.674-11.355
                 c-4.051-2.511-8.998-3.154-13.582-1.772l-44.975,13.622c-8.792,2.667-13.763,11.963-11.097,20.771
                 c2.667,8.801,11.992,13.789,20.757,11.111l26.901-8.15l6.167,35.949H198.895v-7.076l17.403-4.393
                 c6.916-1.741,11.845-8.19,11.433-15.575c-0.464-8.369-7.639-14.77-16.018-14.29l-64.285,3.653c-1.282,0.08-2.701,0.292-4.001,0.616
                 c-11.415,2.889-18.349,14.487-15.467,25.906c2.882,11.419,14.495,18.339,25.911,15.458l11.707-2.959v10.815l-13.694,23.586
                 c-12.964-5.61-27.142-8.733-42.032-8.733C49.282,182.007,0,233.227,0,296.184C0,359.151,49.282,410.37,109.852,410.37
                 c55.081,0,100.708-42.453,108.494-97.529h17.763c4.732,0,9.239-2.017,12.396-5.547l24.432-27.287
                 c-0.732,5.304-1.239,10.673-1.239,16.177c0,62.968,49.291,114.187,109.861,114.187c60.543,0,109.792-51.219,109.792-114.187
                 C491.351,233.227,442.102,182.007,381.559,182.007z M109.852,377.058c-42.203,0-76.544-36.28-76.544-80.874
                 c0-44.591,34.341-80.864,76.544-80.864c8.783,0,17.084,1.895,24.956,4.789l-39.365,67.709c-2.994,5.148-3.011,11.508-0.035,16.672
                 c2.959,5.165,8.474,8.352,14.444,8.352h74.824C177.39,349.464,146.62,377.058,109.852,377.058z M184.676,279.528h-45.868
                 l24.078-41.406C173.682,249.151,181.476,263.423,184.676,279.528z M228.66,279.528h-10.314
                 c-4.001-28.383-17.988-53.433-38.255-71.018l11.743-20.202h118.464L228.66,279.528z M381.559,377.058
                 c-42.211,0-76.544-36.28-76.544-80.874c0-33.481,19.355-62.272,46.874-74.536l13.239,77.351c1.403,8.118,8.431,13.842,16.397,13.842
                 c0.945,0,1.892-0.072,2.829-0.236c9.085-1.553,15.166-10.167,13.618-19.232l-13.307-77.72c40.714,1.774,73.378,37.07,73.378,80.531
                 C458.043,340.777,423.719,377.058,381.559,377.058z"/>
               </svg>  
                </div>	
                <h2>Personal</h2>
                <h1 class="price">DT 29</h1>
                <span>/Monthly</span>
              </div>
              <ul>
                <li><b>15</b> website</li>
                <li><b>50GB</b> Disk Space</li>
                <li><b>50</b> Email</li>
                <li><b>50GB</b> Bandwidth</li>
                <li><b>10</b> Subdomains</li>
                <li><b>Unlimited</b> Support</li>
              </ul>
              <div class="pricing-price">
                
              </div>
              <a href="#" class="price_btn">Order Now</a>
            </div>
          </div>
        </div><!--- END COL -->	
        <div class="col-lg-3 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0" style="visibility: visible; animation-duration: 1s; animation-delay: 0.3s; animation-name: fadeInUp;">
          <div class="pricing_design">
            <div class="single-pricing">
              <div class="price-head">
                <div class="p-2">
                  <svg xmlns="http://www.w3.org/2000/svg" width="100px" height="100px" viewBox="0 0 24 24" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.71454 16.826C8.7177 17.7092 8.20137 18.5073 7.40665 18.8476C6.61193 19.1878 5.6956 19.0031 5.08554 18.3797C4.47547 17.7563 4.29202 16.8172 4.62085 16.0008C4.94968 15.1845 5.72591 14.652 6.58709 14.652C7.15029 14.6509 7.69084 14.8794 8.08981 15.2871C8.48879 15.6948 8.71351 16.2483 8.71454 16.826Z" stroke="#f1db25" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="#f1db25"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M19.1636 16.826C19.1667 17.7092 18.6504 18.5073 17.8557 18.8476C17.061 19.1878 16.1446 19.0031 15.5346 18.3797C14.9245 17.7563 14.7411 16.8172 15.0699 16.0008C15.3987 15.1845 16.1749 14.652 17.0361 14.652C17.5993 14.6509 18.1399 14.8794 18.5388 15.2871C18.9378 15.6948 19.1625 16.2483 19.1636 16.826Z" stroke="#f1db25" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="#f1db25"/>
                    <path d="M2.61096 9.99042C2.46815 10.3792 2.66758 10.8102 3.05639 10.953C3.44521 11.0958 3.87618 10.8964 4.01899 10.5076L2.61096 9.99042ZM4.0628 8.213L3.36486 7.93844C3.36278 7.94374 3.36075 7.94907 3.35879 7.95442L4.0628 8.213ZM9.79678 5.75C10.211 5.75 10.5468 5.41421 10.5468 5C10.5468 4.58579 10.211 4.25 9.79678 4.25V5.75ZM3.31498 10.999C3.72919 10.999 4.06498 10.6632 4.06498 10.249C4.06498 9.83479 3.72919 9.499 3.31498 9.499V10.999ZM2.0387 10.249L2.033 10.999H2.0387V10.249ZM1.28976 10.5605L1.82287 11.0881L1.82287 11.0881L1.28976 10.5605ZM0.974976 11.324L0.224976 11.3186V11.324H0.974976ZM0.224976 13C0.224976 13.4142 0.560762 13.75 0.974976 13.75C1.38919 13.75 1.72498 13.4142 1.72498 13H0.224976ZM3.31498 9.499C2.90076 9.499 2.56498 9.83479 2.56498 10.249C2.56498 10.6632 2.90076 10.999 3.31498 10.999V9.499ZM9.79678 10.999C10.211 10.999 10.5468 10.6632 10.5468 10.249C10.5468 9.83479 10.211 9.499 9.79678 9.499V10.999ZM17.5236 10.5076C17.6664 10.8964 18.0974 11.0958 18.4862 10.953C18.875 10.8102 19.0744 10.3792 18.9316 9.99042L17.5236 10.5076ZM17.4798 8.213L18.1838 7.95442C18.1818 7.94907 18.1798 7.94374 18.1777 7.93844L17.4798 8.213ZM9.79678 4.25C9.38256 4.25 9.04678 4.58579 9.04678 5C9.04678 5.41421 9.38256 5.75 9.79678 5.75V4.25ZM18.2276 10.999C18.6418 10.999 18.9776 10.6632 18.9776 10.249C18.9776 9.83479 18.6418 9.499 18.2276 9.499V10.999ZM9.79678 9.499C9.38256 9.499 9.04678 9.83479 9.04678 10.249C9.04678 10.6632 9.38256 10.999 9.79678 10.999V9.499ZM18.2276 9.499C17.8134 9.499 17.4776 9.83479 17.4776 10.249C17.4776 10.6632 17.8134 10.999 18.2276 10.999V9.499ZM21.3622 10.249L21.3622 10.999L21.3672 10.999L21.3622 10.249ZM22.425 11.324L23.175 11.324L23.175 11.3186L22.425 11.324ZM21.675 13C21.675 13.4142 22.0108 13.75 22.425 13.75C22.8392 13.75 23.175 13.4142 23.175 13H21.675ZM14.9087 17.576C15.3229 17.576 15.6587 17.2402 15.6587 16.826C15.6587 16.4118 15.3229 16.076 14.9087 16.076V17.576ZM8.71453 16.076C8.30031 16.076 7.96453 16.4118 7.96453 16.826C7.96453 17.2402 8.30031 17.576 8.71453 17.576V16.076ZM19.1636 16.076C18.7494 16.076 18.4136 16.4118 18.4136 16.826C18.4136 17.2402 18.7494 17.576 19.1636 17.576V16.076ZM21.3613 16.826L21.367 16.076H21.3613V16.826ZM22.1102 16.5145L21.5771 15.9869L21.5771 15.9869L22.1102 16.5145ZM22.425 15.751L23.175 15.7564V15.751H22.425ZM23.175 13C23.175 12.5858 22.8392 12.25 22.425 12.25C22.0108 12.25 21.675 12.5858 21.675 13H23.175ZM4.45963 17.576C4.87384 17.576 5.20963 17.2402 5.20963 16.826C5.20963 16.4118 4.87384 16.076 4.45963 16.076V17.576ZM2.0387 16.826L2.0387 16.076L2.033 16.076L2.0387 16.826ZM0.974976 15.751L0.224956 15.751L0.224995 15.7564L0.974976 15.751ZM1.72498 13C1.72498 12.5858 1.38919 12.25 0.974976 12.25C0.560762 12.25 0.224976 12.5858 0.224976 13H1.72498ZM10.5468 5C10.5468 4.58579 10.211 4.25 9.79678 4.25C9.38256 4.25 9.04678 4.58579 9.04678 5H10.5468ZM9.04678 10.249C9.04678 10.6632 9.38256 10.999 9.79678 10.999C10.211 10.999 10.5468 10.6632 10.5468 10.249H9.04678ZM0.974976 12.25C0.560762 12.25 0.224976 12.5858 0.224976 13C0.224976 13.4142 0.560762 13.75 0.974976 13.75V12.25ZM2.91815 13.75C3.33236 13.75 3.66815 13.4142 3.66815 13C3.66815 12.5858 3.33236 12.25 2.91815 12.25V13.75ZM22.425 13.75C22.8392 13.75 23.175 13.4142 23.175 13C23.175 12.5858 22.8392 12.25 22.425 12.25V13.75ZM20.3999 12.25C19.9857 12.25 19.6499 12.5858 19.6499 13C19.6499 13.4142 19.9857 13.75 20.3999 13.75V12.25ZM4.01899 10.5076L4.76681 8.47158L3.35879 7.95442L2.61096 9.99042L4.01899 10.5076ZM4.76074 8.48756C5.12559 7.5601 5.49128 6.87863 5.94824 6.42712C6.37329 6.00714 6.91377 5.75 7.74245 5.75V4.25C6.53923 4.25 5.6138 4.64886 4.89396 5.36013C4.20602 6.03987 3.74784 6.9649 3.36486 7.93844L4.76074 8.48756ZM7.74245 5.75H9.79678V4.25H7.74245V5.75ZM3.31498 9.499H2.0387V10.999H3.31498V9.499ZM2.0444 9.49902C1.55922 9.49533 1.09635 9.6897 0.756637 10.033L1.82287 11.0881C1.88214 11.0282 1.95808 10.9984 2.033 10.999L2.0444 9.49902ZM0.756637 10.033C0.41756 10.3757 0.22844 10.8385 0.224995 11.3186L1.72496 11.3294C1.72563 11.235 1.76297 11.1486 1.82287 11.0881L0.756637 10.033ZM0.224976 11.324V13H1.72498V11.324H0.224976ZM3.31498 10.999H9.79678V9.499H3.31498V10.999ZM18.9316 9.99042L18.1838 7.95442L16.7758 8.47158L17.5236 10.5076L18.9316 9.99042ZM18.1777 7.93844C17.7947 6.9649 17.3366 6.03987 16.6486 5.36013C15.9288 4.64886 15.0033 4.25 13.8001 4.25V5.75C14.6288 5.75 15.1693 6.00714 15.5943 6.42712C16.0513 6.87863 16.417 7.5601 16.7818 8.48756L18.1777 7.93844ZM13.8001 4.25H9.79678V5.75H13.8001V4.25ZM18.2276 9.499H9.79678V10.999H18.2276V9.499ZM18.2276 10.999H21.3622V9.499H18.2276V10.999ZM21.3672 10.999C21.5182 10.998 21.6735 11.1277 21.675 11.3294L23.175 11.3186C23.1678 10.3248 22.3719 9.49226 21.3572 9.49902L21.3672 10.999ZM21.675 11.324V13H23.175V11.324H21.675ZM14.9087 16.076H8.71453V17.576H14.9087V16.076ZM19.1636 17.576H21.3613V16.076H19.1636V17.576ZM21.3555 17.576C21.8407 17.5797 22.3036 17.3853 22.6433 17.042L21.5771 15.9869C21.5178 16.0468 21.4419 16.0766 21.367 16.076L21.3555 17.576ZM22.6433 17.042C22.9824 16.6993 23.1715 16.2365 23.175 15.7564L21.675 15.7456C21.6743 15.84 21.637 15.9264 21.5771 15.9869L22.6433 17.042ZM23.175 15.751V13H21.675V15.751H23.175ZM4.45963 16.076H2.0387V17.576H4.45963V16.076ZM2.033 16.076C1.95808 16.0766 1.88214 16.0468 1.82287 15.9869L0.756638 17.042C1.09635 17.3853 1.55922 17.5797 2.0444 17.576L2.033 16.076ZM1.82287 15.9869C1.76297 15.9264 1.72563 15.84 1.72496 15.7456L0.224995 15.7564C0.22844 16.2365 0.41756 16.6993 0.756638 17.042L1.82287 15.9869ZM1.72498 15.751V13H0.224976V15.751H1.72498ZM9.04678 5V10.249H10.5468V5H9.04678ZM0.974976 13.75H2.91815V12.25H0.974976V13.75ZM22.425 12.25H20.3999V13.75H22.425V12.25Z" fill="#f1db25"/>
                    </svg>
                </div>		
                <h2>Ultimate</h2>
                <h1 class="price">DT 49</h1>
                <span>/Monthly</span>
              </div>
              <ul>
                <li><b>15</b> website</li>
                <li><b>50GB</b> Disk Space</li>
                <li><b>50</b> Email</li>
                <li><b>50GB</b> Bandwidth</li>
                <li><b>10</b> Subdomains</li>
                <li><b>Unlimited</b> Support</li>
              </ul>
              <div class="pricing-price">
                
              </div>
              <a href="#" class="price_btn">Order Now</a>
            </div>
          </div>
        </div><!--- END COL -->			  
        <div class="col-lg-3 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0" style="visibility: visible; animation-duration: 1s; animation-delay: 0.3s; animation-name: fadeInUp;">
          <div class="pricing_design">
            <div class="single-pricing">
              <div class="price-head">
                <div class="p-2" ">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="#f1db25" width="100px" height="100px" viewBox="0 0 32 32" version="1.1">
                    <path d="M29.198 2.059c0.326 0 0.555 0.061 0.675 0.107 0.143 0.382 0.336 1.751-1.079 3.167l-7.218 7.218 0.052 0.896c0.11 1.874 0.313 5.232 0.488 8.111 0.154 2.563 0.301 4.983 0.311 5.189 0.005 0.142 0.007 0.175-0.125 0.334-0.295 0.358-0.846 0.966-1.309 1.47-0.72-1.939-2.232-6.033-3.067-8.325l-1.073-2.949-2.22 2.22-4.082 3.924-0.569 0.567-0.018 0.802c-0.014 0.64-0.011 1.79-0.009 2.803 0.002 0.706 0.004 1.348-0.001 1.701-0.009 0.017 0.136 0.036 0.123 0.059-0.087-0.14-0.181-0.29-0.28-0.447-0.823-1.313-1.962-3.128-2.309-3.695l-0.254-0.415-0.417-0.252c-1.516-0.916-3.196-1.973-4.221-2.634 0.035-0.020 0.064 0.088 0.088 0.075h0.067c0.323 0 0.856 0.007 1.453 0.015 0.782 0.011 1.668 0.023 2.346 0.023 0.26 0 0.491-0.002 0.677-0.006l0.803-0.018 0.568-0.567 3.929-4.053 2.212-2.211-2.935-1.080c-2.206-0.812-6.431-2.389-8.408-3.132 0.507-0.467 1.118-1.021 1.474-1.317 0.099-0.082 0.177-0.124 0.231-0.124l0.071 0.002c0.221 0.011 2.959 0.189 5.606 0.363 2.81 0.184 5.982 0.39 7.786 0.505l0.901 0.056 7.22-7.22c1.014-1.013 2.010-1.164 2.514-1.164zM29.198 0.060c-1.181 0-2.632 0.454-3.927 1.75l-6.581 6.581c-3.707-0.235-13.201-0.862-13.437-0.869-0.042-0.002-0.094-0.004-0.152-0.004-0.321 0-0.874 0.061-1.504 0.582-0.74 0.611-2.281 2.062-2.281 2.062-0.372 0.373-0.56 0.835-0.515 1.27 0.027 0.262 0.17 0.741 0.814 0.993 0.392 0.153 6.622 2.485 9.499 3.543l-3.929 4.053c-0.174 0.004-0.39 0.006-0.633 0.006-1.198 0-3.055-0.039-3.8-0.039-0.099 0-0.178 0-0.234 0.002-0.227 0.007-0.696-0.105-1.933 0.929l-0.088 0.082c-0.371 0.371-0.458 0.741-0.466 0.986-0.008 0.252 0.059 0.615 0.424 0.907 0.219 0.177 3.026 1.974 5.329 3.365 0.552 0.901 3.092 4.938 3.225 5.157 0.194 0.327 0.51 0.514 0.889 0.525h0.031c0.368 0 0.746-0.183 1.116-0.542 1.047-1.224 0.902-1.731 0.907-1.945 0.017-0.668-0.011-3.498 0.012-4.62l4.081-3.925c1.043 2.865 3.323 9.031 3.476 9.424 0.254 0.645 0.733 0.786 0.995 0.813 0.043 0.005 0.087 0.007 0.13 0.007 0.395 0 0.803-0.186 1.139-0.52 0 0 1.445-1.534 2.059-2.28s0.591-1.383 0.579-1.683c-0.005-0.208-0.584-9.651-0.799-13.338l6.583-6.583c2.333-2.334 1.962-5.146 1.096-6.011-0.383-0.385-1.157-0.675-2.103-0.675z" fill="#f1db25"/>
                </svg>
                </div>		
                <h2>Ultimate</h2>
                <h1 class="price">DT 49</h1>
                <span>/Monthly</span>
              </div>
              <ul>
                <li><b>15</b> website</li>
                <li><b>50GB</b> Disk Space</li>
                <li><b>50</b> Email</li>
                <li><b>50GB</b> Bandwidth</li>
                <li><b>10</b> Subdomains</li>
                <li><b>Unlimited</b> Support</li>
              </ul>
              <div class="pricing-price">
                
              </div>
              <a href="#" class="price_btn">Order Now</a>
            </div>
          </div>
        </div><!--- END COL -->			  
      </div><!--- END ROW -->
    </div><!--- END CONTAINER -->
  </section>
    <!-- end pricing section -->

  <!-- contact section -->

  <section class="contact_section layout_padding" id="contact">
    <div class="contact_bg_box">
      <div class="img-box">
        <img src="{{asset('assets/images/bgcontact.jpg')}}" alt="">
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
            <form action="#">
              <div class="contact_form-container">
                <div>
                  <div>
                    <input type="text" placeholder="الاسم و اللقب" name="name" />
                  </div>
                  <div>
                    <input type="email" placeholder="Email" name="email" />
                  </div>
                  <div>
                    <input type="text" placeholder="رقم الهاتف" name="tel"/>
                  </div>
                  <div class="">
                    <input type="text" placeholder="الرسالة" class="message_input" name="message"/>
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
      &copy; <span id="currentYear"></span> Tous  droits reservés. dévéloppé par:
      <a href="https://youna-it.com/">NHK Team</a> pour: 
      <a href="https://classy-academy.com">ClassyAcademy</a>
    </p>
  </footer>
  <!-- footer section -->

  <script src="{{asset('assets/js/jquery-3.4.1.min.js')}}"></script>
  <script src="{{asset('assets/js/bootstrap.js')}}"></script>
  <script src="{{asset('assets/js/custom.js')}}"></script>
</body>

</html>