<!DOCTYPE html>
<html lang="en" dir="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>S'inscrire</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/styles/css/themes/lite-purple.min.css')}}">
</head>

<body class="text-left">
    <form method="POST" action="{{ route('eleves.registerEl') }}" >
        @csrf
    <div class="auth-layout-wrap" style="background-image: url({{asset('assets/images/bgback.jpg')}});background-size:cover;box-shadow: 10px 10px 23px 4px rgba(0,0,0,0.75);">
        <div class="col-md-8">
            <div class="card o-hidden " style="box-shadow: 4px 7px 24px -4px rgba(0,0,0,0.62);">
                <div class="row">
                   
                    <div class="col-md-5" style="background-size: cover;background-image: url(./assets/images/bgr.jpg)">
                        <div class="p-4">
                            <div class="auth-logo text-center mb-4">
                                <img src="{{asset('assets/images/logo.png')}}" alt="">
                            </div>
                            <h1 class="mb-3 text-18">Info. Authentification </h1>
                           
                                <div class="form-group">
                                    <label for="email">Email </label>
                                    <input id="email" class="form-control form-control-rounded @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Mot de passe</label>
                                    <input id="password" class="form-control form-control-rounded @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Confirmer Mot de passe</label>
                                    <input id="password" class="form-control form-control-rounded @error('password') is-invalid @enderror" type="password" name="password_confirm" required autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>

                            

                            
                        </div>
                    </div>
                    <div class="col-md-7 text-left " style="background-size: cover;background-image: url(./assets/images/bgr.jpg)">
                        <div class="p-4">

                            <h1 class="mb-3 text-18">Info. Personnelles</h1>
                            
                                <div class="row">
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="firstName2">Nom fr</label>
                                        <input type="text" class="form-control form-control-rounded" name="nom_fr" placeholder="Votre nom en français">
                                    </div>

                                    <div class="col-md-6 form-group mb-3">
                                        <label for="lastName2">Prenom fr</label>
                                        <input type="text" class="form-control form-control-rounded" name="prenom_fr" placeholder="Votre prénom en français">
                                    </div>

                                    <div class="col-md-6 form-group mb-3">
                                        <label for="exampleInputEmail2">الاسم</label>
                                        <input type="text" class="form-control form-control-rounded" name="nom_ar" placeholder="ادخل اسمك">
                                    </div>

                                    <div class="col-md-6 form-group mb-3">
                                        <label for="phone1">اللقب</label>
                                        <input type="text" class="form-control form-control-rounded" name="prenom_ar" placeholder="ادخل لقبك">
                                    </div>

                                    <div class="col-md-6 form-group mb-3">
                                        <label for="credit2"class="t-font-boldest">Téléphone</label>
                                        <input class="form-control form-control-rounded" name="tel" placeholder="Votre Numéro de téléphone">
                                    </div>

                                    <div class="col-md-6 form-group mb-3">
                                        <label for="website2"class="t-font-boldest">Ville</label>
                                        <input class="form-control form-control-rounded" name="ville" placeholder="Votre ville">
                                    </div>

                                    @php
                                        $classes = \App\Models\Classe::all();
                                    @endphp

                                    <div class="col-md-6 form-group mb-3">
                                        <label for="picker1"class="t-font-boldest">Classe</label>
                                        <select class="form-control form-control-rounded" name="classe_id">
                                            @foreach ($classes as $classe)
                                            <option value="{{$classe->id}}">{{$classe->slug}}</option>
                                                
                                            @endforeach
                                            
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-rounded btn-primary btn-block mt-2">S'inscrire</button>

                                </div>
                           
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
    </div>
</form>
    <script src="{{asset('assets/js/vendor/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/es5/script.min.js')}}"></script>
</body>

</html>
