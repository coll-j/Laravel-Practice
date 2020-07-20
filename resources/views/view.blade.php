<!DOCTYPE html>
<html>
<head></head>
<body>
<h1>My Questions</h1>

<table>
<thead>
    <th>Title</th>
    <th>Body</th>
    <th>Time</th>
</thead>
<tbody>
    @foreach($flag as $show)
    <tr>
        <td>{{ $show->title }}</td>
        <td>{{ $show->body }}</td>
        <td>{{ $show->created_at }}</td>
    </tr>
    @endforeach
</tbody>
</table>
<div>
    <a href="{{ route('home') }}">Home</a>
</div>
</body>
</html>