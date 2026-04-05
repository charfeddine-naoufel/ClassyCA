@extends('layouts.app')
@section('title', 'Chapitres')
@section('content')
    <div class="main-content-wrap sidenav-open d-flex flex-column">
        <div class="main-content">
            <div class="breadcrumb"></div>
            <div class="separator-breadcrumb border-top"></div>

            <section class="contact-list">
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div class="card text-left">
                            <div class="card-header text-right bg-transparent">
                                <button type="button" data-toggle="modal" data-target=".modal-add"
                                    class="btn btn-primary btn-md m-1"><i class="i-Add text-white mr-2"></i> Ajouter Chapitre</button>
                            </div>

                            {{-- MODAL AJOUT --}}
                            <div class="ul-card-list__modal">
                                <div class="modal fade modal-add" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <form method="POST" action="{{ route('chapitres.store') }}" enctype="multipart/form-data" class="needs-validation" novalidate>
                                                    @csrf
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Titre :</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" placeholder="Titre" name="titre" required>
                                                            <div class="invalid-tooltip">Le titre est obligatoire</div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Description :</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" placeholder="Description" name="description">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Trimestre :</label>
                                                        <div class="col-sm-10">
                                                            <select class="form-control form-control-rounded" name="trimestre">
                                                                <option value="1">Trimestre 1</option>
                                                                <option value="2">Trimestre 2</option>
                                                                <option value="3">Trimestre 3</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Cours :</label>
                                                        <div class="col-sm-10">
                                                            <select class="form-control form-control-rounded" name="course_id">
                                                                @foreach ($courses as $course)
                                                                    <option value="{{ $course->id }}">{{ $course->classe->slug }} - {{ $course->matiere->nom_matiere }} ({{ $course->teacher->nom_fr }})</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-10">
                                                            <button type="submit" class="btn btn-success">Enregistrer</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- MODAL MODIFICATION --}}
                            <div class="ul-card-list__modal">
                                <div class="modal fade" id="modal-update" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <form method="POST" id="updateForm" enctype="multipart/form-data" novalidate>
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Titre :</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="update_titre" name="titre" required>
                                                            <div class="invalid-tooltip">Le titre est obligatoire</div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Description :</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="update_description" name="description">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Trimestre :</label>
                                                        <div class="col-sm-10">
                                                            <select class="form-control" id="update_trimestre" name="trimestre">
                                                                <option value="1">Trimestre 1</option>
                                                                <option value="2">Trimestre 2</option>
                                                                <option value="3">Trimestre 3</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Cours :</label>
                                                        <div class="col-sm-10">
                                                            <select class="form-control form-control-rounded w-100" id="update_course_id" name="course_id">
                                                                @foreach ($courses as $course)
                                                                    <option value="{{ $course->id }}">{{ $course->classe->slug }} - {{ $course->matiere->nom_matiere }} ({{ $course->teacher->nom_fr }})</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-10">
                                                            <button type="submit" class="btn btn-success">Modifier</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- ONGLETS PAR CLASSE --}}
                            <div class="row mb-4">
                                <div class="col-md-12 mb-4">
                                    <div class="card text-left">
                                        <div class="card-body">
                                            <h4 class="card-title mb-3">Chapitres par classe</h4>
                                            <ul class="nav nav-tabs" id="myIconTab" role="tablist">
                                                @foreach ($chapitresByClasses as $key => $chapitresByClasse)
                                                    <li class="nav-item">
                                                        <a class="nav-link {{ $loop->iteration == 1 ? 'active' : '' }}" id="home-icon-tab{{ $loop->iteration }}" data-toggle="tab"
                                                           href="#homeIcon{{ $loop->iteration }}" role="tab" aria-controls="homeIcon{{ $loop->iteration }}"
                                                           aria-selected="true"><i class="nav-icon i-Business-Mens mr-1"></i><strong>{{ $key }}</strong></a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                            <div class="tab-content" id="myIconTabContent" style="border: 1px solid #993366;">
                                                @foreach ($chapitresByClasses as $key => $chapitresByClasse)
                                                    <div class="tab-pane fade {{ $loop->iteration == 1 ? 'active show' : '' }}" id="homeIcon{{ $loop->iteration }}" role="tabpanel">
                                                        <div class="card-body">
                                                            <div class="table-responsive">
                                                                <h4 class="card-title mb-3">Chapitres pour la classe : <strong>{{ $key }}</strong></h4>
                                                                <table class="table">
                                                                    <thead class="thead-dark">
                                                                        <tr>
                                                                            <th>#</th>
                                                                            <th>Titre</th>
                                                                            <th>Description</th>
                                                                            <th>Trimestre</th>
                                                                            <th>Cours</th>
                                                                            <th>Action</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($chapitresByClasse as $chapitre)
                                                                            <tr>
                                                                                <th scope="row">{{ $loop->iteration }}</th>
                                                                                <td><strong>{{ $chapitre->titre }}</strong></td>
                                                                                <td><strong>{{ $chapitre->description }}</strong></td>
                                                                                <td><strong>{{ $chapitre->trimestre }}</strong></td>
                                                                                <td><strong>{{ $chapitre->course->matiere->nom_matiere }} - {{ $chapitre->course->teacher->nom_fr }}</strong></td>
                                                                                <td class="d-flex">
                                                                                    <button class="btn text-success bg-transparent btn-icon mr-2 editbtn"
                                                                                            data-id="{{ $chapitre->id }}"
                                                                                            data-titre="{{ $chapitre->titre }}"
                                                                                            data-description="{{ $chapitre->description }}"
                                                                                            data-trimestre="{{ $chapitre->trimestre }}"
                                                                                            data-course_id="{{ $chapitre->course_id }}"
                                                                                            data-toggle="modal"
                                                                                            data-target="#modal-update">
                                                                                        <i class="nav-icon i-Pen-5 font-weight-bold"></i>
                                                                                    </button>
                                                                                    <form action="{{ route('chapitres.destroy', $chapitre->id) }}" method="post" class="inline-block">
                                                                                        @csrf
                                                                                        @method('DELETE')
                                                                                        <button class="btn text-danger btn-icon mr-2 alert-confirm"><i class="nav-icon i-Close-Window font-weight-bold"></i></button>
                                                                                    </form>
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        // Au clic sur un bouton "Modifier"
        $('.editbtn').on('click', function() {
            let id = $(this).data('id');
            let titre = $(this).data('titre');
            let description = $(this).data('description');
            let trimestre = $(this).data('trimestre');
            let course_id = $(this).data('course_id');

            // Mettre à jour l'action du formulaire
            let updateUrl = "{{ route('chapitres.update', ':id') }}".replace(':id', id);
            $('#updateForm').attr('action', updateUrl);

            // Remplir les champs
            $('#update_titre').val(titre);
            $('#update_description').val(description);
            $('#update_trimestre').val(trimestre);
            $('#update_course_id').val(course_id);
        });
    });
</script>
@endsection