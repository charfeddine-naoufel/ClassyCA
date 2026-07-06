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
                <li>Chapitres du cours</li>
            </ul>
        </div>
        <div class="separator-breadcrumb border-top"></div>

        <section class="widget-card">
            <div class="row">


                <div class="col-md-12 mb-4">
                    <div class="card text-left">

                        <div class="card-body">
                            <h4 class="card-title mb-3 text-center"><span class="heading text-primary">Chapitres du cours :
                                </span> {{ $course->matiere->nom_matiere }} <i
                                    class="text-20 text-warning i-Reverbnation"></i> <span class="heading text-secondary">
                                    Classe : </span> {{ $course->classe->slug }}<i
                                    class="text-20 text-warning i-Reverbnation"></i><span class="heading text-info"> Prof :
                                </span> {{ $course->teacher->nom_fr }} </h4>

                            <div class="row mt-4 ">
                                @php
                                $colors = [
                                    'primary',
                                    'success',
                                    'danger',
                                    'warning',
                                    'info',
                                    'secondary',
                                    'dark'
                                ];
                            @endphp
                            
                            @foreach ($chapitres as $chapitre)
                            
                                @php
                                    $color = $colors[$loop->index % count($colors)];
                                @endphp
                            
                                <div class="col-lg-4 mb-3">
                                    <div class="card card-body ul-border__bottom">
                            
                                        <div class="text-center">
                            
                                            <h5 class="heading text-{{ $color }}">
                                                Chapitre : {{ $chapitre->titre }}
                                            </h5>
                            
                                            <p class="mb-3 text-muted">
                                                Description : {{ $chapitre->description ?? '-' }}
                                            </p>
                            
                                            <a class="btn btn-outline-{{ $color }}"
                                               href="{{ route('student.chapitre.show', ['cours' => $course->id, 'chapitre' => $chapitre->id]) }}">
                                                Consulter
                                            </a>
                            
                                        </div>
                            
                                    </div>
                                </div>
                            
                            @endforeach
                                
                            </div>



                        </div>
                        <!-- end::documents -->
                    </div>
                    <!-- end of row -->


                </div>
                <!-- end::main-column -->
            </div>
    </div>


    </div>
    </div>



    </div>
    </section>

    <!-- Footer Start -->
    @include('layouts.footer')
    <!-- fotter end -->
    </div>

@endsection
@section('scripts')

    <script>
        $(document).ready(function() {
            $('.accessvideo').on('click', function(e) {
                e.preventDefault();
                $('iframe').each(function(index) {
                    $(this).attr('src', $(this).attr('src'));
                    return false;
                })
                var targetId = $(this).attr('data-target');
                var videoUrl = $(this).attr("data-url");
                var videoId = getYouTubeVideoId(videoUrl); // Fonction pour extraire l'ID de la vidéo

                if (videoId) {
                    $("#" + targetId).attr("src", "https://www.youtube.com/embed/" + videoId +
                        "?autoplay=0");
                }

            });
        });

        // Fonction pour extraire l'ID de la vidéo YouTube depuis l'URL
        function getYouTubeVideoId(url) {
            var match = url.match(
                /(?:https?:\/\/)?(?:www\.)?youtube\.com\/(?:v\/|embed\/|watch\?v=|watch\?.*?v=|.+\/.+\/|.+\/)\/?([^\?&""">]+)/
            );
            return match ? match[1] : null;
        }
    </script>
    <script src="{{ asset('assets/js/vendor/calendar/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/calendar/moment.min.js') }}"></script>

    <script src="{{ asset('assets/js/vendor/calendar/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('assets/js/calendar.script.js') }}"></script>

@endsection
