@extends('layouts.app')
@section('title','Accueil Student')
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

@section('content')
<div class="main-content-wrap sidenav-open d-flex flex-column">
    <div class="breadcrumb">
        <h1>Calendar</h1>
        <ul>
            <li><a href="">Apps</a></li>
            <li>Calendar</li>
        </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>

    <div class="row">

        <div class="col-md-3">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="create_event_wrap">
                        <form class="js-form-add-event">
                            <div class="form-group">
                                <label for="newEvent"> Create new Event</label>
                                <input type="text" name="newEvent" id="newEvent" class="form-control" placeholder="new Event" aria-describedby="helpId">

                            </div>


                        </form>


                        <ul class="list-group" id="external-events">
                            <li class="list-group-item bg-success fc-event">
                                Hello World

                            </li>
                            <li class="list-group-item bg-primary fc-event">

                                Go to Shopping
                            </li>
                            <li class="list-group-item bg-warning fc-event">

                                Payment schedule
                            </li>
                            <li class="list-group-item bg-danger fc-event">

                                Rent Due
                            </li>
                        </ul>
                        <p>
                            <input type='checkbox' id='drop-remove' />
                            <label for='drop-remove'>remove after drop</label>
                        </p>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card mb-4 o-hidden">
                <div class="card-body">
                    <div id="calendar"></div>


                </div>
            </div>
        </div>

    </div>

    <!-- Footer Start -->
    @include('layouts.footer')
    <!-- fotter end -->
</div>

@endsection
@section('scripts')
<script src="{{asset('assets/js/vendor/calendar/jquery-ui.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/calendar/moment.min.js')}}"></script>

    <script src="{{asset('assets/js/vendor/calendar/fullcalendar.min.js')}}"></script>
    <script src="{{asset('assets/js/calendar.script.js')}}"></script>

@endsection