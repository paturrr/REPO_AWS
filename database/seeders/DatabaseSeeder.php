<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed default admin user
        User::updateOrCreate(
            ['email' => 'kelompok1@vra.com'],
            [
                'name' => 'Kelompok 1 VRA',
                'password' => Hash::make('password'),
            ]
        );

        // Seed some dummy projects for the Board
        Project::create([
            'title' => 'VRA Platform Containerization',
            'description' => 'Dockerize the main Laravel application using Alpine Linux and PHP 8.4-FPM.',
            'category' => 'cloud',
            'status' => 'completed'
        ]);

        Project::create([
            'title' => 'AWS Application Load Balancer Setup',
            'description' => 'Configure multi-instance routing with Target Groups and Sticky Sessions for high availability.',
            'category' => 'cloud',
            'status' => 'completed'
        ]);

        Project::create([
            'title' => 'Security Group Hardening',
            'description' => 'Restrict EC2 instance direct access and only allow inbound HTTP requests from the ALB Security Group.',
            'category' => 'security',
            'status' => 'in_progress'
        ]);

        Project::create([
            'title' => 'Glassmorphic Front-End Upgrades',
            'description' => 'Implement premium UI components inspired by Igloo.inc with rotate glowing borders and mouse-tilt effects.',
            'category' => 'design',
            'status' => 'planning'
        ]);
    }
}
