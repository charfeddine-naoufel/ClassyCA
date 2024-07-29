@extends('layouts.app')
@section('title', 'Matieres')
@section('content')

    <div class="main-content-wrap sidenav-open d-flex flex-column">
        <div class="breadcrumb">
            <h1 class="mr-2">Dashboard</h1>
            <ul>
                <li><a href="">Mes groupes</a></li>
                <!-- <li>Version 1</li> -->
            </ul>
        </div>

        <div class="separator-breadcrumb border-top"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="card o-hidden mb-4">
                    <div class="card-header d-flex align-items-center border-0">
                        <h3 class="w-50 float-left card-title m-0">Cours</h3>
                        
                    </div>

                    <div class="m-3">
                        <div class="table-responsive">
                            <table class="table ">
                                <thead class="thead-dark">

                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Classe</th>
                                        <th scope="col">Elèves</th>
                                        


                                        
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($groups as $groupe)
                                    @foreach($groupe as $item)
                                    <tr>
                                        <th scope="row">{{$loop->iteration }}</th>
                                        <td><strong>{{$item->nomg}} </strong></td>
                                        <td><strong>{{$item->classe->slug}} </strong></td>
                                        <td><strong>{{$item->eleves}} </strong></td>
                                       
                                        


                                       
                                    </tr>
                                    @endforeach
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>


            </div>
        </div>

        


        


        <!-- Footer Start -->

        <!-- fotter end -->
        
    </div>
   
@endsection


