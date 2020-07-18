<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Questions;

class QuestionsController extends Controller
{
    public function index () {
        $username = session()->get('username');
        $questions = Questions::where('username', $username)->orderBy('created_at', 'desc')->get();
        return view('questions', compact('questions'));
    }

    public function insert (Request $request) {
        Questions::create([
            'username' => $request->username,
            'title' => $request->title,
            'body' => $request->body
        ]);
        
        return redirect('home');
    }

    public function edit ($id) {
        $question = Questions::find($id);
        return view('ask', compact('question'));
    }

    public function editPut (Request $request) {
        Questions::find($request->id)->update([
            'title' => $request->title,
            'body' => $request->body
        ]);
        return view('home');
    }
}
