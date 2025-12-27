<!DOCTYPE html>
<html lang="en" dir="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>S'inscrire</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/styles/css/themes/lite-purple.min.css') }}">
</head>

<body class="text-left">
    <form method="POST" action="{{ route('eleves.registerEl') }}">
        @csrf
        <div class="auth-layout-wrap"
            style="background-image: url({{ asset('assets/images/bgback.jpg') }});background-size:cover;box-shadow: 10px 10px 23px 4px rgba(0,0,0,0.75);">
            <div class="col-md-8">
                <div class="card o-hidden " style="box-shadow: 4px 7px 24px -4px rgba(0,0,0,0.62);">
                    <div class="row">

                        <div class="col-md-5"
                            style="background-size: cover;background-image: url(./assets/images/bgr.jpg)">
                            <div class="p-4">
                                <div class="auth-logo text-center mb-4">
                                    <img src="{{ asset('assets/images/logo.png') }}" alt="">
                                </div>
                                <h1 class="mb-3 text-18">Info. Authentification </h1>

                                <div class="form-group">
                                    <label for="email">Email </label>
                                    <input id="email"
                                        class="form-control form-control-rounded @error('email') is-invalid @enderror"
                                        type="email" name="email" value="{{ old('email') }}" required
                                        autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Mot de passe</label>
                                    <input id="password"
                                        class="form-control form-control-rounded @error('password') is-invalid @enderror"
                                        type="password" name="password" required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">Confirmer Mot de passe</label>
                                    <input id="password_confirmation"
                                        class="form-control form-control-rounded @error('password') is-invalid @enderror"
                                        type="password" 
                                        name="password_confirmation" 
                                        required
                                        autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                




                            </div>
                        </div>
                        <div class="col-md-7 text-left "
                            style="background-size: cover;background-image: url(./assets/images/bgr.jpg)">
                            <div class="p-4">
                                @if (session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show">
                                        {{ session('error') }}
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    </div>
                                @endif
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <h5>Veuillez corriger les erreurs suivantes :</h5>
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <h1 class="mb-3 text-18">Info. Personnelles</h1>

                                <div class="row">
                                    {{-- Nom en français --}}
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="nom_fr">Nom fr <span class="text-danger">*</span></label>
                                        <input type="text" 
                                               id="nom_fr"
                                               class="form-control form-control-rounded @error('nom_fr') is-invalid @enderror" 
                                               name="nom_fr"
                                               value="{{ old('nom_fr') }}"
                                               placeholder="Votre nom en français">
                                        @error('nom_fr')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                
                                    {{-- Prénom en français --}}
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="prenom_fr">Prenom fr <span class="text-danger">*</span></label>
                                        <input type="text" 
                                               id="prenom_fr"
                                               class="form-control form-control-rounded @error('prenom_fr') is-invalid @enderror" 
                                               name="prenom_fr"
                                               value="{{ old('prenom_fr') }}"
                                               placeholder="Votre prénom en français">
                                        @error('prenom_fr')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                
                                    {{-- Nom en arabe --}}
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="nom_ar">الاسم</label>
                                        <input type="text" 
                                               id="nom_ar"
                                               class="form-control form-control-rounded @error('nom_ar') is-invalid @enderror" 
                                               name="nom_ar"
                                               value="{{ old('nom_ar') }}"
                                               placeholder="ادخل اسمك"
                                               dir="rtl">
                                        @error('nom_ar')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                
                                    {{-- Prénom en arabe --}}
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="prenom_ar">اللقب</label>
                                        <input type="text" 
                                               id="prenom_ar"
                                               class="form-control form-control-rounded @error('prenom_ar') is-invalid @enderror" 
                                               name="prenom_ar"
                                               value="{{ old('prenom_ar') }}"
                                               placeholder="ادخل لقبك"
                                               dir="rtl">
                                        @error('prenom_ar')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                
                                    {{-- Téléphone --}}
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="tel" class="t-font-boldest">Téléphone <span class="text-danger">*</span></label>
                                        <input type="tel"
                                               id="tel"
                                               class="form-control form-control-rounded @error('tel') is-invalid @enderror" 
                                               name="tel"
                                               value="{{ old('tel') }}"
                                               placeholder="Votre Numéro de téléphone">
                                        @error('tel')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                
                                    {{-- Ville --}}
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="ville" class="t-font-boldest">Ville <span class="text-danger">*</span></label>
                                        <input type="text"
                                               id="ville"
                                               class="form-control form-control-rounded @error('ville') is-invalid @enderror" 
                                               name="ville"
                                               value="{{ old('ville') }}"
                                               placeholder="Votre ville">
                                        @error('ville')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                
                                    {{-- Classe --}}
                                    @php
                                        $classes = \App\Models\Classe::all();
                                    @endphp
                                
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="classe_id" class="t-font-boldest">Classe</label>
                                        <select id="classe_id"
                                                class="form-control form-control-rounded @error('classe_id') is-invalid @enderror" 
                                                name="classe_id">
                                            <option value="">-- Sélectionner une classe --</option>
                                            @foreach ($classes as $classe)
                                                <option value="{{ $classe->id }}" {{ old('classe_id') == $classe->id ? 'selected' : '' }}>
                                                    {{ $classe->slug }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('classe_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                
                                    {{-- Bouton d'inscription --}}
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-rounded btn-primary btn-block mt-2">
                                            S'inscrire
                                        </button>
                                    </div>
                                </div>
                                

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
    <script src="{{ asset('assets/js/vendor/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/es5/script.min.js') }}"></script>
</body>

</html>
