@extends('layouts.app')
@section('title', 'Matieres')
@section('content')
    <div class="main-content-wrap sidenav-open d-flex flex-column">
        <div class="breadcrumb">
            <h1 class="mr-2">Dashboard</h1>
            <ul>
                <li><a href="">Enseignants</a></li>
                <!-- <li>Version 1</li> -->
            </ul>
        </div>

        <div class="separator-breadcrumb border-top"></div>

        <div class="row mb-4">

            <div class="col-md-12 mb-3">
                <div class="card text-left">

                    <div class="card-body">
                        <div class="d-flex justify-content-between">

                            <h4 class="card-title mb-3"> Enseignants</h4>
                            <button type="button" class="btn btn-primary btn-icon m-1" data-toggle="modal" data-target="#verifyModalContentprof">
                                <span class="ul-btn__icon"><i class="i-Add"></i></span>
                                <span class="ul-btn__text">Ajouter</span>
                            </button>
                        </div>

                        
                        <div class="table-responsive">
                            <table id="scroll_horizontal_table" class="table table-sm table-striped " style="width:100%">
                                <thead class="thead-dark">

                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Code Enseignant</th>
                                        <th scope="col">Nom Enseignant</th>
                                        <th scope="col">Matière</th>
                                        <th scope="col">Grade</th>
                                        <th scope="col">Type</th>


                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                    <tr>
                                        <th scope="row">1</th>
                                        <td><strong>2 </strong></td>
                                        <td>
                                            <strong>

                                                3
                                            </strong>

                                        </td>
                                        <td>
                                            <strong>

                                                4
                                            </strong>

                                        </td>
                                        <td>
                                            <strong>

                                                5
                                            </strong>

                                        </td>
                                        <td>
                                            <strong>

                                                6
                                            </strong>

                                        </td>


                                        <td class="d-flex">
                                            <button class="btn text-success bg-transparent btn-icon  mr-2 editbtn" data-id="" data-toggle="modal" data-target="#editModalContent"><i class="nav-icon i-Pen-5 font-weight-bold"></i></button>

                                            <!-- <a href="#" class="text-success mr-2">
                                                    <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                                </a> -->
                                            <form action="" method="post" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <!-- <a  class="text-danger mr-2" type="submit">
                                                    <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                                </a> -->
                                                <button class="btn text-danger  btn-icon  mr-2 alert-confirm"><i class="nav-icon i-Close-Window font-weight-bold"></i></i></button>

                                            </form>

                                        </td>
                                    </tr>
                                   

                                </tbody>
                            </table>

                        </div>


                    </div>
                    <!-- ici     -->
                </div>
            </div>
        </div>


        <!-- Verify Modal content -->
        <div class="modal fade" id="verifyModalContentprof" tabindex="-1" role="dialog" aria-labelledby="verifyModalContentprof" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="verifyModalContentprof_title">Nouveau Enseignant</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="{{route('enseignants.store') }}">
                        @csrf
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="recipient-name-1" class="col-form-label"> Code Enseignant:</label>
                                <input type="text" class="form-control" name="CodeEnseignant">
                            </div>
                            <div class="form-group">
                                <label for="NomEnseignant" class="col-form-label">Nom Enseignant:</label>
                                <input type="text" class="form-control" name="NomEnseignant">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Code Matiere</label>
                                <select class="form-control" id="Matiere_id" name="Matiere_id">
                                    <option value="0">Choisir ...</option>
                                    
                                    <option value=""></option>
                                    

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Grade" class="col-form-label">Grade:</label>
                                <input type="text" class="form-control" name="Grade" id="gr">
                            </div>
                            <div class="form-group">
                                <label for="Type" class="col-form-label">Type:</label>
                                <input type="text" class="form-control" name="Type" id="ty">
                            </div>
                            <div class="form-group">
                                <label for="classe" class="col-form-label">Classe:</label>
                                <select class="classe form-control" name="classes[]" multiple="multiple" style="width: 100%">
                                    
                                    <option value="">111</option>
                                   

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Utilisateur</label>
                                <select class="form-control" id="user_id" name="User_id">
                                    <option value="0">Choisir ...</option>
                                    
                                    <option value=""></option>
                                    

                                </select>
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
                        <h5 class="modal-title" id="editModalContent_title">Modifier Enseignant</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form>
                        @csrf
                        @method('PUT')
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="recipient-name-1" class="col-form-label"> Code Enseignant:</label>
                                <input type="text" class="form-control" id="CodeEnseignant" name="CodeEnseignant">
                                <input type="hidden" class="form-control" id="IdEnseignant" name="IdEnseignant">
                                <!-- <input type="hidden" class="form-control" id="userid" name="userid"> -->
                            </div>
                            <div class="form-group">
                                <label for="recipient-name-2" class="col-form-label">Nom Enseignant:</label>
                                <input type="text" class="form-control" id="NomEnseignant" name="NomEnseignant">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Matiere</label>
                                <select class="form-control mat" id="Matiere_id" name="Matiere_id">
                                    <option value="0">Choisir ...</option>
                                    
                                    <option value=""></option>
                                    

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Grade" class="col-form-label">Grade:</label>
                                <input type="text" class="form-control" id="Grade" name="Grade">
                            </div>
                            <div class="form-group">
                                <label for="Type" class="col-form-label">Type:</label>
                                <input type="text" class="form-control" id="Type" name="Type">
                            </div>
                            <div class="form-group">
                                <label for="classe" class="col-form-label">Classe:</label>
                                <select class="classe myclasse form-control" name="classes[]"  multiple="multiple" style="width: 100%">
                                    
                                    <option value=""></option>
                                    

                                </select>
                                <small id="oldclasses" class="ul-form__text form-text text-success ">
                                                                    
                                </small>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Utilisateur</label>
                                <select class="form-control user" id="user_id1" name="User_id">
                                    <option value="0">Choisir ...</option>
                                    
                                    <option value=""></option>
                                    

                                </select>
                            </div>

                        </div>
       


        <!-- Footer Start -->

        <!-- fotter end -->
        
    </div>
   
@endsection

@section('scripts')
<script>
    @if (Session::has('success'))
    
                toastr.success('Nouvelle matière ajoutée avec succes',"Success", {timeOut: 5000});
    
        
    @endif
</script>

    <script>
        $(document).ready(function() {
           
            $('.alert-confirm').on('click', function(e) {
                e.preventDefault();
                var form = $(this).closest("form");
                swal({
                    title: 'Êtes vous sûr?',
                    text: "Cet action est irréversible!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#0CC27E',
                    cancelButtonColor: '#FF586B',
                    confirmButtonText: 'Oui, Supprimer!',
                    cancelButtonText: 'Non, Annuler!',
                    confirmButtonClass: 'btn btn-success mr-5',
                    cancelButtonClass: 'btn btn-danger',
                    buttonsStyling: false
                }).then(function() {
                    form.submit();
                    swal(
                        'Supprimée!',
                        'La matière a bien été supprimée.',
                        'success'
                    )
                }, function(dismiss) {
                    // dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
                    if (dismiss === 'cancel') {
                        swal(
                            'Annulée',
                            'La supression est annulée !! :)',
                            'error'
                        )
                    }
                })
            });

            //edit button
            $('.editbtn').on('click', function(e) {
                e.preventDefault();
                let id = $(this).data('id');


                // var action ="{{ URL::to('matieres') }}/"+id;


                // var url = "{{ URL::to('matieres') }}";

                $.get("matieres/" + id + "/edit", function(data) {
                    console.log(data.data);
                    $('#CodeMatiere').val(data.data['CodeMatiere']);
                    $('#NomMatiere').val(data.data['NomMatiere']);
                    $('#IdMatiere').val(data.data['id']);



                });




            });
            $('.updatebtn').on('click', function(e) {
                e.preventDefault();
                var CodeMatiere = $('#CodeMatiere').val();
                var NomMatiere = $('#NomMatiere').val();
                var id = $('#IdMatiere').val();

                $.ajax({
                    method: "PUT",
                    url: "matieres/" + id,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        id: id,
                        CodeMatiere: CodeMatiere,
                        NomMatiere: NomMatiere,

                    },
                    success: function(data) {
                        $('.modal').modal('hide');
                        // alert('update done')

                    }
                });
            });
         
        });
    </script>
@endsection
