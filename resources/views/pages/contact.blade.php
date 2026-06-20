@extends('layouts.app')
@section('title', 'Contact - VRA')
@section('content')
<div class="page-header"><span class="section-label">Get in Touch</span><h1 class="section-title">Let's Build Something<br><span class="gradient-text">Amazing Together</span></h1><p class="section-desc" style="margin: 0 auto;">Have a project in mind? We'd love to hear from you.</p></div>
<section class="section">
    <div class="section-inner">
        <div class="contact-grid">
            <form class="contact-form reveal">
                <div class="form-group"><label for="name">Full Name</label><input type="text" id="name" placeholder="John Doe" required></div>
                <div class="form-group"><label for="email">Email Address</label><input type="email" id="email" placeholder="john@example.com" required></div>
                <div class="form-group"><label for="subject">Subject</label><input type="text" id="subject" placeholder="Project Inquiry"></div>
                <div class="form-group"><label for="message">Message</label><textarea id="message" placeholder="Tell us about your project..." required></textarea></div>
                <button type="submit" class="btn-primary"><span>Send Message</span></button>
            </form>
            <div class="contact-info-cards reveal">
                <div class="contact-card"><div class="contact-card-icon">📧</div><div class="contact-card-title">Email Us</div><div class="contact-card-text">hello@vra-platform.com<br>We typically respond within 24 hours.</div></div>
                <div class="contact-card"><div class="contact-card-icon">📍</div><div class="contact-card-title">Our Office</div><div class="contact-card-text">VRA Headquarters<br>Jakarta, Indonesia</div></div>
                <div class="contact-card"><div class="contact-card-icon">💬</div><div class="contact-card-title">Live Chat</div><div class="contact-card-text">Available 24/7 for instant support<br>through our platform dashboard.</div></div>
            </div>
        </div>
    </div>
</section>
@endsection
