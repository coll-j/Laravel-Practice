<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answers;

class AnswersController extends Controller
{
    public function insert (Request $request) {
        Answers::create([
            'id_query' => $request->id_query,
            'username' => $request->username,
            'body' => $request->body
        ]);
        
        return;
    }
}
