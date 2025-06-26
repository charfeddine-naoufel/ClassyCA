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



                            <ul class="nav nav-tabs" id="myIconTab" role="tablist">
                                @foreach ($chapitres as $chapitre)
                                    <li class="nav-item">
                                        <a class="nav-link {{ $loop->iteration == 1 ? 'active' : '' }} "
                                            id="home-icon-tab{{ $loop->iteration }} " data-toggle="tab"
                                            href="#homeIcon{{ $loop->iteration }}" role="tab"
                                            aria-controls="homeIcon{{ $loop->iteration }}" aria-selected="true"><i
                                                class="nav-icon i-Folder-Zip mr-1"></i>{{ $chapitre->titre }}</a>
                                    </li>
                                @endforeach
                                <li class="nav-item">
                                    <a class="nav-link t-font-boldest" id="contact-icon-tab" data-toggle="tab" href="#contactIcon" role="tab" aria-controls="contactIcon" aria-selected="false"><i class="nav-icon i-Home1 mr-1"></i> Documents</a>
                                </li>
                            </ul>

                            <div class="tab-content" id="myIconTabContent"
                                style="border-left: 1px solid #993366;border-right: 1px solid #993366;border-bottom: 1px solid #993366;border-top: 1px solid #993366;">
                                @foreach ($chapitres as $chapitre)
                                    <div class="tab-pane fade {{ $loop->iteration == 1 ? 'active show' : '' }}"
                                        id="homeIcon{{ $loop->iteration }}" role="tabpanel"
                                        aria-labelledby="home-icon-tab{{ $loop->iteration }}">
                                        <div class="row">
                                            <!-- begin::main column -->
                                            <div class="col-lg-12">
                                                <div class="row">
                                                    <!-- begin::basic example -->
                                                    <div class="col-lg-12 mb-3">
                                                        <div class="card">
                                                            <div class="card-header bg-transparent">
                                                                <h3 class="card-title"> Séances</h3>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-lg-10">
                                                                        <div
                                                                            style="height:70vh;"class="section   embed-responsive embed-responsive-21by9 ">
                                                                            {{-- <video  autoplay>
                                                                            <source src="https://www.youtube.com/watch?v=jpnCos8Ff_o" >
                                                                          Your browser does not support the video tag.
                                                                          </video> --}}
                                                                            {{-- <iframe src="https://player.vimeo.com/video/137857207" class="" name="player" title="Vimeo video" allowfullscreen="" ></iframe> --}}
                                                                            {{-- <video class="embed-responsive-item"name="player" id="player" controls controlslist="nodownload">
                                                                              <source id="playersrc" src="https://player.vimeo.com/external/325698769.sd.mp4?s=4e70164190f4b472059c9f4ca74ca0ca58056ce4&profile_id=165" type="video/mp4">
                                                                              Your browser does not support the video tag.
                                                                            </video> --}}

                                                                            <iframe id="player{{ $chapitre->id }}"
                                                                                data-id="player{{ $chapitre->id }}"
                                                                                width="560" height="315"
                                                                                class="youtube-player"
                                                                                src="https://player.vimeo.com/external/325698769.sd.mp4?s=4e70164190f4b472059c9f4ca74ca0ca58056ce4&profile_id=165"
                                                                                frameborder="0"
                                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                                                allowfullscreen></iframe>


                                                                        </div>

                                                                    </div>
                                                                    <div class="col-lg-2">
                                                                        <div class="ul-product-detail__brand-name mb-4">
                                                                            <h5 class="heading">Séances :</h5>

                                                                        </div>




                                                                        <div class="ul-product-detail__features mt-3">
                                                                            <ul class="m-0 p-0">
                                                                                @foreach ($chapitre->seances as $seance)
                                                                                    <li>
                                                                                        <i
                                                                                            class="i-Right1 text-primary text-15 align-middle font-weight-700">
                                                                                        </i>
                                                                                        <a href="#"
                                                                                            data-target="player{{ $chapitre->id }}"
                                                                                            data-url="{{ $seance->url }}"
                                                                                            class="accessvideo"><span
                                                                                                class="align-middle">{{ $seance->titre }}</span></a>
                                                                                    </li>
                                                                                @endforeach

                                                                            </ul>
                                                                        </div>


                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>
                                                    <!-- end::basic example -->

                                                    <!-- begin::documents -->
                                                    {{-- <div class="col-lg-3 mb-3">
                                                        <!-- navigation -->
                                                    <div class="card  mb-3">
                                                    <div class="card-header font-weight-bold dropdown-toggle" onClick="customToggle3()">Documents</div>
                                                    <div class="card-body" id="custom-toggle3">


                                                        <div class="list-group">
                                                            <a href="#" class="list-group-item list-group-item-action active">
                                                                <span class="custom-font"><i class="i-Add-Window">  </i></span>Télécharger Document
                                                            </a>
                                                            <a href="#" class="list-group-item list-group-item-action "><i class="i-Download-from-Cloud"> </i> Document 1</a>
                                                            <a href="#" class="list-group-item list-group-item-action"><i class="i-Download-from-Cloud"> </i> Document 2</a>
                                                            <a href="#" class="list-group-item list-group-item-action"><i class="i-Download-from-Cloud"> </i> Document 3</a>
                                                            <a href="#" class="list-group-item list-group-item-action disabled"><i class="i-Download-from-Cloud"> </i> Document 4 </a>
                                                        </div>
                                                        <div class="mb-4"></div>
                                                        
                                                    </div>
                                                </div>
                                                <!-- end of navigation -->
                                                </div> --}}
                                                    <!-- end::documents -->
                                                </div>
                                                <!-- end of row -->


                                            </div>
                                            <!-- end::main-column -->
                                        </div>
                                    </div>
                                @endforeach
                                <div class="tab-pane fade" id="contactIcon" role="tabpanel" aria-labelledby="contact-icon-tab" >
                                  <div class="row">
                                      @foreach ( $chapitres as $chapitre )
                                          
                                     
                                    <div class="col-md-3">

                                        <div class="card mb-4">
                                            <div class="card-header teal-600 text-purple-600">
                                                 {{ $chapitre->titre }}
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title">Téléchargement</h5>
                                                
                                                <ul class="list-group list-group-flush">
                                                    @foreach ( $chapitre->supports as $document )
                                                    <li class="list-group-item"><a href="{{$document->chemin}}" target="_blank"><i class="text-20 i-Download"></i> {{$document->nom}}</a> </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>     
                                    </div>
                                     @endforeach
                                  </div>
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
                $('iframe').each(function(index){
                    $(this).attr('src',$(this).attr('src'));
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
