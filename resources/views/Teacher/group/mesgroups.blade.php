@extends('layouts.app')
@section('title', 'Mes Groupes')
@section('content')

    <div class="main-content-wrap sidenav-open d-flex flex-column">
        <div class="breadcrumb">
            <h1 class="mr-2">Dashboard</h1>
            <ul>
                <li><a href="">Mes groupes</a></li>
            </ul>
        </div>

        <div class="separator-breadcrumb border-top"></div>
        
        @if($groups->isEmpty())
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-info">
                    <p class="m-0"><i class="i-Information mr-2"></i> Vous n'êtes actuellement assigné à aucun groupe.</p>
                </div>
            </div>
        </div>
        @else
        <div class="row">
            <div class="col-md-12">
                <div class="card o-hidden mb-4">
                    <div class="card-header d-flex align-items-center border-0">
                        <h3 class="w-50 float-left card-title m-0">Mes Groupes</h3>
                        <div class="w-50 text-right">
                            <span class="badge badge-pill badge-primary">{{ $groups->count() }} groupe(s)</span>
                        </div>
                    </div>

                    <div class="m-3">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nom du groupe</th>
                                        <th scope="col">Classe</th>
                                        <th scope="col">Nombre de cours</th>
                                        <th scope="col">Élèves</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($groups as $key => $group)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>
                                            <strong>{{ $group->nomg ?? 'Non défini' }}</strong>
                                            @if($group->courses->count() > 0)
                                            <br>
                                            {{-- <small class="text-muted">
                                                Cours : 
                                                @foreach($group->courses as $course)
                                                    <span class="badge badge-secondary mr-1">{{ $course->matiere->nom_mat ?? '--' }}</span>
                                                @endforeach
                                            </small> --}}
                                            @endif
                                        </td>
                                        <td>
                                            @if($group->classe)
                                                <span class="badge badge-info">{{ $group->classe->slug ?? 'N/A' }}</span>
                                            @else
                                                <span class="text-muted">N/A</span>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="badge badge-pill badge-success">{{ $group->courses->count() }}</span>
                                        </td>
                                        <td>
                                            <div class="student-list">
                                                @if($group->students && $group->students->count() > 0)
                                                    <div class="mb-2">
                                                        <span class="badge badge-light">{{ $group->students->count() }} élève(s)</span>
                                                    </div>
                                                    <div class="max-height-150 overflow-auto">
                                                        @foreach($group->students as $student)
                                                        <div class="d-flex align-items-center mb-1">
                                                            <i class="text-16 i-Checked-User text-primary mr-2"></i>
                                                            <span>{{ $student->nom_fr ?? '' }} {{ $student->prenom_fr ?? '' }}</span>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                @else
                                                    <span class="text-muted">Aucun élève</span>
                                                @endif
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
        @endif
    </div>
   
@endsection

<style>
.max-height-150 {
    max-height: 150px;
}
.student-list {
    font-size: 0.9rem;
}
</style>