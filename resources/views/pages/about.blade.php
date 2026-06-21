@extends('layouts.app')
@section('title', 'About Us - VRA')

@section('styles')
<style>
    /* Scoped styling for About Page */
    .about-container {
        position: relative;
        padding-bottom: 6rem;
    }

    .about-glow {
        position: absolute;
        width: 500px;
        height: 500px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(167, 139, 250, 0.1) 0%, transparent 70%);
        filter: blur(100px);
        pointer-events: none;
        z-index: -1;
        top: 30%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    /* Floating Hologram Logo Animation */
    @keyframes floatHoloLogo {
        0% {
            transform: translateY(0px) rotate(0deg);
            box-shadow: 0 10px 30px rgba(167, 139, 250, 0.3);
        }
        50% {
            transform: translateY(-12px) rotate(1deg);
            box-shadow: 0 25px 45px rgba(167, 139, 250, 0.45);
        }
        100% {
            transform: translateY(0px) rotate(0deg);
            box-shadow: 0 10px 30px rgba(167, 139, 250, 0.3);
        }
    }

    .holo-logo {
        width: 150px;
        height: 150px;
        border-radius: 28px;
        border: 2px solid rgba(167, 139, 250, 0.4);
        padding: 4px;
        background: rgba(18, 21, 32, 0.8);
        animation: floatHoloLogo 6s ease-in-out infinite;
        object-fit: cover;
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        transition: border-color 0.3s ease;
    }

    .about-visual:hover img {
        transform: scale(1.05);
    }

    /* Decorative rotating technology circles */
    .tech-circle {
        position: absolute;
        border: 1px dashed rgba(167, 139, 250, 0.15);
        border-radius: 50%;
        pointer-events: none;
    }

    .tech-circle-1 {
        width: 250px;
        height: 250px;
        animation: rotateTechCircle 25s linear infinite;
    }

    .tech-circle-2 {
        width: 320px;
        height: 320px;
        animation: rotateTechCircle 40s linear infinite reverse;
        border-style: dotted;
        border-color: rgba(108, 123, 255, 0.1);
    }

    @keyframes rotateTechCircle {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
</style>
@endsection

@section('content')
<div class="about-container">
    <div class="about-glow"></div>
    
    <div class="page-header reveal">
        <span class="section-label">Tentang Kami</span>
        <h1 class="section-title">We Are <span class="gradient-text">VRA Service</span></h1>
        <p class="section-desc" style="margin: 0 auto; text-align: center;">Penyedia jasa joki tugas akademik, gaming, logistik, dan praktikal terbaik di Konoha.</p>
    </div>

    <div class="section-inner reveal">
        <div class="about-content">
            <!-- Left Side: Full Visual Logo Display -->
            <div class="about-visual" data-tilt style="cursor: pointer; box-shadow: 0 20px 50px rgba(0, 0, 0, 0.4); border-color: rgba(255,255,255,0.08); overflow: hidden;">
                <div class="about-visual-inner" style="padding: 0;">
                    <!-- Full Image Logo -->
                    <img src="{{ asset('images/vra-logo.jpg') }}" alt="VRA Brand Logo" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s var(--transition-smooth); border-radius: var(--radius-lg);">
                    
                    <!-- Overlay Glow and Title -->
                    <div style="position: absolute; inset: 0; background: linear-gradient(to top, rgba(10, 12, 16, 0.85) 0%, rgba(10, 12, 16, 0.2) 60%, transparent 100%); z-index: 2; display: flex; flex-direction: column; justify-content: flex-end; align-items: center; padding: 2rem;">
                        <span class="gradient-text" style="font-weight: 900; font-size: 1.45rem; letter-spacing: 0.2em; filter: drop-shadow(0 0 10px rgba(167,139,250,0.4));">VRA SYSTEM</span>
                    </div>
                </div>
            </div>

            <!-- Right Side: Value Proposition Content -->
            <div class="about-text">
                <span class="section-label" style="display: block; margin-bottom: 0.5rem;">VRA Mission</span>
                <h3 style="font-size: 1.6rem; font-weight: 800; line-height: 1.3;">Mitra Akademik &amp; Praktikal Terpercaya Anda</h3>
                <p style="margin-top: 1rem;">Didirikan oleh lima mahasiswa berbakat dari universitas terkemuka, VRA (ViyenRajaAWS) hadir untuk menjadi solusi atas tumpukan tugas kuliah, tantangan gaming, hingga urusan logistik harian Anda.</p>
                <p>Kami bangga telah bekerja sama langsung dengan <strong>Pemerintah Konoha</strong> dalam meningkatkan efisiensi waktu produktif generasi muda melalui delegasi tugas-tugas kompleks kepada spesialis kami.</p>
                
                <!-- Modern structured bullets -->
                <div class="about-bullets" style="margin-top: 2rem; display: flex; flex-direction: column; gap: 1.25rem;">
                    <div class="bullet-item" style="display: flex; gap: 1rem; align-items: flex-start;">
                        <div style="background: var(--color-accent-glow); color: var(--color-accent); border: 1px solid rgba(108, 123, 255, 0.2); width: 28px; height: 28px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 0.8rem; flex-shrink: 0; margin-top: 0.2rem; font-weight: bold;">✓</div>
                        <div>
                            <strong style="color: var(--color-text-primary); font-size: 0.95rem;">AWS Multi-Server Infrastructure</strong>
                            <p style="font-size: 0.85rem; color: var(--color-text-secondary); margin-top: 0.15rem; line-height: 1.6;">Menggunakan load balancer tangguh (AWS ALB) untuk menjamin stabilitas 100% dan keamanan enkripsi SSL.</p>
                        </div>
                    </div>
                    <div class="bullet-item" style="display: flex; gap: 1rem; align-items: flex-start;">
                        <div style="background: rgba(167, 139, 250, 0.1); color: var(--color-accent-2); border: 1px solid rgba(167, 139, 250, 0.2); width: 28px; height: 28px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 0.8rem; flex-shrink: 0; margin-top: 0.2rem; font-weight: bold;">✓</div>
                        <div>
                            <strong style="color: var(--color-text-primary); font-size: 0.95rem;">Jaminan Keamanan RDS Database</strong>
                            <p style="font-size: 0.85rem; color: var(--color-text-secondary); margin-top: 0.15rem; line-height: 1.6;">Semua data order, detail mahasiswa, dan pengerjaan tersimpan terenkripsi penuh dalam AWS RDS MySQL.</p>
                        </div>
                    </div>
                    <div class="bullet-item" style="display: flex; gap: 1rem; align-items: flex-start;">
                        <div style="background: rgba(16, 185, 129, 0.1); color: #10b981; border: 1px solid rgba(16, 185, 129, 0.2); width: 28px; height: 28px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 0.8rem; flex-shrink: 0; margin-top: 0.2rem; font-weight: bold;">✓</div>
                        <div>
                            <strong style="color: var(--color-text-primary); font-size: 0.95rem;">Tepat Waktu & Kualitas Akademis</strong>
                            <p style="font-size: 0.85rem; color: var(--color-text-secondary); margin-top: 0.15rem; line-height: 1.6;">Dikerjakan oleh spesialis berdedikasi tinggi dengan jaminan nilai akademis A / A+.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
