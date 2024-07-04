@extends('layouts.app')
@section('content')
<div class="main-content-wrap sidenav-open d-flex flex-column">
<div class="breadcrumb">
    <h1 class="mr-2">Dashboard</h1>
    <ul>
        <li><a href="">Matières</a></li>
        <!-- <li>Version 1</li> -->
    </ul>
</div>

<div class="separator-breadcrumb border-top"></div>

<div class="row mb-4">

    <div class="col-md-12 mb-3">
        <div class="card text-left">

            <div class="card-body">
                <div class="d-flex justify-content-between">

                    <h4 class="card-title mb-3"> Matières</h4>
                    <button type="button" class="btn btn-primary btn-icon m-1" data-toggle="modal" data-target="#verifyModalContent" data-whatever="@mdo">
                        <span class="ul-btn__icon"><i class="i-Add"></i></span>
                        <span class="ul-btn__text">Ajouter</span>
                    </button>
                </div>

                <p>
                    Vous pouvez créer, mettre à jour ou supprimer une matière.

                </p>
                <div class="table-responsive">
                    <table class="table ">
                        <thead class="thead-dark">

                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Code Matière</th>
                                <th scope="col">Nom Matière</th>


                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            

                        </tbody>
                    </table>

                </div>


            </div>
            
        </div>
    </div>
</div>


<!-- Verify Modal content -->
<div class="modal fade" id="verifyModalContent" tabindex="-1" role="dialog" aria-labelledby="verifyModalContent" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="verifyModalContent_title">Nouvelle Matière</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="">
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <label for="recipient-name-1" class="col-form-label"> Code Matière:</label>
                        <input type="text" class="form-control"  name="CodeMatiere">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name-2" class="col-form-label">Nom Matière:</label>
                        <input type="text" class="form-control"  name="NomMatiere">
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Edit Modal content -->
<div class="modal fade" id="editModalContent" tabindex="-1" role="dialog" aria-labelledby="editModalContent" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalContent_title">Modifier Matière</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form >
                @csrf
                @method('PUT')
                <div class="modal-body">

                    <div class="form-group">
                        <label for="recipient-name-1" class="col-form-label"> Code Matière:</label>
                        <input type="text" class="form-control" id="CodeMatiere" name="CodeMatiere">
                        <input type="hidden" class="form-control" id="IdMatiere" name="IdMatiere">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name-2" class="col-form-label">Nom Matière:</label>
                        <input type="text" class="form-control" id="NomMatiere" name="NomMatiere">
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <button type="" class="btn btn-primary updatebtn">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Footer Start -->

<!-- fotter end -->
</div>
@endsection
