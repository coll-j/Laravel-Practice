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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <style>
        .clickable:hover { 
            cursor: pointer;
        } 
    </style>
</head>
<body>
    <!-- Modal delete question -->
    <div class="modal fade in" id="edit-button" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="POST" action="{{ route('delete_question') }}">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" id="modal-id">
                        <div class="modal-body">
                            Are you sure to delete this question?
                        </div>
                        <div class="modal-footer p-1">
                            <button type="button" class="btn btn-secondary m-1" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger m-1">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
    </div>
    <!-- End Modal -->
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
    <div class="container m-con">
        <h1 class="mb-3">My Questions</h1>

        <table class="table table-hover table-sm">
        <thead class="bg-light">
            <tr>
                <th>Title</th>
                <th>Posted / Edited at</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($questions as $question)
            <tr>
                <td style="width:70%" class="clickable" onclick="window.location='{{ route('view' , $question->id)}}'">{{ $question->title }}</td>
                <td style="width:23%" class="clickable" onclick="window.location='{{ route('view' , $question->id)}}'">{{ $question->created_at }}</td>
                <td style="width:7%">
                    <a href="{{ route('view' , $question->id)}}"><i class='fa fa-eye'></i> </a>
                    <a href="{{ route('edit_question', $question->id) }}"><i class='fa fa-pencil'></i></a>
                    <a href="#" onclick="changeModalId({{ $question->id }})" data-toggle="modal" data-target="#edit-button"><i class='fa fa-trash'></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>

    <script>
        function changeModalId(id){
            document.getElementById('modal-id').value = id;
        }
    </script>
</body>
</html>