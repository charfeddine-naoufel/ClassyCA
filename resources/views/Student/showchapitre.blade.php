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
                {{-- <div class="col-md-4 p-4 text-left">
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
                </div> --}}
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="main-content-wrap sidenav-open d-flex flex-column">
        <div class="breadcrumb">
            <h1>Chapitre</h1>
            <ul>
                {{-- <li><a href="">Apps</a></li> --}}
                <li>Mes Cours</li>
            </ul>
        </div>
        <div class="separator-breadcrumb border-top"></div>

        <section class="widget-card">
            <div class="row">

                <div class="col-md-12">
                    <div class="card text-left">

                        <div class="card-body">

                            <h4 class="heading text-success">{{ $chapitre->titre }}</h4>
                            

                            <ul class="nav nav-pills" id="myPillTab" role="tablist">

                                <li class="nav-item">
                                    <a class="nav-link active" id="cours-pill" data-toggle="pill" href="#cours"
                                        role="tab">
                                        <i class="nav-icon i-Book mr-1"></i>
                                        Cours
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="video-pill" data-toggle="pill" href="#video" role="tab">
                                        <i class="nav-icon i-Video mr-1"></i>
                                        Vidéos
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="serie-pill" data-toggle="pill" href="#serie" role="tab">
                                        <i class="nav-icon i-File-Clipboard-File--Text mr-1"></i>
                                        Série corrigée
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="document-pill" data-toggle="pill" href="#document"
                                        role="tab">
                                        <i class="nav-icon i-File mr-1"></i>
                                        Documents
                                    </a>
                                </li>

                            </ul>

                            <div class="tab-content mt-3" id="myPillTabContent">

                                <!-- Onglet Cours -->
                                <div class="tab-pane fade show active" id="cours">

                                    @forelse($cours as $support)
                                
                                        <div class="card mb-3">
                                
                                            <div class="card-body">
                                
                                                <h5>{{ $support->nom }}</h5>
                                
                                                <a href="{{ $support->chemin }}"
                                                    target="_blank"
                                                    class="btn btn-primary">
                                                     Ouvrir
                                                 </a>
                                
                                            </div>
                                
                                        </div>
                                
                                    @empty
                                
                                        <div class="alert alert-warning">
                                
                                            Aucun cours disponible.
                                
                                        </div>
                                
                                    @endforelse
                                
                                </div>

                                <!-- Onglet Vidéos -->
                                <div class="tab-pane fade" id="video" role="tabpanel">
                                    @php

                                        $premiereSeance = $chapitre->seances->first();

                                        $videoId = null;

                                        if ($premiereSeance) {
                                            preg_match('/(?:v=|youtu\.be\/)([^&]+)/', $premiereSeance->url, $matches);

                                            $videoId = $matches[1] ?? null;
                                        }

                                    @endphp
                                    <div class="row">
                                        <div class="col-lg-9">

                                            <div class="card shadow">

                                                <div class="card-body">

                                                    <iframe id="player" width="100%" height="550"
                                                        src="https://www.youtube.com/embed/{{ $videoId }}"
                                                        frameborder="0" allowfullscreen>
                                                    </iframe>

                                                </div>

                                            </div>

                                        </div>
                                        <div class="col-lg-3">

                                            <div class="list-group">

                                                @foreach ($chapitre->seances as $seance)
                                                    @php

                                                        preg_match('/(?:v=|youtu\.be\/)([^&]+)/', $seance->url, $m);

                                                        $id = $m[1] ?? '';

                                                    @endphp

                                                    <a href="#" class="list-group-item play-video"
                                                        data-video="{{ $id }}">

                                                        <img src="https://img.youtube.com/vi/{{ $id }}/mqdefault.jpg"
                                                            class="img-fluid rounded">

                                                        <h6 class="mt-2">

                                                            {{ $seance->titre }}

                                                        </h6>

                                                    </a>
                                                @endforeach

                                            </div>

                                        </div>
                                    </div>
                                    {{-- <div class="alert alert-info">
                                        Aucune vidéo disponible.
                                    </div> --}}

                                </div>

                                <!-- Onglet Série corrigée -->
                                <div class="tab-pane fade" id="serie">

                                    @forelse($series as $support)
                                
                                        <div class="card mb-3">
                                
                                            <div class="card-body d-flex justify-content-between">
                                
                                                <div>
                                
                                                    <i class="i-File-Clipboard-File--Text text-success"></i>
                                
                                                    {{ $support->nom }}
                                
                                                </div>
                                
                                                <a href="{{ $support->chemin }}"
                                                    target="_blank"
                                                    class="btn btn-primary">
                                                     Ouvrir
                                                 </a>
                                
                                            </div>
                                
                                        </div>
                                
                                    @empty
                                
                                        <div class="alert alert-info">
                                
                                            Aucune série corrigée.
                                
                                        </div>
                                
                                    @endforelse
                                
                                </div>

                                <!-- Onglet Documents -->
                                <div class="tab-pane fade" id="document">

                                    @forelse($documents as $support)
                                
                                        <div class="card mb-3">
                                
                                            <div class="card-body d-flex justify-content-between">
                                
                                                <div>
                                
                                                    <i class="i-File text-primary"></i>
                                
                                                    {{ $support->nom }}
                                
                                                </div>
                                
                                                <a href="{{ $support->chemin }}"
                                                    target="_blank"
                                                    class="btn btn-primary">
                                                     Ouvrir
                                                 </a>
                                
                                            </div>
                                
                                        </div>
                                
                                    @empty
                                
                                        <div class="alert alert-secondary">
                                
                                            Aucun document.
                                
                                        </div>
                                
                                    @endforelse
                                
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
    <script src="{{ asset('assets/js/vendor/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script>
        $(document).ready(function() {

            $(function() {

                $(".play-video").click(function(e) {

                    e.preventDefault();

                    let id = $(this).data("video");

                    $("#player").attr(
                        "src",
                        "https://www.youtube.com/embed/" + id
                    );

                });

            });

        });


        function getYoutubeId(url) {

            const regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?v=)|(&v=))([^#&?]*).*/;

            const match = url.match(regExp);

            return (match && match[8].length == 11) ? match[8] : null;
        }
    </script>




@endsection
