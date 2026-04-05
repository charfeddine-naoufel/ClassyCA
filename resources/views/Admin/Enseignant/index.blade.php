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
                                data-target="#addModal">
                                <span class="ul-btn__icon"><i class="i-Add"></i></span>
                                <span class="ul-btn__text">Ajouter</span>
                            </button>
                        </div>
                    </div>

                    <div class="m-3">
                        <div class="table-responsive">
                            <table class="table">
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
                                        <td><strong>{{ $teacher->tel }} <i class="text-10 text-warning i-Telephone"></i> {{ $teacher->tel2 }}</strong></td>
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
                                            <form action="{{ route('enseignants.destroy', $teacher->id) }}" method="post" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn text-danger btn-icon mr-2 alert-confirm">
                                                    <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                                </button>
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

        <!-- Modal Ajouter (soumission standard) -->
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
                    <form method="post" action="{{ route('enseignants.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="add_nom_fr">Nom fr:</label>
                                            <input type="text" class="form-control" id="add_nom_fr" name="nom_fr" required/>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="add_prenom_fr">Prénom fr:</label>
                                            <input type="text" class="form-control" id="add_prenom_fr" name="prenom_fr" required/>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="add_nom_ar">Nom ar:</label>
                                            <input type="text" class="form-control" id="add_nom_ar" name="nom_ar"/>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="add_prenom_ar">Prénom ar:</label>
                                            <input type="text" class="form-control" id="add_prenom_ar" name="prenom_ar"/>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="add_specialite">Spécialité:</label>
                                            <input type="text" class="form-control" id="add_specialite" name="specialite" required/>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="add_adresse">Adresse:</label>
                                            <input type="text" class="form-control" id="add_adresse" name="adresse"/>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="add_tel">Téléphone 1:</label>
                                            <input type="text" class="form-control" id="add_tel" name="tel" required/>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="add_tel2">Téléphone 2:</label>
                                            <input type="text" class="form-control" id="add_tel2" name="tel2"/>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="add_email">Email:</label>
                                            <input type="email" class="form-control" id="add_email" name="email" required/>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="add_password">Mot de passe:</label>
                                            <input type="password" class="form-control" id="add_password" name="password" required/>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="add_photo">Photo:</label>
                                            <input type="file" class="form-control-file" id="add_photo" name="photo" accept="image/*">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Statut:</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status" id="add_status_1" value="1" checked>
                                                <label class="form-check-label ml-3" for="add_status_1">Actif</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status" id="add_status_0" value="0">
                                                <label class="form-check-label ml-3" for="add_status_0">Inactif</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="add_bio">Bio:</label>
                                            <textarea class="form-control" name="bio" id="add_bio" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Modifier (soumission standard, chargement AJAX) -->
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
                    <form method="POST" enctype="multipart/form-data" id="editForm">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="card">
                                <div class="card-body">
                                    <input type="hidden" id="edit_id" name="id">
                                    <input type="hidden" id="edit_user_id" name="user_id">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Nom fr:</label>
                                            <input type="text" class="form-control" id="edit_nom_fr" name="nom_fr" required/>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Prénom fr:</label>
                                            <input type="text" class="form-control" id="edit_prenom_fr" name="prenom_fr" required/>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Nom ar:</label>
                                            <input type="text" class="form-control" id="edit_nom_ar" name="nom_ar"/>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Prénom ar:</label>
                                            <input type="text" class="form-control" id="edit_prenom_ar" name="prenom_ar"/>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Spécialité:</label>
                                            <input type="text" class="form-control" id="edit_specialite" name="specialite" required/>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Adresse:</label>
                                            <input type="text" class="form-control" id="edit_adresse" name="adresse"/>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Téléphone 1:</label>
                                            <input type="text" class="form-control" id="edit_tel" name="tel" required/>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Téléphone 2:</label>
                                            <input type="text" class="form-control" id="edit_tel2" name="tel2"/>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Email:</label>
                                            <input type="email" class="form-control" id="edit_email" name="email" required/>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Mot de passe:</label>
                                            <input type="password" class="form-control" id="edit_password" name="password" placeholder="Laisser vide pour ne pas changer"/>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Photo:</label>
                                            <input type="file" class="form-control-file" id="edit_photo" name="photo"/>
                                            <div class="mt-2" id="current_photo_preview"></div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Statut:</label>
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
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label>Bio:</label>
                                            <textarea class="form-control" name="bio" id="edit_bio" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="{{asset('assets/js/vendor/sweetalert2.min.js')}}"></script>
<script src="{{asset('assets/js/sweetalert.script.js')}}"></script>
<script>
    @if (Session::has('success'))
        toastr.success('{{ Session::get('success') }}', "Succès", {timeOut: 5000});
    @elseif(Session::has('Error'))   
        toastr.error('{{ Session::get('Error') }}', "Erreur", {timeOut: 5000});
    @elseif(Session::has('delete'))   
        toastr.info('{{ Session::get('delete') }}', "Suppression", {timeOut: 5000});
    @endif
</script>
<script>
    $(document).ready(function() {
        // ---------- AJAX POUR CHARGEMENT DES DONNÉES DANS LE MODAL MODIFICATION ----------
        $('.editbtn').on('click', function(e) {
            e.preventDefault();
            let id = $(this).data('id');
            
            $('#editForm')[0].reset();
            $('#current_photo_preview').empty();
            
            let updateUrl = '{{ route("enseignants.update", ":id") }}'.replace(':id', id);
            $('#editForm').attr('action', updateUrl);
            
            $.ajax({
                url: "enseignants/" + id + "/edit",
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        let teacher = response.data;
                        $('#edit_id').val(teacher.id);
                        $('#edit_user_id').val(teacher.user_id);
                        $('#edit_nom_fr').val(teacher.nom_fr);
                        $('#edit_prenom_fr').val(teacher.prenom_fr);
                        $('#edit_nom_ar').val(teacher.nom_ar);
                        $('#edit_prenom_ar').val(teacher.prenom_ar);
                        $('#edit_specialite').val(teacher.specialite);
                        $('#edit_adresse').val(teacher.adresse);
                        $('#edit_tel').val(teacher.tel);
                        $('#edit_tel2').val(teacher.tel2);
                        $('#edit_email').val(teacher.email);
                        $('#edit_bio').val(teacher.bio);
                        
                        if (teacher.status == "1" || teacher.status == 1) {
                            $('#edit_status_1').prop('checked', true);
                        } else {
                            $('#edit_status_0').prop('checked', true);
                        }
                        
                        if (teacher.photo) {
                            $('#current_photo_preview').html(
                                '<p class="mb-1"><small>Photo actuelle:</small></p>' +
                                '<img src="/storage/' + teacher.photo + '" alt="Photo" class="img-thumbnail" style="max-width: 150px;">'
                            );
                        }
                        $('#editModal').modal('show');
                    } else {
                        toastr.error(response.message || "Erreur de chargement", "Erreur", {timeOut: 5000});
                    }
                },
                error: function(xhr) {
                    let errorMsg = "Impossible de charger les données";
                    try {
                        let json = JSON.parse(xhr.responseText);
                        errorMsg = json.message || errorMsg;
                    } catch(e) {}
                    toastr.error(errorMsg, "Erreur", {timeOut: 5000});
                }
            });
        });

        // ---------- CHANGEMENT DE STATUT (AJAX) ----------
        $(document).on('click', '.toggle-status', function() {
            let teacherId = $(this).data('id');
            let badge = $(this);
            badge.prop('disabled', true);
            $.ajax({
                url: 'enseignants/' + teacherId + '/toggle-status',
                method: 'POST',
                data: { _token: '{{ csrf_token() }}' },
                success: function(response) {
                    if (response.success) {
                        if (response.status == "1" || response.status == 1) {
                            badge.removeClass('badge-danger').addClass('badge-success').text('Actif');
                        } else {
                            badge.removeClass('badge-success').addClass('badge-danger').text('Inactif');
                        }
                        toastr.success(response.message, 'Succès', {timeOut: 3000});
                    } else {
                        toastr.error(response.message, 'Erreur', {timeOut: 5000});
                    }
                    badge.prop('disabled', false);
                },
                error: function(xhr) {
                    let errorMsg = "Erreur lors du changement de statut";
                    try {
                        let json = JSON.parse(xhr.responseText);
                        errorMsg = json.message || errorMsg;
                    } catch(e) {}
                    toastr.error(errorMsg, 'Erreur', {timeOut: 5000});
                    badge.prop('disabled', false);
                }
            });
        });

        // Nettoyage du modal d'ajout à la fermeture
        $('#addModal').on('hidden.bs.modal', function() {
            $(this).find('form')[0].reset();
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