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
                            <button type="button" class="btn btn-primary btn-icon m-1" data-toggle="modal"
                                data-target="#verifyModalContent" data-whatever="@mdo" id="toast">
                                <span class="ul-btn__icon"><i class="i-Add"></i></span>
                                <span class="ul-btn__text">Ajouter</span>
                            </button>
                        </div>

                        <p>
                            Vous pouvez créer, mettre à jour ou supprimer un Enseignant.

                        </p>
                        <div class="table-responsive">
                            <table class="table ">
                                <thead class="thead-dark">

                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nom prenom</th>
                                        <th scope="col">الاسم واللقب</th>
                                        <th scope="col">Spécialité</th>
                                        <th scope="col">Adresse</th>
                                        <th scope="col">Tel1 / Tel2</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Cours</th>
                                        <th scope="col">Status</th>


                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($enseignants as $enseignant)
                                    <tr>
                                        <th scope="row">{{$loop->iteration }}</th>
                                        
                                        <td><strong>{{$enseignant->nom_fr}} {{$enseignant->prenom_fr}}</strong></td>
                                        <td><strong>{{$enseignant->nom_ar}} {{$enseignant->prenom_ar}}</strong></td>
                                        <td><strong>{{$enseignant->specialite}} </strong></td>
                                        <td><strong>{{$enseignant->adresse}} </strong></td>
                                        <td><strong>{{$enseignant->tel}}<i class="text-10 text-warning i-Telephone"></i> {{$enseignant->tel2}}</strong></td>
                                        <td><strong>{{$enseignant->email}} </strong></td>
                                        <td><strong>{{$enseignant->bio}} </strong></td>
                                        <td>
                                            @if($enseignant->status=="1")
                                            <span class="badge badge-pill badge-success m-2">Active</span>
                                            @else
                                            <span class="badge badge-pill badge-danger m-2">Inactive</span>
                                            @endif
                                             </td>
                                        <td><strong>cours </strong></td>


                                        <td class="d-flex">
                                            <button class="btn text-success bg-transparent btn-icon  mr-2 editbtn" data-id="{{$enseignant->id}}"  data-toggle="modal" data-target="#editModalContent" ><i class="nav-icon i-Pen-5 font-weight-bold"></i></button>

                                            <form action="{{ route('enseignants.destroy', $enseignant->id)}}" method="post" class="inline-block">
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
        <div class="modal fade bd-example-modal-lg" id="verifyModalContent" tabindex="-1" role="dialog" aria-labelledby="verifyModalContent"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="verifyModalContent_title">Nouvel Enseignant</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="{{ route('enseignants.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">

                            <div class="card">
                                <div class="card-body">
                                  
                                    <div class="card-body">
                                      {{-- <div class="card-title">Enseignant Info</div> --}}
              
                                      <div class="form-row ">
                                        <div class="form-group col-md-6">
                                          <label for="inputtext11" class="ul-form__label">Nom fr:</label>
                                          <input type="text" class="form-control" id="inputtext11" name="nom_fr"/>
                                        </div>
                                        <div class="form-group col-md-6">
                                          <label for="inputEmail12" class="ul-form__label">Prénom fr:</label>
                                          <input type="text" class="form-control" id="inputEmail12" name="prenom_fr"/>
                                        </div>
                                      </div>
                                      <div class="form-row">
                                        <div class="form-group col-md-6">
                                          <label for="inputtext11" class="ul-form__label">Nom ar:</label>
                                          <input type="text" class="form-control" id="inputtext11" name="nom_ar"/>
                                        </div>
                                        <div class="form-group col-md-6">
                                          <label for="inputEmail12" class="ul-form__label">Prénom ar:</label>
                                          <input type="text" class="form-control" id="inputEmail12" name="prenom_ar" />
                                        </div>
                                      </div>
              
                                      {{-- <div class="custom-separator"></div> --}}
              
                                      <div class="form-row">
                                        <div class="form-group col-md-6">
                                          <label for="inputtext14" class="ul-form__label">Spécialité:</label>
                                          <input type="text" class="form-control" id="inputtext14"name="specialite" />
                                        </div>
                                        <div class="form-group col-md-6">
                                          <label for="inputEmail15" class="ul-form__label">Adresse:</label>
                                          <div class="input-right-icon">
                                            <input type="text" class="form-control" id="inputEmail15" name="adresse"/>
                                          </div>
                                        </div>
                                      </div>
                                      {{-- <div class="custom-separator"></div> --}}
              
                                      <div class="form-row">
                                        <div class="form-group col-md-6">
                                          <label for="inputtext14" class="ul-form__label">Télephone 1:</label>
                                          <input type="text" class="form-control" id="inputtext14" name="tel" />
                                        </div>
                                        <div class="form-group col-md-6">
                                          <label for="inputEmail15" class="ul-form__label">Télephone 2:</label>
                                          <div class="input-right-icon">
                                            <input type="text" class="form-control" id="inputEmail15" name="tel2"/>
                                          </div>
                                        </div>
                                      </div>
                                      {{-- <div class="custom-separator"></div> --}}
              
                                      <div class="form-row">
                                        <div class="form-group col-md-6">
                                          <label for="inputtext14" class="ul-form__label">Email:</label>
                                          <input type="text" class="form-control" id="inputtext14" name="email" />
                                        </div>
                                        <div class="form-group col-md-6">
                                          <label for="inputEmail15" class="ul-form__label">Password:</label>
                                          <div class="input-right-icon">
                                            <input type="text" class="form-control" id="inputEmail15"name="password" />
                                          </div>
                                        </div>
                                      </div>
                                      <div class="form-row">
                                        <div class="form-group col-md-6">
                                          <label for="inputtext14" class="ul-form__label">Photo:</label>
                                          <input type="file" class="form-control-file" id="photo" name="photo">                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail15" class="ul-form__label">Status:</label>
                                            <div class="col-sm-10">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="status" id="gridRadios1" value="1" checked>
                                                    <label class="form-check-label ml-3" for="gridRadios1">
                                                        Active
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="status" id="gridRadios2" value="0">
                                                    <label class="form-check-label ml-3" for="gridRadios2">
                                                        Inactive
                                                    </label>
                                                </div>
                                                
                                            </div>
                                          </div>
                                      </div>
              
                                      {{-- <div class="custom-separator"></div> --}}
              
                                      <div class="form-row">
                                        <div class="form-group col-md-12">
                                          <label for="inputtext14" class="ul-form__label">Bio:</label>
                                          <textarea class="form-control form-control-rounded" placeholder="Type your message" name="bio" id="message" cols="30" rows="3"></textarea>                                        </div>
                                       
              
                                        
                                      </div>
                                    </div>
                                 
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
                        <h5 class="modal-title" id="editModalContent_title">Modifier Classe</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form enctype="multipart/form-data" id="myform">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">

                            <div class="card">
                                <div class="card-body">
                                  
                                    <div class="card-body">
                                      {{-- <div class="card-title">Enseignant Info</div> --}}
              
                                      <div class="form-row ">
                                        <div class="form-group col-md-6">
                                          <label for="inputtext11" class="ul-form__label">Nom fr:</label>
                                          <input type="text" class="form-control" id="nom_fr" name="nom_fr"/>
                                          <input type="hidden" class="form-control" id="IdEnseignant" name="IdEnseignant">
                                          <input type="hidden" class="form-control" id="IdUser" name="IdUser">
                                        </div>
                                        <div class="form-group col-md-6">
                                          <label for="inputEmail12" class="ul-form__label">Prénom fr:</label>
                                          <input type="text" class="form-control" id="prenom_fr" name="prenom_fr"/>
                                        </div>
                                      </div>
                                      <div class="form-row">
                                        <div class="form-group col-md-6">
                                          <label for="inputtext11" class="ul-form__label">Nom ar:</label>
                                          <input type="text" class="form-control" id="nom_ar" name="nom_ar"/>
                                        </div>
                                        <div class="form-group col-md-6">
                                          <label for="inputEmail12" class="ul-form__label">Prénom ar:</label>
                                          <input type="text" class="form-control" id="prenom_ar" name="prenom_ar" />
                                        </div>
                                      </div>
              
                                      {{-- <div class="custom-separator"></div> --}}
              
                                      <div class="form-row">
                                        <div class="form-group col-md-6">
                                          <label for="inputtext14" class="ul-form__label">Spécialité:</label>
                                          <input type="text" class="form-control" id="specialite"name="specialite" />
                                        </div>
                                        <div class="form-group col-md-6">
                                          <label for="inputEmail15" class="ul-form__label">Adresse:</label>
                                          <div class="input-right-icon">
                                            <input type="text" class="form-control" id="adresse" name="adresse"/>
                                          </div>
                                        </div>
                                      </div>
                                      {{-- <div class="custom-separator"></div> --}}
              
                                      <div class="form-row">
                                        <div class="form-group col-md-6">
                                          <label for="inputtext14" class="ul-form__label">Télephone 1:</label>
                                          <input type="text" class="form-control" id="tel" name="tel" />
                                        </div>
                                        <div class="form-group col-md-6">
                                          <label for="inputEmail15" class="ul-form__label">Télephone 2:</label>
                                          <div class="input-right-icon">
                                            <input type="text" class="form-control" id="tel2" name="tel2"/>
                                          </div>
                                        </div>
                                      </div>
                                      {{-- <div class="custom-separator"></div> --}}
              
                                      <div class="form-row">
                                        <div class="form-group col-md-6">
                                          <label for="inputtext14" class="ul-form__label">Email:</label>
                                          <input type="text" class="form-control" id="email" name="email" />
                                        </div>
                                        <div class="form-group col-md-6">
                                          <label for="inputEmail15" class="ul-form__label">Password:</label>
                                          <div class="input-right-icon">
                                            <input type="text" class="form-control" id="password"name="password" />
                                          </div>
                                        </div>
                                      </div>
                                      <div class="form-row">
                                        <div class="form-group col-md-6">
                                          <label for="inputtext14" class="ul-form__label">Photo:</label>
                                          <input type="file" class="form-control-file" id="photo" name="photo">                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail15" class="ul-form__label">Status:</label>
                                            <div class="col-sm-10">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="status" id="status1" value="1" checked>
                                                    <label class="form-check-label ml-3" for="gridRadios1">
                                                        Active
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="status" id="status0" value="0">
                                                    <label class="form-check-label ml-3" for="gridRadios2">
                                                        Inactive
                                                    </label>
                                                </div>
                                                
                                            </div>
                                          </div>
                                      </div>
              
                                      {{-- <div class="custom-separator"></div> --}}
              
                                      <div class="form-row">
                                        <div class="form-group col-md-12">
                                          <label for="inputtext14" class="ul-form__label">Bio:</label>
                                          <textarea class="form-control form-control-rounded" placeholder="Type your message" name="bio" id="bio" cols="30" rows="3"></textarea>                                        </div>
                                       
              
                                        
                                      </div>
                                    </div>
                                 
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
    
                toastr.success('Nouveau Enseignant ajouté avec succes',"Success", {timeOut: 5000});
    
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
                        'L enseignant a bien été supprimé.',
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

                $.get("enseignants/" + id + "/edit", function(data) {
                    console.warn(data.data);
                    $('#nom_fr').val(data.data['nom_fr']);
                    $('#nom_ar').val(data.data['nom_ar']);
                    $('#prenom_fr').val(data.data['prenom_fr']);
                    $('#prenom_ar').val(data.data['prenom_ar']);
                    $('#specialite').val(data.data['specialite']);
                    $('#adresse').val(data.data['adresse']);
                    $('#tel').val(data.data['tel']);
                    $('#tel2').val(data.data['tel2']);
                    $('#email').val(data.data['email']);
                    $('#password').val(data.data['password']);
                    $('#status').val(data.data['status']);
                    $('#bio').val(data.data['bio']);
                    $('#IdEnseignant').val(data.data['id']);
                    $('#IdUser').val(data.data['user_id']);



                });




            });
            $('.updatebtn').on('click', function(e) {
                e.preventDefault();
                var nom_fr = $('#nom_fr').val();
                var nom_ar = $('#nom_ar').val();
                var prenom_fr = $('#prenom_fr').val();
                var prenom_ar = $('#prenom_ar').val();
                var specialite = $('#specialite').val();
                var adresse = $('#adresse').val();
                var tel = $('#tel').val();
                var tel2 = $('#tel2').val();
                var email = $('#email').val();
                var password = $('#password').val();
                // var photo = $('#photo').val();
                var bio = $('#bio').val();
                var id = $('#IdEnseignant').val();
                var user_id = $('#IdUser').val();
                
                var status =$("#myform input[type='radio']:checked").val();
                var URL ="enseignants/"+ id;
                console.log("url===",URL)
                $.ajax({
                    method: "PUT",
                    url: URL,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: { id: id,
                        nom_fr: nom_fr,
                        prenom_fr: prenom_fr,
                        nom_ar: nom_ar,
                        prenom_ar: prenom_ar,
                        specialite: specialite,
                        adresse: adresse,
                        tel: tel,
                        email : email,
                        password : password ,
                        // photo : photo ,
                        status : status ,
                        bio : bio ,
                        user_id :user_id
                        
                    },

                    success: function(data) {
                      console.log(data)
                        $('.modaledit').modal('hide');
                        window.location.reload();
                        toastr.success("Mise à jour de l'enseignant effectuée avec succes","Success", {timeOut: 5000});

                        //  alert('update done')

                    },
                    error:function(data){
                      console.log(data)
                    }
                });
            });
         
        });
    </script>
@endsection
