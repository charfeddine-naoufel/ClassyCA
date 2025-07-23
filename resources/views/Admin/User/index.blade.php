@extends('layouts.app')
@section('title', 'Matieres')
@section('content')
    <div class="main-content-wrap sidenav-open d-flex flex-column">
        <div class="breadcrumb">
            <h1 class="mr-2">Dashboard</h1>
            <ul>
                <li><a href="">Users</a></li>
                <!-- <li>Version 1</li> -->
            </ul>
        </div>

        <div class="separator-breadcrumb border-top"></div>

        <div class="row mb-4">

            <div class="col-md-12 mb-3">
                <div class="card text-left">

                    <div class="card-body">
                        <div class="d-flex justify-content-between">

                            <h4 class="card-title mb-3"> Users</h4>
                            <button type="button" class="btn btn-primary btn-icon m-1" data-toggle="modal"
                                data-target="#verifyModalContent" data-whatever="@mdo" id="toast">
                                <span class="ul-btn__icon"><i class="i-Add"></i></span>
                                <span class="ul-btn__text">Ajouter</span>
                            </button>
                        </div>

                        <p>
                            Vous pouvez créer, mettre à jour ou supprimer un Utilisateur.

                        </p>
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nom complet</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Rôle</th>
                                       
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td><strong>{{ $user->name }}</strong></td>
                                            <td><strong>{{ $user->email }}</strong></td>
                                            <td><strong>{{ ucfirst($user->role) }}</strong></td>
                                            
                                            <td class="d-flex">
                                                <button class="btn text-success bg-transparent btn-icon mr-2 editbtn"
                                                        data-id="{{ $user->id }}"
                                                        data-toggle="modal"
                                                        data-target="#editModalContent">
                                                    <i class="nav-icon i-Pen-5 font-weight-bold"></i>
                                                </button>
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline-block">
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


        <!-- Verify Modal content -->
        <div class="modal fade bd-example-modal-lg" id="verifyModalContent" tabindex="-1" role="dialog" aria-labelledby="verifyModalContent"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="verifyModalContent_title">Nouvel Utilisateur</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="{{ route('users.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                    
                            <div class="card">
                                <div class="card-body">
                    
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Nom complet</label>
                                            <input type="text" class="form-control" name="name" required/>
                                        </div>
                    
                                        <div class="form-group col-md-6">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email" required/>
                                        </div>
                                    </div>
                    
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Mot de passe</label>
                                            <input type="password" class="form-control" name="password" required/>
                                        </div>
                    
                                        <div class="form-group col-md-6">
                                            <label>Rôle</label>
                                            <select class="form-control" name="role">
                                                <option value="admin">Admin</option>
                                                <option value="teacher">Enseignant</option>
                                                <option value="student">Elève</option>
                                            </select>
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
        <!-- Edit Modal content -->
        <div class="modal fade modaledit" id="editModalContent" tabindex="-1" role="dialog" aria-labelledby="editModalContent"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalContent_title">Modifier User</h5>
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
                    
                                    <input type="hidden" id="IdUser" name="IdUser">
                    
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Nom complet</label>
                                            <input type="text" class="form-control" id="name" name="name"/>
                                        </div>
                    
                                        <div class="form-group col-md-6">
                                            <label>Email</label>
                                            <input type="email" class="form-control" id="email" name="email"/>
                                        </div>
                                    </div>
                    
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Mot de passe</label>
                                            <input type="password" class="form-control" id="password" name="password"/>
                                        </div>
                    
                                        <div class="form-group col-md-6">
                                            <label>Rôle</label>
                                            <select class="form-control" id="role" name="role">
                                                <option value="admin">Admin</option>
                                                <option value="teacher">Enseignant</option>
                                                <option value="student">Étudiant</option>
                                            </select>
                                        </div>
                                    </div>
                    
                                </div>
                            </div>
                    
                        </div>
                    
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="button" class="btn btn-primary updatebtn">Enregistrer</button>
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
    
                toastr.success('Nouvelle classe ajoutée avec succes',"Success", {timeOut: 5000});
    
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

            // Remplace "enseignants" par "users"
$('.editbtn').on('click', function(e) {
    e.preventDefault();
    let id = $(this).data('id');

    $.get("users/" + id + "/edit", function(data) {
        console.log(data);
        $('#name').val(data.data['name']);
        $('#email').val(data.data['email']);
        $('#role').val(data.data['role']);
        $('#IdUser').val(data.data['id']);
    });
});

// Bouton update
$('.updatebtn').on('click', function(e) {
    e.preventDefault();
    var id = $('#IdUser').val();
    var name = $('#name').val();
    var email = $('#email').val();
    var password = $('#password').val();
    var role = $('#role').val();

    var URL = "users/" + id;
    console.log("url===", URL)

    $.ajax({
        method: "PUT",
        url: URL,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id: id,
            name: name,
            email: email,
            password: password,
            role: role
        },
        success: function(data) {
            console.log(data)
            $('.modaledit').modal('hide');
            window.location.reload();
            toastr.success("Mise à jour de l'utilisateur effectuée avec succès", "Success", {timeOut: 5000});
        },
        error: function(data) {
            console.log(data)
        }
    });
});

         
        });
    </script>
@endsection
