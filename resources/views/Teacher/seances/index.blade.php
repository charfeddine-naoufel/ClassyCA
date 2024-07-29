@extends('layouts.app')
@section('title', 'Séances')
@section('content')
    <div class="main-content-wrap sidenav-open d-flex flex-column">
        <div class="main-content">
            <div class="breadcrumb">
                <!-- <h1> Lists</h1>
                        <ul>
                            <li><a href="">Apps</a></li>
                            <li>Contacts</li>
                        </ul> -->
            </div>

            <div class="separator-breadcrumb border-top"></div>

            <section class="contact-list">
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div class="card text-left">
                            <div class="card-header text-right bg-transparent">
                                <button type="button" data-toggle="modal" data-target=".modal-add"
                                    class="btn btn-primary btn-md m-1"><i class=" i-Add text-white mr-2"></i> Ajouter Séance</button>
                            </div>
                            <!-- begin::modal add -->
                            <div class="ul-card-list__modal">
                                <div class="modal fade  modal-add " tabindex="-1" role="dialog"
                                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <form method="POST" action="{{route('seances.store')}} " enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group row">
                                                        <label for="nom_off" class="col-sm-2 col-form-label">Titre: </label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control"  placeholder="Titre" name="titre">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="Description"
                                                            class="col-sm-2 col-form-label">Description :</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control"  placeholder="Description" name="description">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="Trimestre"
                                                            class="col-sm-2 col-form-label">URL :</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" 
                                                                    placeholder="URL" name="url">
                                                            </div>
                                                    </div>

                                                   
                                                    <div class="form-group row">
                                                        <label for="Description"
                                                            class="col-sm-2 col-form-label">Cours :</label>
                                                        <div class="col-sm-10">
                                                            <select class="form-control form-control-rounded " name="course_id">
                                                                @foreach ($courses as $course)
                                                                <option value="{{$course->id}}">{{$course->classe->slug}}</option>
                                                                    
                                                                @endforeach
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="Description"
                                                            class="col-sm-2 col-form-label">Chapitre :</label>
                                                        <div class="col-sm-10">
                                                            <select class="form-control form-control-rounded " name="chapitre_id">
                                                                @foreach ($meschapitres as $chapitre)
                                                                <option value="{{$chapitre->id}}">{{$chapitre->titre}}</option>
                                                                    
                                                                @endforeach
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                    

                                                    <div class="form-group row">
                                                        <div class="col-sm-10">

                                                            <button type="submit"
                                                                class="btn btn-success">Enregistrer</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end::modal addd-->
                            <!-- begin::modal update-->
                            <div class="ul-card-list__modal">
                                <div class="modal fade modaledit" id="editModalContent" tabindex="-1" role="dialog"
                                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <form   enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group row">
                                                        <label for="nom_off" class="col-sm-2 col-form-label">Titre: </label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="titre" placeholder="Titre" name="titre">
                                                            <input type="hidden" class="form-control" id="IdSeance" name="IdSeance">

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="Description"
                                                            class="col-sm-2 col-form-label">Description :</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="description"
                                                                placeholder="Description" name="description">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="Trimestre"
                                                            class="col-sm-2 col-form-label">URL :</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="url"
                                                                    placeholder="URL" name="url">
                                                            </div>
                                                    </div>

                                                   
                                                    <div class="form-group row">
                                                        <label for="Description"
                                                            class="col-sm-2 col-form-label">Cours :</label>
                                                        <div class="col-sm-10">
                                                            <select class="form-control form-control-rounded " name="course_id" id="course_id" >
                                                                @foreach ($courses as $course)
                                                                <option value="{{$course->id}}">{{$course->classe->slug}}</option>
                                                                    
                                                                @endforeach
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="Description"
                                                            class="col-sm-2 col-form-label">Chapitre :</label>
                                                        <div class="col-sm-10">
                                                            <select class="form-control form-control-rounded " name="chapitre_id" id="chapitre_id">
                                                                @foreach ($meschapitres as $chapitre)
                                                                <option value="{{$chapitre->id}}">{{$chapitre->titre}}</option>
                                                                    
                                                                @endforeach
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                    

                                                 


                                                    <div class="form-group row">
                                                        <div class="col-sm-10">

                                                            <button type="submit"
                                                                class="btn btn-success updatebtn">Modifier</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end::modal update-->
                            {{-- begin tabs --}}
                            @foreach ($chapitresbyclasses as $key => $chapitres)
                                
                           
                            <div class="row mb-4">


                                <div class="col-md-12 mb-4">
                                    <div class="card text-left">

                                        <div class="card-body">
                                            <h4 class="card-title mb-3">Séances pour la classe : {{$key}}</h4>

                                            <ul class="nav nav-tabs" id="myIconTab" role="tablist">
                                                @foreach ($chapitres as  $chapitre)
                                                    
                                                <li class="nav-item">
                                                    <a class="nav-link {{$loop->iteration ==  1 ? 'active' : ''  }}" id="home-icon-tab{{$chapitre->id}} " data-toggle="tab"
                                                    href="#homeIcon{{$chapitre->id}}" role="tab" aria-controls="homeIcon{{$chapitre->id}}"
                                                    aria-selected="true"><i class="nav-icon i-Business-Mens mr-1"></i><strong>{{$chapitre->titre}} </strong></a>
                                                </li>
                                                
                                                @endforeach
                                            </ul>
                                            <div class="tab-content" id="myIconTabContent"style="border-left: 1px solid #993366;border-right: 1px solid #993366;border-top: 1px solid #993366;border-bottom: 1px solid #993366;">
                                                @foreach ($chapitres as  $chapitre)
                                                    
                                               
                                                <div class="tab-pane fade {{$loop->iteration ==  1 ? 'active show' : ''  }} " id="homeIcon{{$chapitre->id}}" role="tabpanel"
                                                    aria-labelledby="home-icon-tab{{$chapitre->id}}">
                                                    <div class="card-body">

                                                        <div class="table-responsive">
                                                            <div class="card-body">
                                                                <h4 class="card-title mb-3"> Séances du chapitres : <strong>{{$chapitre->titre}}</strong></h4>
                        
                                                                <div class="table-responsive">
                                                                    <table class="table ">
                                                                        <thead class="thead-dark">
                                        
                                                                            <tr>
                                                                                <th scope="col">#</th>
                                                                                <th scope="col">Titre :</th>
                                                                                <th scope="col">Description :</th>
                                                                                <th scope="col">URL :</th>
                                                                                <th scope="col">Cours :</th>
                                                                                
                                        
                                        
                                                                                <th scope="col">Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                        
                                                                            @foreach($chapitre->seances as $seance)
                                                                          
                                                                                                                                                         
                                                                            <tr>
                                                                                <th scope="row">{{$loop->iteration }}</th>
                                                                                <td><strong>{{$seance->titre}} </strong></td>
                                                                                <td>
                                                                                    <strong>
                                        
                                                                                        {{$seance->description}} 
                                                                                    </strong>
                                        
                                                                                </td>
                                                                                <td>
                                                                                    <strong>
                                        
                                                                                        {{$seance->url}}
                                                                                    </strong>
                                        
                                                                                </td>
                                                                                
                                                                                <td>
                                                                                    <strong>
                                        
                                                                                       {{$seance->chapitre->course->matiere->nom_matiere}}--
                                                                                       {{$seance->chapitre->course->classe->slug}}
                                                                                    </strong>
                                        
                                                                                </td>
                                        
                                        
                                                                                <td class="d-flex">
                                                                                    <button class="btn text-success bg-transparent btn-icon  mr-2 editbtn" data-id="{{$seance->id}}"  data-toggle="modal" data-target="#editModalContent" ><i class="nav-icon i-Pen-5 font-weight-bold"></i></button>
                                        
                                                                                    <form action="{{ route('seances.destroy', $seance->id)}}" method="post" class="inline-block">
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
                                                @endforeach
                                        </div>
                                    </div>
                                </div>
                                <!-- end of col -->





                            </div>
                            {{-- end tabs --}}
                            
                        </div>
                        <div class="separator-breadcrumb border-top"></div>
                        @endforeach
                    </div>
                </div>
            </section>

            <!-- content goes here -->


        </div>
        <!-- end of main content -->

        <!-- Footer Start -->
        
        <!-- fotter end -->
    </div>
@endsection
@section('scripts')
<script>
    @if (Session::has('success'))
    
                toastr.success('Nouvelle séance ajoutée avec succes',"Success", {timeOut: 5000});
    
     @elseif(Session::has('Error'))   
     toastr.error('Vérifiez les champs',"Error", {timeOut: 5000});
     @elseif(Session::has('Delete'))   
     toastr.info('Séance supprimée avec succés',"Delete", {timeOut: 5000});

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
                        'La séance a bien été supprimée.',
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

                $.get("seances/" + id + "/edit", function(data) {
                    console.log(data.data);
                    $('#titre').val(data.data['titre']);
                    $('#description').val(data.data['description']);
                    $('#url').val(data.data['url']);
                    $('#course_id').val(data.data['course_id']);
                    $('#chapitre_id').val(data.data['chapitre_id']);
                    $('#IdSeance').val(data.data['id']);



                });




            });
            $('.updatebtn').on('click', function(e) {
                e.preventDefault();
                var titre = $('#titre').val();
                var description = $('#description').val();
                var url = $('#url').val();
                var course_id = $('#course_id').val();
                
                var chapitre_id = $('#chapitre_id').val();
                
                var id = $('#IdSeance').val();
                var URL ="seances/"+ id;
                console.log("id===",id)
                console.log("url===",URL)
                $.ajax({
                    method: "PUT",
                    url: URL,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: { id: id,
                        titre: titre,
                        description: description ,
                        url: url ,
                        course_id: course_id,
                        chapitre_id: chapitre_id },

                    success: function(data) {
                        console.log(data)
                        $('.modaledit').modal('hide');
                        window.location.reload();
                        //  alert('update done')

                    }
                });
            });
         
        });
    </script>
@endsection

