@extends('layouts.app')
@section('title', 'Matieres')
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
                            <button type="button" class="btn btn-primary btn-icon m-1" data-toggle="modal"
                                data-target="#verifyModalContent" data-whatever="@mdo" id="toast">
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
                                        <th scope="col">Nom Matière</th>
                                        <th scope="col">Label Matière</th>


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
        <div class="modal fade" id="verifyModalContent" tabindex="-1" role="dialog" aria-labelledby="verifyModalContent"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="verifyModalContent_title">Nouvelle Matière</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="{{ route('matieres.store') }}">
                        @csrf
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="nom-matiere" class="col-form-label"> Nom Matière:</label>
                                <input type="text" class="form-control" name="nom-matiere">
                            </div>
                            <div class="form-group">
                                <label for="label-matiere" class="col-form-label">Label Matière:</label>
                                <input type="text" class="form-control" name="label-matiere">
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
        <div class="modal fade" id="editModalContent" tabindex="-1" role="dialog" aria-labelledby="editModalContent"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalContent_title">Modifier Matière</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form>
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

@section('scripts')
<script>
    @if (Session::has('success'))
    
                toastr.success('Matière ajoutée avec succes',"Success", {timeOut: 5000});
    
        
    @endif
</script>

    <script>
        $(document).ready(function() {
            @if(session("success"))
        
          
        
        @endif
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
