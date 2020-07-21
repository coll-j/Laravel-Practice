<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Questions;
use App\Answers;

class QuestionsAnswersController extends Controller
{
    public function indexQuestion () {
        $username = session()->get('username');
        $questions = Questions::where('username', $username)->orderBy('created_at', 'desc')->get();
        return view('questions', compact('questions'));
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
        
        return;
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

     public function show ($id) {
        $flag = Questions::where('id', $id)->get();
         return view('view',compact('flag'));
     } 
    
}
