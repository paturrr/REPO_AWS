@extends('layouts.app')
@section('title', 'VRA - Jasa Joki & Tugas Profesional Terpercaya')
@section('content')
<section class="hero">
    <div class="hero-glow hero-glow-1"></div>
    <div class="hero-glow hero-glow-2"></div>
    <div class="hero-content">
        <div class="hero-badge"><span class="hero-badge-dot"></span>Official Partner — Pemerintah Konoha</div>
        <h1 class="hero-title">Solusi Tugas Kuliah<br><span class="gradient-text glitch-text">Tanpa Pusing</span></h1>
        <p class="hero-subtitle">VRA menyediakan jasa joki kodingan, skripsi, UI/UX, writing, logistik, hingga gaming dengan kualitas terbaik. Garansi nilai A dan pengerjaan kilat oleh para ahli.</p>
        <div class="hero-actions">
            @auth
                <a href="/dashboard" class="btn-primary"><span>Masuk Control Center</span></a>
            @else
                <a href="/login" class="btn-primary"><span>Order Joki / Login</span></a>
            @endauth
            <a href="#team" class="btn-secondary">Hubungi Joki Kami</a>
        </div>
    </div>
</section>

<!-- Meet Our Engineers (Team Section) -->
<section class="section team-section" id="team">
    <div class="section-inner">
        <div class="reveal">
            <span class="section-label">Para Ahli VRA</span>
            <h2 class="section-title">VRA Core Team Specialists</h2>
            <p class="section-desc">Tim spesialis andalan VRA yang siap menyelesaikan tugas, logistik, hingga hobi Anda.</p>
        </div>
        <div class="team-grid">
            <!-- Member 1: Langgeng Yongi Surya -->
            <div class="team-card reveal" data-tilt>
                <div class="avatar-container">
                    <div class="avatar-glow"></div>
                    <div class="avatar-border-rotate"></div>
                    <img src="{{ asset('images/langgeng.jpeg') }}" alt="Langgeng Yongi Surya" class="avatar-img" style="object-fit: cover;">
                </div>
                <h3 class="team-name">Langgeng Yongi Surya</h3>
                <p class="team-id">102022300019</p>
                <span class="team-role">Spesialis Balap Lari</span>
            </div>

            <!-- Member 2: Muhammad Viyendra -->
            <div class="team-card reveal" data-tilt>
                <div class="avatar-container">
                    <div class="avatar-glow"></div>
                    <div class="avatar-border-rotate"></div>
                    <img src="{{ asset('images/viyendra.jpeg') }}" alt="Muhammad Viyendra" class="avatar-img" style="object-fit: cover;">
                </div>
                <h3 class="team-name">Muhammad Viyendra</h3>
                <p class="team-id">102022300004</p>
                <span class="team-role">Laravel Expert</span>
            </div>

            <!-- Member 3: Dara Saifah Mahiroh -->
            <div class="team-card reveal" data-tilt>
                <div class="avatar-container">
                    <div class="avatar-glow"></div>
                    <div class="avatar-border-rotate"></div>
                    <img src="{{ asset('images/dara.jpeg') }}" alt="Dara Saifah Mahiroh" class="avatar-img" style="object-fit: cover;">
                </div>
                <h3 class="team-name">Dara Saifah Mahiroh</h3>
                <p class="team-id">102022330396</p>
                <span class="team-role">UI/UX & Writing</span>
            </div>

            <!-- Member 4: Athiyah Naurah Syifa -->
            <div class="team-card reveal" data-tilt>
                <div class="avatar-container">
                    <div class="avatar-glow"></div>
                    <div class="avatar-border-rotate"></div>
                    <img src="{{ asset('images/atiyeuuu.jpeg') }}" alt="Athiyah Naurah Syifa" class="avatar-img" style="object-fit: cover;">
                </div>
                <h3 class="team-name">Athiyah Naurah Syifa</h3>
                <p class="team-id">102022300012</p>
                <span class="team-role">Data Mining & DB</span>
            </div>

            <!-- Member 5: Ahmad Fathurrohman -->
            <div class="team-card reveal" data-tilt>
                <div class="avatar-container">
                    <div class="avatar-glow"></div>
                    <div class="avatar-border-rotate"></div>
                    <img src="{{ asset('images/ahmad.jpg') }}" alt="Ahmad Fathurrohman" class="avatar-img" style="object-fit: cover;">
                </div>
                <h3 class="team-name">Ahmad Fathurrohman</h3>
                <p class="team-id">102022300218</p>
                <span class="team-role">Logistik & Gaming</span>
            </div>
        </div>
    </div>
</section>

<section class="section" id="features">
    <div class="section-inner">
        <div class="reveal"><span class="section-label">Layanan Kami</span><h2 class="section-title">Semua Bisa Dijoki<br>Semua Bisa Beres</h2><p class="section-desc">Apapun tugas atau tantangan hidup Anda, serahkan kepada spesialis VRA yang telah berpengalaman luas.</p></div>
        <div class="features-grid">
            <div class="feature-card reveal">
                <div class="feature-icon">💻</div>
                <h3 class="feature-title">Joki Koding & Skripsi</h3>
                <p class="feature-desc">Laravel expert, basis data, data mining, hingga skripsi IT tuntas dikerjakan dengan standar industri.</p>
            </div>
            <div class="feature-card reveal">
                <div class="feature-icon">🏍️</div>
                <h3 class="feature-title">Logistik & Menyetir</h3>
                <p class="feature-desc">Butuh joki menyetir mobil atau bawa motor Bandung - Jakarta? Tim kami siap mengantar dengan selamat.</p>
            </div>
            <div class="feature-card reveal">
                <div class="feature-icon">🎮</div>
                <h3 class="feature-title">Joki Game & Lari</h3>
                <p class="feature-desc">Jasa push rank Valorant, bangun server Minecraft, hingga balap lari perorangan oleh atlet andalan kami.</p>
            </div>
        </div>
    </div>
</section>

<section class="section stats-section">
    <div class="section-inner">
        <div class="stats-grid">
            <div class="stat-item reveal"><div class="stat-number" data-count="1200" data-suffix="+">0</div><div class="stat-label">Tugas Terselesaikan</div></div>
            <div class="stat-item reveal"><div class="stat-number" data-count="98" data-suffix="%">0</div><div class="stat-label">Nilai A / A+</div></div>
            <div class="stat-item reveal"><div class="stat-number" data-count="5" data-suffix="">0</div><div class="stat-label">Joki Berdedikasi</div></div>
            <div class="stat-item reveal"><div class="stat-number" data-count="24" data-suffix="/7">0</div><div class="stat-label">Layanan Siaga</div></div>
        </div>
    </div>
</section>
@endsection
