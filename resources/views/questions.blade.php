<!DOCTYPE html>
<html>
<head></head>
<body>
<h1>My Questions</h1>

<table>
<thead>
    <th>Title</th>
    <th>Time</th>
    <th>Action</th>
</thead>
<tbody>
    @foreach($questions as $question)
    <tr>
        <td>{{ $question->title }}</td>
        <td>{{ $question->created_at }}</td>
        <td>
            <a href="#">View</a>
            <a href="{{ route('edit_question', $question->id) }}">Edit</a>
            <a href="#">Delete</a>
        </td>
    </tr>
    @endforeach
</tbody>
</table>
<div>
    <a href="{{ route('home') }}">Home</a>
</div>
</body>
</html>