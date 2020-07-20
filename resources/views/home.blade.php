<!DOCTYPE html>
<html>
<head></head>
<body>
<h1>Home</h1>
<div>
    <a href="{{ route('ask') }}">Ask Question</a> | 
    <a href="{{ route('questions') }}">My Questions</a> | 
    <a href="{{ route('logout') }}">Log out</a> | 
    <form method="GET" action="{{ route('search_question') }}" class="form">
        <input type="text" name="string" class="form-control">
        <input type="submit" value="Search">
    </form>
</div>
<table>
<thead>
    <th>Title</th>
    <th>Posted by</th>
    <th>Posted at</th>
    <th></th>
</thead>
<tbody>
    @foreach($questions as $question)
    <tr>
        <td>{{ $question->title }}</td>
        <td>{{ $question->username }}</td>
        <td>{{ $question->created_at }}</td>
        <td>
            <a href="{{ route('view' , $question->id)}}">View</a>
        </td>
    </tr>
    @endforeach
</tbody>
</table>
@include('pagination', ['paginator' => $questions])
</body>
</html>