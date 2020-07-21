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
    <div class="container m-con">
        <h1 class="mb-3">Search Result</h1>

        <table class="table table-striped table-hover table-sm table-bordered bg-light">
        <thead>
            <tr>
                <th>Title</th>
                <th>Posted by</th>
                <th>Posted at</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if($questions->isEmpty())
                <tr ><td colspan="4">Sorry, no matches data found</td></tr>
            @else
                @foreach($questions as $question)
                <tr>
                    <td>{{ $question->title }}</td>
                    <td>{{ $question->username}}</td>
                    <td>{{ $question->created_at }}</td>
                    <td>
                        <a href="{{ route('view' , $question->id)}}"><i class='fa fa-eye'></i> </a>
                    </td>
                </tr>
                @endforeach
            @endif
        </tbody>
        </table>
    </div>
@include('pagination', ['paginator' => $questions])
</body>
</html>