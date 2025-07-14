<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        $projects = Project::where('user_id', $user->id)->get();

        return view('pages.profile.index', compact('projects'));
    }

    public function create() {
        return view('pages.profile.create');
    }

    public function store(Request $request) {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        Project::create([
            'user_id' => $user->id,
            'nama_project' => $request->nama_project,
            'nilai_kontrak' => $request->nilai_kontrak,
            'nilai_connectivity' => $request->nilai_connectivity,
            'tipe_project' => $request->tipe_project
        ]);

        return redirect()->route('profile.index');
    }

    public function update(Request $request, $project_id)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        $project = Project::find($project_id);

        $project->status_project = $request->status_project;
        $project->save();

        return redirect()->route('profile.index');
    }
}
