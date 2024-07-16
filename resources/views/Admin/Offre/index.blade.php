@extends('layouts.app')
@section('title','Offres')
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
                                            <button type="button" data-toggle="modal" data-target=".modal-add" class="btn btn-primary btn-md m-1"><i class=" i-Add text-white mr-2"></i> Ajouter Offre</button>
                                        </div>
                                        <!-- begin::modal add -->
                                        <div class="ul-card-list__modal">
                                                <div class="modal fade  modal-add " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                          <div class="modal-content">
                                                                <div class="modal-body">
                                                                        <form method="POST" action="{{route('offres.store')}}" enctype="multipart/form-data">
                                                                            @csrf
                                                                                <div class="form-group row">
                                                                                    <label for="nom_off" class="col-sm-2 col-form-label">Nom</label>
                                                                                    <div class="col-sm-10">
                                                                                        <input type="text" class="form-control" id="inputName" placeholder="Nom" name="nom_off">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label for="descr_off" class="col-sm-2 col-form-label">Description</label>
                                                                                    <div class="col-sm-10">
                                                                                        <input type="text" class="form-control" id="inputName" placeholder="Description" name="descr_off">
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                                <div class="form-group row">
                                                                                    <label for="date_deb" class="col-sm-2 col-form-label">Date Début:</label>
                                                                                    <div class="col-sm-10">
                                                                                        <input type="date" class="form-control" id="" placeholder="Date début" name="date_deb">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label for="date_fin" class="col-sm-2 col-form-label">Date Fin:</label>
                                                                                    <div class="col-sm-10">
                                                                                        <input type="date" class="form-control" id="" placeholder="Date début" name="date_fin">
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
                                        <!-- end::modal addd-->
                                        <!-- begin::modal update-->
                                        <div class="modal fade modaledit" id="editModalContent" tabindex="-1" role="dialog" aria-labelledby="editModalContent"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalContent_title">Modifier Offre</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form>
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                            
                                                        <div class="form-group">
                                                            <label for="recipient-name-1" class="col-form-label"> Nom Offre:</label>
                                                            <input type="text" class="form-control" id="nom_off" name="nom_off">
                                                            <input type="hidden" class="form-control" id="Idoffre" name="Idoffre">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="recipient-name-2" class="col-form-label">Description:</label>
                                                            <input type="text" class="form-control" id="descr_off" name="descr_off">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="recipient-name-2" class="col-form-label">Date début:</label>
                                                            <input type="date" class="form-control" id="date_deb" name="date_deb">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="recipient-name-2" class="col-form-label">Date fin:</label>
                                                            <input type="date" class="form-control" id="date_fin" name="date_fin">
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
                                        <!-- end::modal update-->

                                        <div class="card-body">
                                            
                                            <div class="table-responsive">
                                            <div class="card-body">
                            <h4 class="card-title mb-3"> Nos offres</h4>
                            
                            <div class="table-responsive">
                                <table class="table ">
                                    <thead class="thead-dark">

                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nom offre</th>
                                            <th scope="col">Description</th>

                                           
                                            <th scope="col">Date Debut</th>
                                            <th scope="col">Date Fin</th>
                                            
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($offres as $offre )
                                            
                                        
                                        <tr>
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <td><strong>{{$offre->nom_off}}</strong></td>
                                            <td>    <strong>{{$offre->descr_off}}</strong></td>
                                            <td><strong>{{$offre->date_deb}}</strong></td>
                                            <td><strong>{{$offre->date_fin}}</strong></td>

                                           
                                            <td class="d-flex">
                                                <button class="btn text-success bg-transparent btn-icon  mr-2 editbtn" data-id="{{$offre->id}}"  data-toggle="modal" data-target="#editModalContent" ><i class="nav-icon i-Pen-5 font-weight-bold"></i></button>
    
                                                <form action="{{ route('offres.destroy', $offre->id)}}" method="post" class="inline-block">
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
                                </div>
                    </div>
               </section>

                <!-- content goes here -->


            </div>
            <!-- end of main content -->

            <!-- Footer Start -->
            @include('layouts.footer')
            <!-- fotter end -->
        </div>
@endsection
@section('scripts')
<script>
    @if (Session::has('success'))
    
                toastr.success('Nouvelle offre ajoutée avec succes',"Success", {timeOut: 5000});
    
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


                // var action ="{{ URL::to('offres') }}/"+id;


                // var url = "{{ URL::to('offres') }}";

                $.get("offres/" + id + "/edit", function(data) {
                    console.log(data.data);
                    $('#nom_off').val(data.data['nom_off']);
                    $('#descr_off').val(data.data['descr_off']);
                    $('#date_deb').val(data.data['date_deb']);
                    $('#date_fin').val(data.data['date_fin']);
                    $('#Idoffre').val(data.data['id']);



                });




            });
            
            $('.updatebtn').on('click', function(e) {
                e.preventDefault();
                var nom_off = $('#nom_off').val();
                var descr_off = $('#descr_off').val();
                var date_deb = $('#date_deb').val();
                var date_fin = $('#date_fin').val();
                var id = $('#Idoffre').val();
                var URL ="offres/"+ id;
                console.log("url===",URL)
                $.ajax({
                    method: "PUT",
                    url: URL,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: { id: id,
                        nom_off: nom_off,
                        descr_off: descr_off ,
                        date_deb: date_deb ,
                        date_fin: date_fin },

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