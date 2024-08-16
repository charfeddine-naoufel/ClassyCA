@extends('layouts.app')
@section('title', 'Pyements')
@section('content')

    <div class="main-content-wrap sidenav-open d-flex flex-column">
        <div class="breadcrumb">
            <h1 class="mr-2">Dashboard</h1>
            <ul>
                <li><a href="">Payements</a></li>
                <!-- <li>Version 1</li> -->
            </ul>
        </div>

        <div class="separator-breadcrumb border-top"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="card o-hidden mb-4">
                    <div class="card-header d-flex align-items-center border-0">
                        <h3 class="w-50 float-left card-title m-0">Payements</h3>
                        <div class="dropdown dropleft text-right w-50 float-right">
                            <button type="button" class="btn btn-primary btn-icon m-1" data-toggle="modal"
                                data-target="#verifyModalContent" data-whatever="@mdo" id="toast">
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
                                        <th scope="col">Nom Elève</th>
                                        <th scope="col">Classe et groupe</th>
                                        <th scope="col">Montant</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Pack</th>


                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($payments as $payment)
                                    <tr>
                                        <th scope="row">{{$loop->iteration }}</th>
                                        <td><strong>{{$payment->student->nom_fr}} {{$payment->student->prenom_fr}} </strong></td>
                                        <td>
                                            <strong>

                                                {{$payment->student->classe->slug}}-{{$payment->student->group->nomg}}
                                            </strong>

                                        </td>
                                        <td>
                                            <strong>

                                                {{$payment->montant}}
                                            </strong>

                                        </td>
                                        <td>
                                            <strong>

                                                {{$payment->date_pay}}
                                            </strong>

                                        </td>
                                        <td>
                                            <strong>

                                                pack
                                            </strong>

                                        </td>


                                        <td class="d-flex">
                                            <button class="btn text-success bg-transparent btn-icon  mr-2 editbtn" data-id="{{$payment->id}}"  data-toggle="modal" data-target="#editModalContent" ><i class="nav-icon i-Pen-5 font-weight-bold"></i></button>

                                            <form action="{{ route('payments.destroy', $payment->id)}}" method="post" class="inline-block">
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
        <div class="modal fade " id="verifyModalContent" tabindex="-1" role="dialog" aria-labelledby="verifyModalContent"
            aria-hidden="true">
            <div class="modal-dialog " role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="verifyModalContent_title">Nouveau Payement</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="{{ route('payments.store') }}">
                        @csrf
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="nom-payment" class="col-form-label"> Nom Elève:</label>
                                <select class="form-control form-control-rounded w-100" name="student_id">
                                    <option value="">Choisir un élève</option>
                                    @foreach ($students as $student)
                                    <option value="{{$student->id}}">{{$student->nom_fr}} {{$student->prenom_fr}}-{{$student->classe->slug}}</option>
                                        
                                    @endforeach
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nom-payment" class="col-form-label"> Méthod:</label>
                                <select class="form-control form-control-rounded w-100" name="method">
                                    
                                    <option value="Cash">Cash</option>
                                    <option value="D17">D17</option>
                                    <option value="Mondat">Mondat</option>
                                    <option value="Versement bancaire">Versement bancaire</option>
                                        
                                   
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="label-payment" class="col-form-label">Montant:</label>
                                <input type="number" class="form-control" name="montant">
                            </div>
                            <div class="form-group">
                                <label for="label-payment" class="col-form-label">Date:</label>
                                <input type="date" class="form-control" name="date_pay" value="<?php echo date('Y-m-d'); ?>">
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
                        <h5 class="modal-title" id="editModalContent_title">Modifier Matière</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form>
                        @csrf
                        @method('PUT')
                        <div class="modal-body">

                            
                            <div class="form-group">
                                <label for="nom-payment" class="col-form-label"> Nom Elève:</label>
                                <input type="hidden" class="form-control" id="IdPayment" >

                                <select class="form-control form-control-rounded w-100" id="student_id">
                                    
                                    @foreach ($students as $student)
                                    <option value="{{$student->id}}">{{$student->nom_fr}} {{$student->prenom_fr}}-{{$student->classe->slug}}</option>
                                        
                                    @endforeach
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nom-payment" class="col-form-label"> Méthod:</label>
                                <select class="form-control form-control-rounded w-100" id="method">
                                    
                                    <option value="Cash">Cash</option>
                                    <option value="D17">D17</option>
                                    <option value="Mondat">Mondat</option>
                                    <option value="Versement bancaire">Versement bancaire</option>
                                        
                                   
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="label-payment" class="col-form-label">Montant:</label>
                                <input type="number" class="form-control" id="montant">
                            </div>
                            <div class="form-group">
                                <label for="label-payment" class="col-form-label">Date:</label>
                                <input type="date" class="form-control" id="date_pay" value="<?php echo date('Y-m-d'); ?>">
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
    
                toastr.success('Nouvelle matière ajoutée avec succes',"Success", {timeOut: 5000});
    
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
                        'Le payment a bien été supprimée.',
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


                // var action ="{{ URL::to('payments') }}/"+id;


                // var url = "{{ URL::to('payments') }}";

                $.get("payments/" + id + "/edit", function(data) {
                    console.log(data.data);
                    $('#student_id').val(data.data['student_id']);
                    $('#method').val(data.data['method']);
                    $('#montant').val(data.data['montant']);
                    $('#date_pay').val(data.data['date_pay']);
                    $('#IdPayment').val(data.data['id']);



                });




            });
            $('.updatebtn').on('click', function(e) {
                e.preventDefault();
                var student_id = $('#student_id').val();
                var method = $('#method').val();
                var montant = $('#montant').val();
                var date_pay = $('#date_pay').val();
                var id = $('#IdPayment').val();
                var URL ="payments/"+ id;
                console.log("url===",URL)
                $.ajax({
                    method: "PUT",
                    url: URL,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: { id: id,
                        student_id: student_id,
                        method: method ,
                        montant: montant ,
                        date_pay: date_pay ,
                    },

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
