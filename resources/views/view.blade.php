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
                    <li class="nav-item active"><a class="nav-link" href="{{ route('logout') }}">Logout</a></li>
                </ul>
            </div>
            <form method="GET" action="{{ route('search_question') }}" class="form-inline my-2 my-lg-0 ml-auto">
                <input class="form-control mr-sm-2" type="text" name="string"  placeholder="Search"> 
                <button class="btn btn-primary fa fa-search my-2 my-sm-0" type="submit"></button>
            </form>
        </div>
    </nav>
    <section id="home">
        <div class="container m-con" data-aos="zoom-in" data-aos-delay="100">
            <h1>Viewed Question</h1>
            @foreach($flag ?? '' as $question)
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $question->title }}</h5>
                        <p class="card-text">{{ $question->body }}</p>
                        <a class="btn btn-outline-dark float-right fa fa-user"><span class="nunito">  {{ $question->username }}</span></a>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Posted at {{ $question->created_at }}</small>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</body>
</html>