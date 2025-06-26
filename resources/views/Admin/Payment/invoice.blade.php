@extends('layouts.app')
@section('title', 'facture')
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
        
        
        {{-- invoice --}}
        <div class="main-content-wrap  d-flex flex-column">
            <div class="row">
                <div class="col-md-12">
                    
                    <div class="card">

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="invoice" role="tabpanel" aria-labelledby="invoice-tab">
                                <div class="d-sm-flex mb-5" data-view="print">
                                    <span class="m-auto"></span>
                                    <button class="btn btn-primary mb-sm-0 mb-3 print-invoice">Imprimer facture</button>
                                    <a class="btn btn-secondary mb-sm-0 mb-3 ml-3" href="{{ url()->previous() }}">Retour</a>
                                </div>
                                <!---===== Print Area =======-->
                                <div id="print-area" class="p-4 " >
                                    <div class="row ">
                                        <div class="col-md-6">
                                            <h4 class="font-weight-bold">Facture N°:</h4>
                                            <p>{{$payment->id}}/@php echo date("Y"); @endphp </p>
                                        </div>
                                        <div class="col-md-6 text-sm-right">
                                            <p><strong>Etat Facture: </strong> Payée</p>
                                            <p><strong>Date Facture: </strong> {{$payment->date_pay}}</p>
                                        </div>
                                    </div>
                                    <div class="mt-3 mb-4 border-top"></div>
                                    <div class="row mb-5">
                                        <div class="col-md-6 mb-3 mb-sm-0">
                                            <h5 class="font-weight-bold">Délivrée par</h5>
                                            <p>Classy Academy</p>
                                            <span style="white-space: pre-line">
                                                classyacademy@gmail.com
                                                Elhamma Gabès.

                                                +216 99 444 111
                                            </span>
                                        </div>
                                        <div class="col-md-6 text-sm-right">
                                            <h5 class="font-weight-bold">A l'attention de :</h5>
                                            <p>{{$payment->student->nom_fr}} {{$payment->student->prenom_fr}}</p>
                                            <span style="white-space: pre-line">
                                                {{$payment->student->email}}
                                                {{$payment->student->adresse}} -{{$payment->student->ville}}.

                                                {{$payment->student->tel}}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 table-responsive">
                                            <table class="table table-hover mb-4">
                                                <thead class="bg-gray-300">
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Pack</th>
                                                        <th scope="col">Prix</th>
                                                        <th scope="col">Qté</th>
                                                        <th scope="col">Montant</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>Pack</td>
                                                        <td>{{$payment->montant}}</td>
                                                        <td>1</td>
                                                        <td>{{$payment->montant}}</td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="invoice-summary">
                                                <p>Sous total: <span>{{$payment->montant}}</span></p>
                                                <p>Remise: <span>0</span></p>
                                                <h5 class="font-weight-bold">Total: <span> {{$payment->montant}}</span></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--==== / Print Area =====-->
                            </div>
                            
                        </div>

                    </div>
                </div>
            </div>

          

        </div>
        {{-- invoice --}}


        <!-- Footer Start -->

        <!-- fotter end -->

    </div>

@endsection

@section('scripts')
    <script>
        @if (Session::has('success'))

            toastr.success('Nouvelle matière ajoutée avec succes', "Success", {
                timeOut: 5000
            });
        @elseif (Session::has('Error'))
            toastr.error('Vérifiez les champs', "Error", {
                timeOut: 5000
            });
        @endif
    </script>
    <script src="{{ asset('assets/js/vendor/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/js/sweetalert.script.js') }}"></script>

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
                var URL = "payments/" + id;
                console.log("url===", URL)
                $.ajax({
                    method: "PUT",
                    url: URL,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        id: id,
                        student_id: student_id,
                        method: method,
                        montant: montant,
                        date_pay: date_pay,
                    },

                    success: function(data) {
                        $('.modaledit').modal('hide');
                        window.location.reload();
                        //  alert('update done')

                    }
                });
            });

            // invoice
            
                $('.print-invoice').on('click', function() {
                    window.print();
                })

        });
    </script>
@endsection
