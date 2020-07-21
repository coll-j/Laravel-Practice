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
    <section id="home">
        <div class="container m-con" data-aos="zoom-in" data-aos-delay="100">
            <h1>{{ $question->title }}</h1>
            <div>
                <small class="text-muted">By {{ $question->username }}</small>
                <small>•</small>
                <small class="text-muted">Posted at {{ $question->created_at }}</small>
            </div>
            @if($question->updated_at != $question->created_at)
            <small class="text-muted">Last edited {{ $question->updated_at }}</small>
            @endif
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <p class="card-text">{{ $question->body }}</p>
                    </div>
                </div>
            </div>
            
            <!--Show Answer -->
            <h3 class="mt-3">Answers</h3>
            @isset($showanswers)
                @foreach($showanswers ?? '' as $jawab)
                <form>
                <input type="hidden" name="id_query" class="form-control" value="{{ $jawab->id }}">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                           
                            <p class="card-text">{{ $jawab->body }}</p>
                            @if( Session::get('username') == $jawab->username)
                            <a href="{{ route('edit_answer',['id'=> $jawab->id, 'id_query'=> $jawab->id_query]) }}"><i class='fa fa-pencil'></i></a>
                            <a href="{{ route('delete_answer', $jawab->id) }}"><i class='fa fa-trash'></i></a>
                            @endif
                        </div>
                        <div class="card-footer">
                            <div>
                                <small class="text-muted">By {{ $jawab->username }}</small>
                                <small>•</small>
                                <small class="text-muted">Posted at {{ $jawab->created_at }}</small>
                            </div>
                            @if($jawab->updated_at != $jawab->created_at)
                            <div>
                                <small class="text-muted">Last edited {{ $question->updated_at }}</small>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                </form>
              @endforeach
            @endisset
        </div>
        
        <h2>Add Answer</h2>
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

    </section>
</body>
</html>