@extends('layouts.app')
@section('title', 'About - VRA')
@section('content')
<div class="page-header"><span class="section-label">About Us</span><h1 class="section-title">We Are <span class="gradient-text">VRA</span></h1><p class="section-desc" style="margin: 0 auto;">A team of innovators dedicated to pushing the boundaries of what's possible in the digital world.</p></div>
<section class="section">
    <div class="section-inner">
        <div class="about-content reveal">
            <div class="about-visual"><div class="about-visual-inner"><div class="about-orb"></div></div></div>
            <div class="about-text">
                <h3>Our Mission</h3>
                <p>At VRA, we believe technology should empower, not complicate. Our mission is to create digital solutions that are powerful yet intuitive, enabling businesses and individuals to achieve more with less friction.</p>
                <p>Founded with a vision to bridge the gap between cutting-edge technology and everyday usability, VRA has grown into a comprehensive platform trusted by innovators worldwide.</p>
                <h3>Our Approach</h3>
                <p>We combine deep technical expertise with human-centered design thinking. Every product we build starts with understanding real problems and ends with solutions that feel effortless.</p>
            </div>
        </div>
    </div>
</section>
<section class="section">
    <div class="section-inner">
        <div class="reveal" style="text-align: center; margin-bottom: 2rem;"><span class="section-label">Our Team</span><h2 class="section-title">Meet the Minds Behind VRA</h2></div>
        <div class="team-grid">
            <div class="team-card reveal"><div class="team-avatar">👨‍💻</div><div class="team-name">Alex Chen</div><div class="team-role">CEO & Founder</div></div>
            <div class="team-card reveal"><div class="team-avatar">👩‍🔬</div><div class="team-name">Sarah Kim</div><div class="team-role">CTO</div></div>
            <div class="team-card reveal"><div class="team-avatar">👨‍🎨</div><div class="team-name">Marcus Rivera</div><div class="team-role">Head of Design</div></div>
            <div class="team-card reveal"><div class="team-avatar">👩‍💼</div><div class="team-name">Eka Patel</div><div class="team-role">VP Engineering</div></div>
        </div>
    </div>
</section>
<section class="section cta-section">
    <div class="section-inner reveal">
        <h2 class="cta-title">Want to Join<br>Our <span class="gradient-text">Team</span>?</h2>
        <p class="cta-desc">We're always looking for talented individuals who share our passion for innovation.</p>
        <button class="btn-primary"><span>View Open Positions</span></button>
    </div>
</section>
@endsection
