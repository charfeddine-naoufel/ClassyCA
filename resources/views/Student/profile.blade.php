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
            <h1>Mes Cours</h1>
            <ul>
                <li><a href="">Apps</a></li>
                <li>Mes Cours</li>
            </ul>
        </div>
        <div class="separator-breadcrumb border-top"></div>

        <section class="ul-contact-detail">
            <div class="row">
                <div class="col-lg-4 col-xl-4">
                    <div class="card">
                        @if ($student->photo)
                            <img class="d-block w-100" src="{{ asset('storage/' . $student->photo) }}" alt="Photo">
                        @else
                            <img class="d-block w-75 m-auto" src="{{ asset('assets/images/faces/face2.png') }}" alt="Photo">
                        @endif
                        <div class="card-body">
                            <div class="ul-contact-detail__info">
                                <div class="row">
                                    <div class="col-6 text-center">
                                        <div class="ul-contact-detail__info-1">
                                            <h5>Nom:</h5>
                                            <span>{{ $student->nom_fr }} </span>
                                        </div>
                                        <div class="ul-contact-detail__info-1">
                                            <h5>Classe:</h5>
                                            <span>{{ $student->classe->slug ?? '-' }}</span>
                                        </div>
                                    </div>
                                    <div class="col-6 text-center">
                                        <div class="ul-contact-detail__info-1">
                                            <h5>Prénom:</h5>
                                            <span>{{ $student->prenom_fr }}</span>
                                        </div>
                                        <div class="ul-contact-detail__info-1">
                                            <h5>Groupe</h5>
                                            <span>{{ $student->group->nomg ?? '-' }}</span>
                                        </div>
                                    </div>
                                    <div class="col-6 text-center">
                                        <div class="ul-contact-detail__info-1">
                                            <h5>Tel:</h5>
                                            <span>{{ $student->tel }}</span>
                                        </div>
                                        <div class="ul-contact-detail__info-1">
                                            <h5>Adresse: </h5>
                                            <span>{{ $student->adresse ?? '-' }}</span>
                                        </div>
                                    </div>
                                    <div class="col-6 text-center">
                                        <div class="ul-contact-detail__info-1">
                                            <h5>Email:</h5>
                                            <span>{{ $student->email }}</span>
                                        </div>
                                        <div class="ul-contact-detail__info-1">
                                            <h5>Ville:</h5>
                                            <span>{{ $student->ville ?? '-' }}</span>
                                        </div>
                                    </div>

                                    <div class="col-12 text-center">

                                        <div class="ul-contact-detail__social">
                                            <div class="ul-contact-detail__social-1">
                                                <button type="button" class="btn btn-facebook btn-icon m-1">
                                                    <span class="ul-btn__icon"><i class="i-Facebook-2"></i></span>
                                                </button>
                                                <span class="t-font-boldest ul-contact-detail__followers">400</span>
                                            </div>
                                            <div class="ul-contact-detail__social-1">
                                                <button type="button" class="btn btn-twitter btn-icon m-1">
                                                    <span class="ul-btn__icon"><i class="i-Twitter"></i></span>

                                                </button>
                                                <span class="t-font-boldest ul-contact-detail__followers">900</span>
                                            </div>
                                            <div class="ul-contact-detail__social-1">
                                                <button type="button" class="btn btn-dribble btn-icon m-1">
                                                    <span class="ul-btn__icon"><i class="i-Dribble"></i></span>

                                                </button>
                                                <span class="t-font-boldest ul-contact-detail__followers">658</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-xl-8">
                    <!-- begin::basic-tab -->
                    <div class="card mb-4 mt-4">
                        <div class="card-header bg-transparent">Mon Profile</div>
                        <div class="card-body">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active show" id="nav-home-tab" data-toggle="tab"
                                        href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Mes paiements</a>
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                                        role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
                                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab"
                                        href="#nav-contact" role="tab" aria-controls="nav-contact"
                                        aria-selected="false">Editer Mes infos</a>
                                </div>
                            </nav>
                            <div class="tab-content ul-tab__content" id="nav-tabContent">
                                <div class="tab-pane fade active show" id="nav-home" role="tabpanel"
                                    aria-labelledby="nav-home-tab">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">

                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Montant</th>
                                                    <th>Mois</th>
                                                    <th>Mode</th>
                                                    <th>Statut</th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                                @forelse($payments as $payment)
                                                    <tr>
                                                        <td>{{ $payment->created_at->format('d/m/Y') }}</td>
                                                        <td>{{ $payment->montant }} DT</td>
                                                        <td>{{ $payment->mois }}</td>
                                                        <td>{{ $payment->mode_paiement }}</td>

                                                        <td>
                                                            <span class="badge badge-success">
                                                                Payé
                                                            </span>
                                                        </td>
                                                    </tr>

                                                @empty

                                                    <tr>
                                                        <td colspan="5" class="text-center">
                                                            Aucun paiement enregistré
                                                        </td>
                                                    </tr>
                                                @endforelse

                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                    aria-labelledby="nav-profile-tab">
                                    <div class="row">

                                        <div class="col-md-6">

                                            <div class="ul-contact-detail__inner-profile">
                                                <h4>Nom</h4>
                                                <span>{{ $student->nom_fr }}</span>
                                            </div>

                                            <div class="ul-contact-detail__inner-profile">
                                                <h4>Prénom</h4>
                                                <span>{{ $student->prenom_fr }}</span>
                                            </div>

                                            <div class="ul-contact-detail__inner-profile">
                                                <h4>Email</h4>
                                                <span>{{ $student->email }}</span>
                                            </div>

                                            <div class="ul-contact-detail__inner-profile">
                                                <h4>Téléphone</h4>
                                                <span>{{ $student->tel }}</span>
                                            </div>

                                        </div>

                                        <div class="col-md-6">

                                            <div class="ul-contact-detail__inner-profile">
                                                <h4>Ville</h4>
                                                <span>{{ $student->ville }}</span>
                                            </div>

                                            <div class="ul-contact-detail__inner-profile">
                                                <h4>Adresse</h4>
                                                <span>{{ $student->adresse ?? '-' }}</span>
                                            </div>

                                            <div class="ul-contact-detail__inner-profile">
                                                <h4>Classe</h4>
                                                <span>{{ $student->classe->slug ?? '-' }}</span>
                                            </div>

                                            <div class="ul-contact-detail__inner-profile">
                                                <h4>Groupe</h4>
                                                <span>{{ $student->group->nomg ?? '-' }}</span>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                    aria-labelledby="nav-contact-tab">
                                    <form method="POST" action="{{ route('student.profile.update') }}"
                                        enctype="multipart/form-data">

                                        @csrf
                                        @method('PUT')

                                        <div class="form-group">
                                            <label>Téléphone</label>
                                            <input type="text" class="form-control" name="tel"
                                                value="{{ $student->tel }}">
                                        </div>

                                        <div class="form-group">
                                            <label>Ville</label>
                                            <input type="text" class="form-control" name="ville"
                                                value="{{ $student->ville }}">
                                        </div>

                                        <div class="form-group">
                                            <label>Adresse</label>
                                            <textarea class="form-control" name="adresse">{{ $student->adresse }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Photo</label>
                                            <input type="file" class="form-control" name="photo">
                                        </div>

                                        <button class="btn btn-primary">
                                            Enregistrer
                                        </button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end::basic-tab -->
                </div>
            </div>
        </section>

        <!-- Footer Start -->
        @include('layouts.footer')
        <!-- fotter end -->
    </div>

@endsection
@section('scripts')


@endsection
