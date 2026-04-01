@extends('layouts.app')
@section('title', 'Mes Séances')
@section('content')

<div class="main-content-wrap sidenav-open d-flex flex-column">
    <div class="breadcrumb">
        <h1 class="mr-2">Dashboard</h1>
        <ul>
            <li><a href="">Mes Séances</a></li>
        </ul>
    </div>

    <div class="separator-breadcrumb border-top"></div>

    <div class="row">
        <div class="col-md-12">
            <div class="card o-hidden mb-4">
                <div class="card-header d-flex align-items-center border-0">
                    <h3 class="w-50 float-left card-title m-0">Séances</h3>
                    <div class="dropdown dropleft text-right w-50 float-right">
                        <button type="button" class="btn btn-primary btn-icon m-1" data-toggle="modal"
                            data-target="#addSeanceModal">
                            <span class="ul-btn__icon"><i class="i-Add"></i></span>
                            <span class="ul-btn__text">Ajouter une séance</span>
                        </button>
                    </div>
                </div>

                <div class="m-3">
                    <div class="table-responsive">
                        <table class="table ">
                            <thead class="thead-dark">
                                 <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Titre</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">URL</th>
                                    <th scope="col">Cours</th>
                                    <th scope="col">Chapitre</th>
                                    <th scope="col">Action</th>
                                 </tr>
                            </thead>
                            <tbody>
                                @foreach($seances as $seance)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td><strong>{{ $seance->titre }}</strong></td>
                                    <td><strong>{{ $seance->description }}</strong></td>
                                    <td>
                                        @if($seance->url)
                                            <a href="{{ $seance->url }}" target="_blank">Lien</a>
                                        @else
                                            —
                                        @endif
                                    </td>
                                    <td><strong>{{ $seance->chapitre->course->classe->slug ?? '—' }}</strong></td>
                                    <td><strong>{{ $seance->chapitre->titre ?? '—' }}</strong></td>
                                    <td class="d-flex">
                                        <button class="btn text-success bg-transparent btn-icon mr-2 editbtn"
                                            data-id="{{ $seance->id }}" data-toggle="modal"
                                            data-target="#editSeanceModal">
                                            <i class="nav-icon i-Pen-5 font-weight-bold"></i>
                                        </button>

                                        <form action="{{ route('seances.destroy', $seance->id) }}" method="post"
                                            class="inline-block">
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

    <!-- Modal Ajouter Séance -->
    <div class="ul-card-list__modal">
        <div class="modal fade modal-add" id="addSeanceModal" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <form method="POST" action="{{ route('seances.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="titre" class="col-sm-2 col-form-label">Titre :</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Titre" name="titre" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-sm-2 col-form-label">Description :</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Description" name="description">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="url" class="col-sm-2 col-form-label">URL :</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="URL" name="url">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="course_id" class="col-sm-2 col-form-label">Cours :</label>
                                <div class="col-sm-10">
                                    <select class="form-control form-control-rounded" name="course_id" required>
                                        <option value="">Choisir un cours</option>
                                        @foreach ($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->classe->slug }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="chapitre_id" class="col-sm-2 col-form-label">Chapitre :</label>
                                <div class="col-sm-10">
                                    <select class="form-control form-control-rounded" name="chapitre_id" required>
                                        <option value="">Choisir un chapitre</option>
                                        @foreach ($meschapitres as $chapitre)
                                        <option value="{{ $chapitre->id }}">{{ $chapitre->titre }} -- {{ $chapitre->course->classe->slug }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10 offset-sm-2">
                                    <button type="submit" class="btn btn-success">Enregistrer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Modifier Séance -->
    <div class="modal fade" id="editSeanceModal" tabindex="-1" role="dialog" aria-labelledby="editSeanceModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modifier la séance</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editSeanceForm">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="edit_id">
                        <div class="form-group row">
                            <label for="edit_titre" class="col-sm-2 col-form-label">Titre :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="edit_titre" name="titre" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="edit_description" class="col-sm-2 col-form-label">Description :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="edit_description" name="description">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="edit_url" class="col-sm-2 col-form-label">URL :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="edit_url" name="url">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="edit_course_id" class="col-sm-2 col-form-label">Cours :</label>
                            <div class="col-sm-10">
                                <select class="form-control form-control-rounded" id="edit_course_id" name="course_id" required>
                                    <option value="">Choisir un cours</option>
                                    @foreach ($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->classe->slug }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="edit_chapitre_id" class="col-sm-2 col-form-label">Chapitre :</label>
                            <div class="col-sm-10">
                                <select class="form-control form-control-rounded" id="edit_chapitre_id" name="chapitre_id" required>
                                    <option value="">Choisir un chapitre</option>
                                    @foreach ($meschapitres as $chapitre)
                                    <option value="{{ $chapitre->id }}">{{ $chapitre->titre }} -- {{ $chapitre->course->classe->slug }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10 offset-sm-2">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                <button type="button" class="btn btn-primary updatebtn">Enregistrer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('assets/js/vendor/sweetalert2.min.js') }}"></script>
<script src="{{ asset('assets/js/sweetalert.script.js') }}"></script>
<script>
    @if (Session::has('success'))
        toastr.success('Séance ajoutée avec succès', "Success", { timeOut: 5000 });
    @elseif (Session::has('error'))
        toastr.error('Vérifiez les champs', "Error", { timeOut: 5000 });
    @endif

    $(document).ready(function () {
        // Confirmation de suppression
        $('.alert-confirm').on('click', function (e) {
            e.preventDefault();
            var form = $(this).closest("form");
            swal({
                title: 'Êtes-vous sûr ?',
                text: "Cette action est irréversible !",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#0CC27E',
                cancelButtonColor: '#FF586B',
                confirmButtonText: 'Oui, supprimer !',
                cancelButtonText: 'Non, annuler !',
                confirmButtonClass: 'btn btn-success mr-5',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false
            }).then(function () {
                form.submit();
                swal(
                    'Supprimée !',
                    'La séance a bien été supprimée.',
                    'success'
                )
            }, function (dismiss) {
                if (dismiss === 'cancel') {
                    swal(
                        'Annulée',
                        'La suppression est annulée.',
                        'error'
                    )
                }
            })
        });

        // Récupération des données pour l'édition
        $('.editbtn').on('click', function (e) {
            e.preventDefault();
            let id = $(this).data('id');

            $.get("seances/" + id + "/edit", function (data) {
                $('#edit_id').val(data.data.id);
                $('#edit_titre').val(data.data.titre);
                $('#edit_description').val(data.data.description);
                $('#edit_url').val(data.data.url);
                $('#edit_course_id').val(data.data.course_id);
                $('#edit_chapitre_id').val(data.data.chapitre_id);
            });
        });

        // Mise à jour via AJAX
        $('.updatebtn').on('click', function (e) {
            e.preventDefault();
            var id = $('#edit_id').val();
            var formData = {
                _token: '{{ csrf_token() }}',
                _method: 'PUT',
                titre: $('#edit_titre').val(),
                description: $('#edit_description').val(),
                url: $('#edit_url').val(),
                course_id: $('#edit_course_id').val(),
                chapitre_id: $('#edit_chapitre_id').val()
            };

            $.ajax({
                method: "POST", // Utilisation de POST avec _method=PUT
                url: "seances/" + id,
                data: formData,
                success: function (data) {
                    $('#editSeanceModal').modal('hide');
                    window.location.reload();
                },
                error: function (xhr) {
                    toastr.error('Erreur lors de la mise à jour', 'Erreur');
                }
            });
        });
    });
</script>
@endsection