@extends('layouts.app')
@section('title', 'Matieres')
@section('content')

    <div class="main-content-wrap sidenav-open d-flex flex-column">
        <div class="breadcrumb">
            <h1 class="mr-2">Dashboard</h1>
            <ul>
                <li><a href="">Cours</a></li>
                <!-- <li>Version 1</li> -->
            </ul>
        </div>

        <div class="separator-breadcrumb border-top"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="card o-hidden mb-4">
                    <div class="card-header d-flex align-items-center border-0">
                        <h3 class="w-50 float-left card-title m-0">Cours</h3>
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
                                        <th scope="col">Classe</th>
                                        <th scope="col">Enseignant</th>
                                        <th scope="col">Matière</th>


                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($courses as $course)
                                    <tr>
                                        <th scope="row">{{$loop->iteration }}</th>
                                        <td><strong>{{$course->classe->slug}} </strong></td>
                                        <td>
                                            <strong>

                                                {{$course->teacher->nom_fr}} {{$course->teacher->prenom_fr}}
                                            </strong>

                                        </td>
                                        <td>
                                            <strong>

                                                {{$course->matiere->nom_matiere}}
                                            </strong>

                                        </td>


                                        <td class="d-flex">
                                            <button class="btn text-success bg-transparent btn-icon  mr-2 editbtn" data-id="{{$course->id}}"  data-toggle="modal" data-target="#editModalContent" ><i class="nav-icon i-Pen-5 font-weight-bold"></i></button>

                                            <form action="{{ route('courses.destroy', $course->id)}}" method="post" class="inline-block">
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
                        <h5 class="modal-title" id="verifyModalContent_title">Nouveau Cours</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="{{ route('courses.store') }}">
                        @csrf
                        <div class="modal-body">

                            <div class="col-md-6 form-group mb-3">
                                <label for="picker1"class="t-font-boldest">Classe</label>
                                <select class="form-control form-control-rounded w-100" name="classe_id">
                                    @foreach ($classes as $classe)
                                    <option value="{{$classe->id}}">{{$classe->slug}}</option>
                                        
                                    @endforeach
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="label-course" class="col-form-label">Enseignant :</label>
                                <input type="text" class="form-control form-control-rounded"  readonly value="{{Auth::user()->teacher->nom_fr}} {{Auth::user()->teacher->prenom_fr}}">
                                <input type="hidden" class="form-control form-control-rounded" name="teacher_id" readonly value="{{Auth::user()->teacher->id}}">
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="picker1"class="t-font-boldest">Matière :</label>
                                <select class="form-control form-control-rounded w-100" name="matiere_id">
                                    @foreach ($matieres as $matiere)
                                    <option value="{{$matiere->id}}">{{$matiere->nom_matiere}}</option>
                                        
                                    @endforeach
                                    
                                </select>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="picker1"class="t-font-boldest">Group :</label>
                                <select class="form-control form-control-rounded w-100" name="group_id">
                                    @foreach ($groups as $group)
                                    <option value="{{$group->id}}">{{$group->nomg}}</option>
                                        
                                    @endforeach
                                    
                                </select>
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

                            <div class="col-md-6 form-group mb-3">
                                <label for="picker1"class="t-font-boldest">Classe</label>
                                <input type="hidden" class="form-control" id="IdCourse" name="IdCourse">

                                <select class="form-control form-control-rounded w-100" name="classe_id" id="classe_id">
                                    @foreach ($classes as $classe)
                                    <option value="{{$classe->id}}">{{$classe->slug}}</option>
                                        
                                    @endforeach
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="label-course" class="col-form-label">Enseignant :</label>
                                <input type="text" class="form-control form-control-rounded"  readonly value="{{Auth::user()->teacher->nom_fr}} {{Auth::user()->teacher->prenom_fr}}">
                                <input type="hidden" class="form-control form-control-rounded" name="teacher_id" id="teacher_id" readonly value="{{Auth::user()->teacher->id}}">
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="picker1"class="t-font-boldest">Matière :</label>
                                <select class="form-control form-control-rounded w-100" name="matiere_id" id="matiere_id">
                                    @foreach ($matieres as $matiere)
                                    <option value="{{$matiere->id}}">{{$matiere->nom_matiere}}</option>
                                        
                                    @endforeach
                                    
                                </select>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="picker1"class="t-font-boldest">Group :</label>
                                <select class="form-control form-control-rounded w-100" name="group_id" id="group_id">
                                    @foreach ($groups as $group)
                                    <option value="{{$group->id}}">{{$group->nom_g}}</option>
                                        
                                    @endforeach
                                    
                                </select>
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


                // var action ="{{ URL::to('courses') }}/"+id;


                // var url = "{{ URL::to('courses') }}";

                $.get("courses/" + id + "/edit", function(data) {
                    console.log(data.data);
                    $('#classe_id').val(data.data['classe_id']);
                    $('#teacher_id').val(data.data['teacher_id']);
                    $('#matiere_id').val(data.data['matiere_id']);
                    $('#group_id').val(data.data['group_id']);
                    $('#IdCourse').val(data.data['id']);



                });




            });
            $('.updatebtn').on('click', function(e) {
                e.preventDefault();
                var classe_id = $('#classe_id').val();
                var teacher_id = $('#teacher_id').val();
                var matiere_id = $('#matiere_id').val();
                var group_id = $('#group_id').val();
                var id = $('#IdCourse').val();
                var URL ="courses/"+ id;
                console.log("url===",URL)
                $.ajax({
                    method: "PUT",
                    url: URL,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: { id: id,
                        classe_id: classe_id,
                        teacher_id: teacher_id ,
                        group_id: group_id ,
                        matiere_id: matiere_id },

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
