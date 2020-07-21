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
                <button name="string" class="btn btn-primary fa fa-search my-2 my-sm-0" type="submit"></button>
            </form>
        </div>
    </nav>
    <div class="container m-con" data-aos="zoom-in" data-aos-delay="100">
        <div class="row">
        <div class="col">
            <h1>Ask Question</h1>
            <form method="POST" action="{{ isset($question)? route('update_question') : route('add_question') }}" class="form">
                @csrf
                @isset($question)
                @method('PUT')     
                <div class="form-group">
                    <input type="hidden" name="id" class="form-control" value="{{ $question->id }}">
                </div>
                @endisset
                <div class="form-group">
                    <input type="hidden" name="username" class="form-control" value="{{ Session::get('username') }}">
                </div>
                <div class="form-group">
                    <label>Title</label><br>
                    <small class="less">Be specific and imagine you’re asking a question to another person</small>
                    <input type="text" name="title" class="form-control" value="{{ $question->title ?? ''}}">
                </div>
                <div class="form-group">
                    <label>Body</label><br>
                    <small class="less">Include all the information someone would need to answer your question</small>
                    <textarea rows="6" name="body" class="form-control">{{ $question->body ?? ''}}</textarea>
                </div>
                <input type="submit" class="col btn btn-primary" value="Submit Question">
            </form>
        </div>
        <div class="col">
            <img src="{{URL::asset('img/faq.jpg')}}" alt="profile Pic" height="450px">
        </div>
        </div>
    </div>
</body>
</html>