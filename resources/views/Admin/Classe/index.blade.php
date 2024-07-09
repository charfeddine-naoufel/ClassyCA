@extends('layouts.app')
@section('title', 'Matieres')
@section('content')
    <div class="main-content-wrap sidenav-open d-flex flex-column">
        <div class="breadcrumb">
            <h1 class="mr-2">Dashboard</h1>
            <ul>
                <li><a href="">Classes</a></li>
                <!-- <li>Version 1</li> -->
            </ul>
        </div>

        <div class="separator-breadcrumb border-top"></div>

        <div class="row mb-4">

            <div class="col-md-12 mb-3">
                <div class="card text-left">

                    <div class="card-body">
                        <div class="d-flex justify-content-between">

                            <h4 class="card-title mb-3"> Classes</h4>
                            <button type="button" class="btn btn-primary btn-icon m-1" data-toggle="modal"
                                data-target="#verifyModalContent" data-whatever="@mdo" id="toast">
                                <span class="ul-btn__icon"><i class="i-Add"></i></span>
                                <span class="ul-btn__text">Ajouter</span>
                            </button>
                        </div>

                        <p>
                            Vous pouvez créer, mettre à jour ou supprimer une classe.

                        </p>
                        <div class="table-responsive">
                            <table class="table ">
                                <thead class="thead-dark">

                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Niveau</th>
                                        <th scope="col">Section</th>
                                        <th scope="col">Slug</th>


                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($classes as $classe)
                                    <tr>
                                        <th scope="row">{{$loop->iteration }}</th>
                                        <td><strong>{{$classe->niveau}} </strong></td>
                                        <td>
                                            <strong>

                                                {{$classe->section}}
                                            </strong>

                                        </td>
                                        <td><strong>{{$classe->slug}} </strong></td>



                                        <td class="d-flex">
                                            <button class="btn text-success bg-transparent btn-icon  mr-2 editbtn" data-id="{{$classe->id}}"  data-toggle="modal" data-target="#editModalContent" ><i class="nav-icon i-Pen-5 font-weight-bold"></i></button>

                                            <form action="{{ route('classes.destroy', $classe->id)}}" method="post" class="inline-block">
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
        <div class="modal fade" id="verifyModalContent" tabindex="-1" role="dialog" aria-labelledby="verifyModalContent"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="verifyModalContent_title">Nouvelle Classe</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="{{ route('classes.store') }}">
                        @csrf
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="nom-classe" class="col-form-label"> Niveau:</label>
                                <input type="text" class="form-control" name="niveau">
                            </div>
                            <div class="form-group">
                                <label for="label-classe" class="col-form-label">Section:</label>
                                <input type="text" class="form-control" name="section">
                            </div>
                            <div class="form-group">
                                <label for="label-classe" class="col-form-label">Slug:</label>
                                <input type="text" class="form-control" name="slug">
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
                        <h5 class="modal-title" id="editModalContent_title">Modifier Classe</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form>
                        @csrf
                        @method('PUT')
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="recipient-name-1" class="col-form-label"> Niveau:</label>
                                <input type="text" class="form-control" id="niveau" name="niveau">
                                <input type="hidden" class="form-control" id="IdClasse" name="IdClasse">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name-2" class="col-form-label">Section:</label>
                                <input type="text" class="form-control" id="section" name="section">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name-2" class="col-form-label">Slug:</label>
                                <input type="text" class="form-control" id="slug" name="slug">
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
    
                toastr.success('Nouvelle classe ajoutée avec succes',"Success", {timeOut: 5000});
    
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
                        'La classe a bien été supprimée.',
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


                // var action ="{{ URL::to('classes') }}/"+id;


                // var url = "{{ URL::to('classes') }}";

                $.get("classes/" + id + "/edit", function(data) {
                    console.log(data.data);
                    $('#niveau').val(data.data['niveau']);
                    $('#section').val(data.data['section']);
                    $('#slug').val(data.data['slug']);
                    $('#IdClasse').val(data.data['id']);



                });




            });
            $('.updatebtn').on('click', function(e) {
                e.preventDefault();
                var niveau = $('#niveau').val();
                var section = $('#section').val();
                var slug = $('#slug').val();
                var id = $('#IdClasse').val();
                var URL ="classes/"+ id;
                console.log("url===",URL)
                $.ajax({
                    method: "PUT",
                    url: URL,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: { id: id,
                        niveau: niveau,
                        section: section,
                        slug: slug 
                    },

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
