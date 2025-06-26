@extends('layouts.app')
@section('title', 'Documents')
@section('content')

    <div class="main-content-wrap sidenav-open d-flex flex-column">
        <div class="breadcrumb">
            <h1 class="mr-2">Dashboard</h1>
            <ul>
                <li><a href="">Documents</a></li>
                <!-- <li>Version 1</li> -->
            </ul>
        </div>

        <div class="separator-breadcrumb border-top"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="card o-hidden mb-4">
                    <div class="card-header d-flex align-items-center border-0">
                        <h3 class="w-50 float-left card-title m-0">Documents</h3>
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
                                        <th scope="col">Nom Document</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Lien</th>
                                        <th scope="col">Prof</th>
                                        <th scope="col">Chapitre</th>


                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($supports as $support)
                                    <tr>
                                        <th scope="row">{{$loop->iteration }}</th>
                                        <td><strong>{{$support->nom}} </strong></td>
                                        <td>
                                            <strong>

                                                {{$support->type}}
                                            </strong>

                                        </td>
                                        <td>
                                            <strong>
                                                    <a href="{{$support->chemin}}" target="_blank"> Télécharger</a>
                                                
                                            </strong>

                                        </td>
                                        <td>
                                            <strong>

                                                {{$support->chapitre->course->teacher->nom_fr}} {{$support->chapitre->course->teacher->prenom_fr}}
                                            </strong>

                                        </td>
                                        <td>
                                            <strong>

                                                {{$support->chapitre->titre}}
                                            </strong>

                                        </td>


                                        <td class="d-flex">
                                            <button class="btn text-success bg-transparent btn-icon  mr-2 editbtn" data-id="{{$support->id}}"  data-toggle="modal" data-target="#editModalContent" ><i class="nav-icon i-Pen-5 font-weight-bold"></i></button>

                                            <form action="{{ route('documents.destroy', $support->id)}}" method="post" class="inline-block">
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
                        <h5 class="modal-title" id="verifyModalContent_title">Nouveau Document</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="{{ route('documents.store') }}" class="needs-validation" novalidate>
                        @csrf
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="label-support" class="col-form-label">Nom Document:</label>
                                <input type="text" class="form-control" name="nom" required>
                                <div class="invalid-tooltip">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle text-20"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12" y2="17"></line></svg>
                                    Le nom du document est obligatoire
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nom-support" class="col-form-label"> Type:</label>
                                <select class="form-control form-control-rounded w-100" name="type">
                                    
                                    <option value="Cours">Cours</option>
                                    <option value="Série d'exercices">Série d'exercices</option>
                                    <option value="Résumé">Résumé</option>
                                    <option value="Devoir">Devoir</option>
                                    <option value="Autres">Autres</option>
                                        
                                   
                                    
                                </select>
                            </div>
                                                       
                            <div class="form-group">
                                <label for="label-support" class="col-form-label">Lien Fichier:</label>
                                <input type="text" class="form-control" name="chemin" required>
                                <div class="invalid-tooltip">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle text-20"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12" y2="17"></line></svg>
                                    Le lien au document est obligatoire
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="nom-support" class="col-form-label"> Chapitret:</label>
                                <select class="form-control form-control-rounded w-100" name="chapitre_id" required>
                                    <option value="">Choisir un chapitre</option>
                                    @foreach ($chapitres as $chapitre)
                                    <option value="{{$chapitre->id}}">{{$chapitre->titre}} {{$chapitre->course->classe->slug}}</option>
                                        
                                    @endforeach
                                    
                                </select>
                                <div class="invalid-tooltip">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle text-20"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12" y2="17"></line></svg>
                                    Le choix d'un chapitre est obligatoire
                                </div>
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
                                <label for="label-support" class="col-form-label">Nom Document:</label>
                                <input type="text" class="form-control" id="nom" required>
                                <input type="hidden" class="form-control" id="IdSupport" >
                                <div class="invalid-tooltip">
                                    Le nom du document est obligatoire
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nom-support" class="col-form-label"> Type:</label>
                                <select class="form-control form-control-rounded w-100" id="type">
                                    
                                    <option value="Cours">Cours</option>
                                    <option value="Série d'exercices">Série d'exercices</option>
                                    <option value="Résumé">Résumé</option>
                                    <option value="Devoir">Devoir</option>
                                    <option value="Autres">Autres</option>
                                        
                                   
                                    
                                </select>
                            </div>
                                                       
                            <div class="form-group">
                                <label for="label-support" class="col-form-label">Lien Fichier:</label>
                                <input type="text" class="form-control" id="chemin" required>
                                <div class="invalid-tooltip">
                                    Le lien au document est obligatoire
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="nom-support" class="col-form-label"> Chapitre :</label>
                                <select class="form-control form-control-rounded w-100" id="chapitre_id" required>
                                    <option value="">Choisir un chapitre</option>
                                    @foreach ($chapitres as $chapitre)
                                    <option value="{{$chapitre->id}}">{{$chapitre->titre}} {{$chapitre->course->classe->slug}}</option>
                                        
                                    @endforeach
                                    
                                </select>
                                <div class="invalid-tooltip">
                                    Le choix d'un chapitre est obligatoire
                                </div>
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
                        'Le support a bien été supprimée.',
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


                // var action ="{{ URL::to('supports') }}/"+id;


                // var url = "{{ URL::to('supports') }}";

                $.get("documents/" + id + "/edit", function(data) {
                    console.log(data.data);
                    $('#IdSupport').val(data.data['id']);
                    $('#chapitre_id').val(data.data['chapitre_id']);
                    $('#nom').val(data.data['nom']);
                    $('#type').val(data.data['type']);
                    $('#chemin').val(data.data['chemin']);



                });




            });
            $('.updatebtn').on('click', function(e) {
                e.preventDefault();
                var chapitre_id = $('#chapitre_id').val();
                var nom = $('#nom').val();
                var type = $('#type').val();
                var chemin = $('#chemin').val();
                var id = $('#IdSupport').val();
                var URL ="documents/"+ id;
                console.log("url===",URL)
                $.ajax({
                    method: "PUT",
                    url: URL,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: { id: id,
                        chapitre_id: chapitre_id,
                        nom: nom ,
                        type: type ,
                        chemin: chemin ,
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
