@extends('layouts.app')
@section('title', 'Accueil Student')
@section('mega-menu')
    <div class="dropdown mega-menu d-none d-md-block">
        <a href="#" class="btn text-muted dropdown-toggle mr-3" id="dropdownMegaMenuButton" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">Mega Menu</a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <div class="row m-0">
                <div class="col-md-4 p-4 text-left bg-img">
                    <h2 class="title">Mega Menu <br> Sidebar</h2>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Asperiores natus laboriosam fugit,
                        consequatur.
                    </p>
                    <p class="mb-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Exercitationem odio amet eos
                        dolore suscipit placeat.</p>
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

@section('content')
    <div class="main-content-wrap sidenav-open d-flex flex-column">
        <div class="breadcrumb">
            <h1>Mes Cours</h1>
            <ul>
                <li><a href="">Apps</a></li>
                <li>Mes Cours</li>
            </ul>
        </div>
        <div class="separator-breadcrumb border-top"></div>

        <section class="widget-card">
            <div class="row">

                @foreach ($courses as $course)
                    
                
                <div class="col-lg-4 col-xl-3 mt-3 ">
                    <div class="card "
                        style="border-top-right-radius: 40px;border-bottom-left-radius:40px;box-shadow: 10px 10px 29px -6px rgba(0,0,0,0.75);border-bottom:3px solid #3f51b5;">
                        <div class="card-body">
                            <div class="user-profile mb-4">
                                <div class="ul-widget-card__user-info">
                                    <div class="ul-weather-card__icon-center text-center ">
                                        <i class="i-Folders display-4 text-primary t-font-boldest"></i>
                                    </div>
                                    <p class="m-0 text-24">{{$course->matiere->nom_matiere}}</p>
                                    <p class="text-muted m-0">{{$course->teacher->nom_fr}}</p>
                                    <p><em>Classe: {{$course->classe->slug}}</em></p>
                                </div>
                            </div>
                            <div class="ul-widget-card--line mt-2 border-bottom border-dark">
                                <a href="{{route('student.chapitrescours', $course->id)}} "  class="btn btn-primary btn-block m-1">Consulter</a>
                                {{-- <a href="{{route('student.chapitrescours')}} " class="btn btn-primary ul-btn-raised--v2  m-1">Consulter</a>
                                <button type="button" class="btn btn-outline-success ul-btn-raised--v2 m-1 float-right">Preview</button> --}}
                            </div>
                            <div class="ul-widget-card__rate-icon">
                                <span>
                                    <i class="i-Add-UserStar text-warning"></i>
                                    20
                                </span>
                                <span>
                                    <i class="i-Bag text-primary"></i>
                                    {{count($course->chapitres)}} Chapitres
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                
                @endforeach
                



            </div>
        </section>

        <!-- Footer Start -->
        @include('layouts.footer')
        <!-- fotter end -->
    </div>

@endsection
@section('scripts')
    <script src="{{ asset('assets/js/vendor/calendar/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/calendar/moment.min.js') }}"></script>

    <script src="{{ asset('assets/js/vendor/calendar/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('assets/js/calendar.script.js') }}"></script>

@endsection
