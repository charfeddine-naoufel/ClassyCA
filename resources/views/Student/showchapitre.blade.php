@extends('layouts.app')
@section('title', 'Dashboard Elève')
@section('mega-menu')
    <div class="dropdown mega-menu d-none d-md-block">
        <a href="#" class="btn text-muted dropdown-toggle mr-3" id="dropdownMegaMenuButton" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">Mega Menu</a>
        
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

                                <li class="nav-item ">
                                    <a class="nav-link active " id="cours-pill" data-toggle="pill" href="#cours"
                                        role="tab">
                                        <i class="nav-icon i-Book mr-1"></i>
                                        Cours
                                    </a>
                                </li>

                                <li class="nav-item ">
                                    <a class="nav-link" id="video-pill" data-toggle="pill" href="#video" role="tab">
                                        <i class="nav-icon i-Video mr-1"></i>
                                        Vidéos
                                    </a>
                                </li>

                                <li class="nav-item ">
                                    <a class="nav-link" id="serie-pill" data-toggle="pill" href="#serie" role="tab">
                                        <i class="nav-icon i-File-Clipboard-File--Text mr-1"></i>
                                        Série corrigée
                                    </a>
                                </li>

                                <li class="nav-item ">
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
                                    
                                    <div class="col-md-3 col-lg-3">
                                        <div class="card mb-2 ">
                                            <div class="card-body">
                                                <div class="ul-widget__row">
                                                    
                                                    <div class="ul-widget-stat__font">
                                                        <a href="{{ $support->chemin }}"
                                                            target="_blank"
                                                            class="btn ">
                                                        <i class="i-Download text-primary "></i>
                                                        </a>
                                                    </div>
                                                    <div class="ul-widget__content">
                                                        <p class=" m-0">
                                                            Cours:
                                                        </p>
                                                        <h4 class="heading">{{ $support->nom }}</h4>
                                                    </div>
                                                </div>
                                            </div>
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

                                                @foreach ($videos as $seance)
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
                                    <div class="col-md-3 col-lg-3">
                                        <div class="card mb-2 ">
                                            <div class="card-body">
                                                <div class="ul-widget__row">
                                                    
                                                    <div class="ul-widget-stat__font">
                                                        <a href="{{ $support->chemin }}"
                                                            target="_blank"
                                                            class="btn ">
                                                        <i class="i-Folder-Download text-primary "></i>
                                                        </a>
                                                    </div>
                                                    <div class="ul-widget__content">
                                                        <p class=" m-0">
                                                            Série:
                                                        </p>
                                                        <h4 class="heading">{{ $support->nom }}</h4>
                                                    </div>
                                                </div>
                                            </div>
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
                                
                                    <div class="col-md-3 col-lg-3">
                                        <div class="card mb-2 ">
                                            <div class="card-body">
                                                <div class="ul-widget__row">
                                                    
                                                    <div class="ul-widget-stat__font">
                                                        <a href="{{ $support->chemin }}"
                                                            target="_blank"
                                                            class="btn ">
                                                        <i class="i-Folder-Download text-primary "></i>
                                                        </a>
                                                    </div>
                                                    <div class="ul-widget__content">
                                                        <p class=" m-0">
                                                            Document:
                                                        </p>
                                                        <h4 class="heading">{{ $support->nom }}</h4>
                                                    </div>
                                                </div>
                                            </div>
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
    {{-- <script src="{{ asset('assets/js/vendor/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/bootstrap.bundle.min.js') }}"></script> --}}
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
