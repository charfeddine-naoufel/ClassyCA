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
            
            'primary',
            'warning',
            'success',
            'danger',
            'info',
            'secondary'
        ];

    @endphp

    <div class="row">

        @forelse($offres as $offre)

            @php
                $color = $colors[$loop->index % count($colors)];
            @endphp
            {{-- card --}}
            <div class="col-lg-4  mt-3">
                <div class="card text-center shadow h-100">
                    <img class="d-block w-100 rounded rounded" src="{{ asset("assets/images/packs/{$offre->nom_off}.jpg") }}" alt="First slide">
                    <div class="card-body">
                        <h5 class="card-title mb-2">{!! nl2br(e($offre->descr_off)) !!}</h5>
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
                        <button class="btn btn-{{ $color }} btn-block btn-rounded">

                            Choisir cette offre

                        </button>

                    </div>
                </div>
            </div>
            {{-- card --}}
            

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