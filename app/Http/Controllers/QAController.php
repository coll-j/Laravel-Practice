<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Questions;
use App\Answers;

class QAController extends Controller
{
    public function userQuestions () {
        $username = session()->get('username');
        $questions = Questions::where('username', $username)->orderBy('created_at', 'desc')->get();
        return view('questions', compact('questions'));
    }

    public function allQuestions() {
        $questions = Questions::orderBy('created_at', 'desc')->paginate(3); // paginasi, berapa item per page
        return view('home', ['questions' => $questions]);
    }

    public function filterQuestionsByName(Request $request) {
        $questions = Questions::where('title', 'like', '%' . $request->string . '%')->paginate(3);
        return view('search', ['questions' => $questions]);
    }

    public function insertQuestion (Request $request) {
        Questions::create([
            'username' => $request->username,
            'title' => $request->title,
            'body' => $request->body
        ]);
        
        return redirect('home');
    }

    public function insertAnswer (Request $request) {
        Answers::create([
            'id_query' => $request->id_query,
            'username' => $request->username,
            'body' => $request->body
        ]);
        
        return redirect()->back();
    }

    public function editAnswer ($id, $id_query) {
        $answer = Answers::find($id, $id_query);
        return view('view', [$id => $id_query]);
    }

    public function deleteAnswer (Request $request)
    {
        Answers::find($request->id)->delete($request->id);
        return redirect()->back();
    }

    public function editQuestion ($id) {
        $question = Questions::find($id);
        return view('ask', compact('question'));
    }

    public function editPutQuestion (Request $request) {
        Questions::find($request->id)->update([
            'title' => $request->title,
            'body' => $request->body
        ]);
        return view('home');
    }

    public function deleteQuestion (Request $request)
    {
        Questions::find($request->id)->delete($request->id);
        return redirect()->back();
    }

    public function show ($id) {
        $question = Questions::where('id', $id)->first();
        $showanswers = Answers::where('id_query', $question->id)->get();
         return view('view',compact('question','showanswers'));
     } 

 
}
