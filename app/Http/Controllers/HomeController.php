<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tasks = Task::get();
        $projects = Project::get();

        return view('home', compact('tasks', 'projects'));
    }
}
