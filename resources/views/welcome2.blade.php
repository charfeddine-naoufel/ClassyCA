<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gull - Angular + Laravel + Bootstrap 4 admin template</title>
    <meta name="description"
        content="Admin template built with Bootstrap, Angular & Laravel. 300+ UI Components and pages for your next web application project">
    <meta name="keywords"
        content="Angular Admin, Laravel admin, Bootstrap Admin, ng bootstrap admin, Project management template, UI Lib">
    <meta name="author" content="UI Lib">
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/styles/css/themes/lite-purple.min.css') }}">
</head>
<link href="https://fonts.googleapis.com/css2?family=Alexandria:wght@100..900&display=swap" rel="stylesheet">
<style>
    .loadscreen {
        text-align: center;
        position: fixed;
        width: 100%;
        left: 0;
        right: 0;
        margin: auto;
        top: 0;
        height: 100vh;
        background: #ffffff;
    }

    .loadscreen .loader {
        position: absolute;
        top: calc(50vh - 50px);
        left: 0;
        right: 0;
        margin: auto;
    }

    .loadscreen .logo {
        display: inline-block !important;
        width: 80px;
        height: 80px;
    }
</style>

<body>
    <!-- <header class="main-header">
        <div class="container">
            <div class="topbar">
                <nav class="navbar navbar-expand-lg header-nav d-flex justify-content-between">
                    <div class="brand ul-landing__brand">
                        <a class="navbar-brand" href="#">
                            
                        </a>
                        
                    </div>
                    <div class="">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#">Documentation <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Github</a>
                                </li>
                                
                            </ul>
                        </div>

                       
                </nav>
               
            </div>
        </div>
    </header> -->

    <section class="homepage">
        <div class="container">
            <div class="main-content text-center">
                <div class="logo">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="" class="mb-5">
                </div>
                <h1 class="mb-24 font-weight-bold"><strong class="heading text-primary display-2 mb-4"
                        style="text-shadow: 4px 6px 7px rgba(0,0,0,0.6); -webkit-text-stroke: 2px rgb(105, 102, 102);">
                        Classy Academy </strong><br><br><strong class=" text-info t-font-boldest display-4"
                        style="font-family: 'Alexandria', sans-serif;text-shadow: 4px 6px 7px rgba(0,0,0,0.6);"> طريق
                        النجاح و التميز </strong></h1>
                <p class="p-readable text-muted mx-auto mb-32">خبرة و كفاءة الاطار التربوي نقطة قوتنا</p>
                <div class="cta d-flex justify-content-center mb-48">
                    <a class="btn btn-raised btn-raised-primary btn-xl rounded" id="view_dem"
                        href="{{ route('login') }} "> الدخول</a>
                    <span style="width: 20px"></span>
                    <a class="btn btn-raised btn-raised-secondary btn-xl rounded"
                        href="{{ route('register') }}">التسجيل</a>
                </div>
                <div class="mb-48">
                    <a href="http://demos.ui-lib.com/gull-doc/" target="_blank"
                        class="mx-8 text-muted font-weight-bold">Angular Doc</a>
                    <a href="http://demos.ui-lib.com/gull-html-doc/" target="_blank"
                        class="mx-8 text-muted font-weight-bold">HTML/Laravel Doc</a>
                    <a href="https://ui-lib.com/github-access/" target="_blank"
                        class="mx-8 text-muted font-weight-bold">Github Access</a>
                </div>
                <div class="dashboard-photo">
                    <img src="{{ asset('assets/images/welcomeimg1.png') }}" alt="">
                </div>
            </div>
        </div>
    </section>



    <!-- <section class="features bg-off-white">
        <div class="container">
            
            <div class="row">
                <div class="col-md-3 mb-3">
                    <div class="features-wrap pt-5 mt-3">
                        <div class="card feature-card active" data-tab="skit">
                            <div class="card-icon">
                                <i data-feather="bar-chart-2"></i>
                            </div>
                            <div class="card-title">
                                <h6>Great Kick <br>
                                    Starter</h6>
                            </div>
                        </div>
                        
                        <div class="card feature-card">
                            <div class="card-icon">
                                <i data-feather="layout"></i>
                            </div>
                            <div class="card-title">
                                <h6>Mutiple<br>
                                    Layouts</h6>
                            </div>
                        </div>
                        <div class="card feature-card">
                            <div class="card-icon">
                                <i data-feather="layout"></i>
                            </div>
                            <div class="card-title">
                                <h6>Large collection <br>
                                    of UI Kits</h6>
                            </div>
                        </div>
                        <div class="card feature-card" data-tab="ss">
                            <div class="card-icon">
                                <i data-feather="book-open"></i>
                            </div>
                            <div class="card-title">
                                <h6>Pure Angular<br>
                                    version</h6>
                            </div>
                        </div>
                        <div class="card feature-card">
                            <div class="card-icon">
                                <i data-feather="code"></i>
                            </div>
                            <div class="card-title">
                                <h6>Fuctional <br>
                                  Applications</h6>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="features-photo tab-panel active" id="skit">
                            <div class="text-center mb-4">
                                <h2 class="font-weight-bold">Great starter kit for your <br> HTML/Laravel/Angular project</h2>
                                <p class="p-readable m-auto"></p>
                            </div>
                            <div class="card o-hidden">
                                <img src="assets/images/gull-large-sidebar.png" alt="">
                            </div>
                    </div>
                    <div class="features-photo tab-panel" id="ss">
                            <div class="text-center mb-3">
                                <h2>Features you wile Love ss</h2>
                                
                            </div>
                            <div class="card o-hidden">
                                <img src="assets/images/gull-large-sidebar.png" alt="">
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <section class="framework">
        <div class="container">
            <div class="section-title text-center">
                <h2 class="font-weight-bold">4 in 1 Value Pack</h2>
                <!-- <p>4 in 1 value pack</p> -->
            </div>
            <div class="row">
                <div class="col-md-12 d-flex flex-column flex-md-row align-items-center justify-content-center">
                    <div class="item-photo card text-center">
                        <img src="{{ asset('assets/images/bootstrap-logo.png') }}" alt="">
                        <!-- <span class="item-photo-text"><strong>Html</strong></span> -->
                    </div>
                    <span style="width: 30px"></span>
                    <div class="item-photo card text-center">
                        <img src="{{ asset('assets/images/Angular_Icon.png') }}" alt="">
                        <!-- <span class="item-photo-text"><strong>Angular</strong></span> -->
                    </div>
                    <span style="width: 30px"></span>
                    <div class="item-photo card text-center">
                        <img src="{{ asset('assets/images/laravel-logo.png') }}" alt="">
                        <!-- <span class="item-photo-text"><strong>Sass</strong></span> -->
                    </div>
                    <span style="width: 30px"></span>
                    <div class="item-photo card text-center">
                        <img style="opacity: .7" src="{{ asset('assets/images/ps.png') }}" alt="">
                        <!-- <span class="item-photo-text"><strong>Sass</strong></span> -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="demos" id="demo">
        <div class="container">
            <div class="section-title text-center">
                <h2 class="font-weight-bold">Demo</h2>
                <p>Gull includes all the components that you might need inside a project.
                </p>
            </div>

            <div class="row clearfix">
                <div class="col-md-8 mx-auto">
                    <div class="demo-photo text-center mb-4">
                        <a href="http://gull-html-laravel.ui-lib.com" target="_blank"
                            class="thumbnail card o-hidden mb-24">
                            <img src="{{ asset('assets/images/gull-large-sidebar.png') }}" alt="">
                        </a>
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-raised btn-raised-primary rounded" target="_blank"
                                href="http://gull.ui-lib.com">Preview Angular</a>
                            <span style="width: 20px"></span>
                            <a class="btn btn-raised btn-raised-primary rounded" target="_blank"
                                href="http://gull-html-laravel.ui-lib.com">Preview HTML/Laravel</a>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-md-6">
                    <div class="demo-photo text-center mb-4">
                        <a href="#" class="thumbnail card o-hidden mb-3">
                            <img src="assets/images/gull-large-sidebar.png" alt="">
                        </a>
                    </div>
                </div> -->
            </div>


        </div>
    </section>

    <!-- <section class="component bg-gradient">
        <div class="container">
            <div class="section-title text-center">
                <h2>components</h2>
                <p>This Angular template includes all the components that you might need inside a project.
                </p>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="component-list">
                        <ul>
                            <i data-feather="bar-chart-2"></i>
                            <span class="comoponent-list-heading">
                                dashboard
                            </span>
                            <li>version 2</li>
                            <li>version 3</li>
                            <li>version 4</li>
                            <li>version 5</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="component-list">
                        <ul>
                            <i data-feather="layers"></i>
                            <span class="comoponent-list-heading">
                                layouts
                            </span>
                            <li>version 2</li>
                            <li>version 3</li>
                            <li>version 4</li>
                            <li>version 5</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="component-list">
                        <ul>
                            <i data-feather="layout"></i>
                            <span class="comoponent-list-heading">
                                Form
                            </span>
                            <li>version 2</li>
                            <li>version 3</li>
                            <li>version 4</li>
                            <li>version 5</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="component-list">
                        <ul>
                            <i data-feather="bar-chart"></i>
                            <span class="comoponent-list-heading">
                                charts
                            </span>
                            <li>version 2</li>
                            <li>version 3</li>
                            <li>version 4</li>
                            <li>version 5</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="component-list">
                        <ul>
                            <i data-feather="list"></i>
                            <span class="comoponent-list-heading">
                                Side menu
                            </span>
                            <li>version 2</li>
                            <li>version 3</li>
                            <li>version 4</li>
                            <li>version 5</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="component-list">
                        <ul>
                            <i data-feather="menu"></i>
                            <span class="comoponent-list-heading">
                                Topbar
                            </span>
                            <li>version 2</li>
                            <li>version 3</li>
                            <li>version 4</li>
                            <li>version 5</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="component-list">
                        <ul>
                            <i data-feather="database"></i>
                            <span class="comoponent-list-heading">
                                Tables
                            </span>
                            <li>version 2</li>
                            <li>version 3</li>
                            <li>version 4</li>
                            <li>version 5</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="component-list">
                        <ul>
                            <i data-feather="aperture"></i>
                            <span class="comoponent-list-heading">
                                utilities
                            </span>
                            <li>version 2</li>
                            <li>version 3</li>
                            <li>version 4</li>
                            <li>version 5</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <!-- clients -->

    <section class="clients">
        <div class="container">
            <div class="section-title">
                <h2>What our customers are saying</h2>
                <p>600+ happy users</p>
            </div>
            <div class="complement">
                <div class="client-card card ml-3">
                    <div class="user d-flex">
                        <div class="user-photo">
                            <img src="https://public-assets.envato-static.com/assets/common/icons-buttons/default-user-2962fd43ee315eafee8bfc08f02fee84687beb0499de44e5ab2873399944b0fe.jpg"
                                alt="">
                        </div>
                        <div class="user-detail">
                            <h6>eprince31</h6>
                            <p> <small>Envato User</small></p>
                        </div>
                    </div>
                    <div class="user-comment">
                        <p>Design quality and customer support are excellent. Seller returns advice very quickly,
                            especially as I am new to Laravel, which I cannot praise enough. Thank you</p>
                    </div>
                </div>
                <div class="client-card card">
                    <div class="user d-flex">
                        <div class="user-photo">
                            <img src="https://public-assets.envato-static.com/assets/common/icons-buttons/default-user-2962fd43ee315eafee8bfc08f02fee84687beb0499de44e5ab2873399944b0fe.jpg"
                                alt="">
                        </div>
                        <div class="user-detail">
                            <h6>zim_ejin</h6>
                            <p> <small>Envato User</small></p>
                        </div>
                    </div>
                    <div class="user-comment">
                        <p>I just started using this template, So far what I like is that it's not only beautiful and
                            packed with features. But it appears to be a full Angular and TypeScript template.
                            <br><br>
                            A lot of templates claim to be built with Angular but are actually JQuery Templates inside
                            of Angular.
                            I've had a bad experience with one of those.
                            <br><br>
                            I'm looking forward to working more with this template and even learning a few Angular
                            concepts from it.
                        </p>
                    </div>
                </div>
                <div class="client-card card ml-3">
                    <div class="user d-flex">
                        <div class="user-photo">
                            <img src="https://public-assets.envato-static.com/assets/common/icons-buttons/default-user-2962fd43ee315eafee8bfc08f02fee84687beb0499de44e5ab2873399944b0fe.jpg"
                                alt="">
                        </div>
                        <div class="user-detail">
                            <h6>versing38</h6>
                            <p> <small>Envato User</small></p>
                        </div>
                    </div>
                    <div class="user-comment">
                        <p>It's very easy template for laravel, i'have just launch 'composer install' and 'npm run dev'
                            and i can work ! congratulations !!</p>
                    </div>
                </div>
                <div class="client-card card">
                    <div class="user d-flex">
                        <div class="user-photo">
                            <img src="https://public-assets.envato-static.com/assets/common/icons-buttons/default-user-2962fd43ee315eafee8bfc08f02fee84687beb0499de44e5ab2873399944b0fe.jpg"
                                alt="">
                        </div>
                        <div class="user-detail">
                            <h6>ljslol</h6>
                            <p> <small>Envato User</small></p>
                        </div>
                    </div>
                    <div class="user-comment">
                        <p>If you are a laravel user, please purchase it unconditionally. Easy. Fast. Good. Good
                            quality. </p>
                    </div>
                </div>
                <div class="client-card card ml-3">
                    <div class="user d-flex">
                        <div class="user-photo">
                            <img src="https://public-assets.envato-static.com/assets/common/icons-buttons/default-user-2962fd43ee315eafee8bfc08f02fee84687beb0499de44e5ab2873399944b0fe.jpg"
                                alt="">
                        </div>
                        <div class="user-detail">
                            <h6>bagaskara7</h6>
                            <p> <small>Envato User</small></p>
                        </div>
                    </div>
                    <div class="user-comment">
                        <p>Great template with Laravel starter kit which make life easier ;)

                        </p>
                    </div>
                </div>
                <div class="client-card card">
                    <div class="user d-flex">
                        <div class="user-photo">
                            <img src="https://public-assets.envato-static.com/assets/common/icons-buttons/default-user-2962fd43ee315eafee8bfc08f02fee84687beb0499de44e5ab2873399944b0fe.jpg"
                                alt="">
                        </div>
                        <div class="user-detail">
                            <h6>fubsz</h6>
                            <p> <small>Envato User</small></p>
                        </div>
                    </div>
                    <div class="user-comment">
                        <p>Truly one of the highest quality and greatest value items purchased on Themeforest, in
                            addition to a great product stands an awesome creator who quickly replies to comments and
                            questions.
                            <br>
                            <br>
                            Thank you!!!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- blog -->

    <section class="blog">
        <div class="container">
            <h2>Is it really worth it?</h2>
            <p class="text-16">A powerful admin template is like a high-end car.
                Each of its components is built carefully and keeping efficiency in mind. Once the individual parts are
                developed, engineers can assemble the product.
                The quality of their individual components defines the most powerful machines.
            </p>
            <p class="text-16">Gull is just like the car in the above analogy. Yeah, it's powerful enough on its own
                right. But, it aims at SAVING your TIME.
                As with every successful ERP dashboard, efficiency lies at the core of Gull -
                and it makes sure you don't have to trade off the performance with productivity during the same time.
            </p>

            <p class="text-16">If you are looking for a quality admin template to boost your ongoing startup
                application or are merely looking for pre-built chat application,
                calendar schedule app, to-do list app, and such for your eCommerce backend or CMS solution,
                Gull can and will be the perfect project management dashboard for you.</p>


        </div>
    </section>


    <!-- footer -->

    <section class="footer bg-home text-center">
        <div class="container">
            <div class="row footer-item">
                <div class="col-md-4">
                    <!-- <div class="social-media">
                        <ul>
                            <li>
                                <a class="" href="#">
                                    <i data-feather="facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a class="" href="#">
                                    <i data-feather="twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a class="" href="#">
                                    <i data-feather="linkedin"></i>
                                </a>
                            </li>
                        </ul>
                    </div> -->
                </div>
                <div class="col-md-4">
                    <div class="selling-btn">
                        <a class="btn btn-raised btn-raised-primary btn-xl rounded"
                            href="https://themeforest.net/item/gull-bootstrap-laravel-admin-dashboard-template/23101970">Buy
                            Gull</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- <div class="btn-arrow">
                        <button class="btn">
                            <i data-feather="arrow-up"></i>
                        </button>
                    </div> -->
                </div>
            </div>
        </div>
        <div class="footer-bootom">
            <p>© 2019 Gull, By Team Ui Lib</p>
        </div>
    </section>

    <div class="loadscreen">
        <div class="loader">
            <img src="{{ asset('assets/images/logo.png') }}" class="logo mb-3" style="display: none"
                alt="">
            <div class="loader-bubble loader-bubble-primary d-block"></div>
        </div>
    </div>

    <script src="{{ asset('assets/js/vendor/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/landing.script.js') }}"></script>

    <script>
        /* ----------------------------- 
          Pre Loader
          ----------------------------- */
        $(window).on('load', function() {
            'use strict';
            $('.loadscreen').delay(500).fadeOut();
            // $('#preloader').delay(800).fadeOut('slow');
        });
    </script>
</body>

</html>
