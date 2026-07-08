@extends('layouts.app')

@section('title','Porte Monnaie')

@section('content')

<div class="main-content-wrap sidenav-open d-flex flex-column">

    <div class="breadcrumb">

        <h1>Porte Monnaie</h1>

    </div>

    <div class="separator-breadcrumb border-top"></div>

    {{-- Moyens de paiement --}}
    <div class="row">

        {{-- D17 --}}
        <div class="col-lg-4">

            <div class="card mb-4 o-hidden shadow">

                <img class="card-img-top"
                     src="{{ asset('assets/images/d17.jpg') }}"
                     style="height:180px;object-fit:cover;">

                <div class="card-body">

                    <h5 class="card-title text-primary">

                        Paiement D17

                    </h5>

                    <p>

                        Payez directement avec votre portefeuille électronique D17.

                    </p>

                </div>

                <div class="card-body">

                    <button class="btn btn-primary btn-block">

                        Payer avec D17

                    </button>

                </div>

            </div>

        </div>

        {{-- Banque --}}
        <div class="col-lg-4">

            <div class="card mb-4 o-hidden shadow">

                <img class="card-img-top"
                     src="{{ asset('assets/images/bank.png') }}"
                     style="height:180px;object-fit:cover;">

                <div class="card-body">

                    <h5 class="card-title text-success">

                        Virement bancaire

                    </h5>

                    <p>

                        Effectuez un virement sur notre compte bancaire.

                    </p>

                </div>

                <ul class="list-group list-group-flush">

                    <li class="list-group-item">

                        Banque : BIAT

                    </li>

                    <li class="list-group-item">

                        RIB : XX XXX XXX XXX XXX

                    </li>

                </ul>

            </div>

        </div>

        {{-- Espèces --}}
        <div class="col-lg-4">

            <div class="card mb-4 o-hidden shadow">

                <img class="card-img-top"
                     src="{{ asset('assets/images/cash.jpg') }}"
                     style="height:180px;object-fit:cover;">

                <div class="card-body">

                    <h5 class="card-title text-warning">

                        Paiement en espèces

                    </h5>

                    <p>

                        Le paiement peut être effectué directement à l'école.

                    </p>

                </div>

                <div class="card-body">

                    <button class="btn btn-warning btn-block">

                        Plus d'informations

                    </button>

                </div>

            </div>

        </div>

    </div>

    {{-- Historique --}}
    <div class="card mt-4 shadow">

        <div class="card-header">

            <h4>

                Historique des paiements

            </h4>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover">

                    <thead class="thead-light">

                        <tr>

                            <th>#</th>

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

                                <td>{{ $loop->iteration }}</td>

                                <td>{{ $payment->date_pay }}</td>

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

                                <td colspan="6" class="text-center">

                                    Aucun paiement enregistré.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection