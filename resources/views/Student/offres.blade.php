@extends('layouts.app')

@section('title', 'Nos Offres')

@section('content')
    <div class="main-content-wrap sidenav-open d-flex flex-column">
        <div class="main-content">
            <div class="breadcrumb">
                <h1>Pricing Table</h1>
                <ul>
                    <li><a href="">Pages</a></li>
                    <li>Pricing Table</li>
                </ul>
            </div>

            <div class="separator-breadcrumb border-top"></div>

            <section class="ul-pricing-table">
                <div class="row">
                    <div class="col-lg-12 col-xl-12">



                        <div class="card">
                            <div class="card-header bg-transparent">
                                <h5>Nos Offres</h5>
                            </div>
                            <div class="card-body mb-4">
                                <div class="row">
                                    <div class="col-md-4 mt-3">
                                        <div class="card bg-dark text-white o-hidden mb-4">
                                            <img class="card-img" src="{{asset('assets/images/packs/p1.jpeg')}}" alt="Card image">

                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="card bg-dark text-white o-hidden mb-4">
                                            <img class="card-img" src="{{asset('assets/images/packs/p4.jpeg')}}" alt="Card image">

                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="card bg-dark text-white o-hidden mb-4">
                                            <img class="card-img" src="{{asset('assets/images/packs/p3.jpeg')}}" alt="Card image">

                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="card bg-dark text-white o-hidden mb-4">
                                            <img class="card-img" src="{{asset('assets/images/packs/p2.jpeg')}}" alt="Card image">

                                        </div>
                                    </div>
                                    



                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </section>

            <!-- content goes here -->


        </div>
        <!-- end of main content -->

        
    </div>

@endsection
