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
        // Users list with 5 specific member emails requested
        $users = [
            [
                'name' => 'Muhammad Viyendra',
                'email' => 'viyendra@vra.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Langgeng Yongi Surya',
                'email' => 'yongi@vra.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Ahmad Fathurrohman',
                'email' => 'tourrr@vra.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Athiyah Naurah Syifa',
                'email' => 'atiyeuuu@vra.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Dara Saifah Mahiroh',
                'email' => 'darderdor@vra.com',
                'password' => Hash::make('password'),
            ]
        ];

        foreach ($users as $userData) {
            User::updateOrCreate(
                ['email' => $userData['email']],
                [
                    'name' => $userData['name'],
                    'password' => $userData['password'],
                ]
            );
        }

        // Seed initial projects
        Project::updateOrCreate(
            ['title' => 'VRA Platform Containerization'],
            [
                'description' => 'Dockerize the main Laravel application using Alpine Linux and PHP 8.4-FPM.',
                'category' => 'cloud',
                'status' => 'completed'
            ]
        );

        Project::updateOrCreate(
            ['title' => 'AWS Application Load Balancer Setup'],
            [
                'description' => 'Configure multi-instance routing with Target Groups and Sticky Sessions for high availability.',
                'category' => 'cloud',
                'status' => 'completed'
            ]
        );

        Project::updateOrCreate(
            ['title' => 'Security Group Hardening'],
            [
                'description' => 'Restrict EC2 instance direct access and only allow inbound HTTP requests from the ALB Security Group.',
                'category' => 'security',
                'status' => 'in_progress'
            ]
        );

        Project::updateOrCreate(
            ['title' => 'Glassmorphic Front-End Upgrades'],
            [
                'description' => 'Implement premium UI components inspired by Igloo.inc with rotate glowing borders and mouse-tilt effects.',
                'category' => 'design',
                'status' => 'planning'
            ]
        );
    }
}
