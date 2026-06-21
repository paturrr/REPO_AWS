document.addEventListener('DOMContentLoaded',()=>{
const preloader=document.getElementById('preloader');
window.addEventListener('load',()=>{setTimeout(()=>{preloader.classList.add('loaded')},2800)});
setTimeout(()=>{if(preloader)preloader.classList.add('loaded')},4000);

const nav=document.getElementById('main-nav');
window.addEventListener('scroll',()=>{if(window.scrollY>50)nav.classList.add('scrolled');else nav.classList.remove('scrolled')});

const hamburger=document.getElementById('nav-hamburger');
const mobileMenu=document.getElementById('mobile-menu');
if(hamburger&&mobileMenu){hamburger.addEventListener('click',()=>{hamburger.classList.toggle('active');mobileMenu.classList.toggle('active');document.body.style.overflow=mobileMenu.classList.contains('active')?'hidden':''});document.querySelectorAll('.mobile-link').forEach(link=>{link.addEventListener('click',()=>{hamburger.classList.remove('active');mobileMenu.classList.remove('active');document.body.style.overflow=''})})}

const revealElements=document.querySelectorAll('.reveal');
const revealObserver=new IntersectionObserver((entries)=>{entries.forEach(entry=>{if(entry.isIntersecting)entry.target.classList.add('visible')})},{threshold:0.1,rootMargin:'0px 0px -50px 0px'});
revealElements.forEach(el=>revealObserver.observe(el));

const glitchTexts=document.querySelectorAll('.glitch-text');
const chars='ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
glitchTexts.forEach(el=>{const originalText=el.textContent;let iteration=0;const scramble=()=>{el.textContent=originalText.split('').map((char,index)=>{if(index<iteration)return originalText[index];return chars[Math.floor(Math.random()*chars.length)]}).join('');if(iteration<originalText.length){iteration+=1/3;requestAnimationFrame(scramble)}};const observer=new IntersectionObserver((entries)=>{entries.forEach(entry=>{if(entry.isIntersecting){iteration=0;scramble();observer.unobserve(entry.target)}})});observer.observe(el)});

const counters=document.querySelectorAll('.stat-number');
const animateCounter=(el)=>{const target=el.getAttribute('data-count');const suffix=el.getAttribute('data-suffix')||'';const prefix=el.getAttribute('data-prefix')||'';const duration=2000;const end=parseFloat(target);const startTime=performance.now();const update=(currentTime)=>{const elapsed=currentTime-startTime;const progress=Math.min(elapsed/duration,1);const eased=1-Math.pow(1-progress,4);const current=end*eased;if(Number.isInteger(end))el.textContent=prefix+Math.floor(current).toLocaleString()+suffix;else el.textContent=prefix+current.toFixed(1)+suffix;if(progress<1)requestAnimationFrame(update)};requestAnimationFrame(update)};
const counterObserver=new IntersectionObserver((entries)=>{entries.forEach(entry=>{if(entry.isIntersecting){animateCounter(entry.target);counterObserver.unobserve(entry.target)}})},{threshold:0.5});
counters.forEach(el=>counterObserver.observe(el));

const hero=document.querySelector('.hero');
if(hero){const glows=hero.querySelectorAll('.hero-glow');hero.addEventListener('mousemove',(e)=>{const rect=hero.getBoundingClientRect();const x=(e.clientX-rect.left)/rect.width-0.5;const y=(e.clientY-rect.top)/rect.height-0.5;glows.forEach((glow,i)=>{const factor=(i+1)*20;glow.style.transform='translate('+(x*factor)+'px,'+(y*factor)+'px)'})})}

const currentPath=window.location.pathname;
document.querySelectorAll('.nav-link').forEach(link=>{link.classList.remove('active');if(link.getAttribute('href')===currentPath)link.classList.add('active')});

const contactForm=document.querySelector('.contact-form');
if(contactForm){contactForm.addEventListener('submit',(e)=>{e.preventDefault();const btn=contactForm.querySelector('.btn-primary');const originalText=btn.querySelector('span').textContent;btn.querySelector('span').textContent='Sent!';btn.style.background='linear-gradient(135deg,#22c55e,#16a34a)';setTimeout(()=>{btn.querySelector('span').textContent=originalText;btn.style.background='';contactForm.reset()},3000)})}

// Interactive 3D Card Tilt Effect
const tiltCards = document.querySelectorAll('[data-tilt]');
tiltCards.forEach(card => {
    card.addEventListener('mousemove', (e) => {
        const rect = card.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;
        const xc = rect.width / 2;
        const yc = rect.height / 2;
        const angleX = (yc - y) / 10;
        const angleY = (x - xc) / 10;
        card.style.transform = `translateY(-8px) rotateX(${angleX}deg) rotateY(${angleY}deg) scale(1.02)`;
    });
    card.addEventListener('mouseleave', () => {
        card.style.transform = 'translateY(0) rotateX(0) rotateY(0) scale(1)';
    });
});
});
