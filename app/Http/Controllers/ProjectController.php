<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('created_at', 'desc')->get();
        
        // Calculate statistics
        $stats = [
            'total' => $projects->count(),
            'planning' => $projects->where('status', 'planning')->count(),
            'in_progress' => $projects->where('status', 'in_progress')->count(),
            'completed' => $projects->where('status', 'completed')->count(),
        ];

        return view('dashboard', compact('projects', 'stats'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'category' => 'required|in:development,design,cloud,security',
            'status' => 'required|in:planning,in_progress,completed',
        ]);

        Project::create($validated);

        return redirect('/dashboard')->with('success', 'Project created successfully!');
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'status' => 'required|in:planning,in_progress,completed',
        ]);

        $project->update($validated);

        return redirect('/dashboard')->with('success', 'Project status updated!');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect('/dashboard')->with('success', 'Project deleted successfully!');
    }
}
