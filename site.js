/* ALP Astrology — shared chrome (header + footer) and interactions.
   Each page sets <body data-page="home"> etc. to drive active nav state. */
(function(){
  const LOGO = 'assets/alp-logo.webp';
  const PHONE = '+919786556156';
  const WA = 'https://wa.me/919786556156';

  const NAV = [
    ['home','Home','index.html'],
    ['about','About','about.html'],
    ['courses','Courses','courses.html'],
    ['consultation','Consultation','consultation.html'],
    ['services','Services','services.html'],
    ['resources','Resources', null, [
      ['horoscope','Horoscope','horoscope.html'],
      ['articles','Articles','articles.html'],
      ['videos','Videos','videos.html'],
      ['events','Events','events.html'],
      ['testimonials','Testimonials','testimonials.html'],
      ['faq','FAQ','faq.html'],
      ['success','Success Stories','success-stories.html'],
    ]],
    ['contact','Contact','contact.html'],
  ];

  const page = document.body.dataset.page || 'home';
  const inResources = id => ['horoscope','articles','videos','events','testimonials','faq','success'].includes(id);

  const renderItem = ([id,label,href,children]) => {
    if(children){
      const open = inResources(page);
      return `<li class="has-sub${open?' cur':''}">
        <button class="sub-toggle${open?' active':''}" aria-expanded="false" aria-haspopup="true">
          ${label}
          <svg class="caret" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
        </button>
        <ul class="sub-menu">
          ${children.map(([cid,clabel,chref])=>`<li><a href="${chref}" class="${cid===page?'active':''}">${clabel}</a></li>`).join('')}
        </ul>
      </li>`;
    }
    return `<li><a href="${href}" class="${id===page?'active':''}">${label}</a></li>`;
  };

  /* ---- header ---- */
  const header = document.createElement('header');
  header.className = 'site-header';
  header.innerHTML = `
    <div class="wrap">
      <nav class="nav" aria-label="Primary">
        <a class="brand" href="index.html" aria-label="ALP Astrology home">
          <img src="${LOGO}" alt="ALP Astrology" width="96" height="96" fetchpriority="high" decoding="async">
        </a>
        <ul class="nav-links" id="navLinks">
          ${NAV.map(renderItem).join('')}
        </ul>
        <a class="btn btn-red nav-cta desktop" href="${WA}" target="_blank" rel="noopener">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.9.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
          Talk to an Astrologer
        </a>
        <button class="nav-toggle" id="navToggle" aria-label="Menu" aria-expanded="false">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
        </button>
      </nav>
    </div>`;
  document.body.prepend(header);

  const toggle = header.querySelector('#navToggle');
  const links  = header.querySelector('#navLinks');
  toggle.addEventListener('click', ()=>{
    const open = links.classList.toggle('open');
    toggle.setAttribute('aria-expanded', open);
  });
  links.addEventListener('click', e=>{
    const a = e.target.closest('a');
    if(a) links.classList.remove('open');
  });

  /* ---- Resources dropdown (click to toggle; hover handled by CSS on desktop) ---- */
  header.querySelectorAll('.has-sub').forEach(item=>{
    const btn = item.querySelector('.sub-toggle');
    btn.addEventListener('click', e=>{
      e.preventDefault();
      const isOpen = item.classList.toggle('open');
      btn.setAttribute('aria-expanded', isOpen);
    });
  });
  document.addEventListener('click', e=>{
    if(!e.target.closest('.has-sub')){
      header.querySelectorAll('.has-sub.open').forEach(i=>{
        i.classList.remove('open');
        i.querySelector('.sub-toggle').setAttribute('aria-expanded','false');
      });
    }
  });

  const onScroll = ()=> header.classList.toggle('scrolled', window.scrollY>8);
  onScroll(); window.addEventListener('scroll', onScroll, {passive:true});

  /* ---- footer ---- */
  const footer = document.createElement('footer');
  footer.className = 'site-footer';
  const ic = {
    fb:'<path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>',
    ig:'<rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1"/>',
    yt:'<path d="M22 8.5a3 3 0 0 0-2.1-2.1C18 6 12 6 12 6s-6 0-7.9.4A3 3 0 0 0 2 8.5 31 31 0 0 0 2 12a31 31 0 0 0 .1 3.5 3 3 0 0 0 2 2.1C6 18 12 18 12 18s6 0 7.9-.4a3 3 0 0 0 2.1-2.1A31 31 0 0 0 22 12a31 31 0 0 0-.1-3.5z"/><polygon points="10 9 15 12 10 15" fill="#1A130B" stroke="none"/>',
    wa:'<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.9.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92z"/>'
  };
  const sicon = p => `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">${p}</svg>`;
  footer.innerHTML = `
    <div class="stars" id="footStars"></div>
    <div class="wrap">
      <div class="foot-grid">
        <div class="foot-brand">
          <img src="${LOGO}" alt="ALP Astrology" width="120" height="120" loading="lazy" decoding="async">
          <p>Discover the power of the planets and unlock the secrets of your destiny — traditional Vedic wisdom for modern life.</p>
          <div class="social-row mt-5">
            <a href="${WA}" target="_blank" rel="noopener" aria-label="WhatsApp">${sicon(ic.wa)}</a>
            <a href="#" aria-label="Facebook">${sicon(ic.fb)}</a>
            <a href="#" aria-label="Instagram">${sicon(ic.ig)}</a>
            <a href="#" aria-label="YouTube">${sicon(ic.yt)}</a>
          </div>
        </div>
        <div class="foot-col">
          <h4>Quick Links</h4>
          <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="about.html">About Us</a></li>
            <li><a href="courses.html">Courses</a></li>
            <li><a href="consultation.html">Consultation</a></li>
            <li><a href="services.html">Services</a></li>
          </ul>
        </div>
        <div class="foot-col">
          <h4>Resources</h4>
          <ul>
            <li><a href="horoscope.html">Horoscope</a></li>
            <li><a href="articles.html">Articles</a></li>
            <li><a href="videos.html">Videos</a></li>
            <li><a href="events.html">Events</a></li>
            <li><a href="testimonials.html">Testimonials</a></li>
            <li><a href="faq.html">FAQ</a></li>
          </ul>
        </div>
        <div class="foot-col">
          <h4>Newsletter</h4>
          <p style="color:var(--fg-inv-soft);font-size:.95rem">Subscribe for monthly predictions and updates.</p>
          <form class="news-form" onsubmit="event.preventDefault();this.reset();this.querySelector('input').placeholder='Subscribed ✦';">
            <input type="email" placeholder="Your email" required aria-label="Email">
            <button class="btn btn-primary" type="submit">Subscribe</button>
          </form>
        </div>
      </div>
      <div class="foot-bottom">
        <span>© 2025 ALP Astrology. All rights reserved.</span>
        <span>F2, 1st Floor, Shiva Homes, Moulivakkam, Chennai 600116</span>
      </div>
    </div>`;
  document.body.appendChild(footer);

  /* ---- floating call button ---- */
  const fc = document.createElement('a');
  fc.className = 'float-call';
  fc.href = WA; fc.target='_blank'; fc.rel='noopener'; fc.setAttribute('aria-label','Talk to an astrologer on WhatsApp');
  fc.innerHTML = sicon(ic.wa);
  document.body.appendChild(fc);

  /* ---- starfields (disabled — static backgrounds carry the cosmic look) ---- */
  // intentionally no-op: .stars containers in older markup are hidden via CSS

  /* ---- reveal on scroll ---- */
  const io = new IntersectionObserver((es)=>{
    es.forEach(e=>{ if(e.isIntersecting){ e.target.classList.add('in'); io.unobserve(e.target); } });
  }, {threshold:.12, rootMargin:'0px 0px -8% 0px'});
  document.querySelectorAll('.reveal').forEach(el=>io.observe(el));

  /* ---- count-up stats ---- */
  const stats = document.querySelectorAll('[data-count]');
  if(stats.length){
    const so = new IntersectionObserver((es)=>{
      es.forEach(e=>{
        if(!e.isIntersecting) return;
        const el=e.target, to=+el.dataset.count, suf=el.dataset.suffix||'';
        let s=0; const step=Math.max(1,Math.round(to/40));
        const t=setInterval(()=>{ s+=step; if(s>=to){s=to;clearInterval(t);} el.textContent=s+suf; },28);
        so.unobserve(el);
      });
    },{threshold:.6});
    stats.forEach(s=>so.observe(s));
  }
})();
