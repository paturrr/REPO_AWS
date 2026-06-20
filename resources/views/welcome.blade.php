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
        <div class="hero-actions"><button class="btn-primary"><span>Explore Platform</span></button><button class="btn-secondary">Learn More</button></div>
    </div>
</section>
<section class="section" id="features">
    <div class="section-inner">
        <div class="reveal"><span class="section-label">What We Do</span><h2 class="section-title">Crafting Extraordinary<br>Digital Experiences</h2><p class="section-desc">Our platform combines cutting-edge technology with elegant design to deliver solutions that scale with your ambitions.</p></div>
        <div class="features-grid">
            <div class="feature-card reveal"><div class="feature-icon">⚡</div><h3 class="feature-title">Lightning Performance</h3><p class="feature-desc">Built for speed with optimized architecture that ensures sub-second response times across all touchpoints.</p></div>
            <div class="feature-card reveal"><div class="feature-icon">🛡️</div><h3 class="feature-title">Enterprise Security</h3><p class="feature-desc">Bank-grade encryption and security protocols protect your data with multi-layer defense systems.</p></div>
            <div class="feature-card reveal"><div class="feature-icon">🔗</div><h3 class="feature-title">Seamless Integration</h3><p class="feature-desc">Connect with your existing tools through our extensive API ecosystem and pre-built connectors.</p></div>
            <div class="feature-card reveal"><div class="feature-icon">📊</div><h3 class="feature-title">Advanced Analytics</h3><p class="feature-desc">Gain deep insights with real-time dashboards and AI-powered reporting that drives informed decisions.</p></div>
            <div class="feature-card reveal"><div class="feature-icon">🎨</div><h3 class="feature-title">Design System</h3><p class="feature-desc">A comprehensive design framework that ensures consistency and beauty across every interface.</p></div>
            <div class="feature-card reveal"><div class="feature-icon">🚀</div><h3 class="feature-title">Global Scale</h3><p class="feature-desc">Deploy worldwide with our distributed infrastructure spanning 50+ regions for minimal latency.</p></div>
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
<section class="section" id="projects">
    <div class="section-inner">
        <div class="reveal"><span class="section-label">Our Ecosystem</span><h2 class="section-title">Products That Define<br>the Future</h2><p class="section-desc">Explore our suite of products designed to power the next generation of digital innovation.</p></div>
        <div class="projects-grid">
            <div class="project-card reveal"><div class="project-visual"><div class="project-visual-inner"><div class="project-ice-block"></div></div></div><div class="project-info"><span class="project-tag">Flagship</span><h3 class="project-title">VRA Platform</h3><p class="project-desc">Our core platform providing end-to-end digital solutions with enterprise-grade reliability and consumer-grade simplicity.</p></div></div>
            <div class="project-card reveal"><div class="project-visual"><div class="project-visual-inner"><div class="project-ice-block"></div></div></div><div class="project-info"><span class="project-tag">Infrastructure</span><h3 class="project-title">VRA Cloud</h3><p class="project-desc">Distributed cloud infrastructure optimized for performance and scalability.</p></div></div>
            <div class="project-card reveal"><div class="project-visual"><div class="project-visual-inner"><div class="project-ice-block"></div></div></div><div class="project-info"><span class="project-tag">Developer Tools</span><h3 class="project-title">VRA SDK</h3><p class="project-desc">Comprehensive developer toolkit with APIs, SDKs, and documentation for seamless integration.</p></div></div>
        </div>
    </div>
</section>
<section class="section cta-section">
    <div class="section-inner reveal">
        <h2 class="cta-title">Ready to Build<br>the <span class="gradient-text">Future</span>?</h2>
        <p class="cta-desc">Join thousands of innovators already transforming their digital presence with VRA.</p>
        <div class="hero-actions"><button class="btn-primary"><span>Start Free Trial</span></button><button class="btn-secondary">Schedule Demo</button></div>
    </div>
</section>
@endsection
