@extends('layouts.app')
@section('title', 'Matieres')
@section('content')

    <div class="main-content-wrap sidenav-open d-flex flex-column">
        <div class="breadcrumb">
            <h1 class="mr-2">Dashboard</h1>
            <ul>
                <li><a href="">Live</a></li>
                <!-- <li>Version 1</li> -->
            </ul>
        </div>

        <div class="separator-breadcrumb border-top"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="card o-hidden mb-4">
                    <div class="card-header d-flex align-items-center border-0">
                        <h3 class="w-50 float-left card-title m-0">Lives</h3>
                        <div class="dropdown dropleft text-right w-50 float-right">
                            <button type="button" class="btn btn-primary btn-icon m-1" data-toggle="modal"
                                data-target="#verifyModalContent" data-whatever="@mdo" id="toast">
                                <span class="ul-btn__icon"><i class="i-Add"></i></span>
                                <span class="ul-btn__text">Ajouter</span>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4">
                        <div class="card text-left">
    
                            <div class="card-body">
                                {{-- <h4 class="card-title mb-3">Basic Tab With Icon</h4> --}}
    
                                <ul class="nav nav-tabs" id="myIconTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-icon-tab" data-toggle="tab" href="#homeIcon" role="tab" aria-controls="homeIcon" aria-selected="true"><i class="nav-icon i-Home1 mr-1"></i>Lives Prochains</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-icon-tab" data-toggle="tab" href="#profileIcon" role="tab" aria-controls="profileIcon" aria-selected="false"><i class="nav-icon i-Home1 mr-1"></i>Lives Précédants</a>
                                    </li>
                                    
                                </ul>
                                <div class="tab-content" id="myIconTabContent" style="border-left: 1px solid #993366;border-right: 1px solid #993366;border-top: 1px solid #993366;border-bottom: 1px solid #993366;">
                                    <div class="tab-pane fade show active" id="homeIcon" role="tabpanel" aria-labelledby="home-icon-tab">
                                        <div class="m-3">
                                            <div class="table-responsive">
                                                <table class="table ">
                                                    <thead class="thead-dark">
                    
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Titre</th>
                                                            <th scope="col">Chapitre</th>
                                                            <th scope="col">Groupe</th>
                                                            <th scope="col">Date début</th>
                                                            <th scope="col">Lien</th>
                    
                    
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                    
                                                        @foreach($livessuiv as $live)
                                                        <tr>
                                                            <th scope="row">{{$loop->iteration }}</th>
                                                            <td><strong>{{$live->topic}} </strong></td>
                                                            <td>
                                                                <strong>
                    
                                                                    {{$live->chapitre->titre}}
                                                                </strong>
                    
                                                            </td>
                                                            <td>
                                                                <strong>
                    
                                                                    {{$live->group->nomg}}
                                                                </strong>
                    
                                                            </td>
                                                            <td>
                                                                <strong>
                    
                                                                    {{$live->start_time}}
                                                                </strong>
                    
                                                            </td>
                                                            <td>
                                                                <strong>
                                                                    <a href="{{$live->start_url}}" target="_blank "><img width="48" height="48" src="https://img.icons8.com/color/48/zoom.png" alt="zoom"/></a>
                                                                    
                                                                </strong>
                    
                                                            </td>
                    
                    
                                                            <td class="d-flex">
                                                                <button class="btn text-success bg-transparent btn-icon  mr-2 editbtn" data-id="{{$live->id}}"  data-toggle="modal" data-target="#editModalContent" ><i class="nav-icon i-Pen-5 font-weight-bold"></i></button>
                    
                                                                <form action="{{ route('lives.destroy', $live->id)}}" method="post" class="inline-block">
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
                                    <div class="tab-pane fade" id="profileIcon" role="tabpanel" aria-labelledby="profile-icon-tab">
                                        <div class="m-3">
                                            <div class="table-responsive">
                                                <table class="table ">
                                                    <thead class="thead-dark">
                    
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Titre</th>
                                                            <th scope="col">Chapitre</th>
                                                            <th scope="col">Groupe</th>
                                                            <th scope="col">Date début</th>
                                                            <th scope="col">Lien</th>
                    
                    
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                    
                                                        @foreach($livespred as $live)
                                                        <tr>
                                                            <th scope="row">{{$loop->iteration }}</th>
                                                            <td><strong>{{$live->topic}} </strong></td>
                                                            <td>
                                                                <strong>
                    
                                                                    {{$live->chapitre->titre}}
                                                                </strong>
                    
                                                            </td>
                                                            <td>
                                                                <strong>
                    
                                                                    {{$live->group->nomg}}
                                                                </strong>
                    
                                                            </td>
                                                            <td>
                                                                <strong>
                    
                                                                    {{$live->start_time}}
                                                                </strong>
                    
                                                            </td>
                                                            <td>
                                                                <strong>
                                                                    <a href="{{$live->start_url}}" target="_blank "><img width="48" height="48" src="https://img.icons8.com/color/48/zoom.png" alt="zoom"/></a>
                                                                    
                                                                </strong>
                    
                                                            </td>
                    
                    
                                                            <td class="d-flex">
                                                                <button class="btn text-success bg-transparent btn-icon  mr-2 editbtn" data-id="{{$live->id}}"  data-toggle="modal" data-target="#editModalContent" ><i class="nav-icon i-Pen-5 font-weight-bold"></i></button>
                    
                                                                <form action="{{ route('lives.destroy', $live->id)}}" method="post" class="inline-block">
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
                                        </div>                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>


            </div>
        </div>

        
{{-- ****** --}}
<!-- begin::modal add -->
<div class="ul-card-list__modal">
    <div class="modal fade  modal-add "id="verifyModalContent" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                    <div class="modal-body">
                        <form method="post" action="{{ route('lives.store') }}">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group row">
                                    <label for="titre" class="col-form-label col-sm-2 ">Titre : </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-rounded"  name="topic">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="titre" class="col-form-label col-sm-2">Description : </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-rounded"  name="description">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="titre" class="col-form-label col-sm-2">Date et heure : </label>
                                    <div class="col-sm-10">
                                        <input type="datetime-local" class="form-control form-control-rounded"  name="start_time">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="titre" class="col-form-label col-sm-2">Durée : </label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control form-control-rounded"  name="duration">
                                    </div>
                                </div>
    
                                <div class="form-group row">
                                    <label for="picker1"class="col-form-label col-sm-2">Classe</label>
                                    <div class="col-sm-10">
                                        <select class="form-control form-control-rounded w-100" name="course_id">
                                            @foreach ($courses as $course)
                                            <option value="{{$course->id}}">{{$course->classe->slug}}--{{$course->matiere->nom_matiere}}</option>
                                                
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="picker1"class=" col-sm-2 col-form-label">Chapitre :</label>
                                    <div class="col-sm-10">
                                        <select class="form-control form-control-rounded w-100" name="chapitre_id">
                                            @foreach ($chapitres as $chapitre)
                                            <option value="{{$chapitre->id}}">{{$chapitre->titre}}</option>
                                                
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="picker1"class="col-form-label col-sm-2">Groupe :</label>
                                    <div class="col-sm-10">
                                        <select class="form-control form-control-rounded w-100" name="group_id">
                                            @foreach ($groups as $groupe)
                                            <option value="{{$groupe->id}}">{{$groupe->nomg}}</option>
                                                
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="label-live" class="col-form-label col-sm-2">Enseignant :</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-rounded"  readonly value="{{Auth::user()->teacher->nom_fr}} {{Auth::user()->teacher->prenom_fr}}">
                                        <input type="hidden" class="form-control form-control-rounded" name="teacher_id" readonly value="{{Auth::user()->teacher->id}}">
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
          </div>
</div>
<!-- end::modal addd-->
{{-- ****** --}}

        <!-- Verify Modal content -->
        {{-- <div class="modal fade " id="verifyModalContent" tabindex="-1" role="dialog" aria-labelledby="verifyModalContent"
            aria-hidden="true">
            <div class="modal-dialog " role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="verifyModalContent_title">Nouveau Live</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="{{ route('lives.store') }}">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="titre" class="col-form-label">Titre : </label>
                                <input type="text" class="form-control form-control-rounded"  name="topic">
                            </div>
                            <div class="form-group">
                                <label for="titre" class="col-form-label">Description : </label>
                                <input type="text" class="form-control form-control-rounded"  name="description">
                            </div>
                            <div class="form-group">
                                <label for="titre" class="col-form-label">Date et heure : </label>
                                <input type="datetime-local" class="form-control form-control-rounded"  name="start_time">
                            </div>
                            <div class="form-group">
                                <label for="titre" class="col-form-label">Durée : </label>
                                <input type="number" class="form-control form-control-rounded"  name="duration">
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="picker1"class="t-font-boldest">Classe</label>
                                <select class="form-control form-control-rounded w-100" name="course_id">
                                    @foreach ($courses as $course)
                                    <option value="{{$course->id}}">{{$course->classe->slug}}--{{$course->matiere->nom_matiere}}</option>
                                        
                                    @endforeach
                                    
                                </select>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="picker1"class="t-font-boldest">Chapitre :</label>
                                <select class="form-control form-control-rounded w-100" name="chapitre_id">
                                    @foreach ($chapitres as $chapitre)
                                    <option value="{{$chapitre->id}}">{{$chapitre->titre}}</option>
                                        
                                    @endforeach
                                    
                                </select>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="picker1"class="t-font-boldest">Groupe :</label>
                                <select class="form-control form-control-rounded w-100" name="group_id">
                                    @foreach ($groups as $groupe)
                                    <option value="{{$groupe->id}}">{{$groupe->nomg}}</option>
                                        
                                    @endforeach
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="label-live" class="col-form-label">Enseignant :</label>
                                <input type="text" class="form-control form-control-rounded"  readonly value="{{Auth::user()->teacher->nom_fr}} {{Auth::user()->teacher->prenom_fr}}">
                                <input type="hidden" class="form-control form-control-rounded" name="teacher_id" readonly value="{{Auth::user()->teacher->id}}">
                            </div>
                            
                            


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary ">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> --}}
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
                                    <label for="titre" class="col-form-label">Titre : </label>
                                    <input type="text" class="form-control form-control-rounded"  id="topic">
                                    <input type="hidden" class="form-control" id="IdLive" name="IdLive">
                                    <input type="hidden" class="form-control" id="meeting_id" name="meeting_id">

                                </div>
                                <div class="form-group">
                                    <label for="titre" class="col-form-label">Description : </label>
                                    <input type="text" class="form-control form-control-rounded"  id="description">
                                </div>
                                <div class="form-group">
                                    <label for="titre" class="col-form-label">Date et heure : </label>
                                    <input type="datetime-local" class="form-control form-control-rounded"  id="start_time">
                                </div>
                                <div class="form-group">
                                    <label for="titre" class="col-form-label">Durée : </label>
                                    <input type="number" class="form-control form-control-rounded"  id="duration">
                                </div>
    
                                <div class="col-md-6 form-group mb-3">
                                    <label for="picker1"class="t-font-boldest">Classe</label>
                                    <select class="form-control form-control-rounded w-100" id="course_id">
                                        @foreach ($courses as $course)
                                        <option value="{{$course->id}}">{{$course->classe->slug}}--{{$course->matiere->nom_matiere}}</option>
                                            
                                        @endforeach
                                        
                                    </select>
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label for="picker1"class="t-font-boldest">Chapitre :</label>
                                    <select class="form-control form-control-rounded w-100" id="chapitre_id">
                                        @foreach ($chapitres as $chapitre)
                                        <option value="{{$chapitre->id}}">{{$chapitre->titre}}</option>
                                            
                                        @endforeach
                                        
                                    </select>
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label for="picker1"class="t-font-boldest">Groupe :</label>
                                    <select class="form-control form-control-rounded w-100" id="group_id">
                                        @foreach ($groups as $groupe)
                                        <option value="{{$groupe->id}}">{{$groupe->nomg}}</option>
                                            
                                        @endforeach
                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="label-live" class="col-form-label">Enseignant :</label>
                                    <input type="text" class="form-control form-control-rounded"  readonly value="{{Auth::user()->teacher->nom_fr}} {{Auth::user()->teacher->prenom_fr}}">
                                    <input type="hidden" class="form-control form-control-rounded" id="teacher_id" readonly value="{{Auth::user()->teacher->id}}">
                                </div>
                                
                                
    
    
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary updatebtn">Modifier</button>
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
    
     @elseif(Session::has('error'))   
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


                // var action ="{{ URL::to('lives') }}/"+id;


                // var url = "{{ URL::to('lives') }}";

                $.get("lives/" + id + "/edit", function(data) {
                    console.log(data.data);
                    $('#topic').val(data.data['topic']);
                    $('#description').val(data.data['description']);
                    $('#start_time').val(data.data['start_time']);
                    $('#duration').val(data.data['duration']);
                    $('#meeting_id').val(data.data['meeting_id']);
                    $('#teacher_id').val(data.data['teacher_id']);
                    $('#course_id').val(data.data['course_id']);
                    $('#chapitre_id').val(data.data['chapitre_id']);
                    $('#group_id').val(data.data['group_id']);
                    $('#IdLive').val(data.data['id']);



                });




            });
            $('.updatebtn').on('click', function(e) {
                e.preventDefault();
                var topic = $('#topic').val();
                var description = $('#description').val();
                var start_time = $('#start_time').val();
                var duration = $('#duration').val();
                var meeting_id = $('#meeting_id').val();
                var course_id = $('#course_id').val();
                var chapitre_id = $('#chapitre_id').val();
                var group_id = $('#group_id').val();
                var teacher_id = $('#teacher_id').val();
                var id = $('#IdLive').val();
                var URL ="lives/"+ id;
                console.log("url===",URL)
                $.ajax({
                    method: "PUT",
                    url: URL,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: { id: id,
                        topic: topic,
                        description: description ,
                        start_time: start_time ,
                        duration: duration ,
                        meeting_id: meeting_id ,
                        chapitre_id: chapitre_id ,
                        teacher_id: teacher_id ,
                        group_id: group_id ,
                        course_id: course_id },

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
