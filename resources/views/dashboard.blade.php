@extends('layouts.app')
@section('title', 'Dashboard - VRA Control Center')
@section('content')
<div class="dashboard-wrapper">
@php
    $categoryLabels = [
        'coding' => '💻 Coding',
        'academic' => '🎓 Skripsi',
        'design' => '🎨 UI/UX',
        'gaming' => '🎮 Game',
        'logistics' => '🏍️ Logistik',
        'driving' => '🚗 Driving',
        'athletics' => '🏃‍♂️ Lari',
    ];
@endphp
    <!-- Header -->
    <div class="dashboard-header reveal">
        <div>
            <span class="section-label">Control Center</span>
            <h1 class="section-title">VRA Project Board</h1>
            <p class="section-desc">Manage digital projects running across the ViyenRajaAWS infrastructure.</p>
        </div>
        <div class="header-actions">
            <span class="user-badge">Authenticated as: <strong>{{ Auth::user()->name }}</strong></span>
            <form action="/logout" method="POST" class="inline-form">
                @csrf
                <button type="submit" class="btn-secondary btn-logout">Logout</button>
            </form>
        </div>
    </div>

    <!-- Alert Success -->
    @if (session('success'))
        <div class="alert alert-success reveal">
            {{ session('success') }}
        </div>
    @endif

    <!-- Stats Section -->
    <div class="dashboard-stats reveal">
        <div class="stat-card">
            <div class="stat-card-title">Total Projects</div>
            <div class="stat-card-value">{{ $stats['total'] }}</div>
        </div>
        <div class="stat-card">
            <div class="stat-card-title">Planning</div>
            <div class="stat-card-value text-planning">{{ $stats['planning'] }}</div>
        </div>
        <div class="stat-card">
            <div class="stat-card-title">In Progress</div>
            <div class="stat-card-value text-progress">{{ $stats['in_progress'] }}</div>
        </div>
        <div class="stat-card">
            <div class="stat-card-title">Completed</div>
            <div class="stat-card-value text-completed">{{ $stats['completed'] }}</div>
        </div>
    </div>

    <div class="dashboard-grid">
        <!-- Project Creation Form -->
        <div class="dashboard-form-container reveal">
            <div class="glass-card">
                <h3 class="form-title">Create New Project</h3>
                <form action="/projects" method="POST" class="project-form">
                    @csrf
                    <div class="form-group">
                        <label for="title">Project Name</label>
                        <input type="text" id="title" name="title" required placeholder="e.g. Database Indexing">
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" placeholder="Brief details about the project..."></textarea>
                    </div>

                    <div class="form-row">
                        <div class="form-group half">
                            <label for="category">Category</label>
                            <select id="category" name="category" required>
                                <option value="coding">💻 Joki Coding (Laravel/IT)</option>
                                <option value="academic">🎓 Joki Skripsi & Akademik</option>
                                <option value="design">🎨 Joki UI/UX (Figma)</option>
                                <option value="gaming">🎮 Joki Game (Valo/MC)</option>
                                <option value="logistics">🏍️ Joki Logistik & Paket</option>
                                <option value="driving">🚗 Joki Driver / Menyetir</option>
                                <option value="athletics">🏃‍♂️ Joki Balap Lari by Lang</option>
                            </select>
                        </div>
                        <div class="form-group half">
                            <label for="status">Initial Status</label>
                            <select id="status" name="status" required>
                                <option value="planning">Planning</option>
                                <option value="in_progress">In Progress</option>
                                <option value="completed">Completed</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn-primary form-submit-btn"><span>Launch Project</span></button>
                </form>
            </div>
        </div>

        <!-- Project List -->
        <div class="dashboard-list-container reveal">
            <h3 class="board-title">Active Projects</h3>
            
            @if ($projects->isEmpty())
                <div class="empty-state">
                    <p>No projects found. Launch your first project using the form on the left.</p>
                </div>
            @else
                <div class="project-board-grid">
                    @foreach ($projects as $project)
                        <div class="project-board-card">
                            <div class="card-header">
                                <span class="project-board-tag tag-{{ $project->category }}">{{ $categoryLabels[$project->category] ?? ucfirst($project->category) }}</span>
                                <span class="project-board-status status-{{ $project->status }}">{{ str_replace('_', ' ', $project->status) }}</span>
                            </div>
                            
                            <h4 class="project-board-title">{{ $project->title }}</h4>
                            <p class="project-board-desc">{{ $project->description }}</p>
                            
                            <div class="card-footer">
                                <!-- Update Status Form -->
                                <form action="/projects/{{ $project->id }}" method="POST" class="update-status-form">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" onchange="this.form.submit()" class="status-select">
                                        <option value="planning" {{ $project->status == 'planning' ? 'selected' : '' }}>Planning</option>
                                        <option value="in_progress" {{ $project->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                        <option value="completed" {{ $project->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                    </select>
                                </form>

                                <!-- Delete Form -->
                                <form action="/projects/{{ $project->id }}" method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete" onclick="return confirm('Are you sure you want to delete this project?')">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
