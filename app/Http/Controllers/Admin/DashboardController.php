<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        $totalUsers = User::count();
        $totalTasks = Task::count();
        return view('admin.dashboard',compact('totalTasks','totalUsers'));
    }
}
