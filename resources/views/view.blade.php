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
    input[readonly].no-border:focus{
    background-color:transparent;
    border: 0;
    font-size: 1em;
    outline: none;
    }

    </style>
</head>
<body>
    <!-- Modal delete question -->
    <div class="modal fade in" id="edit-button" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        Are you sure to delete this question?
                    </div>
                    <div class="modal-footer p-1">
                        <button type="button" class="btn btn-secondary m-1" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary m-1">Save</button>
                    </div>
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
    <section id="home">
        <div class="container m-con" data-aos="zoom-in" data-aos-delay="100">
            <form method="POST" action="{{ route('update_question') }}">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $question->id }}">
                <input type="text" name="title" class="form-control-plaintext no-border h2" value="{{ $question->title }}" disabled>
                <button type="button" class="btn btn-link " onclick="toggleForm(this)"><i class='fa fa-pencil'></i></button>
                <button type="button" class="btn btn-link" data-toggle="modal" data-target="#edit-button" id="edit-button"><i class='fa fa-trash'></i></button>
                <!-- <div class="row"> -->
                    <div class="card">
                        <div class="card-body">
                            <textarea type="text" name="body" class="form-control-plaintext" rows="6" style="resize: none;" disabled>{{ $question->body }}</textarea>
                        </div>
                    </div>
                <!-- </div> -->
                <input type="hidden" class="btn btn-primary" value="Save">
            </form>
            <div class="text-right">
                <small class="text-muted">By {{ $question->username }}</small>
                <small class="text-muted"> • Asked {{ $question->created_at }}</small>
                @if($question->updated_at != $question->created_at)
                    <small class="text-muted"> •  Last edited {{ $question->updated_at }}</small>
                @endif
            </div>
            
            <!--Show Answer -->
            @isset($showanswers)
                @if(!($showanswers->isEmpty())) 
                    <h3 class="mt-3">Answers</h3>
                @endif
                @foreach($showanswers ?? '' as $jawab)
                <form>
                <input type="hidden" name="id_query" class="form-control" value="{{ $jawab->id }}">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <input type="text" class="form-control-plaintext no-border mb-2" name="body" value="{{ $jawab->body }}" readonly />
                            <br>
                        </form>
                            @if( Session::get('username') == $jawab->username)
                            <!-- <a href="{{ route('edit_answer',['id'=> $jawab->id, 'id_query'=> $jawab->id_query]) }}"><i class='fa fa-pencil'></i></a> -->
                            <button type="button" class="btn btn-link" onclick=""><i class='fa fa-pencil'></i></button>
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

            <br>
            <h4>Add Answer</h4>
            <form method="POST" action="{{ isset($answer)? route('edit_answer') : route('add_answer') }}" class="form">
                @csrf
                <div class="form-group"> 
                    <input type="hidden" name="id_query" class="form-control" value="{{ $question->id }}">
                </div>
                <div class="form-group">
                    <input type="hidden" name="username" class="form-control" value="{{ Session::get('username') }}">
                </div>
                <textarea rows="6" name="body" class="form-control" required>{{ $answers->body ?? ''}}</textarea>
                <input type="submit" name="submit" value="Submit Answer" class="mt-1 btn btn-primary"/> 
            </form> 


            <!--<button onclick="myFunction()">Try it</button> -->

        </div>

        <script>
            function toggleForm(element){
                var parent = element.parentElement;
                var children = parent.elements;
                for(let i = 0; i < children.length; i++)
                {
                    if(children[i].hasAttribute("disabled"))
                    {
                        var temp;
                        if(children[i].classList.contains("card"))
                        {
                            temp = children[i].elements[0].elements[0];
                        }
                        else temp = children[i];
                        temp.removeAttribute("disabled");
                        temp.classList.remove("form-control-plaintext");
                        temp.classList.remove("no-border");
                        temp.classList.add("form-control");
                    }
                    if(children[i].type == "hidden" && children[i].classList.contains("btn"))
                    {
                        children[i].type = "submit";
                    }
                }
                console.log(children);
            }
        // function myFunction() {
        //     var x = document.getElementById('box-answer');
        //     if (x.style.display === "none") {
        //         x.style.display = "block";
        //     } else {
        //         x.style.display = "none";
        //     }
        // }
        // function closeBox() {
        //     var x = document.getElementById('box-answer');
        //     var y = document.getElementById('close-icon');
        //     if (!(x.style.display === "none")) {
        //         x.style.display = "none";
        //         y.classList.remove('fa-close');
        //     }
        // }
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </section>
</body>
</html>