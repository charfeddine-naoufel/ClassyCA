@extends('layouts.app')
@section('title','Accueil Teacher')
@section('mega-menu')
<div class="dropdown mega-menu d-none d-md-block">
                    <a href="#" class="btn text-muted dropdown-toggle mr-3" id="dropdownMegaMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mega Menu</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <div class="row m-0">
                            <div class="col-md-4 p-4 text-left bg-img">
                                <h2 class="title">Mega Menu <br> Sidebar</h2>
                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Asperiores natus laboriosam fugit, consequatur.
                                </p>
                                <p class="mb-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Exercitationem odio amet eos dolore suscipit placeat.</p>
                                <button class="btn btn-lg btn-rounded btn-outline-warning">Learn More</button>
                            </div>
                            <div class="col-md-4 p-4 text-left">
                                <p class="text-primary text--cap border-bottom-primary d-inline-block">Features</p>
                                <div class="menu-icon-grid w-auto p-0">
                                    <a href="#"><i class="i-Shop-4"></i> Home</a>
                                    <a href="#"><i class="i-Library"></i> UI Kits</a>
                                    <a href="#"><i class="i-Drop"></i> Apps</a>
                                    <a href="#"><i class="i-File-Clipboard-File--Text"></i> Forms</a>
                                    <a href="#"><i class="i-Checked-User"></i> Sessions</a>
                                    <a href="#"><i class="i-Ambulance"></i> Support</a>
                                </div>
                            </div>
                            <div class="col-md-4 p-4 text-left">
                                <p class="text-primary text--cap border-bottom-primary d-inline-block">Components</p>
                                <ul class="links">
                                    <li><a href="accordion.html">Accordion</a></li>
                                    <li><a href="alerts.html">Alerts</a></li>
                                    <li><a href="buttons.html">Buttons</a></li>
                                    <li><a href="badges.html">Badges</a></li>
                                    <li><a href="carousel.html">Carousels</a></li>
                                    <li><a href="lists.html">Lists</a></li>
                                    <li><a href="popover.html">Popover</a></li>
                                    <li><a href="tables.html">Tables</a></li>
                                    <li><a href="datatables.html">Datatables</a></li>
                                    <li><a href="modals.html">Modals</a></li>
                                    <li><a href="nouislider.html">Sliders</a></li>
                                    <li><a href="tabs.html">Tabs</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
@endsection
@section('header')
<div class="side-content-wrap">
            <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
                <ul class="navigation-left">
                    <li class="nav-item" data-item="dashboard">
                        <a class="nav-item-hold" href="#">
                            <i class="nav-icon i-Bar-Chart"></i>
                            <span class="nav-text">Dashboard teacher</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item" data-item="uikits">
                        <a class="nav-item-hold" href="#">
                            <i class="nav-icon i-Library"></i>
                            <span class="nav-text">UI kits</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item" data-item="extrakits">
                        <a class="nav-item-hold" href="#">
                            <i class="nav-icon i-Suitcase"></i>
                            <span class="nav-text">Extra kits</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item" data-item="apps">
                        <a class="nav-item-hold" href="#">
                            <i class="nav-icon i-Computer-Secure"></i>
                            <span class="nav-text">Apps</span>
                        </a>
                        <div class="triangle"></div>
                    </li>

                    <li class="nav-item" data-item="widgets">
                        <a class="nav-item-hold" href="#">
                            <i class="nav-icon i-Computer-Secure"></i>
                            <span class="nav-text">Widgets</span>
                        </a>
                        <div class="triangle"></div>
                    </li>

                    <li class="nav-item " data-item="charts">
                        <a class="nav-item-hold" href="#">
                            <i class="nav-icon i-File-Clipboard-File--Text"></i>
                            <span class="nav-text">Charts</span>
                        </a>
                        <div class="triangle"></div>
                    </li>


                    <li class="nav-item" data-item="forms">
                        <a class="nav-item-hold" href="#">
                            <i class="nav-icon i-File-Clipboard-File--Text"></i>
                            <span class="nav-text">Forms</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item-hold" href="datatables.html">
                            <i class="nav-icon i-File-Horizontal-Text"></i>
                            <span class="nav-text">Datatables</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item" data-item="sessions">
                        <a class="nav-item-hold" href="#">
                            <i class="nav-icon i-Administrator"></i>
                            <span class="nav-text">Sessions</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item active" data-item="others">
                        <a class="nav-item-hold" href="#">
                            <i class="nav-icon i-Double-Tap"></i>
                            <span class="nav-text">Others</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item-hold" href="http://demos.ui-lib.com/gull-html-doc/" target="_blank">
                            <i class="nav-icon i-Safe-Box1"></i>
                            <span class="nav-text">Doc</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                </ul>
            </div>

            <div class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
                <!-- Submenu Dashboards -->
                <ul class="childNav" data-parent="dashboard">
                    <li class="nav-item">
                        <a href="dashboard.v1.html">
                            <i class="nav-icon i-Clock-3"></i>
                            <span class="item-name">Version 1</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="dashboard.v2.html">
                            <i class="nav-icon i-Clock-4"></i>
                            <span class="item-name">Version 2</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="dashboard.v3.html">
                            <i class="nav-icon i-Over-Time"></i>
                            <span class="item-name">Version 3</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="dashboard.v4.html">
                            <i class="nav-icon i-Clock"></i>
                            <span class="item-name">Version 4</span>
                        </a>
                    </li>
                </ul>
                <ul class="childNav" data-parent="forms">
                    <li class="nav-item">
                        <a href="form.basic.html">
                            <i class="nav-icon i-File-Clipboard-Text--Image"></i>
                            <span class="item-name">Basic Elements</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="form.layouts.html">
                            <i class="nav-icon i-Split-Vertical"></i>
                            <span class="item-name">Form Layouts</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="form.input.group.html">
                            <i class="nav-icon i-Receipt-4"></i>
                            <span class="item-name">Input Groups</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="form.validation.html">
                            <i class="nav-icon i-Close-Window"></i>
                            <span class="item-name">Form Validation</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="smart.wizard.html">
                            <i class="nav-icon i-Width-Window"></i>
                            <span class="item-name">Smart Wizard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="tag.input.html">
                            <i class="nav-icon i-Tag-2"></i>
                            <span class="item-name">Tag Input</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="editor.html">
                            <i class="nav-icon i-Pen-2"></i>
                            <span class="item-name">Rich Editor</span>
                        </a>
                    </li>
                </ul>
                <ul class="childNav" data-parent="apps">
                    <li class="nav-item">
                        <a href="invoice.html">
                            <i class="nav-icon i-Add-File"></i>
                            <span class="item-name">Invoice</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="inbox.html">
                            <i class="nav-icon i-Email"></i>
                            <span class="item-name">Inbox</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="chat.html">
                            <i class="nav-icon i-Speach-Bubble-3"></i>
                            <span class="item-name">Chat</span>
                        </a>
                    </li>
                </ul>

                <ul class="childNav" data-parent="widgets">
                    <li class="nav-item">
                        <a class="" href="widget-card.html">
                            <i class="nav-icon i-Receipt-4"></i>
                            <span class="item-name">widget card</span>
                        </a>
                    </li>
                    <li class="nav-item">
        
        
                        <a class=""
                            href="widgets-statistics.html">
                            <i class="nav-icon i-Receipt-4"></i>
                            <span class="item-name">widget statistics</span>
                        </a>
                    </li>
        
                    <li class="nav-item">
        
        
                        <a class="" href="widget-list.html">
                            <i class="nav-icon i-Receipt-4"></i>
                            <span class="item-name">Widget List <span class="ml-2 badge badge-pill badge-danger">
                                    New</span></span>
                        </a>
                    </li>
        
                    <li class="nav-item">
        
        
                        <a class="" href="widget-app.html">
                            <i class="nav-icon i-Receipt-4"></i>
                            <span class="item-name">Widget App <span class="ml-2 badge badge-pill badge-danger"> New</span>
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
        
        
                        <a class=""
                            href="weather-card.html">
                            <i class="nav-icon i-Receipt-4"></i>
                            <span class="item-name"> Weather App <span class="ml-2 badge badge-pill badge-danger"> New</span>
                            </span>
                        </a>
                    </li>
        
                </ul>


                <!-- chartjs -->
                <ul class="childNav" data-parent="charts">
                    <li class="nav-item">
                        <a class="" href="charts.echarts.html">
                            <i class="nav-icon i-File-Clipboard-Text--Image"></i>
                            <span class="item-name">echarts</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="" href="charts.chartsjs.html">
                            <i class="nav-icon i-File-Clipboard-Text--Image"></i>
                            <span class="item-name">ChartJs</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown-sidemenu">
                        <a class="" href="">
                            <i class="nav-icon i-File-Clipboard-Text--Image"></i>
                            <span class="item-name">Apex Charts</span>
                            <i class="dd-arrow i-Arrow-Down"></i>
                        </a>
                        <ul class="submenu">
                            <li><a class=""
                                    href="charts.apexAreaCharts.html">Area Charts</a></li>
                            <li><a class=""
                                    href="charts.apexBarCharts.html">Bar Charts</a></li>
                            <li><a class=""
                                    href="charts.apexBubbleCharts.html">Bubble Charts</a></li>
                            <li><a class=""
                                    href="charts.apexColumnCharts.html">Column Charts</a></li>
                            <li><a class=""
                                    href="charts.apexCandleStickCharts.html">CandleStick Charts</a></li>
                            <li><a class=""
                                    href="charts.apexLineCharts.html">Line Charts</a></li>
                            <li><a class=""
                                    href="charts.apexMixCharts.html">Mix Charts</a></li>
                            <li><a class=""
                                    href="charts.apexPieDonutCharts.html">PieDonut Charts</a></li>
                            <li><a class=""
                                    href="charts.apexRadarCharts.html">Radar Charts</a></li>
                            <li><a class=""
                                    href="charts.apexRadialBarCharts.html">RadialBar Charts</a></li>
                            <li><a class=""
                                    href="charts.apexScatterCharts.html">Scatter Charts</a></li>
                            <li><a class=""
                                    href="charts.apexSparklineCharts.html">Sparkline Charts</a></li>
        
                        </ul>
                    </li>
        
        
        
        
        
                </ul>


                <ul class="childNav" data-parent="extrakits">
                    <li class="nav-item">
                        <a href="image.cropper.html">
                            <i class="nav-icon i-Crop-2"></i>
                            <span class="item-name">Image Cropper</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="loaders.html">
                            <i class="nav-icon i-Loading-3"></i>
                            <span class="item-name">Loaders</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="ladda.button.html">
                            <i class="nav-icon i-Loading-2"></i>
                            <span class="item-name">Ladda Buttons</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="toastr.html">
                            <i class="nav-icon i-Bell"></i>
                            <span class="item-name">Toastr</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="sweet.alerts.html">
                            <i class="nav-icon i-Approved-Window"></i>
                            <span class="item-name">Sweet Alerts</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="tour.html">
                            <i class="nav-icon i-Plane"></i>
                            <span class="item-name">User Tour</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="upload.html">
                            <i class="nav-icon i-Data-Upload"></i>
                            <span class="item-name">Upload</span>
                        </a>
                    </li>
                </ul>
                <ul class="childNav" data-parent="uikits">
                    <li class="nav-item">
                        <a href="alerts.html">
                            <i class="nav-icon i-Bell1"></i>
                            <span class="item-name">Alerts</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown-sidemenu">
                        <a href="accordion.html">
                            <i class="nav-icon i-Split-Horizontal-2-Window"></i>
                            <span class="item-name">Accordion</span>
                            <i class="dd-arrow i-Arrow-Down"></i>
                        </a>
                        <ul class="submenu">
                            <li><a href="">Sub menu item 1</a></li>
                            <li><a href="">Sub menu item 1</a></li>
                            <li><a href="">Sub menu item 1</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown-sidemenu">
                        <a href="badges.html">
                            <i class="nav-icon i-Medal-2"></i>
                            <span class="item-name">Badges</span>
                            <i class="dd-arrow i-Arrow-Down"></i>
                        </a>
                        <ul class="submenu">
                            <li><a href="">Sub menu item 1</a></li>
                            <li><a href="">Sub menu item 1</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="buttons.html">
                            <i class="nav-icon i-Cursor-Click"></i>
                            <span class="item-name">Buttons</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="cards.html">
                            <i class="nav-icon i-Line-Chart-2"></i>
                            <span class="item-name">Cards</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="card.metrics.html">
                            <i class="nav-icon i-ID-Card"></i>
                            <span class="item-name">Card Metrics</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="carousel.html">
                            <i class="nav-icon i-Video-Photographer"></i>
                            <span class="item-name">Carousels</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="lists.html">
                            <i class="nav-icon i-Belt-3"></i>
                            <span class="item-name">Lists</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pagination.html">
                            <i class="nav-icon i-Arrow-Next"></i>
                            <span class="item-name">Paginations</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="popover.html">
                            <i class="nav-icon i-Speach-Bubble-2"></i>
                            <span class="item-name">Popover</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="progressbar.html">
                            <i class="nav-icon i-Loading"></i>
                            <span class="item-name">Progressbar</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="tables.html">
                            <i class="nav-icon i-File-Horizontal-Text"></i>
                            <span class="item-name">Tables</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="tabs.html">
                            <i class="nav-icon i-New-Tab"></i>
                            <span class="item-name">Tabs</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="tooltip.html">
                            <i class="nav-icon i-Speach-Bubble-8"></i>
                            <span class="item-name">Tooltip</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="modals.html">
                            <i class="nav-icon i-Duplicate-Window"></i>
                            <span class="item-name">Modals</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="nouislider.html">
                            <i class="nav-icon i-Width-Window"></i>
                            <span class="item-name">Sliders</span>
                        </a>
                    </li>
                </ul>
                <ul class="childNav" data-parent="sessions">
                    <li class="nav-item">
                        <a href="signin.html">
                            <i class="nav-icon i-Checked-User"></i>
                            <span class="item-name">Sign in</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="signup.html">
                            <i class="nav-icon i-Add-User"></i>
                            <span class="item-name">Sign up</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="forgot.html">
                            <i class="nav-icon i-Find-User"></i>
                            <span class="item-name">Forgot</span>
                        </a>
                    </li>
                </ul>
                <ul class="childNav" data-parent="others">
                    <li class="nav-item">
                        <a href="not.found.html">
                            <i class="nav-icon i-Error-404-Window"></i>
                            <span class="item-name">Not Found</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="user.profile.html">
                            <i class="nav-icon i-Male"></i>
                            <span class="item-name">User Profile</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="blank.html" class="open">
                            <i class="nav-icon i-File-Horizontal"></i>
                            <span class="item-name">Blank Page</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="sidebar-overlay"></div>
        </div>
@endsection
@section('content')
<div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="breadcrumb">
                <h1 class="mr-2">Version 1</h1>
                <ul>
                    <li><a href="">Dashboard</a></li>
                    <li>Version 1</li>
                </ul>
            </div>

            <div class="separator-breadcrumb border-top"></div>

            <div class="row">
                <!-- ICON BG -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <div class="card-body text-center">
                            <i class="i-Add-User"></i>
                            <div class="content">
                                <p class="text-muted mt-2 mb-0">New Leads</p>
                                <p class="text-primary text-24 line-height-1 mb-2">205</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <div class="card-body text-center">
                            <i class="i-Financial"></i>
                            <div class="content">
                                <p class="text-muted mt-2 mb-0">Sales</p>
                                <p class="text-primary text-24 line-height-1 mb-2">$4021</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <div class="card-body text-center">
                            <i class="i-Checkout-Basket"></i>
                            <div class="content">
                                <p class="text-muted mt-2 mb-0">Orders</p>
                                <p class="text-primary text-24 line-height-1 mb-2">80</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <div class="card-body text-center">
                            <i class="i-Money-2"></i>
                            <div class="content">
                                <p class="text-muted mt-2 mb-0">Expense</p>
                                <p class="text-primary text-24 line-height-1 mb-2">$1200</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            

            <!-- Footer Start -->
            @include('layouts.footer')
            <!-- fotter end -->
        </div>
@endsection