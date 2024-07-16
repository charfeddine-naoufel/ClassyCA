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
        <div class="row">
            <div class="col-md-12">
                <div class="card o-hidden mb-4">
                    <div class="card-header d-flex align-items-center border-0">
                        <h3 class="w-50 float-left card-title m-0">Matières</h3>
                        <div class="dropdown dropleft text-right w-50 float-right">
                            <button type="button" class="btn btn-primary btn-icon m-1" data-toggle="modal"
                                data-target="#verifyModalContent" data-whatever="@mdo" id="toast">
                                <span class="ul-btn__icon"><i class="i-Add"></i></span>
                                <span class="ul-btn__text">Ajouter</span>
                            </button>
                        </div>
                    </div>

                    <div class="m-3">
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

                                    @foreach($matieres as $matiere)
                                    <tr>
                                        <th scope="row">{{$loop->iteration }}</th>
                                        <td><strong>{{$matiere->nom_matiere}} </strong></td>
                                        <td>
                                            <strong>

                                                {{$matiere->label_matiere}}
                                            </strong>

                                        </td>


                                        <td class="d-flex">
                                            <button class="btn text-success bg-transparent btn-icon  mr-2 editbtn" data-id="{{$matiere->id}}"  data-toggle="modal" data-target="#editModalContent" ><i class="nav-icon i-Pen-5 font-weight-bold"></i></button>

                                            <form action="{{ route('matieres.destroy', $matiere->id)}}" method="post" class="inline-block">
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

        


        <!-- Verify Modal content -->
        <div class="modal fade " id="verifyModalContent" tabindex="-1" role="dialog" aria-labelledby="verifyModalContent"
            aria-hidden="true">
            <div class="modal-dialog " role="document">
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
                                <input type="text" class="form-control" name="nom_matiere">
                            </div>
                            <div class="form-group">
                                <label for="label-matiere" class="col-form-label">Label Matière:</label>
                                <input type="text" class="form-control" name="label_matiere">
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary ">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Edit Modal content -->
        <div class="modal fade modaledit" id="editModalContent" tabindex="-1" role="dialog" aria-labelledby="editModalContent"
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
                                <label for="recipient-name-1" class="col-form-label"> Nom Matière:</label>
                                <input type="text" class="form-control" id="nom_matiere" name="nom_matiere">
                                <input type="hidden" class="form-control" id="IdMatiere" name="IdMatiere">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name-2" class="col-form-label">Label Matière:</label>
                                <input type="text" class="form-control" id="label_matiere" name="label_matiere">
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
    
                toastr.success('Nouvelle matière ajoutée avec succes',"Success", {timeOut: 5000});
    
     @elseif(Session::has('Error'))   
     toastr.error('Vérifiez les champs',"Error", {timeOut: 5000});

    @endif
</script>
<script src="{{asset('assets/js/vendor/sweetalert2.min.js')}}"></script>
    <script src="{{asset('assets/js/sweetalert.script.js')}}"></script>

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
                    $('#label_matiere').val(data.data['label_matiere']);
                    $('#nom_matiere').val(data.data['nom_matiere']);
                    $('#IdMatiere').val(data.data['id']);



                });




            });
            $('.updatebtn').on('click', function(e) {
                e.preventDefault();
                var label_matiere = $('#label_matiere').val();
                var nom_matiere = $('#nom_matiere').val();
                var id = $('#IdMatiere').val();
                var URL ="matieres/"+ id;
                console.log("url===",URL)
                $.ajax({
                    method: "PUT",
                    url: URL,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: { id: id,
                        label_matiere: label_matiere,
                        nom_matiere: nom_matiere },

                    success: function(data) {
                        $('.modaledit').modal('hide');
                        window.location.reload();
                        //  alert('update done')

                    }
                });
            });
         
        });
    </script>
@endsection
