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
            <div class="card card-shadow">
                <div class="title">
                    @isset($username)
                        Enter new password
                    @else
                        Enter Username
                    @endisset
                </div>
                
                <hr>
                @if(session('alert'))
                <small class="mb-2">{{ session('alert') }}</small>
                @endif
                <form method="POST" action="{{ isset($username)? route('update_pass') : route('find_user') }}">
                    @csrf
                    @isset($username)
                    @method('PUT')
                    <p>Username: {{ $username }}</p>
                    <input type="hidden" class="form-control mb-2" name="username" value="{{ $username }}"/>
                    <div class="input-group">
                        <input type="password" class="form-control mb-2" name="password" placeholder="Password" required />
                        <div class="input-group-btn">
                            <a class="btn btn-default" onclick="peekPassword()"><i class="fa fa-eye" id="eye-icon"></i></a>
                        </div>
                    </div>
                    @else
                    <input type="text" class="form-control" name="username" placeholder="Username" required/>
                    @endisset
                    <br>
                    <input type="submit" name="submit" value="Submit" class="col btn btn-primary"/> 
                </form>
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
