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
 {{-- classes et groupes --}}
 <div class="row">
    <div class="col-md-5">
        <div class="card o-hidden mb-4">
            <div class="card-header d-flex align-items-center border-0">
                <h3 class="w-50 float-left card-title m-0">Classes</h3>
                <div class="dropdown dropleft text-right w-50 float-right">
                    <button type="button" class="btn btn-primary btn-icon m-1" data-toggle="modal"
                                data-target="#verifyModalContent" data-whatever="@mdo" id="toast">
                                <span class="ul-btn__icon"><i class="i-Add"></i></span>
                                <span class="ul-btn__text">Ajouter</span>
                    </button>
                </div>
            </div>

            <div class="mt-2">
                <div class="table-responsive">
                    <table class="table ">
                        <thead class="indigo-400 text-purple-500">

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
                                    <a class="text-success mr-2 editbtn" data-id="{{$classe->id}}"  data-toggle="modal" data-target="#editModalContent" ><i class="nav-icon i-Pen-5 font-weight-bold"></i></a>

                                    <form action="{{ route('classes.destroy', $classe->id)}}" method="post" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        
                                        <a class="text-danger mr-2 alert-confirm"   ><i class="nav-icon i-Close-Window font-weight-bold"></i></i></a>

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
    <div class="col-md-7">
        <div class="card o-hidden mb-4">
            <div class="card-header d-flex align-items-center border-0">
                <h3 class="w-50 float-left card-title m-0">Groupes</h3>
                <div class="dropdown dropleft text-right w-50 float-right">
                    <button type="button" class="btn btn-primary btn-icon m-1" data-toggle="modal"
                                data-target="#verifyModalContentgroup" data-whatever="@mdo" id="toast">
                                <span class="ul-btn__icon"><i class="i-Add"></i></span>
                                <span class="ul-btn__text">Ajouter</span>
                    </button>
                </div>
            </div>

            <div class="mt-2">
                <div class="table-responsive">
                    <table class="table ">
                        <thead class="pink-500 text-purple-500">

                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom Groupe</th>
                                <th scope="col">Classes</th>
                                <th scope="col">Elèves</th>


                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($groups as $group)
                            <tr>
                                <th scope="row">{{$loop->iteration }}</th>
                                <td><strong>{{$group->nomg}} </strong></td>
                                <td>
                                    <strong>

                                        {{$group->classe->slug}}
                                    </strong>

                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span><i class="i-Business-Mens ul-accordion__font"> </i></span>Elèves du groupe
                                        </button>
                                        <div class="dropdown-menu bg-transparent shadow-none p-0 m-0" style="width: 320px">
                                            <div class="card">
                                                <div class="card-body">
                                                    <ul class="list-group">
                                                    
                                                    
                                                        @foreach ($group ->students as $eleve )
                                                        <li class="list-group-item d-flex justify-content-between align-items-center py-0">
                                                            {{$eleve->nom_fr}} {{$eleve->prenom_fr}}
                                                            <form method="POST" action="{{route('student.removefromgrou',['id' => $eleve->id])}}">
                                                                @csrf
                                                                @method('PATCH')
                                                                <button type="submit" class="btn btn-danger btn-sm m-0">X</button>
                                                            </form>
                                                            
                                                        </li>
                                                        
                                                        
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="accordion" id="accordionRightIcon">
                                    <div class="card">
                                        
                                        <div class="card-header header-elements-inline">
                                            <h6 class="card-title ul-collapse__icon--size ul-collapse__right-icon mb-0">
                                                <a data-toggle="collapse" class="text-default collapsed" href="#accordion-item-icons-{{$loop->iteration }}" aria-expanded="false"> 
                                                    <span><i class="i-Business-Mens ul-accordion__font"> </i></span>
                                                    Elèves du groupe</a>
                                            </h6>
                        
                                        </div>
                        
                        
                        
                                        <div id="accordion-item-icons-{{$loop->iteration }}" class="collapse" data-parent="#accordionRightIcon" style="">
                                            <div class="card-body"> 
                                                <ul class="list-group">
                                                    
                                                    
                                                    @foreach ($group ->students as $eleve )
                                                    <li class="list-group-item d-flex justify-content-between align-items-center py-0">
                                                        {{$eleve->nom_fr}} {{$eleve->prenom_fr}}
                                                        <form method="POST" action="{{route('student.removefromgrou',['id' => $eleve->id])}}">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button type="submit" class="btn btn-danger btn-sm m-0">X</button>
                                                        </form>
                                                        
                                                    </li>
                                                    
                                                    
                                                    @endforeach
                                                </ul>
                                                
                                            </div>
                                        </div>
                                    </div>
                        
                                    
                                </div> --}}
                            </td>



                                <td class="d-flex">
                                    <div class="btn-group">
                                        <button type="button" class="btn bg-white _r_btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="_dot _r_block-dot bg-success"></span>
                                                <span class="_dot _r_block-dot bg-success"></span>
                                                <span class="_dot _r_block-dot bg-success"></span>
                                            </button>
                                        <div class="dropdown-menu" x-placement="bottom-start">
                                            <a class="dropdown-item text-info" href="#">Ajouter eleve</a>
                                            <a class="dropdown-item text-success editbtngroup" href="#" data-id="{{$group->id}}"  data-toggle="modal" data-target="#editModalContentgroup">Modifier Groupe </a>
                                            
                                            <div class="dropdown-divider"></div>
                                            <form action="{{ route('groups.destroy', $group->id)}}" method="post" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <a class="dropdown-item text-danger alert-confirm" href="#">Supprimer Groupe</a>
                                                
        
                                            </form> 
                                        </div>
                                    </div>
                                    
                                    

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
 {{-- end classes et groupes --}}
        


        <!-- Verify Modal content  classe-->
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
        <!-- Edit Modal content classe-->
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

        {{-- modals for groups --}}
        <div class="modal fade" id="verifyModalContentgroup" tabindex="-1" role="dialog" aria-labelledby="verifyModalContentgroup"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="verifyModalContent_title">Nouveau groupe</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="{{ route('groups.store') }}">
                        @csrf
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="nom-classe" class="col-form-label"> Nom:</label>
                                <input type="text" class="form-control" name="nomg">
                            </div>
                            <div class="form-group">
                                <label for="label-classe" class="col-form-label">Classe:</label>
                                <select class="form-control" id="classe" name="classe_id">
                                    <option value="">Choisir classe</option>
                                    @foreach ($classes as $classe)
                                        
                                    <option value="{{$classe->id}}">{{$classe->slug}}</option>
                                    @endforeach
                                    
                                  </select>
                            </div>
                            <div class="form-group">
                                <label for="label-classe" class="col-form-label">Eleves:</label>
                                <select class="form-control liste-eleves" id="elevesSelectedClasse" style="width: 100%" name="eleves[]" multiple="multiple" >
                                   
                                  </select>                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary ">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Edit Modal content group-->
        <div class="modal fade modaleditgroup" id="editModalContentgroup" tabindex="-1" role="dialog" aria-labelledby="editModalContentgroup"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalContent_title">Modifier Groupe</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form>
                        @csrf
                        @method('PUT')
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="recipient-name-1" class="col-form-label"> Nom:</label>
                                <input type="text" class="form-control" id="nomg" name="nomg">
                                <input type="hidden" class="form-control" id="IdGroup" name="Idgroup">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name-2" class="col-form-label">Classe:</label>
                                <input type="text" class="form-control" id="sluggr" name="slug">
                                <input type="hidden" class="form-control" id="classe_id" name="classe_id">
                            </div>
                            {{-- <div class="form-group">
                                <label for="recipient-name-2" class="col-form-label">Eleves:</label>
                                <select class="form-control" id="classegr" name="classe_id">
                                
                                    
                                  </select>
                            </div> --}}


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="" class="btn btn-primary updatebtngroup">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- modals for groups --}}


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
<script src="{{asset('assets/js/vendor/select2.js')}}"></script>
<script src="{{asset('assets/js/vendor/sweetalert2.min.js')}}"></script>
    <script src="{{asset('assets/js/sweetalert.script.js')}}"></script>

    <script>
        $(document).ready(function() {
            $('.liste-eleves').select2();
            // selection des eleves
            $('#classe').on('change', function() {
                $('#elevesSelectedClasse').empty();
                var selectedClasse = $('#classe').find(":selected").val();
                var eleves={!! json_encode($eleves->toArray()) !!}
                const eleves_classe = eleves.filter((eleve) => { return eleve.classe_id== selectedClasse });
                var eleves_group=[]
                $.each(eleves_classe, function (i, item) {
                $('#elevesSelectedClasse').append($('<option>', { 
                     value: item.id,
                     text : item.nom_fr + " "+ item.prenom_fr
                
                 }));
                

                });

                console.log('eleves=',eleves)
               
                console.log('classe selectionné=',selectedClasse)
            });
            
            // selection des eleves
           
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
                        'La supression effectuée avec succés.',
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
                    // console.log(data.data);
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
         //edit and update group
         $('.editbtngroup').on('click', function(e) {
                e.preventDefault();
                let id = $(this).data('id');


                // var action ="{{ URL::to('classes') }}/"+id;


                // var url = "{{ URL::to('classes') }}";

                $.get("groups/" + id + "/edit", function(data) {
                    console.log(data.data);
                    $('#nomg').val(data.data['nomg']);
                    $('#classe_id').val(data.data['classe_id']);
                    $('#sluggr').val(data.data['slug']);

                    $('#classegr').val(data.data.eleves['nom_fr']);
                    $('#classegr').trigger('change');
                    
                    $('#IdGroup').val(data.data['id']);



                });




            });
            $('.updatebtngroup').on('click', function(e) {
                e.preventDefault();
                var nomg = $('#nomg').val();
                var classe_id = $('#classe_id').val();
                
                var id = $('#IdGroup').val();
                var URL ="groups/"+ id;
                console.log("url===",URL)
                $.ajax({
                    method: "PUT",
                    url: URL,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: { id: id,
                        nomg: nomg,
                        classe_id: classe_id,
                        
                    },

                    success: function(data) {
                        $('.modaleditgroup').modal('hide');
                        window.location.reload();
                        //  alert('update done')

                    }
                });
            });
         //edit and update group

        });
    </script>
@endsection
