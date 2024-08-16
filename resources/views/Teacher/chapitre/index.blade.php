@extends('layouts.app')
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
                                                <form method="POST" action="{{route('chapitres.store')}} " enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group row">
                                                        <label for="nom_off" class="col-sm-2 col-form-label">Titre: </label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="Titre" placeholder="Titre" name="titre">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="Description"
                                                            class="col-sm-2 col-form-label">Description :</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="Description"
                                                                placeholder="Description" name="description">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="Trimestre"
                                                            class="col-sm-2 col-form-label">Trimestre :</label>
                                                        <div class="col-sm-10">
                                                            <select class="form-control form-control-rounded" id=""  name="trimestre">
                                                                <option value="1">Trimestre 1</option>
                                                                <option value="2">Trimestre 2</option>
                                                                <option value="3">Trimestre 3</option>
                                                            
                                                            </select>
                                                        </div>
                                                    </div>

                                                   
                                                    <div class="form-group row">
                                                        <label for="Description"
                                                            class="col-sm-2 col-form-label">Cours :</label>
                                                        <div class="col-sm-10">
                                                            <select class="form-control form-control-rounded " name="course_id">
                                                                @foreach ($courses as $course)
                                                                <option value="{{$course->id}}">{{$course->classe->slug}}</option>
                                                                    
                                                                @endforeach
                                                                
                                                            </select>
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
                                                        <label for="nom_off" class="col-sm-2 col-form-label">Titre: </label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="Titre"
                                                                placeholder="Titre" name="titre">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="Description"
                                                            class="col-sm-2 col-form-label">Description :</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="Description"
                                                                placeholder="Description" name="description">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="Trimestre"
                                                            class="col-sm-2 col-form-label">Trimestre :</label>
                                                        <div class="col-sm-10">
                                                            <select class="form-control" id=""  name="trimestre">
                                                                <option value="1">Trimestre 1</option>
                                                                <option value="2">Trimestre 2</option>
                                                                <option value="3">Trimestre 3</option>
                                                            
                                                            </select>
                                                        </div>
                                                    </div>

                                                   
                                                    <div class="form-group row">
                                                        <label for="Description"
                                                            class="col-sm-2 col-form-label">Description :</label>
                                                        <div class="col-sm-10">
                                                            <select class="form-control form-control-rounded w-100" name="course_id">
                                                                @foreach ($courses as $course)
                                                                <option value="{{$course->id}}">{{$course->classe->slug}}</option>
                                                                    
                                                                @endforeach
                                                                
                                                            </select>
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
                                                @foreach ($chapitresByClasses as $key => $chapitresByClasse)
                                                    
                                                <li class="nav-item">
                                                    <a class="nav-link {{$loop->iteration ==  1 ? 'active' : ''  }}" id="home-icon-tab{{$loop->iteration}} " data-toggle="tab"
                                                    href="#homeIcon{{$loop->iteration}}" role="tab" aria-controls="homeIcon{{$loop->iteration}}"
                                                    aria-selected="true"><i class="nav-icon i-Business-Mens mr-1"></i><strong>{{$key}}</strong></a>
                                                </li>
                                                
                                                @endforeach
                                            </ul>
                                            <div class="tab-content" id="myIconTabContent"style="border-left: 1px solid #993366;border-right: 1px solid #993366;border-bottom: 1px solid #993366;border-top: 1px solid #993366;">
                                                @foreach ($chapitresByClasses as $key => $chapitresByClasse)
                                                    
                                               
                                                <div class="tab-pane fade {{$loop->iteration ==  1 ? 'active show' : ''  }} " id="homeIcon{{$loop->iteration}}" role="tabpanel"
                                                    aria-labelledby="home-icon-tab{{$loop->iteration}}">
                                                    <div class="card-body">

                                                        <div class="table-responsive">
                                                            <div class="card-body">
                                                                <h4 class="card-title mb-3"> Chapitres pour classe : <strong>{{$key}}</strong></h4>
                        
                                                                <div class="table-responsive">
                                                                    <table class="table ">
                                                                        <thead class="thead-dark">
                                        
                                                                            <tr>
                                                                                <th scope="col">#</th>
                                                                                <th scope="col">Titre :</th>
                                                                                <th scope="col">Description :</th>
                                                                                <th scope="col">Trimestre</th>
                                                                                <th scope="col">Cours</th>
                                        
                                        
                                                                                <th scope="col">Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                        
                                                                            @foreach($chapitresByClasse as $chapitre)
                                                                            <tr>
                                                                                <th scope="row">{{$loop->iteration }}</th>
                                                                                <td><strong>{{$chapitre->titre}} </strong></td>
                                                                                <td>
                                                                                    <strong>
                                        
                                                                                        {{$chapitre->description}} 
                                                                                    </strong>
                                        
                                                                                </td>
                                                                                <td>
                                                                                    <strong>
                                        
                                                                                        {{$chapitre->trimestre}}
                                                                                    </strong>
                                        
                                                                                </td>
                                                                                <td>
                                                                                    <strong>
                                        
                                                                                        {{$chapitre->course->matiere->nom_matiere}} - {{$chapitre->course->teacher->nom_fr}}
                                                                                    </strong>
                                        
                                                                                </td>
                                        
                                        
                                                                                <td class="d-flex">
                                                                                    <button class="btn text-success bg-transparent btn-icon  mr-2 editbtn" data-id="{{$chapitre->id}}"  data-toggle="modal" data-target="#editModalContent" ><i class="nav-icon i-Pen-5 font-weight-bold"></i></button>
                                        
                                                                                    <form action="{{ route('chapitres.destroy', $chapitre->id)}}" method="post" class="inline-block">
                                                                                        @csrf
                                                                                        @method('DELETE')
                                                                                        
                                                                                        <button class="btn text-danger  btn-icon  mr-2 alert-confirm"   ><i class="nav-icon i-Close-Window font-weight-bold"></i></i></button>
                                        
                                                                                    </form>
                                        
                                                                                </td>
                                                                            </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                        
                                                                </div>
                        
                        
                                                            </div>
                                                        </div>
                        
                                                    </div>
                                                </div>
                                                @endforeach
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
        
        <!-- fotter end -->
    </div>
@endsection
