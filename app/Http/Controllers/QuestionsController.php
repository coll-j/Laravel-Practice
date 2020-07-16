<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function insert (Request $request) {
        User::create([
            'username' => $request->username,
            'title' => $request->title,
            'body' => $request->body
        ]);
        
        return;
    }
}
