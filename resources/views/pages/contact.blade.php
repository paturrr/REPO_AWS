@extends('layouts.app')
@section('title', 'Contact - VRA')

@section('styles')
<style>
    /* Custom Scoped Styles for Contact Page */
    .contact-container {
        position: relative;
        padding: calc(var(--nav-height) + 4rem) 2rem 6rem;
        min-height: 100vh;
        overflow: hidden;
        z-index: 1;
    }

    .contact-glow-1, .contact-glow-2 {
        position: absolute;
        width: 600px;
        height: 600px;
        border-radius: 50%;
        filter: blur(140px);
        opacity: 0.15;
        pointer-events: none;
        z-index: -1;
    }

    .contact-glow-1 {
        top: 10%;
        left: -10%;
        background: radial-gradient(circle, var(--color-accent) 0%, transparent 70%);
        animation: contactFloat 10s ease-in-out infinite alternate;
    }

    .contact-glow-2 {
        bottom: 10%;
        right: -10%;
        background: radial-gradient(circle, var(--color-accent-2) 0%, transparent 70%);
        animation: contactFloat 12s ease-in-out infinite alternate-reverse;
    }

    @keyframes contactFloat {
        0% { transform: translate(0, 0) scale(1); }
        100% { transform: translate(50px, 30px) scale(1.1); }
    }

    .contact-grid {
        display: grid;
        grid-template-columns: 1.1fr 1.3fr;
        gap: 3.5rem;
        max-width: var(--max-width);
        margin: 3rem auto 0;
        align-items: start;
    }

    /* Left Side: Support Agents and Cards */
    .contact-left {
        display: flex;
        flex-direction: column;
        gap: 2rem;
    }

    .contact-intro {
        margin-bottom: 1rem;
    }

    .contact-intro .section-label {
        margin-bottom: 0.5rem;
    }

    .contact-intro .section-title {
        font-size: clamp(2rem, 3.5vw, 3rem);
        margin-bottom: 1rem;
        line-weight: 1.1;
    }

    /* Support Staff Widget */
    .support-widget {
        background: var(--color-bg-card);
        border: 1px solid var(--color-border);
        border-radius: var(--radius-lg);
        padding: 2rem;
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    }

    .widget-title {
        font-size: 1.1rem;
        font-weight: 700;
        margin-bottom: 1.25rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        border-bottom: 1px solid var(--color-border);
        padding-bottom: 0.75rem;
    }

    .widget-title-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: #10b981;
        box-shadow: 0 0 10px #10b981;
        animation: pulse 1.5s infinite;
    }

    .agent-list {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .agent-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 0.75rem;
        border-radius: var(--radius-md);
        background: rgba(255, 255, 255, 0.01);
        border: 1px solid transparent;
        transition: all 0.3s ease;
    }

    .agent-item:hover {
        background: rgba(255, 255, 255, 0.03);
        border-color: var(--color-border-hover);
        transform: translateX(5px);
    }

    .agent-avatar {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        background: var(--color-bg-secondary);
        border: 1px solid var(--color-border);
        padding: 2px;
    }

    .agent-info {
        flex-grow: 1;
    }

    .agent-name {
        font-size: 0.9rem;
        font-weight: 600;
        color: var(--color-text-primary);
    }

    .agent-role {
        font-size: 0.75rem;
        color: var(--color-text-secondary);
    }

    .agent-status {
        display: flex;
        align-items: center;
        gap: 0.35rem;
        font-size: 0.75rem;
        font-weight: 500;
    }

    .status-online { color: #10b981; }
    .status-busy { color: #f59e0b; }
    
    .status-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        display: inline-block;
    }
    .status-dot.online { background: #10b981; box-shadow: 0 0 6px #10b981; }
    .status-dot.busy { background: #f59e0b; box-shadow: 0 0 6px #f59e0b; }

    /* Right Side: The Glass Form */
    .contact-right-box {
        position: relative;
    }

    .glass-card-contact {
        padding: 3rem;
        background: rgba(18, 21, 32, 0.6);
        border: 1px solid rgba(255, 255, 255, 0.07);
        border-radius: var(--radius-lg);
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.4), 0 0 40px rgba(108, 123, 255, 0.03);
        backdrop-filter: blur(25px);
        -webkit-backdrop-filter: blur(25px);
        position: relative;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .form-header {
        margin-bottom: 2rem;
    }

    .form-title {
        font-size: 1.5rem;
        font-weight: 800;
        margin-bottom: 0.5rem;
    }

    .form-subtitle {
        font-size: 0.85rem;
        color: var(--color-text-secondary);
    }

    /* Service Tags Selection */
    .service-selection {
        margin-bottom: 1.75rem;
    }

    .selection-label {
        font-size: 0.8rem;
        font-weight: 600;
        color: var(--color-text-secondary);
        margin-bottom: 0.75rem;
        display: block;
        letter-spacing: 0.05em;
        text-transform: uppercase;
    }

    .service-tags {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 0.75rem;
    }

    .service-tag {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        padding: 0.8rem 1rem;
        background: rgba(255, 255, 255, 0.02);
        border: 1px solid var(--color-border);
        border-radius: var(--radius-md);
        color: var(--color-text-secondary);
        font-size: 0.85rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        text-align: center;
    }

    .service-tag:hover {
        background: rgba(255, 255, 255, 0.04);
        border-color: rgba(255, 255, 255, 0.15);
        color: var(--color-text-primary);
        transform: translateY(-2px);
    }

    .service-tag.active {
        background: linear-gradient(135deg, rgba(108, 123, 255, 0.15), rgba(167, 139, 250, 0.15));
        border-color: var(--color-accent);
        color: var(--color-text-primary);
        box-shadow: 0 0 15px rgba(108, 123, 255, 0.15), inset 0 0 8px rgba(108, 123, 255, 0.05);
        font-weight: 600;
    }

    /* Form Fields Styling */
    .contact-form {
        display: flex;
        flex-direction: column;
        gap: 1.25rem;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    .form-group label {
        font-size: 0.8rem;
        font-weight: 600;
        color: var(--color-text-secondary);
        letter-spacing: 0.02em;
    }

    .form-group input, .form-group textarea {
        width: 100%;
        padding: 0.9rem 1.2rem;
        background: rgba(10, 12, 16, 0.5);
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: var(--radius-md);
        color: var(--color-text-primary);
        font-family: var(--font-primary);
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }

    .form-group input:focus, .form-group textarea:focus {
        outline: none;
        border-color: var(--color-accent);
        background: rgba(10, 12, 16, 0.7);
        box-shadow: 0 0 0 3px rgba(108, 123, 255, 0.15), 0 0 15px rgba(108, 123, 255, 0.08);
    }

    .form-group textarea {
        min-height: 110px;
        resize: vertical;
        line-height: 1.6;
    }

    .actions-row {
        display: flex;
        gap: 1rem;
        margin-top: 1rem;
    }

    .actions-row button {
        flex: 1.2;
    }

    .btn-whatsapp-direct {
        flex: 0.8;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        padding: 0.9rem 1.5rem;
        background: rgba(16, 185, 129, 0.08);
        border: 1px solid rgba(16, 185, 129, 0.2);
        border-radius: var(--radius-md);
        color: #10b981;
        font-weight: 600;
        font-size: 0.9rem;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-whatsapp-direct:hover {
        background: rgba(16, 185, 129, 0.15);
        border-color: #10b981;
        box-shadow: 0 0 15px rgba(16, 185, 129, 0.15);
        transform: translateY(-2px);
    }

    /* Option for Authed users to add project to board */
    .authed-option {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-top: 0.25rem;
        cursor: pointer;
        user-select: none;
    }

    .authed-checkbox {
        width: 16px;
        height: 16px;
        accent-color: var(--color-accent);
        cursor: pointer;
    }

    .authed-label {
        font-size: 0.8rem;
        color: var(--color-text-secondary);
        line-height: 1.4;
    }

    /* Simulated Interactive Console Overlay (On Submit) */
    .console-overlay {
        position: absolute;
        inset: 0;
        background: #0a0c10;
        z-index: 10;
        padding: 3rem;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.4s ease;
        font-family: 'Courier New', Courier, monospace;
    }

    .console-overlay.active {
        opacity: 1;
        pointer-events: all;
    }

    .console-log {
        flex-grow: 1;
        font-size: 0.8rem;
        color: #a78bfa;
        line-height: 1.8;
        overflow-y: auto;
        margin-bottom: 2rem;
        display: flex;
        flex-direction: column;
        gap: 0.35rem;
    }

    .console-line {
        display: flex;
        gap: 0.5rem;
    }

    .console-line.success {
        color: #10b981;
        font-weight: bold;
    }

    .console-line.sys {
        color: #6c7bff;
    }

    .console-loader {
        width: 100%;
        height: 2px;
        background: rgba(255, 255, 255, 0.05);
        border-radius: var(--radius-full);
        overflow: hidden;
    }

    .console-progress {
        height: 100%;
        background: linear-gradient(90deg, var(--color-accent), var(--color-accent-2));
        width: 0%;
        transition: width 2s cubic-bezier(0.1, 0.8, 0.3, 1);
    }

    /* Ticket Success View */
    .ticket-view {
        position: absolute;
        inset: 0;
        background: #0d0f19;
        z-index: 11;
        padding: 3rem 2.5rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.4s ease;
        text-align: center;
    }

    .ticket-view.active {
        opacity: 1;
        pointer-events: all;
    }

    .ticket-check {
        width: 64px;
        height: 64px;
        border-radius: 50%;
        background: rgba(16, 185, 129, 0.1);
        border: 2px solid #10b981;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.75rem;
        color: #10b981;
        box-shadow: 0 0 20px rgba(16, 185, 129, 0.2);
        margin-bottom: 1.5rem;
        animation: scaleCheck 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275) both;
    }

    @keyframes scaleCheck {
        0% { transform: scale(0); }
        100% { transform: scale(1); }
    }

    .ticket-title {
        font-size: 1.25rem;
        font-weight: 800;
        margin-bottom: 0.5rem;
    }

    .ticket-subtitle {
        font-size: 0.85rem;
        color: var(--color-text-secondary);
        margin-bottom: 2rem;
    }

    .ticket-card-box {
        width: 100%;
        background: rgba(255, 255, 255, 0.02);
        border: 1px dashed rgba(255, 255, 255, 0.1);
        border-radius: var(--radius-md);
        padding: 1.5rem;
        text-align: left;
        margin-bottom: 2rem;
        font-family: var(--font-primary);
    }

    .ticket-row {
        display: flex;
        justify-content: space-between;
        padding: 0.5rem 0;
        border-bottom: 1px solid rgba(255, 255, 255, 0.03);
        font-size: 0.85rem;
    }

    .ticket-row:last-child {
        border-bottom: none;
    }

    .ticket-label {
        color: var(--color-text-secondary);
    }

    .ticket-val {
        font-weight: 600;
        color: var(--color-text-primary);
    }

    .ticket-val.accent {
        color: var(--color-accent-2);
    }

    .ticket-actions {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
        width: 100%;
    }

    /* Responsive adjustments */
    @media (max-width: 1024px) {
        .contact-grid {
            grid-template-columns: 1fr;
            gap: 3rem;
        }
        .support-widget {
            order: 2;
        }
    }

    @media (max-width: 480px) {
        .service-tags {
            grid-template-columns: 1fr;
        }
        .actions-row {
            flex-direction: column;
        }
        .btn-whatsapp-direct {
            width: 100%;
        }
        .glass-card-contact {
            padding: 2rem 1.5rem;
        }
    }
</style>
@endsection

@section('content')
<div class="contact-container">
    <div class="contact-glow-1"></div>
    <div class="contact-glow-2"></div>
    
    <div class="contact-grid">
        <!-- Left Side -->
        <div class="contact-left reveal">
            <div class="contact-intro">
                <span class="section-label">Hubungi Joki</span>
                <h1 class="section-title">Mari Bereskan<br><span class="gradient-text">Tugas Kuliah Anda</span></h1>
                <p class="section-desc">Punya tugas kodingan, skripsi buntu, UI/UX berantakan, atau butuh logistik kilat? Kirim detail tugas di samping. CS kami siaga membantu pengerjaan Anda.</p>
            </div>

            <!-- Custom Support Staff Widget (Personalized Trust Component) -->
            <div class="support-widget">
                <div class="widget-title">
                    <span class="widget-title-dot"></span>
                    <span>Support Core Team Aktif</span>
                </div>
                <div class="agent-list">
                    <!-- Agent 1: Muhammad Viyendra -->
                    <div class="agent-item">
                        <img src="https://api.dicebear.com/7.x/bottts/svg?seed=Viyendra" class="agent-avatar" alt="Viyendra">
                        <div class="agent-info">
                            <div class="agent-name">Muhammad Viyendra</div>
                            <div class="agent-role">Laravel Expert / Tech Lead</div>
                        </div>
                        <div class="agent-status status-online">
                            <span class="status-dot online"></span> Online
                        </div>
                    </div>

                    <!-- Agent 2: Dara Saifah Mahiroh -->
                    <div class="agent-item">
                        <img src="https://api.dicebear.com/7.x/bottts/svg?seed=Dara" class="agent-avatar" alt="Dara">
                        <div class="agent-info">
                            <div class="agent-name">Dara Saifah Mahiroh</div>
                            <div class="agent-role">UI/UX & Writing Specialist</div>
                        </div>
                        <div class="agent-status status-online">
                            <span class="status-dot online"></span> Online
                        </div>
                    </div>

                    <!-- Agent 3: Athiyah Naurah Syifa -->
                    <div class="agent-item">
                        <img src="https://api.dicebear.com/7.x/bottts/svg?seed=Athiyah" class="agent-avatar" alt="Athiyah">
                        <div class="agent-info">
                            <div class="agent-name">Athiyah Naurah Syifa</div>
                            <div class="agent-role">Data Specialist / Basis Data</div>
                        </div>
                        <div class="agent-status status-online">
                            <span class="status-dot online"></span> Online
                        </div>
                    </div>

                    <!-- Agent 4: Ahmad Fathurrohman -->
                    <div class="agent-item">
                        <img src="https://api.dicebear.com/7.x/bottts/svg?seed=Ahmad" class="agent-avatar" alt="Ahmad">
                        <div class="agent-info">
                            <div class="agent-name">Ahmad Fathurrohman</div>
                            <div class="agent-role">Logistik & Gaming Agent</div>
                        </div>
                        <div class="agent-status status-busy">
                            <span class="status-dot busy"></span> Sibuk
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side: The Contact Glass Card Form -->
        <div class="contact-right-box reveal">
            <div class="glass-card-contact" id="contactFormCard">
                <div class="form-header">
                    <h2 class="form-title">VRA Command Center</h2>
                    <p class="form-subtitle">Tentukan jenis joki dan isi data tugas Anda secara lengkap.</p>
                </div>

                <!-- Service Tags Selector (Interactive UI Improvement) -->
                <div class="service-selection">
                    <span class="selection-label">Pilih Jenis Joki</span>
                    <div class="service-tags">
                        <div class="service-tag active" data-service="coding" data-placeholder="Halo VRA! Saya butuh joki koding Laravel / Web Development. Detail tugas: ">
                            <span>💻 Coding / IT</span>
                        </div>
                        <div class="service-tag" data-service="skripsi" data-placeholder="Halo VRA! Saya butuh joki UI/UX, penulisan esai, atau Skripsi. Detail topik: ">
                            <span>🎨 UI/UX & Writing</span>
                        </div>
                        <div class="service-tag" data-service="gaming" data-placeholder="Halo VRA! Saya butuh joki gaming (Valorant push rank / Minecraft). Target: ">
                            <span>🎮 Game Joki</span>
                        </div>
                        <div class="service-tag" data-service="logistics" data-placeholder="Halo VRA! Saya butuh joki menyetir/bawa motor Bandung - Jakarta. Rute dan jadwal: ">
                            <span>🏍️ Logistik / Lari</span>
                        </div>
                    </div>
                </div>

                <!-- Interactive Form -->
                <form class="contact-form" id="vraContactForm">
                    @csrf
                    <input type="hidden" id="service_category" name="category" value="coding">
                    
                    <div class="form-group">
                        <label for="client_name">Nama Lengkap / Alias</label>
                        <input type="text" id="client_name" name="name" required placeholder="Contoh: Shinobi Konoha" value="{{ Auth::user() ? Auth::user()->name : '' }}">
                    </div>

                    <div class="form-group">
                        <label for="client_email">Alamat Email</label>
                        <input type="email" id="client_email" name="email" required placeholder="nama@domain.com" value="{{ Auth::user() ? Auth::user()->email : '' }}">
                    </div>

                    <div class="form-group">
                        <label for="job_description">Deskripsi & Detail Tugas</label>
                        <textarea id="job_description" name="description" required placeholder="Halo VRA! Saya butuh joki koding Laravel / Web Development. Detail tugas: "></textarea>
                    </div>

                    @auth
                        <!-- Authed User Feature: Auto post to private project board! -->
                        <div class="form-group" style="margin-top: 0.25rem;">
                            <label class="authed-option">
                                <input type="checkbox" id="auto_add_project" class="authed-checkbox" checked>
                                <span class="authed-label">Tambahkan otomatis ke Project Board saya (sebagai draft planning)</span>
                            </label>
                        </div>
                    @endauth

                    <div class="actions-row">
                        <button type="submit" class="btn-primary">
                            <span>Kirim Permintaan</span>
                        </button>
                        <button type="button" class="btn-whatsapp-direct" id="btnWhatsappDirect" title="Hubungi CS via WhatsApp Secara Langsung">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.063 5.219 5.303 0 11.758 0c3.129.001 6.07 1.222 8.281 3.438 2.21 2.215 3.428 5.159 3.427 8.286-.005 6.533-5.244 11.754-11.698 11.754-1.997-.001-3.957-.51-5.69-1.48L0 24zm6.59-4.859c1.62.962 3.208 1.47 4.883 1.47 5.282 0 9.58-4.27 9.585-9.519.002-2.543-.99-4.934-2.793-6.741-1.802-1.807-4.195-2.802-6.732-2.803-5.289 0-9.586 4.27-9.59 9.52-.001 1.761.464 3.483 1.348 5.018l-.999 3.65 3.75-.975zm11.231-6.84c-.302-.15-1.786-.881-2.056-.979-.27-.099-.467-.149-.662.15-.195.298-.756.979-.927 1.178-.171.199-.343.224-.645.074-.3-.15-1.267-.467-2.414-1.491-.893-.796-1.495-1.78-1.671-2.079-.176-.299-.019-.461.13-.61.135-.133.303-.35.454-.524.152-.175.202-.299.303-.499.102-.2.05-.375-.025-.524-.075-.15-.662-1.597-.909-2.193-.24-.576-.484-.499-.662-.508-.171-.008-.368-.01-.565-.01-.197 0-.518.074-.789.374-.271.3-.1.699.1 1.597.108 2.502 1.806 4.921 2.056 5.257.25.336 3.5 5.342 8.478 7.486 1.184.51 2.108.815 2.827 1.042 1.19.379 2.274.326 3.129.198.954-.142 2.056-.84 2.348-1.656.292-.816.292-1.516.205-1.666-.088-.15-.325-.25-.627-.4z"/>
                            </svg>
                            <span>WhatsApp CS</span>
                        </button>
                    </div>
                </form>

                <!-- Interactive Terminal Log (Console overlay) -->
                <div class="console-overlay" id="consoleOverlay">
                    <div class="console-log" id="consoleLog">
                        <!-- Filled by JS -->
                    </div>
                    <div class="console-loader">
                        <div class="console-progress" id="consoleProgress"></div>
                    </div>
                </div>

                <!-- Interactive Receipt Ticket (Success view) -->
                <div class="ticket-view" id="ticketView">
                    <div class="ticket-check">✓</div>
                    <h3 class="ticket-title">Koneksi Berhasil!</h3>
                    <p class="ticket-subtitle">Permintaan joki Anda telah terdaftar dalam sistem VRA.</p>
                    
                    <div class="ticket-card-box">
                        <div class="ticket-row">
                            <span class="ticket-label">Ticket ID:</span>
                            <span class="ticket-val accent" id="ticketId">VRA-90812</span>
                        </div>
                        <div class="ticket-row">
                            <span class="ticket-label">Kategori Joki:</span>
                            <span class="ticket-val" id="ticketCategory">Coding / IT</span>
                        </div>
                        <div class="ticket-row">
                            <span class="ticket-label">Klien:</span>
                            <span class="ticket-val" id="ticketClient">Shinobi Konoha</span>
                        </div>
                        <div class="ticket-row">
                            <span class="ticket-label">Status Antrean:</span>
                            <span class="ticket-val" style="color: #10b981;">Drafting (Siap Eksekusi)</span>
                        </div>
                        <div class="ticket-row" id="ticketBoardRow" style="display: none;">
                            <span class="ticket-label">Integrasi Board:</span>
                            <span class="ticket-val" style="color: #6c7bff;">Auto-Synced</span>
                        </div>
                    </div>

                    <div class="ticket-actions">
                        <a href="#" class="btn-primary" id="btnTicketWhatsapp" target="_blank" style="width: 100%; display: flex; align-items: center; justify-content: center; gap: 0.5rem;">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.063 5.219 5.303 0 11.758 0c3.129.001 6.07 1.222 8.281 3.438 2.21 2.215 3.428 5.159 3.427 8.286-.005 6.533-5.244 11.754-11.698 11.754-1.997-.001-3.957-.51-5.69-1.48L0 24zm6.59-4.859c1.62.962 3.208 1.47 4.883 1.47 5.282 0 9.58-4.27 9.585-9.519.002-2.543-.99-4.934-2.793-6.741-1.802-1.807-4.195-2.802-6.732-2.803-5.289 0-9.586 4.27-9.59 9.52-.001 1.761.464 3.483 1.348 5.018l-.999 3.65 3.75-.975zm11.231-6.84c-.302-.15-1.786-.881-2.056-.979-.27-.099-.467-.149-.662.15-.195.298-.756.979-.927 1.178-.171.199-.343.224-.645.074-.3-.15-1.267-.467-2.414-1.491-.893-.796-1.495-1.78-1.671-2.079-.176-.299-.019-.461.13-.61.135-.133.303-.35.454-.524.152-.175.202-.299.303-.499.102-.2.05-.375-.025-.524-.075-.15-.662-1.597-.909-2.193-.24-.576-.484-.499-.662-.508-.171-.008-.368-.01-.565-.01-.197 0-.518.074-.789.374-.271.3-.1.699.1 1.597.108 2.502 1.806 4.921 2.056 5.257.25.336 3.5 5.342 8.478 7.486 1.184.51 2.108.815 2.827 1.042 1.19.379 2.274.326 3.129.198.954-.142 2.056-.84 2.348-1.656.292-.816.292-1.516.205-1.666-.088-.15-.325-.25-.627-.4z"/>
                            </svg>
                            <span>Teruskan ke WhatsApp CS</span>
                        </a>
                        <button type="button" class="btn-secondary" id="btnResetForm">
                            Kirim Tiket Lain
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const serviceTags = document.querySelectorAll('.service-tag');
        const hiddenCategory = document.getElementById('service_category');
        const descriptionInput = document.getElementById('job_description');
        const vraContactForm = document.getElementById('vraContactForm');
        
        // Element views for terminal submit & ticket success
        const consoleOverlay = document.getElementById('consoleOverlay');
        const consoleLog = document.getElementById('consoleLog');
        const consoleProgress = document.getElementById('consoleProgress');
        const ticketView = document.getElementById('ticketView');
        const contactFormCard = document.getElementById('contactFormCard');
        
        // Whatsapp elements
        const btnWhatsappDirect = document.getElementById('btnWhatsappDirect');
        const btnTicketWhatsapp = document.getElementById('btnTicketWhatsapp');
        const btnResetForm = document.getElementById('btnResetForm');
        
        // Ticket detail values
        const ticketId = document.getElementById('ticketId');
        const ticketCategory = document.getElementById('ticketCategory');
        const ticketClient = document.getElementById('ticketClient');
        const ticketBoardRow = document.getElementById('ticketBoardRow');

        // Dynamic categories details
        const categoriesMapping = {
            'coding': { category: 'coding', label: 'Coding / IT' },
            'skripsi': { category: 'academic', label: 'UI/UX & Writing' },
            'gaming': { category: 'gaming', label: 'Game Joki' },
            'logistics': { category: 'logistics', label: 'Logistik / Lari' }
        };

        // Service selector tags event
        serviceTags.forEach(tag => {
            tag.addEventListener('click', () => {
                serviceTags.forEach(t => t.classList.remove('active'));
                tag.classList.add('active');
                
                const serviceKey = tag.getAttribute('data-service');
                const placeholderText = tag.getAttribute('data-placeholder');
                
                // Update text placeholder
                descriptionInput.placeholder = placeholderText;
                
                // If text is empty or matches previous placeholder starting text, update text
                if (descriptionInput.value === '' || descriptionInput.value.startsWith('Halo VRA! Saya butuh') || descriptionInput.value.startsWith('Halo VRA!')) {
                    descriptionInput.value = placeholderText;
                }
                
                // Set hidden input category value
                if (categoriesMapping[serviceKey]) {
                    hiddenCategory.value = categoriesMapping[serviceKey].category;
                }
            });
        });

        // Initialize first text
        if (descriptionInput.value === '') {
            descriptionInput.value = serviceTags[0].getAttribute('data-placeholder');
        }

        // WhatsApp direct handler
        const openWhatsApp = (isTicket = false) => {
            const name = document.getElementById('client_name').value;
            const email = document.getElementById('client_email').value;
            const desc = document.getElementById('job_description').value;
            const activeTag = document.querySelector('.service-tag.active');
            const categoryText = activeTag ? activeTag.innerText.trim() : 'Joki Service';

            const phone = "6282216000004"; // Dummy CS number (Viyendra or Yongi or VRA official)
            let text = `*Halo VRA Joki Services!*\n\nSaya ingin memesan jasa joki:\n`;
            text += `*• Nama Klien:* ${name}\n`;
            text += `*• Email:* ${email}\n`;
            text += `*• Kategori:* ${categoryText}\n`;
            if (isTicket) {
                text += `*• Ticket ID:* ${ticketId.textContent}\n`;
            }
            text += `\n*• Detail Tugas:*\n${desc}`;

            const url = `https://api.whatsapp.com/send?phone=${phone}&text=${encodeURIComponent(text)}`;
            window.open(url, '_blank');
        };

        btnWhatsappDirect.addEventListener('click', () => {
            if (document.getElementById('client_name').value === '' || document.getElementById('job_description').value === '') {
                alert('Silakan isi Nama Lengkap dan Deskripsi Tugas terlebih dahulu.');
                return;
            }
            openWhatsApp(false);
        });

        btnTicketWhatsapp.addEventListener('click', (e) => {
            e.preventDefault();
            openWhatsApp(true);
        });

        // Form Submit handler
        vraContactForm.addEventListener('submit', async (e) => {
            e.preventDefault();

            const name = document.getElementById('client_name').value;
            const email = document.getElementById('client_email').value;
            const desc = document.getElementById('job_description').value;
            const activeTag = document.querySelector('.service-tag.active');
            const catLabel = activeTag ? activeTag.innerText.replace(/[^\w\s\/\-&]/g, '').trim() : 'Joki Service';
            const catKey = activeTag ? activeTag.getAttribute('data-service') : 'coding';
            const autoAddCheckbox = document.getElementById('auto_add_project');
            const shouldAddToBoard = autoAddCheckbox ? autoAddCheckbox.checked : false;

            // Generate a random ticket ID
            const randomId = 'VRA-' + Math.floor(10000 + Math.random() * 90000);
            ticketId.textContent = randomId;
            ticketCategory.textContent = catLabel;
            ticketClient.textContent = name;

            // Activate terminal console overlay
            consoleOverlay.classList.add('active');
            consoleLog.innerHTML = '';
            consoleProgress.style.width = '0%';

            // Simulated terminal logging
            const logs = [
                { text: `[SYS] Connecting to VRA Command Center...`, delay: 100 },
                { text: `[SYS] SSL Handshake established on port 443.`, delay: 400 },
                { text: `[SYS] Verifying telemetry keys (Konoha Govt Partner Token verified)...`, delay: 700 },
                { text: `[DB] Preparing package payload for secure transmission...`, delay: 1000 },
                { text: `[DB] Transmitting data block: { client: "${name}", service: "${catLabel}" }`, delay: 1300 },
            ];

            if (shouldAddToBoard) {
                logs.push({ text: `[API] Attempting auto-sync to Project Board DB...`, delay: 1600 });
            } else {
                logs.push({ text: `[SYS] Bypassing database sync (Local ticket mode).`, delay: 1600 });
            }

            // Execute local database write if authed and checked
            let dbSuccess = false;
            if (shouldAddToBoard) {
                try {
                    const response = await fetch('/projects', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            title: `Joki ${catLabel} - ${name}`,
                            description: `Pengirim: ${name} (${email})\nDetail Tugas: ${desc}`,
                            category: categoriesMapping[catKey].category,
                            status: 'planning'
                        })
                    });
                    
                    if (response.ok) {
                        dbSuccess = true;
                        logs.push({ text: `[DB_SUCCESS] Ticket successfully posted to RDS Database.`, delay: 2000 });
                    } else {
                        logs.push({ text: `[DB_WARN] Sync failed. Status: ${response.status}. Saving locally.`, delay: 2000 });
                    }
                } catch (error) {
                    logs.push({ text: `[DB_ERROR] Sync exception: ${error.message}. Saving locally.`, delay: 2000 });
                }
            }

            logs.push({ text: `[SYS] Generating Ticket ID: ${randomId}...`, delay: 2300 });
            logs.push({ text: `[SUCCESS] Connection fully operational. Ticket printed!`, delay: 2600, isSuccess: true });

            // Animate console progress bar
            setTimeout(() => {
                consoleProgress.style.width = '100%';
            }, 50);

            // Print logs sequentially
            logs.forEach(log => {
                setTimeout(() => {
                    const line = document.createElement('div');
                    line.className = 'console-line';
                    if (log.isSuccess) line.classList.add('success');
                    else if (log.text.startsWith('[SYS]')) line.classList.add('sys');
                    line.innerHTML = `<span>&gt;</span><span>${log.text}</span>`;
                    consoleLog.appendChild(line);
                    consoleLog.scrollTop = consoleLog.scrollHeight;
                }, log.delay);
            });

            // Transition to Ticket success view
            setTimeout(() => {
                if (shouldAddToBoard && dbSuccess) {
                    ticketBoardRow.style.display = 'flex';
                } else {
                    ticketBoardRow.style.display = 'none';
                }
                ticketView.classList.add('active');
            }, 3200);
        });

        // Reset form handler
        btnResetForm.addEventListener('click', () => {
            vraContactForm.reset();
            // Re-apply first placeholder
            descriptionInput.value = serviceTags[0].getAttribute('data-placeholder');
            serviceTags.forEach(t => t.classList.remove('active'));
            serviceTags[0].classList.add('active');
            hiddenCategory.value = categoriesMapping['coding'].category;

            // Hide overlay & ticket view
            ticketView.classList.remove('active');
            consoleOverlay.classList.remove('active');
            consoleProgress.style.width = '0%';
        });
    });
</script>
@endsection
