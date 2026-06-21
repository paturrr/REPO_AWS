@extends('layouts.app')
@section('title', 'VRA - Building the Future of Digital Innovation')
@section('content')
<section class="hero">
    <div class="hero-glow hero-glow-1"></div>
    <div class="hero-glow hero-glow-2"></div>
    <div class="hero-content">
        <div class="hero-badge"><span class="hero-badge-dot"></span>Now Live — Platform v3.0</div>
        <h1 class="hero-title">Building the Future<br>of <span class="gradient-text glitch-text">Digital Innovation</span></h1>
        <p class="hero-subtitle">We create cutting-edge solutions that transform how people interact with technology. Pioneering the next generation of digital experiences.</p>
        <div class="hero-actions">
            @auth
                <a href="/dashboard" class="btn-primary"><span>Access Portal</span></a>
            @else
                <a href="/login" class="btn-primary"><span>Client Portal Login</span></a>
            @endauth
            <a href="#team" class="btn-secondary">Meet Our Team</a>
        </div>
    </div>
</section>

<!-- Meet Our Engineers (Team Section) -->
<section class="section team-section" id="team">
    <div class="section-inner">
        <div class="reveal">
            <span class="section-label">Our Creators</span>
            <h2 class="section-title">The VRA Core Team</h2>
            <p class="section-desc">The engineering team behind the development, dockerization, and load balancer deployment of ViyenRajaAWS platform.</p>
        </div>
        <div class="team-grid">
            <!-- Member 1: Langgeng Yongi Surya -->
            <div class="team-card reveal" data-tilt>
                <div class="avatar-container">
                    <div class="avatar-glow"></div>
                    <div class="avatar-border-rotate"></div>
                    <img src="https://api.dicebear.com/7.x/bottts/svg?seed=Langgeng" alt="Langgeng Yongi Surya" class="avatar-img">
                </div>
                <h3 class="team-name">Langgeng Yongi Surya</h3>
                <p class="team-id">102022300019</p>
                <span class="team-role">Cloud Architect</span>
            </div>

            <!-- Member 2: Muhammad Viyendra -->
            <div class="team-card reveal" data-tilt>
                <div class="avatar-container">
                    <div class="avatar-glow"></div>
                    <div class="avatar-border-rotate"></div>
                    <img src="https://api.dicebear.com/7.x/bottts/svg?seed=Viyendra" alt="Muhammad Viyendra" class="avatar-img">
                </div>
                <h3 class="team-name">Muhammad Viyendra</h3>
                <p class="team-id">102022300004</p>
                <span class="team-role">DevOps Engineer</span>
            </div>

            <!-- Member 3: Dara Saifah Mahiroh -->
            <div class="team-card reveal" data-tilt>
                <div class="avatar-container">
                    <div class="avatar-glow"></div>
                    <div class="avatar-border-rotate"></div>
                    <img src="https://api.dicebear.com/7.x/bottts/svg?seed=Dara" alt="Dara Saifah Mahiroh" class="avatar-img">
                </div>
                <h3 class="team-name">Dara Saifah Mahiroh</h3>
                <p class="team-id">112313134543</p>
                <span class="team-role">Full-Stack Engineer</span>
            </div>

            <!-- Member 4: Athiyah Naurah Syifa -->
            <div class="team-card reveal" data-tilt>
                <div class="avatar-container">
                    <div class="avatar-glow"></div>
                    <div class="avatar-border-rotate"></div>
                    <img src="https://api.dicebear.com/7.x/bottts/svg?seed=Athiyah" alt="Athiyah Naurah Syifa" class="avatar-img">
                </div>
                <h3 class="team-name">Athiyah Naurah Syifa</h3>
                <p class="team-id">102022300012</p>
                <span class="team-role">Database Engineer</span>
            </div>

            <!-- Member 5: Ahmad Fathurrohman -->
            <div class="team-card reveal" data-tilt>
                <div class="avatar-container">
                    <div class="avatar-glow"></div>
                    <div class="avatar-border-rotate"></div>
                    <img src="https://api.dicebear.com/7.x/bottts/svg?seed=Ahmad" alt="Ahmad Fathurrohman" class="avatar-img">
                </div>
                <h3 class="team-name">Ahmad Fathurrohman</h3>
                <p class="team-id">102022300218</p>
                <span class="team-role">Security Engineer</span>
            </div>
        </div>
    </div>
</section>

<section class="section" id="features">
    <div class="section-inner">
        <div class="reveal"><span class="section-label">What We Do</span><h2 class="section-title">Crafting Extraordinary<br>Digital Experiences</h2><p class="section-desc">Our platform combines cutting-edge technology with elegant design to deliver solutions that scale with your ambitions.</p></div>
        <div class="features-grid">
            <div class="feature-card reveal"><div class="feature-icon">⚡</div><h3 class="feature-title">Lightning Performance</h3><p class="feature-desc">Built for speed with optimized architecture that ensures sub-second response times across all touchpoints.</p></div>
            <div class="feature-card reveal"><div class="feature-icon">🛡️</div><h3 class="feature-title">Enterprise Security</h3><p class="feature-desc">Bank-grade encryption and security protocols protect your data with multi-layer defense systems.</p></div>
            <div class="feature-card reveal"><div class="feature-icon">🔗</div><h3 class="feature-title">Seamless Integration</h3><p class="feature-desc">Connect with your existing tools through our extensive API ecosystem and pre-built connectors.</p></div>
        </div>
    </div>
</section>

<section class="section stats-section">
    <div class="section-inner">
        <div class="stats-grid">
            <div class="stat-item reveal"><div class="stat-number" data-count="150" data-suffix="K+">0</div><div class="stat-label">Active Users</div></div>
            <div class="stat-item reveal"><div class="stat-number" data-count="99.9" data-suffix="%">0</div><div class="stat-label">Uptime SLA</div></div>
            <div class="stat-item reveal"><div class="stat-number" data-count="50" data-suffix="+">0</div><div class="stat-label">Global Regions</div></div>
            <div class="stat-item reveal"><div class="stat-number" data-count="24" data-suffix="/7">0</div><div class="stat-label">Expert Support</div></div>
        </div>
    </div>
</section>
@endsection
