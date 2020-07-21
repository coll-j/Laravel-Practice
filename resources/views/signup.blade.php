<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Questioner</title>
        <!-- Fonts -->
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Nunito" />
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" >

        <!-- Styles -->
        <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    </head>
    <body>
        <div class="flex-center position-abs in-center">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="card card-shadow">
                <div class="title">
                    Sign up
                </div>

                <form method="POST" action="{{ route('add_user') }}">
                    @csrf
                    <hr>
                    <input type="text" class="form-control" name="username" placeholder="Username" required />
                    <input type="password" class="form-control" name="password" placeholder="Password" required />
                    <br>
                    <input type="submit" name="submit" value="Sign up" class="col btn btn-primary"/> 
                </form>
            </div>
        </div>
    </body>
</html>
