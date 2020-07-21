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
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $question->title }}</h5>
                        <p class="card-text">{{ $question->body }}</p>
                        <a class="btn btn-outline-dark float-right fa fa-user"><span class="nunito">  {{ $question->username }}</span></a>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Post on {{ $question->created_at }}</small>
                    </div>
                </div>
            </div>
            
        </div>
        
        <h2>Answer</h2>
        <form method="POST" action="{{ isset($answer)? route('edit_answer') : route('add_answer') }}" class="form">
        
        @csrf
       
        <div class="form-group">
            
            <input type="hidden" name="id_query" class="form-control" value="{{ $question->id }}">
        </div>
       
        <div class="form-group">
            <input type="hidden" name="username" class="form-control" value="{{ Session::get('username') }}">
        </div>
        
        <textarea rows="6" name="body" class="form-control" >{{ $answers->body ?? ''}}</textarea>
         <input type="submit" value="Submit Answer">
         
        </form> 
        <!--Show Answer -->
        <h1>Show Answer</h1>
       @isset($showanswers)
            @foreach($showanswers ?? '' as $jawab)
            <form>
            <input type="hidden" name="id_query" class="form-control" value="{{ $jawab->id }}">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                       
                        <p class="card-text">{{ $jawab->body }}</p>
                        <a class="btn btn-outline-dark float-right fa fa-user"><span class="nunito">  {{ $jawab->username }}</span></a>
                       <a href="{{ route('edit_answer',['id'=> $jawab->id, 'id_query'=> $jawab->id_query]) }}"><i class='fa fa-pencil'></i></a>
                        <a href="{{ route('delete_answer', $jawab->id) }}"><i class='fa fa-trash'></i></a>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Post on {{ $jawab->created_at }}</small>
                        
                    </div>
                </div>
            </div>
            </form>
          @endforeach
            @endisset

    </section>
</body>
</html>