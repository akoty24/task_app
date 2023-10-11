<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index(){
        $tasks = Task::where('user_id', Auth::id())->get();
        return view('welcome', compact('tasks'));
    }
}
