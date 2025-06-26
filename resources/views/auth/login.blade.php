<!DOCTYPE html>
<html lang="en" dir="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="assets/styles/css/themes/lite-purple.min.css">
</head>

<body class="text-left">
    <div class="auth-layout-wrap" style="background-image: url({{asset('assets/images/bgback.jpg')}});background-size:cover">
    {{-- <div class="auth-layout-wrap" style="background-image: url({{asset('assets/images/back.jpg')}});background-size:cover"> --}}
        <div class="auth-content">
            <div class="card o-hidden " style="box-shadow: 4px 7px 24px -4px rgba(252, 250, 250, 0.62);">
                <div class="row">
                    <div class="col-md-6" style="background-size: cover;background-image: url(./assets/images/bgr.jpg)">
                        <div class="p-4">
                            <div class="auth-logo text-center mb-4">
                                <img src="{{asset('assets/images/logo.png')}}" alt="">
                            </div>
                            <h1 class="mb-3 text-18">S'identifier </h1>
                            @if(Session::has('error'))
                            
                            <div class="alert alert-danger">
                            {{ Session::get('error')}}
                            </div>
                            @endif
                            
                            <form method="POST" action="{{ route('login') }}">
                        @csrf
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
                                    <label for="password">Password</label>
                                    <input id="password" class="form-control form-control-rounded @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <button type="submit" class="btn btn-rounded btn-primary btn-block mt-2">S'identifier</button>

                            </form>

                            <div class="mt-3 text-center">
                                 @if (Route::has('password.request'))
                                 <a href="{{ route('password.request') }}" class="text-muted"><u>Mot de passe oublié?</u></a>
                                    
                                @endif

                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 text-center " style="background-size: cover;background-image: url(./assets/images/bgr.jpg)">
                        <div class="pr-3 auth-right">
                            <a class="btn btn-rounded btn-outline-primary btn-outline-email btn-block btn-icon-text" href="signup.html">
                                <i class="i-Mail-with-At-Sign"></i> Sign up with Email
                            </a>
                            <a class="btn btn-rounded btn-outline-google btn-block btn-icon-text">
                                <i class="i-Google-Plus"></i> Sign up with Google
                            </a>
                            <a class="btn btn-rounded btn-block btn-icon-text btn-outline-facebook">
                                <i class="i-Facebook-2"></i> Sign up with Facebook
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/vendor/jquery-3.3.1.min.js"></script>
    <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="assets/js/es5/script.min.js"></script>
</body>

</html>
