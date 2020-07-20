<!DOCTYPE html>
<html>
<head></head>
<body>
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
        <label>Title</label>
        <input type="text" name="title" class="form-control" value="{{ $question->title ?? ''}}">
    </div>
    <div class="form-group">
        <label>Body</label>
        <textarea rows="6" name="body" class="form-control">{{ $question->body ?? ''}}</textarea>
    </div>
    <input type="submit" value="submit question">
</form>

</body>
</html>