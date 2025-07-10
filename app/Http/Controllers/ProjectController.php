<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function index()
    {
        // $projects = DB::table('projects as a')
        //     ->join('project_orders as b', 'b.project_id', '=', 'a.id')
        //     ->select(
        //         'a.nama_project',
        //         'a.nama_pm',
        //         'a.tipe_project',
        //         'a.status_project',
        //         DB::raw('count(b.number_order) as total_order')
        //     )
        //     ->groupBy('a.nama_project', 'a.nama_pm', 'a.tipe_project', 'a.status_project')
        //     ->get();

        $projects = Project::with('project_orders')->get();

        return view('pages.project.index', compact('projects'));
    }
}
