<!DOCTYPE html>
<html>
<head>
    <title>Questioner</title>
    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Nunito" />
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <style>
        .stretched-link::after {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 1;
            pointer-events: auto;
            content: "";
            background-color: rgba(0,0,0,0);
        }

        .row .card .card-body:hover {
            background-color: lightgrey;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <nav class="navbar sticky-top navbar-expand-lg bg-dark navbar-dark">
		<div class="container">
            <a class="navbar-brand text-white">Questioner</a>
        
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
                    <li class="nav-item active"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item active"><a class="nav-link" href="{{ route('ask') }}">Ask</a></li>
                    <li class="nav-item active"><a class="nav-link" href="{{ route('questions') }}">MyQuest</a></li>
                    <li class="nav-item active"><a class="nav-link" href="{{ route('answers') }}">MyAns</a></li>
                </ul>
            </div>
            <div>
                <div class="d-inline-block">
                    <form method="GET" action="{{ route('search_question') }}" class="form-inline my-2 my-lg-0 ml-auto">
                        <input class="form-control mr-sm-2" type="text" name="string"  placeholder="Search"> 
                        <button class="btn btn-primary fa fa-search my-2 my-sm-0" type="submit"></button>
                    </form>
                </div>
                <div class="d-inline-block">
                    <a class="nav-link fa fa-sign-out" href="{{ route('logout') }}" style="font-size: 150%;"></a>
                </div>
            </div>
        </div>
    </nav>

    <!-- <div class="header-bg"></div> -->
    <section id="home">
        <div class="container mt-3" data-aos="zoom-in" data-aos-delay="100">
            <h1>Home</h1>
            @if($questions->isEmpty())
            <h2>Hai, {{ Session::get('username') }}, let ask!</h2>
            <a href="\ask" class="btn btn-primary">Ask</a>
            @endif
            @foreach($questions ?? '' as $question)
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $question->title }}</h5>
                        <!-- <p class="card-text">{{ $question->body }}</p> -->
                        <a href="{{ route('view' , $question->id)}}" class="btn btn-primary float-right stretched-link">View</a>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">By {{ $question->username }}</small>
                        <small>•</small>
                        <small class="text-muted">Posted at {{ $question->created_at }}</small>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    @include('pagination', ['paginator' => $questions ?? ''])
</body>
</html>