@extends('layouts.app')

@section('title','Nos Offres')

@section('content')

<div class="main-content-wrap sidenav-open d-flex flex-column">

    <div class="breadcrumb">
        <h1>Nos Offres</h1>
    </div>

    <div class="separator-breadcrumb border-top"></div>

    <div class="row">

        <!-- Offre Bronze -->
        <div class="col-lg-4">

            <div class="card text-center shadow mb-4">

                <div class="card-header bg-secondary text-white">
                    <h3 class="text-white">Seme7</h3>
                </div>

                <div class="card-body">

                    <h1 class="display-4">
                        20 DT
                    </h1>

                    <p>/ mois</p>

                    <hr>

                    <p>✔ Accès aux cours</p>
                    <p>✔ Documents PDF</p>
                    <p>✖ Vidéos HD</p>
                    <p>✖ Séries corrigées</p>

                    <button class="btn btn-secondary btn-block">
                        Choisir
                    </button>

                </div>

            </div>

        </div>

        <!-- Offre Silver -->
        <div class="col-lg-4">

            <div class="card text-center shadow-lg border-primary mb-4">

                <div class="card-header bg-primary text-white">
                    <h3 class="text-white">Seme7 Pro</h3>
                </div>

                <div class="card-body">

                    <h1 class="display-4">
                        35 DT
                    </h1>

                    <p>/ mois</p>

                    <hr>

                    <p>✔ Accès aux cours</p>
                    <p>✔ Vidéos HD</p>
                    <p>✔ Documents PDF</p>
                    <p>✔ Séries corrigées</p>

                    <button class="btn btn-primary btn-block">
                        Choisir
                    </button>

                </div>

            </div>

        </div>

        <!-- Offre Gold -->
        <div class="col-lg-4">

            <div class="card text-center shadow mb-4">

                <div class="card-header bg-warning text-white">
                    <h3 class="text-white">Seme7 Pro Max</h3>
                </div>

                <div class="card-body">

                    <h1 class="display-4">
                        50 DT
                    </h1>

                    <p>/ mois</p>

                    <hr>

                    <p>✔ Tous les cours</p>
                    <p>✔ Toutes les vidéos</p>
                    <p>✔ Tous les documents</p>
                    <p>✔ Assistance prioritaire</p>

                    <button class="btn btn-warning btn-block">
                        Choisir
                    </button>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection