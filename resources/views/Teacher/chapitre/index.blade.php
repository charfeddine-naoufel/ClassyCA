@extends('layouts.appteacher')
@section('title', 'Chapitres')
@section('content')
    <div class="main-content-wrap sidenav-open d-flex flex-column">
        <div class="main-content">
            <div class="breadcrumb">
                <!-- <h1> Lists</h1>
                        <ul>
                            <li><a href="">Apps</a></li>
                            <li>Contacts</li>
                        </ul> -->
            </div>

            <div class="separator-breadcrumb border-top"></div>

            <section class="contact-list">
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div class="card text-left">
                            <div class="card-header text-right bg-transparent">
                                <button type="button" data-toggle="modal" data-target=".modal-add"
                                    class="btn btn-primary btn-md m-1"><i class=" i-Add text-white mr-2"></i> Ajouter Chapitre</button>
                            </div>
                            <!-- begin::modal add -->
                            <div class="ul-card-list__modal">
                                <div class="modal fade  modal-add " tabindex="-1" role="dialog"
                                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <form method="POST" action="" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group row">
                                                        <label for="nom_off" class="col-sm-2 col-form-label">Nom</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="inputName"
                                                                placeholder="Nom" name="nom_off">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="descr_off"
                                                            class="col-sm-2 col-form-label">Description</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="inputName"
                                                                placeholder="Description" name="descr_off">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="montant_off"
                                                            class="col-sm-2 col-form-label">Montant</label>
                                                        <div class="col-sm-10">
                                                            <input type="number" class="form-control" id=""
                                                                placeholder="Montant" name="montant_off">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="date_deb" class="col-sm-2 col-form-label">Date
                                                            Début:</label>
                                                        <div class="col-sm-10">
                                                            <input type="date" class="form-control" id=""
                                                                placeholder="Date début" name="date_deb">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="date_fin" class="col-sm-2 col-form-label">Date
                                                            Fin:</label>
                                                        <div class="col-sm-10">
                                                            <input type="date" class="form-control" id=""
                                                                placeholder="Date début" name="date_fin">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="photo" class="col-sm-2 col-form-label">Photo:</label>
                                                        <div class="col-sm-10">
                                                            <input type="file" class="form-control" id=""
                                                                placeholder="Photo" name="photo">
                                                        </div>
                                                    </div>


                                                    <div class="form-group row">
                                                        <div class="col-sm-10">

                                                            <button type="submit"
                                                                class="btn btn-success">Enregistrer</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end::modal addd-->
                            <!-- begin::modal update-->
                            <div class="ul-card-list__modal">
                                <div class="modal fade " id="modal-update" tabindex="-1" role="dialog"
                                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <form method="POST" action="" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group row">
                                                        <label for="nom_off" class="col-sm-2 col-form-label">Nom</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="inputName"
                                                                placeholder="Nom" name="nom_off">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="descr_off"
                                                            class="col-sm-2 col-form-label">Description</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="inputName"
                                                                placeholder="Description" name="descr_off">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="montant_off"
                                                            class="col-sm-2 col-form-label">Montant</label>
                                                        <div class="col-sm-10">
                                                            <input type="number" class="form-control" id=""
                                                                placeholder="Montant" name="montant_off">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="date_deb" class="col-sm-2 col-form-label">Date
                                                            Début:</label>
                                                        <div class="col-sm-10">
                                                            <input type="date" class="form-control" id=""
                                                                placeholder="Date début" name="date_deb">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="date_fin" class="col-sm-2 col-form-label">Date
                                                            Fin:</label>
                                                        <div class="col-sm-10">
                                                            <input type="date" class="form-control" id=""
                                                                placeholder="Date début" name="date_fin">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="photo"
                                                            class="col-sm-2 col-form-label">Photo:</label>
                                                        <div class="col-sm-10">
                                                            <input type="file" class="form-control" id=""
                                                                placeholder="Photo" name="photo">
                                                        </div>
                                                    </div>


                                                    <div class="form-group row">
                                                        <div class="col-sm-10">

                                                            <button type="submit"
                                                                class="btn btn-success">Modifier</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end::modal update-->
                            {{-- begin tabs --}}
                            <div class="row mb-4">


                                <div class="col-md-12 mb-4">
                                    <div class="card text-left">

                                        <div class="card-body">
                                            <h4 class="card-title mb-3">Chapitres par classe</h4>

                                            <ul class="nav nav-tabs" id="myIconTab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="home-icon-tab" data-toggle="tab"
                                                        href="#homeIcon" role="tab" aria-controls="homeIcon"
                                                        aria-selected="true"><i class="nav-icon i-Home1 mr-1"></i>Home</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="profile-icon-tab" data-toggle="tab"
                                                        href="#profileIcon" role="tab" aria-controls="profileIcon"
                                                        aria-selected="false"><i class="nav-icon i-Home1 mr-1"></i>
                                                        Profile</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="contact-icon-tab" data-toggle="tab"
                                                        href="#contactIcon" role="tab" aria-controls="contactIcon"
                                                        aria-selected="false"><i class="nav-icon i-Home1 mr-1"></i>
                                                        Contact</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content" id="myIconTabContent">
                                                <div class="tab-pane fade show active" id="homeIcon" role="tabpanel"
                                                    aria-labelledby="home-icon-tab">
                                                    <div class="card-body">

                                                        <div class="table-responsive">
                                                            <div class="card-body">
                                                                <h4 class="card-title mb-3"> Nos offres</h4>
                        
                                                                <div class="table-responsive">
                                                                    <table class="table ">
                                                                        <thead class="thead-dark">
                        
                                                                            <tr>
                                                                                <th scope="col">#</th>
                                                                                <th scope="col">Nom offre</th>
                                                                                <th scope="col">Description</th>
                        
                                                                                <th scope="col">Montant</th>
                                                                                <th scope="col">Date Debut</th>
                                                                                <th scope="col">Date Fin</th>
                                                                                <th scope="col">Photo</th>
                                                                                <th scope="col">Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <th scope="row">1</th>
                                                                                <td>Watch</td>
                                                                                <td>
                        
                                                                                    12-10-2019
                        
                                                                                </td>
                                                                                <td>1</td>
                                                                                <td>1</td>
                        
                                                                                <td>$30</td>
                                                                                <td><span class="badge badge-success">Delivered</span></td>
                        
                                                                                <td>
                                                                                    <a href="#" class="text-success mr-2"
                                                                                        data-toggle="modal" data-target="#modal-update">
                                                                                        <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                                                                    </a>
                                                                                    <a href="#" class="text-danger mr-2">
                                                                                        <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                                                                    </a>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">2</th>
                                                                                <td>Iphone</td>
                                                                                <td>
                        
                                                                                    23-10-2019
                        
                                                                                </td>
                                                                                <td>2</td>
                                                                                <td>2</td>
                        
                                                                                <td>$300</td>
                                                                                <td><span class="badge badge-info">Pending</span></td>
                                                                                <td>
                                                                                    <a href="#" class="text-success mr-2"
                                                                                        data-toggle="modal" data-target="#modal-update">
                                                                                        <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                                                                    </a>
                                                                                    <a href="#" class="text-danger mr-2">
                                                                                        <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                                                                    </a>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">3</th>
                                                                                <td>Watch</td>
                                                                                <td>
                        
                                                                                    12-10-2019
                        
                                                                                </td>
                                                                                <td>3</td>
                                                                                <td>3</td>
                        
                                                                                <td>$30</td>
                                                                                <td><span class="badge badge-warning">Not Delivered</span></td>
                        
                                                                                <td>
                                                                                    <a href="#" class="text-success mr-2"
                                                                                        data-toggle="modal" data-target="#modal-update">
                                                                                        <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                                                                    </a>
                                                                                    <a href="#" class="text-danger mr-2">
                                                                                        <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                                                                    </a>
                                                                                </td>
                                                                            </tr>
                        
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                        
                        
                                                            </div>
                                                        </div>
                        
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="profileIcon" role="tabpanel"
                                                    aria-labelledby="profile-icon-tab">
                                                    <div class="card-body">

                                                        <div class="table-responsive">
                                                            <div class="card-body">
                                                                <h4 class="card-title mb-3"> Nos offres</h4>
                        
                                                                <div class="table-responsive">
                                                                    <table class="table ">
                                                                        <thead class="thead-dark">
                        
                                                                            <tr>
                                                                                <th scope="col">#</th>
                                                                                <th scope="col">Nom offre</th>
                                                                                <th scope="col">Description</th>
                        
                                                                                <th scope="col">Montant</th>
                                                                                <th scope="col">Date Debut</th>
                                                                                <th scope="col">Date Fin</th>
                                                                                <th scope="col">Photo</th>
                                                                                <th scope="col">Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <th scope="row">1</th>
                                                                                <td>Watch</td>
                                                                                <td>
                        
                                                                                    12-10-2019
                        
                                                                                </td>
                                                                                <td>1</td>
                                                                                <td>1</td>
                        
                                                                                <td>$30</td>
                                                                                <td><span class="badge badge-success">Delivered</span></td>
                        
                                                                                <td>
                                                                                    <a href="#" class="text-success mr-2"
                                                                                        data-toggle="modal" data-target="#modal-update">
                                                                                        <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                                                                    </a>
                                                                                    <a href="#" class="text-danger mr-2">
                                                                                        <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                                                                    </a>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">2</th>
                                                                                <td>Iphone</td>
                                                                                <td>
                        
                                                                                    23-10-2019
                        
                                                                                </td>
                                                                                <td>2</td>
                                                                                <td>2</td>
                        
                                                                                <td>$300</td>
                                                                                <td><span class="badge badge-info">Pending</span></td>
                                                                                <td>
                                                                                    <a href="#" class="text-success mr-2"
                                                                                        data-toggle="modal" data-target="#modal-update">
                                                                                        <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                                                                    </a>
                                                                                    <a href="#" class="text-danger mr-2">
                                                                                        <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                                                                    </a>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">3</th>
                                                                                <td>Watch</td>
                                                                                <td>
                        
                                                                                    12-10-2019
                        
                                                                                </td>
                                                                                <td>3</td>
                                                                                <td>3</td>
                        
                                                                                <td>$30</td>
                                                                                <td><span class="badge badge-warning">Not Delivered</span></td>
                        
                                                                                <td>
                                                                                    <a href="#" class="text-success mr-2"
                                                                                        data-toggle="modal" data-target="#modal-update">
                                                                                        <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                                                                    </a>
                                                                                    <a href="#" class="text-danger mr-2">
                                                                                        <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                                                                    </a>
                                                                                </td>
                                                                            </tr>
                        
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                        
                        
                                                            </div>
                                                        </div>
                        
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="contactIcon" role="tabpanel"
                                                    aria-labelledby="contact-icon-tab">
                                                    <div class="card-body">

                                                        <div class="table-responsive">
                                                            <div class="card-body">
                                                                <h4 class="card-title mb-3"> Nos offres</h4>
                        
                                                                <div class="table-responsive">
                                                                    <table class="table ">
                                                                        <thead class="thead-dark">
                        
                                                                            <tr>
                                                                                <th scope="col">#</th>
                                                                                <th scope="col">Nom offre</th>
                                                                                <th scope="col">Description</th>
                        
                                                                                <th scope="col">Montant</th>
                                                                                <th scope="col">Date Debut</th>
                                                                                <th scope="col">Date Fin</th>
                                                                                <th scope="col">Photo</th>
                                                                                <th scope="col">Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <th scope="row">1</th>
                                                                                <td>Watch</td>
                                                                                <td>
                        
                                                                                    12-10-2019
                        
                                                                                </td>
                                                                                <td>1</td>
                                                                                <td>1</td>
                        
                                                                                <td>$30</td>
                                                                                <td><span class="badge badge-success">Delivered</span></td>
                        
                                                                                <td>
                                                                                    <a href="#" class="text-success mr-2"
                                                                                        data-toggle="modal" data-target="#modal-update">
                                                                                        <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                                                                    </a>
                                                                                    <a href="#" class="text-danger mr-2">
                                                                                        <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                                                                    </a>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">2</th>
                                                                                <td>Iphone</td>
                                                                                <td>
                        
                                                                                    23-10-2019
                        
                                                                                </td>
                                                                                <td>2</td>
                                                                                <td>2</td>
                        
                                                                                <td>$300</td>
                                                                                <td><span class="badge badge-info">Pending</span></td>
                                                                                <td>
                                                                                    <a href="#" class="text-success mr-2"
                                                                                        data-toggle="modal" data-target="#modal-update">
                                                                                        <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                                                                    </a>
                                                                                    <a href="#" class="text-danger mr-2">
                                                                                        <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                                                                    </a>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">3</th>
                                                                                <td>Watch</td>
                                                                                <td>
                        
                                                                                    12-10-2019
                        
                                                                                </td>
                                                                                <td>3</td>
                                                                                <td>3</td>
                        
                                                                                <td>$30</td>
                                                                                <td><span class="badge badge-warning">Not Delivered</span></td>
                        
                                                                                <td>
                                                                                    <a href="#" class="text-success mr-2"
                                                                                        data-toggle="modal" data-target="#modal-update">
                                                                                        <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                                                                    </a>
                                                                                    <a href="#" class="text-danger mr-2">
                                                                                        <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                                                                    </a>
                                                                                </td>
                                                                            </tr>
                        
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                        
                        
                                                            </div>
                                                        </div>
                        
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end of col -->





                            </div>
                            {{-- end tabs --}}
                            
                        </div>
                    </div>
                </div>
            </section>

            <!-- content goes here -->


        </div>
        <!-- end of main content -->

        <!-- Footer Start -->
        <div class="flex-grow-1"></div>
        <div class="app-footer">
            <div class="row">
                <div class="col-md-9">
                    <p><strong>Gull - Laravel + Bootstrap 4 admin template</strong></p>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Libero quis beatae officia saepe
                        perferendis voluptatum minima eveniet voluptates dolorum, temporibus nisi maxime nesciunt totam
                        repudiandae commodi sequi dolor quibusdam
                        sunt.
                    </p>
                </div>
            </div>
            <div class="footer-bottom border-top pt-3 d-flex flex-column flex-sm-row align-items-center">
                <a class="btn btn-primary text-white btn-rounded" href="https://themeforest.net/user/mh_rafi"
                    target="_blank">Buy
                    Gull HTML</a>
                <span class="flex-grow-1"></span>
                <div class="d-flex align-items-center">
                    <img class="logo" src="./assets/images/logo.png" alt="">
                    <div>
                        <p class="m-0">&copy; 2018 Gull HTML</p>
                        <p class="m-0">All rights reserved</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- fotter end -->
    </div>
@endsection
