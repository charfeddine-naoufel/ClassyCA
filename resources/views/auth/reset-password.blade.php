<!DOCTYPE html>
<html lang="en" dir="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/styles/css/themes/lite-purple.min.css') }}">
</head>

<body class="text-left">
    <div class="auth-layout-wrap"
        style="background-image: url({{ asset('assets/images/bgback.jpg') }});background-size:cover">
        {{-- <div class="auth-layout-wrap" style="background-image: url({{asset('assets/images/back.jpg')}});background-size:cover"> --}}
        <div class="auth-content">
            <div class="card o-hidden " style="box-shadow: 4px 7px 24px -4px rgba(252, 250, 250, 0.62);">
                <div class="row">
                    <div class="col-md-6" style="background-size: cover;background-image: url(./assets/images/bgr.jpg)">
                        <div class="p-4">
                            <div class="auth-logo text-center mb-4">
                                <img src="{{ asset('assets/images/logo.png') }}" alt="">
                            </div>
                            <h1 class="mb-3 text-18">Nouveau mot de passe </h1>
                            @if (Session::has('error'))
                                <div class="alert alert-danger">
                                    {{ Session::get('error') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('password.update') }}">

                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                <input type="hidden" name="email" value="{{ $email }}">
                                <div class="form-group">
                                    <label for="Password">Nouveau mot de passe</label>
                                    <input id="password" name="password" class="form-control form-control-rounded"
                                        type="password">
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">Nouveau mot de passe</label>
                                    <input id="password_confirmation" name="password_confirmation" class="form-control form-control-rounded"
                                        type="password">
                                </div>
                                <button class="btn btn-primary btn-block btn-rounded mt-3">Modifier</button>

                            </form>


                        </div>
                    </div>
                    <div class="col-md-6 text-center "
                        style="background-size: cover;background-image: url(./assets/images/bgr.jpg)">
                        <div class="pr-3 auth-right">
                            <a class="btn btn-rounded btn-outline-primary btn-outline-email btn-block btn-icon-text"
                                href="#">
                                <i class="i-Mail-with-At-Sign"></i> Sign up avec Email
                            </a>
                            <a class="btn btn-rounded btn-outline-google btn-block btn-icon-text">
                                <i class="i-Google-Plus"></i> Sign up avec Google
                            </a>
                            <a class="btn btn-rounded btn-block btn-icon-text btn-outline-facebook">
                                <i class="i-Facebook-2"></i> Sign up avec Facebook
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
