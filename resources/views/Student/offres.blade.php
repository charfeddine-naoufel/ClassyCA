@extends('layouts.app')

@section('title','Nos Offres')

@section('content')

<div class="main-content-wrap sidenav-open d-flex flex-column">

    <div class="breadcrumb">
        <h1>Nos Offres</h1>
    </div>

    <div class="separator-breadcrumb border-top"></div>

    @php

        $colors = [
            'secondary',
            'primary',
            'warning',
            'success',
            'danger',
            'info'
        ];

    @endphp

    <div class="row">

        @forelse($offres as $offre)

            @php
                $color = $colors[$loop->index % count($colors)];
            @endphp

            <div class="col-lg-4 mb-4">

                <div class="card text-center shadow h-100">

                    <div class="card-header bg-{{ $color }}">

                        <h3 class="text-white">

                            {{ $offre->nom_off }}

                        </h3>

                    </div>

                    <div class="card-body">

                        <h5 class="text-muted">

                            Offre {{ $loop->iteration }}

                        </h5>

                        <hr>

                        <p>

                            {!! nl2br(e($offre->descr_off)) !!}

                        </p>

                        <hr>

                        @if($offre->date_deb)

                            <p>

                                <strong>Début :</strong>

                                {{ \Carbon\Carbon::parse($offre->date_deb)->format('d/m/Y') }}

                            </p>

                        @endif

                        @if($offre->date_fin)

                            <p>

                                <strong>Fin :</strong>

                                {{ \Carbon\Carbon::parse($offre->date_fin)->format('d/m/Y') }}

                            </p>

                        @endif

                        <button class="btn btn-{{ $color }} btn-block">

                            Choisir cette offre

                        </button>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12">

                <div class="alert alert-warning">

                    Aucune offre disponible.

                </div>

            </div>

        @endforelse

    </div>

</div>

@endsection