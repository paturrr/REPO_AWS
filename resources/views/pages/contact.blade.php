@extends('layouts.app')
@section('title', 'Contact - VRA')
@section('content')
<div class="page-header reveal">
    <span class="section-label">Hubungi Kami</span>
    <h1 class="section-title">Mari Selesaikan<br><span class="gradient-text">Tugas Anda</span></h1>
    <p class="section-desc">Punya tugas kuliah menumpuk? Hubungi customer service VRA untuk penawaran joki terbaik.</p>
</div>

<div class="section-inner reveal">
    <div class="contact-grid">
        <!-- Info Cards -->
        <div class="contact-info-cards">
            <div class="contact-card">
                <div class="contact-card-icon">📍</div>
                <div class="contact-card-title">Lokasi Operasional</div>
                <div class="contact-card-text">Bandung - Jakarta - Desa Konoha (Dekat Kantor Hokage)</div>
            </div>
            <div class="contact-card">
                <div class="contact-card-icon">✉️</div>
                <div class="contact-card-title">Email Dukungan</div>
                <div class="contact-card-text">support@vra.com (Respons cepat dalam 10 menit)</div>
            </div>
            <div class="contact-card">
                <div class="contact-card-icon">⚡</div>
                <div class="contact-card-title">Status Joki</div>
                <div class="contact-card-text">Online 24/7 (Siap melayani pesanan kilat/deadline 1 jam)</div>
            </div>
        </div>

        <!-- Contact Form -->
        <form action="#" class="contact-form">
            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" id="name" required placeholder="Nama Anda / ID Mahasiswa">
            </div>
            <div class="form-group">
                <label for="email">Alamat Email</label>
                <input type="email" id="email" required placeholder="nama@email.com">
            </div>
            <div class="form-group">
                <label for="message">Detail Tugas (Joki Koding/Skripsi/Game/Lainnya)</label>
                <textarea id="message" required placeholder="Tuliskan jenis joki yang Anda butuhkan secara mendetail..."></textarea>
            </div>
            <button type="submit" class="btn-primary"><span>Kirim Permintaan</span></button>
        </form>
    </div>
</div>
@endsection
