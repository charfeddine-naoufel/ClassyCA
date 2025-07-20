@extends('layouts.app')
@section('title', 'Matieres')
@section('content')
    <div class="main-content-wrap sidenav-open d-flex flex-column">
        <div class="breadcrumb">
            <h1 class="mr-2">Dashboard</h1>
            <ul>
                <li><a href="">Eleves</a></li>
                <!-- <li>Version 1</li> -->
            </ul>
        </div>

        <div class="separator-breadcrumb border-top"></div>

        <div class="row mb-4">

          <div class="col-md-12">
            <div class="card o-hidden mb-4">
                <div class="card-header d-flex align-items-center border-0">
                    <h3 class="w-50 float-left card-title m-0">Elèves</h3>
                    {{-- <div class="dropdown dropleft text-right w-50 float-right">
                        <button type="button" class="btn btn-primary btn-icon m-1" data-toggle="modal"
                            data-target="#verifyModalContent" data-whatever="@mdo" id="toast">
                            <span class="ul-btn__icon"><i class="i-Add"></i></span>
                            <span class="ul-btn__text">Ajouter</span>
                        </button>
                    </div> --}}
                </div>

                <div class="m-3">
                  <div class="table-responsive">
                    <table class="table ">
                        <thead class="thead-dark">
                
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom prenom</th>
                                <th scope="col">الاسم واللقب</th>
                                <th scope="col">Tel1 / Tel2</th>
                                <th scope="col">ville</th>
                                <th scope="col">gouvernorat</th>
                                <th scope="col">Email</th>
                                <th scope="col">Classe</th>
                                <th scope="col">Status</th>
                                <th scope="col">User</th>
                
                
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                
                            @foreach($eleves as $eleve)
                            <tr>
                                <th scope="row">{{$loop->iteration }}</th>
                                
                                <td><strong>{{$eleve->nom_fr}} {{$eleve->prenom_fr}}</strong></td>
                                <td><strong>{{$eleve->nom_ar}} {{$eleve->prenom_ar}}</strong></td>
                                <td><strong>{{$eleve->tel}}<i class="text-10 text-warning i-Telephone"></i> {{$eleve->tel2}}</strong></td>
                                <td><strong>{{$eleve->ville}} </strong></td>
                                <td><strong>{{$eleve->gouvernorat}} </strong></td>
                                <td><strong>{{$eleve->email}} </strong></td>
                                <td><strong>{{$eleve->classe->slug}} </strong></td>
                                <td>
                                    @if($eleve->status=="1")
                                    <span class="badge badge-pill badge-success m-2">Active</span>
                                    @else
                                    <span class="badge badge-pill badge-danger m-2">Inactive</span>
                                    @endif
                                     </td>
                                <td><strong>{{$eleve->user_id}} </strong></td>
                
                
                                <td class="d-flex">
                                    <button class="btn text-success bg-transparent btn-icon  mr-2 editbtn" data-id="{{$eleve->id}}"  data-toggle="modal" data-target="#editModalContent" ><i class="nav-icon i-Pen-5 font-weight-bold"></i></button>
                
                                    <form action="{{ route('eleves.destroy', $eleve->id)}}" method="post" class="inline-block">
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
                        <h5 class="modal-title" id="verifyModalContent_title">Nouvel Elève</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="{{ route('eleves.store') }}" enctype="multipart/form-data">
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
        <div class="modal fade modaledit bd-example-modal-lg" id="editModalContent" tabindex="-1" role="dialog" aria-labelledby="editModalContent"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalContent_title">Modifier Elève</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form enctype="multipart/form-data" id="studentForm">
                      @csrf
                      @method('PUT')
                      <div class="modal-body">
                          <div class="card">
                              <div class="card-body">
                                  <div class="card-body">
                  
                                      <div class="form-row">
                                          <div class="form-group col-md-6">
                                              <label class="ul-form__label">Nom fr:</label>
                                              <input type="text" class="form-control" id="nom_fr" name="nom_fr"/>
                                              <input type="hidden" id="IdStudent" name="IdStudent">
                                              <input type="hidden" id="IdUser" name="IdUser">
                                          </div>
                                          <div class="form-group col-md-6">
                                              <label class="ul-form__label">Prénom fr:</label>
                                              <input type="text" class="form-control" id="prenom_fr" name="prenom_fr"/>
                                          </div>
                                      </div>
                  
                                      <div class="form-row">
                                          <div class="form-group col-md-6">
                                              <label class="ul-form__label">Nom ar:</label>
                                              <input type="text" class="form-control" id="nom_ar" name="nom_ar"/>
                                          </div>
                                          <div class="form-group col-md-6">
                                              <label class="ul-form__label">Prénom ar:</label>
                                              <input type="text" class="form-control" id="prenom_ar" name="prenom_ar"/>
                                          </div>
                                      </div>
                  
                                      <div class="form-row">
                                          <div class="form-group col-md-6">
                                              <label class="ul-form__label">Adresse:</label>
                                              <input type="text" class="form-control" id="adresse" name="adresse"/>
                                          </div>
                                          <div class="form-group col-md-6">
                                              <label class="ul-form__label">Ville:</label>
                                              <input type="text" class="form-control" id="ville" name="ville"/>
                                          </div>
                                      </div>
                  
                                      <div class="form-row">
                                          <div class="form-group col-md-6">
                                              <label class="ul-form__label">Gouvernorat:</label>
                                              <input type="text" class="form-control" id="gouvernorat" name="gouvernorat"/>
                                          </div>
                                          <div class="form-group col-md-6">
                                              <label class="ul-form__label">Date de naissance:</label>
                                              <input type="date" class="form-control" id="date_naiss" name="date_naiss"/>
                                          </div>
                                      </div>
                  
                                      <div class="form-row">
                                          <div class="form-group col-md-6">
                                              <label class="ul-form__label">Genre:</label>
                                              <select class="form-control" id="genre" name="genre">
                                                  <option value="">-- Choisir --</option>
                                                  <option value="M">Garçon</option>
                                                  <option value="F">Fille</option>
                                              </select>
                                          </div>
                                          <div class="form-group col-md-6">
                                              <label class="ul-form__label">Classe:</label>
                                              <select class="form-control" id="classe_id" name="classe_id">
                                                @foreach ($classes as $classe)
                                                <option value="{{$classe->id}}">{{$classe->slug}}</option>
                                                    
                                                @endforeach
                                              </select>
                                          </div>
                                      </div>
                  
                                      <div class="form-row">
                                          <div class="form-group col-md-6">
                                              <label class="ul-form__label">Groupe:</label>
                                              <select class="form-control" id="group_id" name="group_id">
                                                @foreach ($groups as $group)
                                                <option value="{{$group->id}}">{{$group->nomg}}</option>
                                                    
                                                @endforeach
                                              </select>
                                          </div>
                                          <div class="form-group col-md-6">
                                              <label class="ul-form__label">Téléphone 1:</label>
                                              <input type="text" class="form-control" id="tel" name="tel"/>
                                          </div>
                                      </div>
                  
                                      <div class="form-row">
                                          <div class="form-group col-md-6">
                                              <label class="ul-form__label">Téléphone 2:</label>
                                              <input type="text" class="form-control" id="tel2" name="tel2"/>
                                          </div>
                                          <div class="form-group col-md-6">
                                              <label class="ul-form__label">Email:</label>
                                              <input type="email" class="form-control" id="email" name="email"/>
                                          </div>
                                      </div>
                  
                                      <div class="form-row">
                                          <div class="form-group col-md-6">
                                              <label class="ul-form__label">Mot de passe:</label>
                                              <input type="password" class="form-control" id="password" name="password"/>
                                          </div>
                                          <div class="form-group col-md-6">
                                              <label class="ul-form__label">Statut:</label>
                                              <div class="col-sm-10">
                                                  <div class="form-check">
                                                      <input class="form-check-input" type="radio" name="status" id="status1" value="1" checked>
                                                      <label class="form-check-label ml-3" for="status1">Actif</label>
                                                  </div>
                                                  <div class="form-check">
                                                      <input class="form-check-input" type="radio" name="status" id="status0" value="0">
                                                      <label class="form-check-label ml-3" for="status0">Inactif</label>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                  
                                      <!-- Si tu as un champ pour uploader une photo -->
                                      <div class="form-row">
                                          <div class="form-group col-md-6">
                                              <label class="ul-form__label">Photo:</label>
                                              <input type="file" class="form-control-file" id="photo" name="photo"/>
                                          </div>
                                      </div>
                  
                                  </div>
                              </div>
                          </div>
                      </div>
                  
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                          <button type="submit" class="btn btn-primary updatebtn">Enregistrer</button>
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
    
                toastr.success('Nouvel elève ajoutée avec succes',"Success", {timeOut: 5000});
    
     @elseif(Session::has('Error'))   
     toastr.error('Vérifiez les champs',"Error", {timeOut: 5000});
     @elseif(Session::has('delete'))   
     toastr.info('Elève supprimé avec succès',"Suppression", {timeOut: 5000});

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

    $.get("eleves/" + id + "/edit", function(data) {
        console.log(data.data);

        $('#nom_fr').val(data.data['nom_fr']);
        $('#prenom_fr').val(data.data['prenom_fr']);
        $('#nom_ar').val(data.data['nom_ar']);
        $('#prenom_ar').val(data.data['prenom_ar']);
        $('#adresse').val(data.data['adresse']);
        $('#ville').val(data.data['ville']);
        $('#gouvernorat').val(data.data['gouvernorat']);
        $('#tel').val(data.data['tel']);
        $('#tel2').val(data.data['tel2']);
        $('#email').val(data.data['email']);
        $('#password').val(''); // jamais préremplir le password pour sécurité

        $('#date_naiss').val(data.data['date_naiss']);
        $('#genre').val(data.data['genre']);
        $('#classe_id').val(data.data['classe_id']);
        $('#group_id').val(data.data['group_id']);

        // Status
        $("input[name='status'][value='" + data.data['status'] + "']").prop('checked', true);

        $('#IdStudent').val(data.data['id']);
        $('#IdUser').val(data.data['user_id']);
    });
});

$('.updatebtn').on('click', function(e) {
    e.preventDefault();

    var id = $('#IdStudent').val();
    var user_id = $('#IdUser').val();

    var nom_fr = $('#nom_fr').val();
    var prenom_fr = $('#prenom_fr').val();
    var nom_ar = $('#nom_ar').val();
    var prenom_ar = $('#prenom_ar').val();
    var adresse = $('#adresse').val();
    var ville = $('#ville').val();
    var gouvernorat = $('#gouvernorat').val();
    var tel = $('#tel').val();
    var tel2 = $('#tel2').val();
    var email = $('#email').val();
    var password = $('#password').val();
    var date_naiss = $('#date_naiss').val();
    var genre = $('#genre').val();
    var classe_id = $('#classe_id').val();
    var group_id = $('#group_id').val();
    var status = $("input[name='status']:checked").val();

    var URL = "eleves/" + id;

    console.log("URL:", URL);

    $.ajax({
        method: "PUT",
        url: URL,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            nom_fr: nom_fr,
            prenom_fr: prenom_fr,
            nom_ar: nom_ar,
            prenom_ar: prenom_ar,
            adresse: adresse,
            ville: ville,
            gouvernorat: gouvernorat,
            tel: tel,
            tel2: tel2,
            email: email,
            password: password,
            date_naiss: date_naiss,
            genre: genre,
            classe_id: classe_id,
            group_id: group_id,
            status: status,
            user_id: user_id
        },
        success: function(data) {
            console.log(data);
            $('.modaledit').modal('hide');
            window.location.reload();
            toastr.success("Mise à jour de l'élève effectuée avec succès", "Succès", {timeOut: 5000});
        },
        error: function(data) {
            console.log(data);
            toastr.error("Erreur lors de la mise à jour de l'élève", "Erreur", {timeOut: 5000});
        }
    });
});


         
        });
    </script>
@endsection
