<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{

    public function index() {
        $todos = Todo::paginate(5);


        return view('todo.list', ["todos"=>$todos]);
    }
}
