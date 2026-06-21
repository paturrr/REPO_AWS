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

        // Clear existing projects first to fresh-seed
        Project::truncate();

        // Seed VRA Joki Orders
        Project::create([
            'title' => 'Joki Laravel Expert & Dashboard',
            'description' => 'Membuat Sistem Informasi Inventory berbasis Laravel 11 dengan dashboard chart interaktif.',
            'category' => 'development',
            'status' => 'completed'
        ]);

        Project::create([
            'title' => 'Joki Bawa Motor Bandung-Jakarta',
            'description' => 'Mengirim dan mengendarai motor NMAX dari Pasteur Bandung ke Tebet Jakarta Selatan.',
            'category' => 'cloud', // using cloud category as logistical placeholder
            'status' => 'completed'
        ]);

        Project::create([
            'title' => 'Joki Skripsi & Data Mining',
            'description' => 'Implementasi algoritma K-Means Clustering untuk analisis data kependudukan desa Konoha.',
            'category' => 'development',
            'status' => 'in_progress'
        ]);

        Project::create([
            'title' => 'Joki Valorant: Platinum to Diamond',
            'description' => 'Push rank akun client dari Platinum 2 ke Diamond 1 menggunakan Agent Reyna/Jett.',
            'category' => 'security', // using security category as gaming placeholder
            'status' => 'in_progress'
        ]);

        Project::create([
            'title' => 'Joki Desain UI/UX Landing Page',
            'description' => 'Desain Wireframe dan High-Fidelity Prototype untuk portal perizinan Pemerintah Konoha.',
            'category' => 'design',
            'status' => 'planning'
        ]);
    }
}
