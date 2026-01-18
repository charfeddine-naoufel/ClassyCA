@extends('layouts.app')
@section('title', 'Enseignants')
@section('content')
    <div class="main-content-wrap sidenav-open d-flex flex-column">
        <div class="breadcrumb">
            <h1 class="mr-2">Dashboard</h1>
            <ul>
                <li><a href="">Enseignants</a></li>
            </ul>
        </div>

        <div class="separator-breadcrumb border-top"></div>

        <div class="row mb-4">

          <div class="col-md-12">
            <div class="card o-hidden mb-4">
                <div class="card-header d-flex align-items-center border-0">
                    <h3 class="w-50 float-left card-title m-0">Enseignants</h3>
                    <div class="dropdown dropleft text-right w-50 float-right">
                        <button type="button" class="btn btn-primary btn-icon m-1" data-toggle="modal"
                            data-target="#addModal" data-whatever="@mdo" id="toast">
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
                                <th scope="col">Photo</th>
                                <th scope="col">Nom prénom</th>
                                <th scope="col">الاسم واللقب</th>
                                <th scope="col">Spécialité</th>
                                <th scope="col">Tél1 / Tél2</th>
                                <th scope="col">Email</th>
                                <th scope="col">Statut</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($teachers as $teacher)
                            <tr id="teacher-row-{{ $teacher->id }}">
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>
                                    @if($teacher->photo)
                                        <img src="{{ asset('storage/' . $teacher->photo) }}" 
                                             alt="Photo" 
                                             class="rounded-circle" 
                                             width="40" 
                                             height="40"
                                             style="object-fit: cover;">
                                    @else
                                        <div class="avatar-placeholder rounded-circle bg-light d-flex align-items-center justify-content-center" 
                                             style="width: 40px; height: 40px;">
                                            <i class="i-User text-muted" style="font-size: 20px;"></i>
                                        </div>
                                    @endif
                                </td>
                                <td><strong>{{ $teacher->nom_fr }} {{ $teacher->prenom_fr }}</strong></td>
                                <td><strong>{{ $teacher->nom_ar }} {{ $teacher->prenom_ar }}</strong></td>
                                <td><strong>{{ $teacher->specialite }}</strong></td>
                                <td><strong>{{ $teacher->tel }}<i class="text-10 text-warning i-Telephone"></i> {{ $teacher->tel2 }}</strong></td>
                                <td><strong>{{ $teacher->email }}</strong></td>
                                <td>
                                    @if($teacher->status == "1")
                                    <a href="javascript:void(0)" 
                                       class="badge badge-pill badge-success m-2 toggle-status" 
                                       data-id="{{ $teacher->id }}">
                                        Actif
                                    </a>
                                    @else
                                    <a href="javascript:void(0)" 
                                       class="badge badge-pill badge-danger m-2 toggle-status" 
                                       data-id="{{ $teacher->id }}">
                                        Inactif
                                    </a>
                                    @endif
                                </td>
                                <td class="d-flex">
                                    <button class="btn text-success bg-transparent btn-icon mr-2 editbtn" 
                                            data-id="{{ $teacher->id }}"  
                                            data-toggle="modal" 
                                            data-target="#editModal">
                                        <i class="nav-icon i-Pen-5 font-weight-bold"></i>
                                    </button>
                                    <form action="{{ route('enseignants.destroy', $teacher->id)}}" method="post" class="inline-block">
                                      @csrf
                                      @method('DELETE')
                                      
                                      <button class="btn text-danger  btn-icon  mr-2 alert-confirm"   ><i class="nav-icon i-Close-Window font-weight-bold"></i></i></button>
              
                                  </form>
                                    {{-- <button class="btn text-danger btn-icon mr-2 delete-btn" 
                                            data-id="{{ $teacher->id }}">
                                        <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                    </button> --}}
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

        <!-- Modal Ajouter -->
        <div class="modal fade bd-example-modal-lg" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Nouvel Enseignant</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="{{ route('enseignants.store') }}" enctype="multipart/form-data" id="addForm">
                        @csrf
                        <div class="modal-body">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-body">
                  
                                        <div class="form-row ">
                                            <div class="form-group col-md-6">
                                                <label for="add_nom_fr" class="ul-form__label">Nom fr:</label>
                                                <input type="text" class="form-control" id="add_nom_fr" name="nom_fr" required/>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="add_prenom_fr" class="ul-form__label">Prénom fr:</label>
                                                <input type="text" class="form-control" id="add_prenom_fr" name="prenom_fr" required/>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="add_nom_ar" class="ul-form__label">Nom ar:</label>
                                                <input type="text" class="form-control" id="add_nom_ar" name="nom_ar"/>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="add_prenom_ar" class="ul-form__label">Prénom ar:</label>
                                                <input type="text" class="form-control" id="add_prenom_ar" name="prenom_ar" />
                                            </div>
                                        </div>
                  
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="add_specialite" class="ul-form__label">Spécialité:</label>
                                                <input type="text" class="form-control" id="add_specialite" name="specialite" required/>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="add_adresse" class="ul-form__label">Adresse:</label>
                                                <div class="input-right-icon">
                                                    <input type="text" class="form-control" id="add_adresse" name="adresse"/>
                                                </div>
                                            </div>
                                        </div>
                  
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="add_tel" class="ul-form__label">Téléphone 1:</label>
                                                <input type="text" class="form-control" id="add_tel" name="tel" required/>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="add_tel2" class="ul-form__label">Téléphone 2:</label>
                                                <div class="input-right-icon">
                                                    <input type="text" class="form-control" id="add_tel2" name="tel2"/>
                                                </div>
                                            </div>
                                        </div>
                  
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="add_email" class="ul-form__label">Email:</label>
                                                <input type="email" class="form-control" id="add_email" name="email" required/>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="add_password" class="ul-form__label">Mot de passe:</label>
                                                <div class="input-right-icon">
                                                    <input type="password" class="form-control" id="add_password" name="password" required/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="add_photo" class="ul-form__label">Photo:</label>
                                                <input type="file" class="form-control-file" id="add_photo" name="photo" accept="image/*">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="ul-form__label">Statut:</label>
                                                <div class="col-sm-10">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="status" id="add_status_1" value="1" checked>
                                                        <label class="form-check-label ml-3" for="add_status_1">
                                                            Actif
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="status" id="add_status_0" value="0">
                                                        <label class="form-check-label ml-3" for="add_status_0">
                                                            Inactif
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                  
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="add_bio" class="ul-form__label">Bio:</label>
                                                <textarea class="form-control form-control-rounded" placeholder="Biographie..." name="bio" id="add_bio" cols="30" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary" id="addBtn">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Modifier -->
        <div class="modal fade bd-example-modal-lg" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Modifier Enseignant</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form enctype="multipart/form-data" id="editForm">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-body">
                  
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label class="ul-form__label">Nom fr:</label>
                                                <input type="text" class="form-control" id="edit_nom_fr" name="nom_fr"/>
                                                <input type="hidden" id="edit_id" name="id">
                                                <input type="hidden" id="edit_user_id" name="user_id">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="ul-form__label">Prénom fr:</label>
                                                <input type="text" class="form-control" id="edit_prenom_fr"  name="prenom_fr"/>
                                            </div>
                                        </div>
                  
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label class="ul-form__label">Nom ar:</label>
                                                <input type="text" class="form-control" id="edit_nom_ar" name="nom_ar"/>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="ul-form__label">Prénom ar:</label>
                                                <input type="text" class="form-control" id="edit_prenom_ar" name="prenom_ar"/>
                                            </div>
                                        </div>
                  
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label class="ul-form__label">Spécialité:</label>
                                                <input type="text" class="form-control" id="edit_specialite" name="specialite"/>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="ul-form__label">Adresse:</label>
                                                <input type="text" class="form-control" id="edit_adresse" name="adresse"/>
                                            </div>
                                        </div>
                  
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label class="ul-form__label">Téléphone 1:</label>
                                                <input type="text" class="form-control" id="edit_tel" name="tel"/>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="ul-form__label">Téléphone 2:</label>
                                                <input type="text" class="form-control" id="edit_tel2" name="tel2"/>
                                            </div>
                                        </div>
                  
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label class="ul-form__label">Email:</label>
                                                <input type="email" class="form-control" id="edit_email" name="email"/>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="ul-form__label">Mot de passe:</label>
                                                <input type="password" class="form-control" id="edit_password" name="password" placeholder="Laisser vide pour ne pas changer"/>
                                            </div>
                                        </div>
                  
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label class="ul-form__label">Photo:</label>
                                                <input type="file" class="form-control-file" id="edit_photo" name="photo"/>
                                                <div class="mt-2" id="current_photo_preview"></div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="ul-form__label">Statut:</label>
                                                <div class="col-sm-10">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="status" id="edit_status_1" value="1">
                                                        <label class="form-check-label ml-3" for="edit_status_1">Actif</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="status" id="edit_status_0" value="0">
                                                        <label class="form-check-label ml-3" for="edit_status_0">Inactif</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                  
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label class="ul-form__label">Bio:</label>
                                                <textarea class="form-control form-control-rounded" placeholder="Biographie..." name="bio" id="edit_bio" cols="30" rows="3"></textarea>
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
        
    </div>
@endsection

@section('scripts')
<script>
    @if (Session::has('success'))
        toastr.success('Nouvel enseignant ajouté avec succès',"Success", {timeOut: 5000});
    @elseif(Session::has('Error'))   
        toastr.error('Vérifiez les champs',"Error", {timeOut: 5000});
    @elseif(Session::has('delete'))   
        toastr.info('Enseignant supprimé avec succès',"Suppression", {timeOut: 5000});
    @endif
</script>
<script src="{{asset('assets/js/vendor/sweetalert2.min.js')}}"></script>
    <script src="{{asset('assets/js/sweetalert.script.js')}}"></script>
<script>
    $(document).ready(function() {
        
        // ---------- AJOUT ----------
        $('#addForm').on('submit', function(e) {
            e.preventDefault();
            
            var formData = new FormData(this);
            $('#addBtn').prop('disabled', true).html('<i class="i-Loading-Refresh"></i> Ajout...');
            
            $.ajax({
                url: '{{ route("enseignants.store") }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.success) {
                        toastr.success(response.message, "Succès", {timeOut: 5000});
                        $('#addModal').modal('hide');
                        $('#addForm')[0].reset();
                        setTimeout(function() {
                            location.reload();
                        }, 1500);
                    } else {
                        toastr.error(response.message, "Erreur", {timeOut: 5000});
                    }
                    $('#addBtn').prop('disabled', false).html('Enregistrer');
                },
                error: function(xhr) {
                    $('#addBtn').prop('disabled', false).html('Enregistrer');
                    
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;
                        var errorMessage = '';
                        
                        $.each(errors, function(key, value) {
                            errorMessage += value[0] + '\n';
                        });
                        
                        toastr.error(errorMessage, "Erreur de validation", {timeOut: 5000});
                    } else {
                        toastr.error("Une erreur est survenue lors de l'ajout", "Erreur", {timeOut: 5000});
                    }
                }
            });
        });

        // ---------- ÉDITION ----------
        $('.editbtn').on('click', function(e) {
            e.preventDefault();
            let id = $(this).data('id');
            console.log("ID enseignant pour édition:", id);
            
            // Réinitialiser le formulaire d'abord
            $('#editForm')[0].reset();
            $('#current_photo_preview').empty();
            
            // Appel AJAX pour récupérer les données
            $.ajax({
                url: "enseignants/" + id + "/edit",
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    console.log("Réponse complète API:", response);
                    
                    // Vérifier si la requête a réussi
                    if (response.success) {
                        var teacher = response.data;
                        console.log("Données de l'enseignant:", teacher);
                        
                        // Remplir les champs cachés
                        $('#edit_id').val(teacher.id);
                        $('#edit_user_id').val(teacher.user_id);
                        
                        // Remplir les champs du formulaire
                        $('#edit_nom_fr').val(teacher.nom_fr || '');
                        $('#edit_prenom_fr').val(teacher.prenom_fr || '');
                        $('#edit_nom_ar').val(teacher.nom_ar || '');
                        $('#edit_prenom_ar').val(teacher.prenom_ar || '');
                        $('#edit_specialite').val(teacher.specialite || '');
                        $('#edit_adresse').val(teacher.adresse || '');
                        $('#edit_tel').val(teacher.tel || '');
                        $('#edit_tel2').val(teacher.tel2 || '');
                        $('#edit_email').val(teacher.email || '');
                        $('#edit_bio').val(teacher.bio || '');
                        
                        // Gérer le statut
                        console.log("Statut reçu:", teacher.status, "Type:", typeof teacher.status);
                        if (teacher.status == "1" || teacher.status == 1) {
                            $('#edit_status_1').prop('checked', true);
                            console.log("Statut défini à: Actif");
                        } else {
                            $('#edit_status_0').prop('checked', true);
                            console.log("Statut défini à: Inactif");
                        }
                        
                        // Photo
                        if (teacher.photo) {
                            $('#current_photo_preview').html(
                                '<p class="mb-1"><small>Photo actuelle:</small></p>' +
                                '<img src="/storage/' + teacher.photo + '" alt="Photo" class="img-thumbnail" style="max-width: 150px;">'
                            );
                        }
                        
                        // Afficher le modal
                        $('#editModal').modal('show');
                        
                        // Log de vérification
                        setTimeout(function() {
                            console.log("Vérification après remplissage:");
                            console.log("Nom fr:", $('#edit_nom_fr').val());
                            console.log("Prénom fr:", $('#edit_prenom_fr').val());
                            console.log("Email:", $('#edit_email').val());
                        }, 100);
                        
                    } else {
                        toastr.error(response.message || "Erreur lors du chargement", "Erreur", {timeOut: 5000});
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Erreur AJAX:", xhr.responseText);
                    console.error("Status:", status);
                    console.error("Error:", error);
                    
                    // Essayer de parser la réponse pour obtenir un message d'erreur
                    var errorMsg = "Impossible de charger les données";
                    try {
                        var jsonResponse = JSON.parse(xhr.responseText);
                        errorMsg = jsonResponse.message || errorMsg;
                    } catch(e) {
                        // Si ce n'est pas du JSON, utiliser le texte brut
                        if (xhr.responseText) {
                            errorMsg = xhr.responseText.substring(0, 100);
                        }
                    }
                    
                    toastr.error(errorMsg, "Erreur", {timeOut: 5000});
                }
            });
        });
        // ---------- CHANGEMENT DE STATUT ----------
$(document).on('click', '.toggle-status', function() {
    var teacherId = $(this).data('id');
    var badge = $(this);
    var button = $(this);
    
    // Désactiver temporairement le bouton
    button.prop('disabled', true);
    
    console.log("Changement de statut pour l'enseignant ID:", teacherId);
    
    $.ajax({
        url: 'enseignants/' + teacherId + '/toggle-status',
        method: 'POST',
        data: {
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            console.log("Réponse toggle-status:", response);
            
            if (response.success) {
                // Mettre à jour le badge
                if (response.status == "1" || response.status == 1) {
                    badge.removeClass('badge-danger').addClass('badge-success');
                    badge.text('Actif');
                } else {
                    badge.removeClass('badge-success').addClass('badge-danger');
                    badge.text('Inactif');
                }
                
                toastr.success(response.message, 'Succès', {timeOut: 3000});
            } else {
                toastr.error(response.message, 'Erreur', {timeOut: 5000});
            }
            
            // Réactiver le bouton
            button.prop('disabled', false);
        },
        error: function(xhr, status, error) {
            console.error("Erreur toggle-status:", xhr.responseText);
            
            // Essayer de parser le message d'erreur
            var errorMsg = "Erreur lors du changement de statut";
            try {
                var jsonResponse = JSON.parse(xhr.responseText);
                errorMsg = jsonResponse.message || errorMsg;
            } catch(e) {
                if (xhr.responseText) {
                    errorMsg = xhr.responseText.substring(0, 100);
                }
            }
            
            toastr.error(errorMsg, 'Erreur', {timeOut: 5000});
            button.prop('disabled', false);
        }
    });
});
        // ---------- MISE À JOUR ----------
        $('#editForm').on('submit', function(e) {
            e.preventDefault();
            
            var id = $('#edit_id').val();
            if (!id) {
                toastr.error("ID enseignant manquant", "Erreur", {timeOut: 5000});
                return;
            }
            
            var formData = new FormData(this);
            formData.append('_method', 'PUT');
            
            $('.updatebtn').prop('disabled', true).html('<i class="i-Loading-Refresh"></i> Enregistrement...');
            
            $.ajax({
                url: "enseignants/" + id,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log("Réponse mise à jour:", response);
                    if (response.success) {
                        toastr.success(response.message, "Succès", {timeOut: 5000});
                        
                        // Mettre à jour la ligne dans le tableau
                        if (response.teacher) {
                            updateTeacherRow(id, response.teacher);
                        }
                        
                        $('#editModal').modal('hide');
                    } else {
                        toastr.error(response.message, "Erreur", {timeOut: 5000});
                    }
                    $('.updatebtn').prop('disabled', false).html('Enregistrer');
                },
                error: function(xhr) {
                    $('.updatebtn').prop('disabled', false).html('Enregistrer');
                    
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;
                        var errorMessage = '';
                        
                        $.each(errors, function(key, value) {
                            errorMessage += value[0] + '\n';
                        });
                        
                        toastr.error(errorMessage, "Erreur de validation", {timeOut: 5000});
                    } else if (xhr.responseJSON && xhr.responseJSON.message) {
                        toastr.error(xhr.responseJSON.message, "Erreur", {timeOut: 5000});
                    } else {
                        toastr.error("Erreur lors de la mise à jour", "Erreur", {timeOut: 5000});
                    }
                }
            });
        });

        // ---------- SUPPRESSION ----------
        $('.delete-btn').on('click', function(e) {
            e.preventDefault();
            var teacherId = $(this).data('id');
            var teacherName = $(this).closest('tr').find('td:nth-child(3)').text();
            var button = $(this);
            
            // Utiliser SweetAlert2 s'il est disponible, sinon confirm() natif
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    title: 'Êtes-vous sûr?',
                    text: "Supprimer l'enseignant : " + teacherName,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Oui, supprimer!',
                    cancelButtonText: 'Annuler'
                }).then((result) => {
                    if (result.isConfirmed) {
                        deleteTeacher(teacherId, button);
                    }
                });
            } else {
                if (confirm('Êtes-vous sûr de vouloir supprimer l\'enseignant : ' + teacherName + ' ?')) {
                    deleteTeacher(teacherId, button);
                }
            }
        });

        function deleteTeacher(teacherId, button) {
            button.prop('disabled', true).html('<i class="i-Loading-Refresh"></i>');
            
            $.ajax({
                url: "enseignants/" + teacherId,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response && response.success) {
                        toastr.success(response.message || "Enseignant supprimé", "Succès", {timeOut: 5000});
                        
                        // Supprimer la ligne du tableau
                        var row = $('#teacher-row-' + teacherId);
                        row.fadeOut(300, function() {
                            $(this).remove();
                            updateRowNumbers();
                        });
                    } else {
                        toastr.error(response ? response.message : "Erreur de suppression", "Erreur", {timeOut: 5000});
                        button.prop('disabled', false).html('<i class="i-Close-Window"></i>');
                    }
                },
                error: function(xhr) {
                    console.error("Erreur suppression:", xhr);
                    toastr.error("Impossible de supprimer l'enseignant", "Erreur", {timeOut: 5000});
                    button.prop('disabled', false).html('<i class="i-Close-Window"></i>');
                }
            });
        }

        // ---------- FONCTIONS UTILITAIRES ----------
        function updateTeacherRow(id, teacher) {
            var row = $('#teacher-row-' + id);
            
            if (row.length === 0) {
                console.warn("Ligne non trouvée pour l'ID:", id);
                return;
            }
            
            // Photo
            var photoCell = row.find('td:nth-child(2)');
            if (teacher.photo) {
                photoCell.html(
                    '<img src="/storage/' + teacher.photo + '" class="rounded-circle" width="40" height="40" style="object-fit: cover;">'
                );
            } else {
                photoCell.html(
                    '<div class="avatar-placeholder rounded-circle bg-light d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">' +
                    '<i class="i-User text-muted" style="font-size: 20px;"></i>' +
                    '</div>'
                );
            }
            
            // Données
            row.find('td:nth-child(3)').text(teacher.nom_fr + ' ' + teacher.prenom_fr);
            row.find('td:nth-child(4)').text(teacher.nom_ar + ' ' + teacher.prenom_ar);
            row.find('td:nth-child(5)').text(teacher.specialite);
            row.find('td:nth-child(6)').html(teacher.tel + '<i class="text-10 text-warning i-Telephone"></i> ' + (teacher.tel2 || ''));
            row.find('td:nth-child(7)').text(teacher.email);
            
            // Statut
            var statusCell = row.find('td:nth-child(8) a');
            if (teacher.status == "1" || teacher.status == 1) {
                statusCell.removeClass('badge-danger').addClass('badge-success').text('Actif');
            } else {
                statusCell.removeClass('badge-success').addClass('badge-danger').text('Inactif');
            }
        }

        function updateRowNumbers() {
            $('tbody tr').each(function(index) {
                $(this).find('th:first').text(index + 1);
            });
        }

        // Nettoyage des modals
        $('#addModal, #editModal').on('hidden.bs.modal', function() {
            $(this).find('form')[0].reset();
            $('#addBtn, .updatebtn').prop('disabled', false).html('Enregistrer');
            $('#current_photo_preview').empty();
        });
    });
</script>

<style>
.avatar-placeholder {
    border: 1px solid #dee2e6;
}
.img-thumbnail {
    max-height: 150px;
    object-fit: cover;
}
</style>
@endsection