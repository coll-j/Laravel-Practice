<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Questioner</title>
        <!-- Fonts -->
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Nunito" />
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" >
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
        <!-- Styles -->
        <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    </head>
    <body>
        <div class="flex-center position-abs in-center">
            @if (Route::has('login'))
                    @auth
                        <script>window.location = "{{ route('home') }}";</script>
                    @endauth
            @endif

            <div class="card card-shadow">
                <div class="title">
                    Log in
                </div>
                @if(session('alert'))
                <h4>{{ session('alert') }}</h4>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <hr>
                    <input type="text" class="form-control mb-2" name="username" placeholder="Username" required />
                    <div class="input-group">
                        <input type="password" class="form-control mb-2" name="password" placeholder="Password" required />
                        <span class="input-group-btn">
                            <button class="btn btn-default shadow-none" type="button" onclick="peekPassword()"><i class="fa fa-eye" id="eye-icon"></i></button>
                        </span>
                    </div>
                    <br>
                    <input type="submit" name="submit" value="Log in" class="col btn btn-primary"/> 
                    <div class="text-right no-mtop"><a class="small less" href="{{ route('changepass') }}">Forgot password?</a></div>
                </form>
                <div class="col-form-label">Don't have an account? <a href="{{ route('sign_up') }}"><b>Sign up</b></a></div>
            </div>
        </div>

        <script>
        function peekPassword() {
            var x = document.getElementsByName("password")[0];
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }

            var y = document.getElementById('eye-icon');
            if(y.classList.contains('fa-eye'))
            {
                y.classList.remove('fa-eye');
                y.classList.add('fa-eye-slash');
            }
            else{
                y.classList.remove('fa-eye-slash');
                y.classList.add('fa-eye');
            }
        }
        </script>
    </body>
</html>
